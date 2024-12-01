<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Qutation;
use App\Repo\OrdersRepo;
use App\Models\QutationItem;
use Illuminate\Http\Request;
use App\Services\SerialNumberService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\QutationService;
use App\Traits\TSRHelper;
use App\Traits\ExcelFile;
use Exception;




class QutationController extends Controller
{
    use TSRHelper, ExcelFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if (is_null($order_id)) {
        //     $orders = OrdersRepo::getMyOrders();
        //     $orders = $orders->filter(function ($order) {
        //         $finished = ['Finished', 'Closed'];
        //         return $order->title == "Quotation" && in_array($order->status->status->value, $finished);
        //     });
        //     return view('orders.finished', ['orders' => $orders, 'showControllers' => false, 'forQutation' => true]);
        // } else {
        //     $order = Order::findOrFail($order_id);
        //     return view('qutations.index', ['order' => $order, 'forQutation' => true]);
        // }

        return view('quotations.index', ['res' => Qutation::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Qutation $qutation)
    {
        $data = $request->validate([
            'workorder_number' => 'required|unique:workorders,workorder_number',
            'priority' => 'required',
            'remarks' => 'nullable|string',
            'items' => 'required|array',
            'quantity' => 'required|array',
            'items.*' => 'numeric|exists:qutation_items,id',
            'quantity.*' => 'numeric|gt:0'
        ]);
        $data['user_id'] = Auth::user()->id;

        $items = $data['items'];
        $quantities = $data['quantity'];
        try {
            $workorder = DB::transaction(function () use ($data, $items, $quantities, $qutation) {
                // dd('In DB Transaction');
                // dd($qutation->workorders());
                // dd($qutation->workorders()->create($data)->toRawSql());

                $workorder = $qutation->workorders()->create($data);

                unset($data['items']);
                unset($data['quantity']);

                foreach ($items as $item_id) {
                    $item = QutationItem::find($item_id);
                    $item = QutationService::splitItemQuantity($item, $quantities[$item_id]);
                    $item->update(['workorder_id' => $workorder->id, 'status' => 'Workorder']);
                }
                return $workorder;
            });

            return redirect('qutations/' . $qutation->id)->with('success', 'Workorder #' . $workorder->workorder_number . ' Created successfully');
        } catch (Exception $e) {
            return redirect('qutations/' . $qutation->id)->with('errors', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, int $order_id)
    {
        $order = Order::findOrFail($order_id);
        $vd = $request->validate([
            'quotation_number' => 'required|unique:qutations,qutation_number',
            'files.*' => 'required|file|mimes:xlsx,xls|max:51200',
        ]);
        $qn = $vd['quotation_number'];

        $file = $request->file('files')[0];
        $fileName = 'uploads/' . date('Ymd') . '-' . $file->getClientOriginalName();

        $filePath = $file->storeAs('quotations', $fileName, 'public');

        $csvContent = $this->excelToCSV($filePath);

        $text = $this->fixCsv($csvContent);

        // dd($text);

        $quotationNumber = $this->getQutationNumber($text);

        if ($quotationNumber != $qn) {
            return redirect()->back()->withErrors('Quotation Number Entered Not Matched!');
        } else {
            try {
                DB::transaction(function () use ($order, $text) {
                    $quotationNumber = $this->getQutationNumber($text);
                    $qutationData = [
                        'qutation_number' => $quotationNumber,
                        'discount_percentage' => floatval($this->getFieldValue($text, 'Less Discount')),
                        'user_id' => $order->user_id,
                        'status' => 'Quotation',
                        'vat_percentage' => 15,
                    ];
                    $qutation = $order->qutations()->create($qutationData);

                    $data = $this->getQutation($text);
                    $totPrice = 0;
                    foreach ($data as $g => $group) {
                        foreach ($group as $item) {
                            $item['group_code'] = $g;
                            $item['status'] = 'Pending';
                            $totPrice += $item['total_price'];
                            $qutation->items()->create($item);
                        }
                    }
                    $discountValue = $totPrice * $qutation->discount_percentage / 100;
                    $netPrice = $totPrice - $discountValue;
                    $vatValue = $netPrice * $qutation->vat_percentage / 100;
                    $finalPrice = $netPrice + $vatValue;

                    $updateData = [
                        'total_price' => $totPrice,
                        'discount_value' => $discountValue,
                        'net_price' => $netPrice,
                        'vat_value' => $vatValue,
                        'final_price' => $finalPrice,
                    ];
                    $qutation->update($updateData);
                });
                return redirect()->back()->withSuccess('Quotation #' . $quotationNumber . ' Created successfully');
            } catch (Exception $e) {
                return redirect()->back()->withErrors($e->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Qutation $qutation)
    {
        // $order = $qutation->order;
        $workorder_number = SerialNumberService::generateWorkorderNumber();

        return view('quotations.show', ['qutation' => $qutation, 'workorder_number' => 'Wo' . $workorder_number]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order, Qutation $qutation)
    {
        if ($qutation->order->id != $order->id) {
            abort(404);
        }

        $field = $request->input('fieldName');
        $value = $request->input('fieldValue');
        $data = [
            $field => $value
        ];

        $approve = $request->file('files');
        $file = $approve['approval'];

        $filename = 'Q_' . $qutation->qutation_number . '_Approval.' . $file->getClientOriginalExtension();

        $originalName = $file->getClientOriginalName();
        $fileSize = $file->getSize();
        $fileExtension = $file->getClientOriginalExtension();
        $fileMimeType = $file->getMimeType();

        $storagePath = 'approvals';
        $path = $storagePath . '/' . $filename;

        $fileData = [
            'user_id' => $qutation->user->id,
            'filename' => $originalName,
            'filesize' => $fileSize,
            'filetype' => $fileMimeType,
            'file_ext' => $fileExtension,
            'path' => $path,
        ];

        // dd($fileData);

        $file->move($storagePath, $filename);

        $qutation->files()->create($fileData);

        // dd($file);


        $qutation->update($data);
        return redirect('qutations/' . $order->id . '/' . $qutation->id)->with('success', 'Qutations Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order, Qutation $qutation)
    {
        if ($qutation->order->id != $order->id) {
            abort(404);
        }

        $qutation->delete();
    }
}
