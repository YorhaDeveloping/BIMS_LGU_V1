<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Maintenance;
use App\Models\Admin\building;
use Illuminate\Support\Facades\Auth;

use db;
use gate;

class CTRLMaintenance extends Controller
{
    public function index()
    {
        $maintenances = Maintenance::where('submitter_name', Auth::user()->name)->paginate(5);
        return view('users.maintenance.index', compact('maintenances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buildings = building::all();
        return view('users.maintenance.create', compact('buildings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validation as above

    $maintenanceData = [
        'buildings_name' => $request->buildings_name,
        'maintenance_type' => implode(',', $request->maintenance_type), // Store as comma-separated string
        'issue_description' => $request->issue_description,
        'priority' => $request->priority,
        'submitter_name' => Auth::user()->name,
        'submitter_email' => $request->submitter_email,
        'submitter_phone' => $request->submitter_phone,
        'submittion_date' => $request->submittion_date,
        'status' => $request->status,
        'request_status' => 'Pending',
    ];

    // Handle file uploads
    if ($request->hasFile('attachments')) {
        $attachmentPaths = [];
        foreach ($request->file('attachments') as $file) {
            $path = $file->store('attachments', 'public');
            $attachmentPaths[] = $path;
        }
        $maintenanceData['attachments'] = $attachmentPaths; // Store as array
    }

    $maintenances = new Maintenance($maintenanceData);
    $maintenances->save();

    return redirect()->route('users.maintenance.index')->with('success', 'Maintenance request submitted successfully.');
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $maintenance = Maintenance::all();
        $maintenance = Maintenance::findOrFail($id);
        return view('users.maintenance.show', compact('maintenance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $buildings = building::all();
        return view('users.maintenance.edit', compact('maintenance', 'buildings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       // Validation as above

       $maintenanceData = [
            'buildings_name' => $request->buildings_name,
            'maintenance_type' => implode(',', $request->maintenance_type),
            'issue_description' => $request->issue_description,
            'priority' => $request->priority,
            'submitter_name' => Auth::user()->name,
            'submitter_email' => $request->submitter_email,
            'submitter_phone' => $request->submitter_phone,
            'submittion_date' => $request->submittion_date,
            'status' => $request->status,


        ];

        // Handle file uploads
        if ($request->hasFile('attachments')) {
            $attachmentPaths = [];
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('attachments', 'public');
                $attachmentPaths[] = $path;
            }
            $maintenanceData['attachments'] = json_encode($attachmentPaths); // Store as JSON
        }

        $maintenance = Maintenance::findOrFail($id);
        $maintenance->update($maintenanceData);

        return redirect()->route('users.maintenance.index')->with('success', 'Maintenance request Updated successfully.');
    }

/**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    $maintenance = Maintenance::findOrFail($id);
    $maintenance->delete();

    return redirect()->route('users.maintenance.index')->with('success', 'Maintenance request deleted successfully.');
}
}
