<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Qutation;
use App\Repo\OrdersRepo;
use App\Models\QutationItem;
use App\Models\Workorder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\SerialNumberService;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\QutationService;



class WorkorderController extends Controller
{
    private function workorderStatuses(string $status = null)
    {
        $statuses = ['New', 'Accepted', 'Started', 'Pending', 'Canceled', 'Finished'];
        return (is_null($status) || !in_array($status, $statuses)) ? $statuses : $status;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('workorders.index', ['workorders' => Workorder::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(Workorder $workorder) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workorder $workorder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Workorder $workorder) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workorder $workorder) {}
}
