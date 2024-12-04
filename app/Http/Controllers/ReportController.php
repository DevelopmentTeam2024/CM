<?php

namespace App\Http\Controllers;

use App\Models\Order; 
use App\Models\Customer;
use App\Models\Project; 
use Illuminate\Http\Request;
use App\Services\UserService;
class ReportController extends Controller
{
    public function showForm()
    {
        $projects = Project::all();
        $customers = Customer::all();
        $techEmployees = \App\Models\User::where('department', 'Technical Office')->get();
        $salesEmployees = \App\Models\User::where('department', 'Sales')->get();
        $tsrTypes = \App\Enum\TSRTypesEnum::list();

        return view('reports.export', compact('projects', 'customers', 'salesEmployees', 'techEmployees',  'tsrTypes'));
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

    $orders = Order::with(['project', 'customer', 'user', 'statuses'])
        ->when($validated['start_date'] && $validated['end_date'], function ($query) use ($validated) {
            $query->whereBetween('created_at', [$validated['start_date'], $validated['end_date']]);
        })
        ->when($validated['employee'], function ($query) use ($validated) {
            if ($validated['employee'] === 'all_sales') {
                // Filter only sales employees
                $query->whereHas('user', function ($q) {
                    $q->where('department', 'Sales');
                });
            } elseif ($validated['employee'] === 'all_tech') {
                // Filter only technical office employees
                $query->whereHas('user', function ($q) {
                    $q->where('department', 'Technical Office');
                });
            } elseif ($validated['employee'] === 'all') {
                // Filter all employees (Sales + Technical Office)
                $query->whereHas('user', function ($q) {
                    $q->whereIn('department', ['Sales', 'Technical Office']);
                });
            } else {
                // Filter a specific user by ID
                $query->where('user_id', $validated['employee']);
            }
        })
        
        ->when($validated['customer'] && $validated['customer'] !== 'all', function ($query) use ($validated) {
            $query->where('customer_id', $validated['customer']);
        })
        ->when($validated['project'] && $validated['project'] !== 'all', function ($query) use ($validated) {
            $query->where('project_id', $validated['project']);
        })
        ->when($validated['tsr_type'] && $validated['tsr_type'] !== 'all', function ($query) use ($validated) {
            $query->where('title', $validated['tsr_type']);
        })
        ->get();

    $result = $orders->map(function ($order) {
        $statuses = $order->statuses->keyBy('status.name');

        return [
            'id' => $order->id,
            'title' => $order->title,
            'project' => $order->project->project_name ?? 'N/A',
            'product_code' => $order->product_code ?? 'N/A',
            'user_name' => $order->user->name ?? 'N/A',
            'approved_date' => $statuses['Approved']->created_at ?? 'N/A',
            'accepted_date' => $statuses['Accepted']->created_at ?? 'N/A',
            'finished_date' => $statuses['Finished']->created_at ?? 'N/A',
            'finished_last_date' => $statuses['Finished']->created_at ?? 'N/A',
        ];
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
