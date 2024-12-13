<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin\Maintenance; // Replace with the appropriate model
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Exports\ReportsExport;

use db;
use Gate;
use Excel;

class CTRLReports extends Controller
{
    public function exportReports()
    {
        return Excel::download(new ReportsExport(), 'maintenance_reports.xlsx');
    }



    public function index(): View
    {
        $maintenances = Maintenance::where('status', 'Completed')->get();
        return view('admin.reports', compact('maintenances'));
    }
}

