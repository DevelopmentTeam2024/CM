<?php

namespace App\Http\Controllers;

use App\Models\Order; 
use App\Models\Customer;
use App\Models\Project; 
use Illuminate\Http\Request;
use App\Services\UserService;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;

class ReportController extends Controller
{
    public function showForm()
    {
        $projects = Project::all();
        $customers = Customer::all();
        // $techEmployees = \App\Models\User::where('role', 'Employee')->where('department', 'Technical Office')->get();
        $salesEmployees = \App\Models\User::where('role', 'Employee')->where('department', 'Sales')->get();
        $tsrTypes = \App\Enum\TSRTypesEnum::list();

        return view('reports.export', compact('projects', 'customers', 'salesEmployees',  'tsrTypes'));
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
            // 'tech_employee' => 'nullable|exists:users,id',
            'sales_employee' => 'nullable|exists:users,id',
            'tsr_type' => 'nullable|string',
            'customer' => 'nullable|exists:customers,id',
            'project' => 'nullable|exists:projects,id',
            'export_format' => 'required|in:excel,pdf',
        ]);

        $orders = Order::with(['project', 'customer', 'user', 'statuses'])
            ->when($validated['start_date'] && $validated['end_date'], function ($query) use ($validated) {
                $query->whereBetween('created_at', [$validated['start_date'], $validated['end_date']]);
            })
            // ->when($validated['tech_employee'], function ($query) use ($validated) {
            //     $query->whereHas('user', function ($q) use ($validated) {
            //         $q->where('id', $validated['tech_employee'])->where('department', 'Technical Office');
            //     });
            // })
            ->when($validated['sales_employee'], function ($query) use ($validated) {
                $query->whereHas('user', function ($q) use ($validated) {
                    $q->where('id', $validated['sales_employee'])->where('department', 'Sales');
                });
            })
            ->when($validated['tsr_type'], function ($query) use ($validated) {
                $query->where('title', $validated['tsr_type']);
            })
            ->when($validated['customer'], function ($query) use ($validated) {
                $query->where('customer_id', $validated['customer']);
            })
            ->when($validated['project'], function ($query) use ($validated) {
                $query->where('project_id', $validated['project']);
            })
            ->get();

        // dd($orders);

        $templatePath = storage_path('app/templates/Performance reports.xlsx');
        $spreadsheet = IOFactory::load($templatePath);

        $sheet = $spreadsheet->getActiveSheet();

        $startRow = 5; 
        foreach ($orders as $order) {

            $sheet->setCellValue("C{$startRow}", $order->id);
            $sheet->setCellValue("D{$startRow}", $order->title);
            $sheet->setCellValue("E{$startRow}", $order->title);
            // $sheet->setCellValue("E{$startRow}", $order->project->project_name ?? 'N/A');
            $sheet->setCellValue("F{$startRow}", $order->product_code ?? 'N/A');
            $sheet->setCellValue("H{$startRow}", $order->user->name ?? 'N/A');

            $approvedDate = $approvedExpectedDate = $acceptedDate = $finishedDate = $finishedLastDate = 'N/A';

            foreach ($order->statuses as $status) {
                switch ($status->status->name) {
                    case 'Approved':
                        $approvedDate = $status->created_at ?? 'N/A';
                        $approvedExpectedDate = $status->expected_date ?? 'N/A';
                        break;
                    case 'Accepted':
                        $acceptedDate = $status->created_at ?? 'N/A';
                        break;
                    case 'Finished':
                        $finishedDate = $status->created_at ?? 'N/A';
                        $finishedLastDate = $status->created_at ?? 'N/A';
                        break;
                }
            }
        
            $sheet->setCellValue("G{$startRow}", $approvedDate);
            $sheet->setCellValue("I{$startRow}", $acceptedDate);
            $sheet->setCellValue("J{$startRow}", $approvedExpectedDate);
            $sheet->setCellValue("K{$startRow}", $finishedDate);
            $sheet->setCellValue("N{$startRow}", $finishedLastDate);

            $sheet->setCellValue("L{$startRow}", rand(1, 10)); 
            $sheet->setCellValue("M{$startRow}", rand(0, 5)); 
            $sheet->setCellValue("O{$startRow}", rand(5, 15)); 
            $startRow++;
        }
        $writer = IOFactory::createWriter($spreadsheet, $validated['export_format'] === 'pdf' ? 'Pdf' : 'Xlsx');
        $filename = 'report.' . ($validated['export_format'] === 'pdf' ? 'pdf' : 'xlsx');

        $tempPath = storage_path("app/reports/{$filename}");
        $writer->save($tempPath);

        return response()->download($tempPath)->deleteFileAfterSend(true);


    }


}
