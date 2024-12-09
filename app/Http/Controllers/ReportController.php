<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Project;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    public function showForm()
    {
        $projects = Project::all();
        $customers = Customer::all();
        $techEmployees = User::where('department', 'Technical Office')->get();
        $salesEmployees = User::where('department', 'Sales')->get();
        $tsrTypes = \App\Enum\TSRTypesEnum::list();

        return view('reports.export', compact('projects', 'customers', 'salesEmployees', 'techEmployees', 'tsrTypes'));
    }

    public function getCustomer(int $code)
    {
        $customers = UserService::getEmployeeClients($code);
        dd($customers);
        return response()->json($customers);
    }

    public function exportReport(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'employee' => 'nullable|string',
            'customer' => 'nullable|string',
            'tsr_type' => 'nullable|string',
            'project' => 'nullable|string',
        ]);

        $orders = Order::with(['project', 'customer', 'user', 'statuses', 'statuses.checker']);

        $filters = [];

        if (!empty($validated['start_date']) && !empty($validated['end_date'])) {
            $filters[] = ['created_at', '>=', $validated['start_date']];
            $filters[] = ['created_at', '<=', $validated['end_date']];
        }

        if (!empty($validated['customer']) && $validated['customer'] !== 'all') {
            $filters[] = ['orders.customer_id', $validated['customer']];
        }

        if (!empty($validated['project']) && $validated['project'] !== 'all') {
            $filters[] = ['orders.project_id', $validated['project']];
        }

        if (!empty($validated['tsr_type']) && $validated['tsr_type'] !== 'all') {
            $filters[] = ['orders.title', $validated['tsr_type']];
        }

        if (!empty($validated['employee']) && $validated['employee'] !== 'all') {
            $user = User::find($validated['employee']);
            if ($user) {
                if ($user->department->value == 'Sales') {
                    $filters[] = ['orders.user_id', $validated['employee']];
                } elseif ($user->department->value == 'Technical Office') {
                    $orders->whereHas('statuses', function ($subQuery) use ($validated) {
                        $subQuery->where('statuses.checker_id', $validated['employee']);
                    });
                }
            }
        }

        $orders = $orders->where($filters)->get();

        // $orders = Order::with(['project', 'customer', 'user', 'statuses'])
        // ->when($validated['start_date'] && $validated['end_date'], function ($query) use ($validated) {
        //     $query->whereBetween('created_at', [$validated['start_date'], $validated['end_date']]);
        // })
        // ->when($validated['employee'] && $validated['employee'] !== 'all', function ($query) use ($validated) {
        //     $user = User::find($validated['employee']);
        //     if ($user) {
        //         if ($user->department->value == 'Sales') {
        //             $query->where('orders.user_id', $validated['employee']);
        //         } elseif ($user->department->value == 'Technical Office') {
        //             $query->whereHas('statuses', function ($subQuery) use ($validated) {
        //                 $subQuery->where('statuses.checker_id', $validated['employee']);
        //             });
        //         }
        //     }
        // })
        
        // ->when($validated['customer'] && $validated['customer'] !== 'all', function ($query) use ($validated) {
        //     $query->where('orders.customer_id', $validated['customer']);
        // })
        // ->when($validated['project'] && $validated['project'] !== 'all', function ($query) use ($validated) {
        //     $query->where('orders.project_id', $validated['project']);
        // })
        // ->when($validated['tsr_type'] && $validated['tsr_type'] !== 'all', function ($query) use ($validated) {
        //     $query->where('orders.title', $validated['tsr_type']);
        // })
        // ->get();
    

        
        $result = $orders->flatMap(function ($order) {
            $acceptedStatus = $order->statuses->where('status.name', 'Accepted')->first();
            $finishedStatus = $order->statuses->where('status.name', 'Finished')->first();
        
            $work_time = 'N/A';
            if ($acceptedStatus && $finishedStatus) {
                $work_time = Carbon::parse($acceptedStatus->created_at)->diffForHumans(Carbon::parse($finishedStatus->created_at), true);
            }
        
            return $order->statuses->map(function ($status) use ($order, $work_time) {
                return [
                    'id' => $order->id,
                    'title' => $order->title,
                    'serial_num' => $order->serial_number,
                    'project' => $order->project->project_name ?? 'N/A',
                    'sub_project' => $order->project_name ?? 'N/A',
                    'product_code' => $order->product_code ?? 'N/A',
                    'user_name' => $order->user->name ?? 'N/A',
                    'checker_name' => $status->checker->name ?? 'N/A', // Checker name for each status
                    'status' => $status->status->name ?? 'N/A', // Status name
                    'customer_name' => $order->customer_name ?? 'N/A',
                    'submitted_date' => Carbon::parse($order->created_at)->format('Y-m-d H:i'),
                    'work_time' => $work_time,
                ];
            });
        });
        
        return response()->json($result);
    }

}



// public function exportReport1(Request $request)
// {
//     $validated = $request->validate([
//         'start_date' => 'required|date',
//         'end_date' => 'required|date|after_or_equal:start_date',
//         // 'tech_employee' => 'nullable|exists:users,id',
//         'sales_employee' => 'nullable|exists:users,id',
//         'tsr_type' => 'nullable|string',
//         'customer' => 'nullable|exists:customers,id',
//         'project' => 'nullable|exists:projects,id',
//         'export_format' => 'required|in:excel,pdf',
//     ]);

//     $orders = Order::with(['project', 'customer', 'user', 'statuses'])
//         ->when($validated['start_date'] && $validated['end_date'], function ($query) use ($validated) {
//             $query->whereBetween('created_at', [$validated['start_date'], $validated['end_date']]);
//         })
//         // ->when($validated['tech_employee'], function ($query) use ($validated) {
//         //     $query->whereHas('user', function ($q) use ($validated) {
//         //         $q->where('id', $validated['tech_employee'])->where('department', 'Technical Office');
//         //     });
//         // })
//         // ->when($validated['sales_employee'], function ($query) use ($validated) {
//         //     $query->whereHas('user', function ($q) use ($validated) {
//         //         $q->where('id', $validated['sales_employee'])->where('department', 'Sales');
//         //     });
//         // })
//         ->when($validated['tsr_type'], function ($query) use ($validated) {
//             $query->where('title', $validated['tsr_type']);
//         })
//         ->when($validated['customer'], function ($query) use ($validated) {
//             $query->where('customer_id', $validated['customer']);
//         })
//         ->when($validated['project'], function ($query) use ($validated) {
//             $query->where('project_id', $validated['project']);
//         })->when($validated['sales_employee'] && $validated['sales_employee'] !== 'all', function ($query) use ($validated) {
//             if ($validated['sales_employee'] === 'all_sales') {
//                 $query->whereHas('user', function ($q) {
//                     $q->where('department', 'Sales');
//                 });
//             } elseif ($validated['sales_employee'] === 'all_tech') {
//                 $query->whereHas('user', function ($q) {
//                     $q->where('department', 'Technical Office');
//                 });
//             } /*else {
//                 $query->whereHas('user', function ($q) use ($validated) {
//                     $q->where('department', 'Technical Office')->where('department', 'Sales');
//                 });
//             }*/
//         })
//         ->when($validated['customer'] && $validated['customer'] !== 'all', function ($query) use ($validated) {
//             $query->where('customer_id', $validated['customer']);
//         })
//         ->when($validated['project'] && $validated['project'] !== 'all', function ($query) use ($validated) {
//             $query->where('project_id', $validated['project']);
//         })
//         ->get();

//     // dd($orders);

//     $templatePath = storage_path('app/templates/Performance reports.xlsx');
//     $spreadsheet = IOFactory::load($templatePath);

//     $sheet = $spreadsheet->getActiveSheet();

//     $startRow = 5; 
//     foreach ($orders as $order) {

//         $sheet->setCellValue("C{$startRow}", $order->id);
//         $sheet->setCellValue("D{$startRow}", $order->title);
//         $sheet->setCellValue("E{$startRow}", $order->title);
//         // $sheet->setCellValue("E{$startRow}", $order->project->project_name ?? 'N/A');
//         $sheet->setCellValue("F{$startRow}", $order->product_code ?? 'N/A');
//         $sheet->setCellValue("H{$startRow}", $order->user->name ?? 'N/A');

//         $approvedDate = $approvedExpectedDate = $acceptedDate = $finishedDate = $finishedLastDate = 'N/A';

//         foreach ($order->statuses as $status) {
//             switch ($status->status->name) {
//                 case 'Approved':
//                     $approvedDate = $status->created_at ?? 'N/A';
//                     $approvedExpectedDate = $status->expected_date ?? 'N/A';
//                     break;
//                 case 'Accepted':
//                     $acceptedDate = $status->created_at ?? 'N/A';
//                     break;
//                 case 'Finished':
//                     $finishedDate = $status->created_at ?? 'N/A';
//                     $finishedLastDate = $status->created_at ?? 'N/A';
//                     break;
//             }
//         }

//         $sheet->setCellValue("G{$startRow}", $approvedDate);
//         $sheet->setCellValue("I{$startRow}", $acceptedDate);
//         $sheet->setCellValue("J{$startRow}", $approvedExpectedDate);
//         $sheet->setCellValue("K{$startRow}", $finishedDate);
//         $sheet->setCellValue("N{$startRow}", $finishedLastDate);

//         $sheet->setCellValue("L{$startRow}", rand(1, 10)); 
//         $sheet->setCellValue("M{$startRow}", rand(0, 5)); 
//         $sheet->setCellValue("O{$startRow}", rand(5, 15)); 
//         $startRow++;
//     }
//     $writer = IOFactory::createWriter($spreadsheet, $validated['export_format'] === 'pdf' ? 'Pdf' : 'Xlsx');
//     $filename = 'report.' . ($validated['export_format'] === 'pdf' ? 'pdf' : 'xlsx');

//     $tempPath = storage_path("app/reports/{$filename}");
//     $writer->save($tempPath);

//     return response()->download($tempPath)->deleteFileAfterSend(true);


// }

// public function exportReport2(Request $request)
// {
// $validated = $request->validate([
//     'start_date' => 'required|date',
//     'end_date' => 'required|date|after_or_equal:start_date',
//     'sales_employee' => 'nullable|string', // all, all_sales, all_tech, specific employee ID
//     'customer' => 'nullable|string', // all or specific customer ID
//     'tsr_type' => 'nullable|string', 
//     'project' => 'nullable|string', // all or specific project ID
//     // 'product' => 'nullable|string', // all or specific product code
//     'export_format' => 'required|in:excel,pdf',
// ]);

// $orders = Order::with(['project', 'customer', 'user', 'statuses'])
//     ->when($validated['start_date'] && $validated['end_date'], function ($query) use ($validated) {
//         $query->whereBetween('created_at', [$validated['start_date'], $validated['end_date']]);
//     })
//     ->when($validated['sales_employee'], function ($query) use ($validated) {
//         if ($validated['sales_employee'] === 'all_sales') {
//             $query->whereHas('user', function ($q) {
//                 $q->where('department', 'Sales');
//             });
//         } elseif ($validated['sales_employee'] === 'all_tech') {
//             $query->whereHas('user', function ($q) {
//                 $q->where('department', 'Technical Office');
//             });
//         } elseif ($validated['sales_employee'] !== 'all') {
//             $query->where('user_id', $validated['employee_filter']);
//         }
//     })
//     ->when($validated['customer'] && $validated['customer'] !== 'all', function ($query) use ($validated) {
//         $query->where('customer_id', $validated['customer']);
//     })
//     ->when($validated['project'] && $validated['project'] !== 'all', function ($query) use ($validated) {
//         $query->where('project_id', $validated['project']);
//     })
//     // ->when($validated['product'] && $validated['product'] !== 'all', function ($query) use ($validated) {
//     //     $query->where('product_code', $validated['product']);
//     // })
//     ->when($validated['tsr_type'] && $validated['tsr_type'] !== 'all', function ($query) use ($validated) {
//         $query->where('title', $validated['tsr_type']);
//     })
//     ->get();

// $templatePath = storage_path('app/templates/Performance reports.xlsx');
// $spreadsheet = IOFactory::load($templatePath);
// $sheet = $spreadsheet->getActiveSheet();

// $startRow = 5;
// foreach ($orders as $order) {
//     $sheet->setCellValue("C{$startRow}", $order->id);
//     $sheet->setCellValue("D{$startRow}", $order->title);
//     $sheet->setCellValue("E{$startRow}", $order->project->project_name ?? 'N/A');
//     $sheet->setCellValue("F{$startRow}", $order->product_code ?? 'N/A');
//     $sheet->setCellValue("H{$startRow}", $order->user->name ?? 'N/A');

//     $approvedDate = $approvedExpectedDate = $acceptedDate = $finishedDate = $finishedLastDate = 'N/A';

//     foreach ($order->statuses as $status) {
//         switch ($status->status->name) {
//             case 'Approved':
//                 $approvedDate = $status->created_at ?? 'N/A';
//                 $approvedExpectedDate = $status->expected_date ?? 'N/A';
//                 break;
//             case 'Accepted':
//                 $acceptedDate = $status->created_at ?? 'N/A';
//                 break;
//             case 'Finished':
//                 $finishedDate = $status->created_at ?? 'N/A';
//                 $finishedLastDate = $status->created_at ?? 'N/A';
//                 break;
//         }
//     }

//     $sheet->setCellValue("G{$startRow}", $approvedDate);
//     $sheet->setCellValue("I{$startRow}", $acceptedDate);
//     $sheet->setCellValue("J{$startRow}", $approvedExpectedDate);
//     $sheet->setCellValue("K{$startRow}", $finishedDate);
//     $sheet->setCellValue("N{$startRow}", $finishedLastDate);

//     $sheet->setCellValue("L{$startRow}", rand(1, 10));
//     $sheet->setCellValue("M{$startRow}", rand(0, 5));
//     $sheet->setCellValue("O{$startRow}", rand(5, 15));
//     $startRow++;
// }

//     // Determine format
//     $writer = null;
//     if ($validated['export_format'] === 'pdf') {
//         IOFactory::registerWriter('Pdf', Dompdf::class);
//         $writer = IOFactory::createWriter($spreadsheet, 'Pdf');
//     } else {
//         $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//     }

//     $filename = 'report.' . ($validated['export_format'] === 'pdf' ? 'pdf' : 'xlsx');
//     $tempPath = storage_path("app/reports/{$filename}");
//     $writer->save($tempPath);

//     return response()->download($tempPath)->deleteFileAfterSend(true);
// }








// $orders = Order::with(['project', 'customer', 'user', 'statuses'])
        //     ->when($validated['start_date'] && $validated['end_date'], function ($query) use ($validated) {
        //         $query->whereBetween('created_at', [$validated['start_date'], $validated['end_date']]);
        //     })
        //     ->when($validated['employee'], function ($query) use ($validated) {
        //         if ($validated['employee'] === 'all_sales') {
        //             $query->whereIn('orders.id', function ($subQuery) {
        //                 $subQuery->select('order_id')
        //                     ->distinct()
        //                     ->from('statuses')
        //                     ->join('users as u1', 'statuses.user_id', '=', 'u1.id')
        //                     ->join('users as u2', 'statuses.checker_id', '=', 'u2.id')
        //                     ->where(function ($query) {
        //                         $query->where('u1.department', 'Sales')
        //                             ->orWhere('u2.department', 'Sales');
        //                     });
        //             });
        //         } elseif ($validated['employee'] === 'all_tech') {
        //             $query->whereIn('orders.id', function ($subQuery) {
        //                 $subQuery->select('order_id')
        //                     ->distinct()
        //                     ->from('statuses')
        //                     ->join('users as u1', 'statuses.user_id', '=', 'u1.id')
        //                     ->join('users as u2', 'statuses.checker_id', '=', 'u2.id')  
        //                     ->where(function ($query) {
        //                         $query->where('u1.department', 'Technical Office')
        //                             ->orWhere('u2.department', 'Technical Office');
        //                     });
        //             });
        //         } elseif ($validated['employee'] === 'all') {
        //             $query->whereIn('orders.id', function ($subQuery) {
        //                 $subQuery->select('order_id')
        //                     ->distinct()
        //                     ->from('statuses')
        //                     ->join('users as u1', 'statuses.user_id', '=', 'u1.id')  
        //                     ->join('users as u2', 'statuses.checker_id', '=', 'u2.id')  
        //                     ->whereIn('u1.department', ['Sales', 'Technical Office'])  
        //                     ->orWhereIn('u2.department', ['Sales', 'Technical Office']);  
    
        //             });
        //         } else {
        //             $query->whereIn('orders.id', function ($subQuery) use ($validated) {
        //                 $subQuery->select('order_id')
        //                     ->distinct()
        //                     ->from('statuses')
        //                     ->where(function ($statusQuery) use ($validated) {
        //                         $statusQuery->where('user_id', $validated['employee'])
        //                             ->orWhere('checker_id', $validated['employee']);
        //                     });
        //             });
        //         }
        //     })
        //     ->when($validated['customer'] && $validated['customer'] !== 'all', function ($query) use ($validated) {
        //         $query->where('customer_id', $validated['customer']);
        //     })
        //     ->when($validated['project'] && $validated['project'] !== 'all', function ($query) use ($validated) {
        //         $query->where('project_id', $validated['project']);
        //     })
        //     ->when($validated['tsr_type'] && $validated['tsr_type'] !== 'all', function ($query) use ($validated) {
        //         $query->where('title', $validated['tsr_type']);
        //     })
        //     ->get();
