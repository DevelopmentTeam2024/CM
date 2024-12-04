<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Customer;
use App\Repo\OrdersRepo;
use App\Services\Actions;
use App\Enum\ProductsEnum;
use App\Enum\TSRTypesEnum;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\StatusService;
use App\Models\Order as Inquiry;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\SerialNumberService;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orders = OrdersRepo::getMyOrders();
        $showAllBtn = false;
        if ($request->has('status')) {
            $status = $request->get('status');
            $orders = $orders->filter(function ($order) use ($status) {
                return $order->status->status->value == $status;
            });
            $showAllBtn = true;
        }

        if ($request->has('user')) {
            $user = $request->get('user');
            $toStatuses = ['Accepted', 'Assigned', 'Returned'];
            $orders = $orders->filter(function ($order) use ($user, $toStatuses) {
                if (in_array($order->status->status->value, $toStatuses)) {
                    foreach ($order->statuses as $status) {
                        if ($status->checker?->id == $user) {
                            return $order;
                        }
                    }
                }
            });
            $showAllBtn = true;
        }
        return view("orders.index", ['orders' => $orders, 'showAllBtn' => $showAllBtn, 'showControllers' => true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $types = TSRTypesEnum::list();
        $products = ProductsEnum::list();
        // dd($products);
        return view(view: "orders.create", data: [
            'users' => User::where(['department' => 'Sales'])->get(),
            'titles' => OrdersRepo::getTitlesList(),
            'projects' => Project::all(),
            'types' => $types,
            'products' => $products,
            'user_id' => $user->id,
            'customers' => UserService::getEmployeeClients($user->code),
            'serial_number' => SerialNumberService::generateSerialNumber(),
        ]);
    }

    public function getCustomer(int $code)
    {
        $customer = Customer::where(['code' => $code])->first();
        if (empty($customer)) {
            return view('orders.partials.nocustomer');
        } else {
            return view('orders.partials.customer', ['customer' => $customer]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'project_name' => 'required|string|max:255',
            'project_id' => 'required|integer|max:255',
            // 'product_code' => 'required|string|max:255',
            'products' => 'required|array|min:1',
            'products.*' => 'string',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'employee' => 'required|exists:users,id',
            'serial_number' => 'required|unique:orders,serial_number',
            'files.*' => 'required|file|max:51200',
        ];
        // dd(vars: $rules);
        $data = $request->validate($rules);
        $data['product_code'] = json_encode($data['products']);
        unset($data['products']);
        if ($request->has('customer_id')) {
            $customer_id = intval($request->input('customer_id'));
            $customer = Customer::findOrFail($customer_id);
            $data['customer_name'] = $customer->code . ". " . $customer->name_en;
            $data['customer_id'] = $customer->id;
        } else {
            $code = intval($request->input('customer_code'));
            $name = trim($request->input('customer_name'));
            try {
                $customer = Customer::create([
                    'code' => $code,
                    'name_ar' => $name,
                    'name_en' => $name
                ]);
                $data['customer_name'] = $code . ". " . $name;
                $data['customer_id'] = $customer->id;
            } catch (Exception $e) {
                $data['customer_name'] = $code . ". " . $name;
                // $data['customer_id'] = null;
            }
        }

        // $data['serial_number'] = SerialNumberService::generateSerialNumber();

        $user = User::find($data['employee']);

        if ($user->role->value == 'Admin' || ($user->department->value == 'Sales' && $user->role->value == 'Manager')) {
            $status = 'Approved';
            // $checker = User::where(['department' => 'Technical Office', 'role' => 'Manager'])->first();
        } elseif ($user->department->value == 'Technical Office' && $user->role->value == 'Manager') {
            $status = 'Approved';
            // $checker = User::where(['department' => 'Technical Office', 'role' => 'Manager'])->first();
        } else {
            $status = 'Submitted';
            // $checker = User::where(['department' => 'Sales', 'role' => 'Manager'])->first();
        }
        unset($data['employee']);
        $data['user_id'] = Auth::user()->id;
        $files = $data['files'];
        // dd($files);
        unset($data['files']);

        // dd($data);
        try {
            $order = DB::transaction(function () use ($data, $status, $files) {
                $order = Inquiry::create($data);
                $statusData = [
                    'user_id' => $order->user->id,
                    'status' => $status,
                ];
                $order->statuses()->create($statusData);

                foreach ($files as $file) {
                    $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

                    $originalName = $file->getClientOriginalName();
                    $fileSize = $file->getSize();
                    $fileExtension = $file->getClientOriginalExtension();
                    $fileMimeType = $file->getMimeType();

                    $storagePath = 'attachments/' . $order->serial_number;
                    $path = $storagePath . '/' . $filename;

                    $fileData = [
                        'user_id' => $order->user->id,
                        'filename' => $originalName,
                        'filesize' => $fileSize,
                        'filetype' => $fileMimeType,
                        'file_ext' => $fileExtension,
                        'path' => $path,
                    ];

                    $file->move($storagePath, $filename);

                    $order->files()->create($fileData);
                }
                return $order;
            });

            return redirect('inquiries?status=' . $order->status->status->value)->with('success', 'Inquiry #' . $order->serial_number . ' created successfully');
        } catch (Exception $e) {
            return redirect('inquiries?status=' . $order->status->status->value)->with('errors', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Inquiry $inquiry)
    {
        $ended = $this->checkInquiryFinished($inquiry);
        if ($inquiry->status->status->group() == 'Working' && $ended['Percentage'] == 100) {
            $user = $inquiry->status->user->id;
            $inquiry->statuses()->create([
                'user_id' => $user,
                'status' => 'Finished',
            ]);
            return redirect('inquiries/' . $inquiry->id)->with('success', 'Inquiry Status Changed successfully');
        }
        return view(view: "orders.show", data: [
            // 'projects' => Project::all() ,
            'order' => $inquiry,
            // 'options' => (new StatusService($inquiry->status))->getRequiredActions(),
            'options' => (new StatusService($inquiry->status))->getActions(),
            'ended' => $this->checkInquiryFinished($inquiry),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inquiry $inquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Inquiry $inquiry)
    // {
    //     $updateStatusNotes = false;
    //     if ($request->hasAny(['customer_name', 'project_name', 'product_code', 'title'])) {
    //         $inquiryData = $request->only(['customer_name', 'project_name', 'product_code', 'title']);
    //         $inquiry->update($inquiryData);
    //         $updateStatusNotes = true;
    //     }

    //     $data = $request->validate([
    //         'status' => 'required|string|max:255',
    //         'notes' => 'nullable|string',
    //         'checker_id' => 'nullable|exists:users,id',
    //         'items_count' => 'nullable|integer|min:1',
    //         'files.*' => 'nullable|file|max:51200',
    //         'priority' => 'nullable|string',
    //         'expected_date' => 'nullable|date',
    //         'expected_minutes' => 'nullable|integer|min:0'
    //     ]);

    //     $data['user_id'] = Auth::user()->id;

    //     if (!isset($data['priority']) || is_null($data['priority'])) {
    //         $data['priority'] = $inquiry->status->priority->value ?? 'Normal';
    //     }

    //     if (!isset($data['expected_date']) || is_null($data['expected_date'])) {
    //         $data['expected_date'] = $inquiry->status->expected_date;
    //     }


    //     if (isset($data['files'])) {
    //         $files = $data['files'];
    //         unset($data['files']);
    //     }
    //     if ($updateStatusNotes) {
    //         $data['notes'] .= " -- MODIFIED BY " . Auth::user()->name . " --";
    //     }

    //     $status = $inquiry->statuses()->create($data);


    //     if (isset($files) && count($files) > 0) {
    //         foreach ($files as $file) {
    //             $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

    //             $originalName = $file->getClientOriginalName();
    //             $fileSize = $file->getSize();
    //             $fileExtension = $file->getClientOriginalExtension();
    //             $fileMimeType = $file->getMimeType();

    //             $storagePath = 'attachments/' . $inquiry->serial_number;
    //             $path = $storagePath . '/' . $filename;

    //             $fileData = [
    //                 'user_id' => $inquiry->user->id,
    //                 'filename' => $originalName,
    //                 'filesize' => $fileSize,
    //                 'filetype' => $fileMimeType,
    //                 'file_ext' => $fileExtension,
    //                 'path' => $path,
    //             ];

    //             $file->move($storagePath, $filename);

    //             $status->files()->firstOrCreate($fileData, $fileData);
    //         }
    //     }

    //     return redirect('inquiries/' . $inquiry->id)->with('success', 'Inquiry Status Changed successfully');
    // }

    public function update(Request $request, Inquiry $inquiry)
    {
        $action = $request->input('action');

        if ($action === 'Revise') {
            return $this->revise($request, $inquiry); // Call the revise method directly
        }

        $updateStatusNotes = false;

        // Update general inquiry fields if provided
        if ($request->hasAny(['customer_name', 'project_name', 'project_id', 'product_code', 'title'])) {
            $inquiryData = $request->only(['customer_name', 'project_name', 'project_id', 'product_code', 'title']);
            $inquiry->update($inquiryData);
            $updateStatusNotes = true;
        }
        // dd($request);

        // Validate the input data
        $data = $request->validate([
            'status' => 'required|string|max:255',
            'notes' => 'nullable|string',
            // 'reason' => 'nullable|max:500', // Reason required if notes is Rejected
            'reasons' => 'nullable|array', // Validates 'reasons' as an array if provided
            'reasons.*' => 'string|max:255',
            'checker_id' => 'nullable|exists:users,id',
            'items_count' => 'nullable|integer|min:1',
            'files.*' => 'nullable|file|max:51200',
            'priority' => 'nullable|string',
            'expected_date' => 'nullable|date',
            'expected_minutes' => 'nullable|integer|min:0',
        ], [
            'reason.required_if' => __('Reason is required when the status is Rejected.'),
        ]);


        // Set user ID and handle default values for priority and expected_date
        $data['user_id'] = Auth::id();
        $data['priority'] = $data['priority'] ?? ($inquiry->status->priority->value ?? 'Normal');
        $data['expected_date'] = $data['expected_date'] ?? $inquiry->status->expected_date;

        // Handle files separately if they exist
        if (isset($data['files'])) {
            $files = $data['files'];
            unset($data['files']);
        }

        // Append modification notes if applicable
        if ($updateStatusNotes) {
            $data['notes'] = ($data['notes'] ?? '') . " -- MODIFIED BY " . Auth::user()->name . " --";
        }

        // dd($data);
        // $data['reasons'] = isset($data['reasons']) ? json_encode($data['reasons']) : null;
        if ($request->has('reasons') && is_array($request->reasons)) {
            $data['reasons'] = implode(', ', $request->reasons); // Convert array to a string for storage
        }



        // Create the new status entry
        $status = $inquiry->statuses()->create($data);

        // Handle file uploads if provided
        if (!empty($files)) {
            foreach ($files as $file) {
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $originalName = $file->getClientOriginalName();
                $fileSize = $file->getSize();
                $fileExtension = $file->getClientOriginalExtension();
                $fileMimeType = $file->getMimeType();

                $storagePath = storage_path('attachments/' . $inquiry->serial_number);
                $path = 'attachments/' . $inquiry->serial_number . '/' . $filename;

                // Ensure the directory exists
                if (!file_exists($storagePath)) {
                    mkdir($storagePath, 0777, true);
                }

                // Move the file and save file metadata
                $file->move($storagePath, $filename);

                $fileData = [
                    'user_id' => Auth::id(),
                    'filename' => $originalName,
                    'filesize' => $fileSize,
                    'filetype' => $fileMimeType,
                    'file_ext' => $fileExtension,
                    'path' => $path,
                ];

                $status->files()->firstOrCreate($fileData, $fileData);
            }
        }




        return redirect()->route('inquiries.show', $inquiry->id)->with('success', __('Inquiry Status Changed successfully'));
    }
    public function revise(Request $request, Order $order)
    {
        // Step 1: Retrieve Finished TSRs for the same customer, project, and title with the latest status
        $finishedTSRs = Order::where('customer_name', $order->customer_name)
            ->where('project_name', $order->project_name)
            ->where('title', $order->title)
            // ->whereHas('statuses', function ($query) {
            //     $query->where('status', 'Finished');
            // })
            // ->with(['statuses' => function ($query) {
            //     $query->latest('created_at');
            // }])
            ->get();

        // dd($finishedTSRs );
        // dd($finishedTSRs->pluck('id')->toArray());


        if ($finishedTSRs->isEmpty()) {
            return redirect()->back()->withErrors(__('No finished TSRs found for this order.'));
        }
        // dd($finishedTSRs->toArray());

        // Step 2: Validate the input data
        $data = $request->validate([
            'selected_tsr_id' => 'required|exists:orders,id', // Ensure selected TSR exists
            'project_id' => 'nullable|integer',
            'products' => 'required|array|min:1',
            'products.*' => 'string',
            'description' => 'nullable|string',
            'title' => 'nullable|string',
            'revise_reason' => 'string|max:500', // Revise reason is required
            'notes' => 'nullable|string', // Optional notes for the revision
            'priority' => 'nullable|string',
            'files.*' => 'nullable|file|max:51200', // Optional file uploads
        ], [
            'selected_tsr_id.required' => __('Please select a TSR to revise.'),
            'revise_reason.required' => __('A reason for the revision is required.'),
        ]);


        // Step 3: Handle the selected TSR
        // $selectedTSR = $finishedTSRs->find($data['selected_tsr_id']);

        $selectedTSR = $finishedTSRs->where('id', $data['selected_tsr_id'])->first();
        // dd($selectedTSR);
        if (!$selectedTSR) {
            return redirect()->back()->withErrors(__('The selected TSR does not match the criteria.'));
        }



        $latestStatus = $selectedTSR->statuses()->latest('created_at')->first();
        if (!$latestStatus) {
            return redirect()->back()->withErrors(__('The selected TSR does not have a valid status.'));
        }
        $status = $latestStatus->status;


        // Step 4: Mark the previous TSR as CLOSED by creating a new status record
        $order->statuses()->create([
            'user_id' => Auth::id(),
            'status' => 'Closed',
            'notes' => 'Order closed after revision',
        ]);

        // $order = App\Models\Order::find(1);
// $statuses = $order->statuses; // Collection of all statuses
// dd($statuses);


        // Step 5: Generate a new serial number and check for duplicates
        $newSerialNumber = $selectedTSR->serial_number;
        $lastDigit = intval(substr($newSerialNumber, -1));
        $newSerialNumber = substr($newSerialNumber, 0, -1) . ($lastDigit + 1);

        // Ensure the new serial number is unique
        while (Order::where('serial_number', $newSerialNumber)->exists()) {
            // If serial number exists, increment further
            $lastDigit++;
            $newSerialNumber = substr($newSerialNumber, 0, -1) . $lastDigit;
        }

        // Step 6: Create the new Revised TSR
        $revisedTSR = $order->replicate();
        $revisedTSR->serial_number = $newSerialNumber; // Set the new serial number
        $revisedTSR->product_code = json_encode($data['products']); // Update the products_code field with new data from the request
        $revisedTSR->description = $data['description'] . "\n\nTHE REASON OF REVISE IS:\n" . $data['revise_reason'];
        $revisedTSR->project_id = $data['project_id'] ?? 0;
        $revisedTSR->title = $data['title'];
        $revisedTSR->save(); // Save the new TSR

        // Step 7: Create a 'Submitted' status for the new TSR
        $status = $revisedTSR->statuses()->create([
            'status' => 'Submitted',
            'user_id' => Auth::id(),
            'notes' => ($data['notes'] ?? '') . "\nREVISION: " . $data['revise_reason'] . " -- REVISED BY " . Auth::user()->name,
            'priority' => $data['priority']
        ]);

        // Step 8: Handle file uploads (if any)
        // Handle files separately if they exist
        if (isset($data['files'])) {
            $files = $data['files'];
            unset($data['files']);
        }
        // Handle file uploads if provided
        if (!empty($files)) {
            foreach ($files as $file) {
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $originalName = $file->getClientOriginalName();
                $fileSize = $file->getSize();
                $fileExtension = $file->getClientOriginalExtension();
                $fileMimeType = $file->getMimeType();

                $storagePath = storage_path('attachments/' . $revisedTSR->serial_number);
                $path = 'attachments/' . $revisedTSR->serial_number . '/' . $filename;

                // Ensure the directory exists
                if (!file_exists($storagePath)) {
                    mkdir($storagePath, 0777, true);
                }

                // Move the file and save file metadata
                $file->move($storagePath, $filename);

                $fileData = [
                    'user_id' => Auth::id(),
                    'filename' => $originalName,
                    'filesize' => $fileSize,
                    'filetype' => $fileMimeType,
                    'file_ext' => $fileExtension,
                    'path' => $path,
                ];

                // $status->files()->firstOrCreate($fileData, $fileData);
                $revisedTSR->files()->firstOrCreate($fileData, $fileData);
            }

        }

        foreach ($order->files()->get() as $file) {
            $revisedTSR->files()->create($file->getAttributes());
        }
        foreach($order->statuses()->get() as $status) {
            foreach($status->files()->get() as $st)
            // dump($st->getAttributes());
            $revisedTSR->files()->create($st->getAttributes());
        }
        
        // Step 9: Redirect with success message
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return redirect('inquiries')->with('success', 'Inquiry Deleted successfully');
    }

    public function getAction(Inquiry $inquiry, string $action)
    {
        // $action = (new StatusService($inquiry->status))->getActionfromList($action);
        // dd($action);
        $products = ProductsEnum::list();
        $action = Actions::run($action);
        return view('orders.partials.action', [
            'projects' => Project::all(),
            'products' => $products,
            'order' => $inquiry,
            'status' => $inquiry->status,
            'action' => $action
        ]);
    }

    public function currentStatus(Request $request, Inquiry $inquiry)
    {
        $data = $request->validate([
            'priority' => 'nullable|string|in:Normal,Urgent,Emergency',
            'expected_date' => 'nullable|date',
            'expected_minutes' => 'nullable|numeric'
        ]);
        $inquiry->status()->update($data);
        return redirect('inquiries/' . $inquiry->id)->with('success', 'Inquiry Status Updated successfully');
    }

    public function getReport(Request $request)
    {
        $user = Auth::user();
        if ($user->role->value == 'Admin') {
            $users = User::where('department', '!=', 'Administration')->get();
        } elseif ($user->role->value == 'Manager') {
            $users = User::where(['department' => $user->department->value])->get();
        } else {
            $users = collect([0 => $user]);
        }
        $data = ['users' => $users];

        if ($request->has('user')) {
            $user_id = $request->input('user');
            $start = $request->input('start') ?? now()->startOfMonth()->format('Y-m-d');
            $end = $request->input('end') ?? now()->endOfMonth()->format('Y-m-d');
            $realEnd = carbon::parse($end)->addDay()->format('Y-m-d');
            $orders = OrdersRepo::getUserOrders($user_id);
            $orders = $orders->filter(function ($order) use ($start, $realEnd) {
                return $order->created_at >= $start && $order->created_at <= $realEnd;
            });
            $data['orders'] = $orders;
            $data['count'] = $orders->count();
            $data['total'] = Inquiry::where('created_at', '>=', $start)->where('created_at', '<=', $realEnd)->count();
            $data['user_id'] = $user_id;
            $data['start'] = $start;
            $data['end'] = $end;
            $data['showControllers'] = false;
        }

        // dd($users);
        return view('reports.tsr', $data);
    }

    private function checkInquiryFinished(Inquiry $inquiry)
    {
        $users = [];
        $techOfficeStatuses = ['Accepted', 'Clarified', 'Returned', 'Forwarded', 'Ended'];
        $endedCounter = 0;
        $inprogressCounter = 0;
        foreach ($inquiry->statuses as $status) {
            // if (in_array($status->status->value, $techOfficeStatuses)) {
            if ($status->status->group() == 'Working') {
                // if (!isset($users[$status->user->id])) {
                //     $users[$status->user->id] = [];
                // }
                // $users[$status->user->id][] = $status->status->value;
                $users[$status->user->id] = $status->status->value;
            }
        }

        foreach ($users as $status) {
            if ($status == 'Ended') {
                $endedCounter++;
            } else {
                $inprogressCounter++;
            }
        }

        $total = $endedCounter + $inprogressCounter;

        $percentage = $total > 0 ? round($endedCounter / $total, 4) * 100 : 0;
        return [
            'Ended' => $endedCounter,
            'NotEnded' => $inprogressCounter,
            'Total' => $total,
            'Percentage' => $percentage
        ];
    }
}
