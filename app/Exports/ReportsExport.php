<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use App\Models\Admin\Maintenance;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportsExport implements FromCollection, WithStyles
{
    // public function view(): View
    // {
    //     return view('admin.reports', [
    //        'reports' => Maintenance::select('buildings_name', 'maintenance_type', 'issue_description', 'priority', 'attachments', 'submitter_name', 'submitter_email', 'submitter_phone', 'submittion_date', 'status', 'request_status', 'last_renovation_date')->get(),

    //     ]);
    // }


    public function collection()
    {
        return Maintenance::all()->map(function ($item) {
            return [
                'buildings_name' => $item->buildings_name,
                'maintenance_type' => $item->maintenance_type,
                'issue_description' => $item->issue_description,
                'priority' => $item->priority,
                'submittion_date' => $item->submittion_date,
                'last_renovation_date' => $item->last_renovation_date,
                'request_status' => $item->request_status,
            ];
        });
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Example: set bold for the first row (header)
            1 => ['font' => ['bold' => true]],
        ];
    }
}

