<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Maintenance;
use App\Models\Admin\building;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Gate;
use DB;

class CTRLmntnns extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maintenances = Maintenance::all();
        $maintenances = Maintenance::paginate(5);
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
            'maintenance_type' => $request->maintenance_type,
            'issue_description' => $request->issue_description,
            'priority' => $request->priority,
            'submitter_name' => 'Requesting Party / Requestee',
            'submitter_email' => $request->submitter_email,
            'submitter_phone' => $request->submitter_phone,
            'submittion_date' => $request->submittion_date,
            'status' => $request->status,
            'u_id' => Auth::user()->id,

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

        $maintenances = new Maintenance($maintenanceData);
        $maintenances->save();

        return redirect()->route('users.maintenance.index')->with('success', 'Maintenance request submitted successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $encryptedId)
    {
        try {
            $id = Crypt::decryptString($encryptedId);
            $maintenance = Maintenance::findOrFail($id);
            return view('users.maintenance.show', compact('maintenance'));
        } catch (\Exception $e) {
            abort(404, 'Invalid or tampered ID.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $encryptedId)
    {
        try {
            $id = Crypt::decryptString($encryptedId);
            $maintenance = Maintenance::findOrFail($id);
            $buildings = building::all();
            return view('users.maintenance.edit', compact('maintenance', 'buildings'));
        } catch (\Exception $e) {
            abort(404, 'Invalid or tampered ID.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate incoming request data
        $request->validate([
            'buildings_name' => ['required', 'string', 'max:255'],
            'maintenance_type' => ['required', 'numeric'],
            'issue_description' => ['required', 'string', 'max:255'],
            'priority' => ['required', 'string', 'max:255'],
            'attachments' => ['nullable', 'array'], // Make attachments optional
            'submitter_name' => ['required', 'string', 'max:255'],
            'submitter_email' => ['required', 'string', 'email', 'max:255'],
            'submitter_phone' => ['required', 'numeric'],
            'submittion_date' => ['required', 'date'],
        ]);

        // Find the existing maintenance record
        $maintenance = Maintenance::findOrFail($id);

        // Update the record with new data
        $maintenance->buildings_name = $request->buildings_name;
        $maintenance->maintenance_type = $request->maintenance_type;
        $maintenance->issue_description = $request->issue_description;
        $maintenance->priority = $request->priority;
        $maintenance->attachments = $request->attachments; // Handle attachments as needed
        $maintenance->submitter_name = $request->submitter_name;
        $maintenance->submitter_email = $request->submitter_email;
        $maintenance->submitter_phone = $request->submitter_phone;
        $maintenance->submittion_date = $request->submittion_date;

        // Save changes to the database
        $maintenance->save();

        // Redirect back to the index page with a success message
        return redirect()->route('users.maintenance.index')->with('success', 'Maintenance updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
