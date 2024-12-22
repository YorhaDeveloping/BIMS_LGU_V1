<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Maintenance;
use App\Models\Admin\building;
use App\Models\Users\CompletionForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

use db;
use gate;

class CTRLMaintenance extends Controller
{
    public function index()
    {
        $maintenances = Maintenance::where('u_id', Auth::user()->id)
                                   ->whereIn('request_status', ['Approved / Ongoing', 'Pending'])
                                   ->paginate(5);
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
        // Validation as needed
        $this->validate($request, [
            'attachments.*' => 'file|mimes:jpg,png,pdf|max:2048', // Example validation
        ]);

        $maintenanceData = [
            'buildings_name' => $request->buildings_name,
            'building_location' => $request->building_location,
            'maintenance_type' => implode(',', $request->maintenance_type), // Store as comma-separated string
            'issue_description' => $request->issue_description,
            'priority' => $request->priority,
            'submitter_name' => $request->submitter_name,
            'submitter_email' => $request->submitter_email,
            'submitter_phone' => $request->submitter_phone,
            'submittion_date' => $request->submittion_date,
            'status' => $request->status,
            'request_status' => 'Pending',
            'last_renovation_date' => $request->last_renovation_date,
            'u_id' => Auth::user()->id,
        ];

        // Handle file uploads
        if ($request->hasFile('attachments')) {
            $attachmentPaths = [];

            // Loop through each file in the attachments array
            foreach ($request->file('attachments') as $file) {
                if ($file->isValid()) {
                    // Store the file and get the path
                    $attachmentPaths[] = $file->store('attachments', 'public');
                }
            }

            // If any attachments are uploaded, save their paths as a comma-separated string
            if (!empty($attachmentPaths)) {
                $maintenanceData['attachments'] = implode(',', $attachmentPaths);
            }
        }

        // Save the maintenance data
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
    public function edit(string $id)
    {
        try {
            $id = Crypt::decryptString($id);
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
        // Validation (add your rules as needed)

        // Prepare maintenance data
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
            'last_renovation_date' => $request->last_renovation_date,
        ];

        $maintenance = Maintenance::findOrFail($id);

        // Handle file uploads
        if ($request->hasFile('attachments')) {
            $filePaths = [];

            // Decode existing attachments if necessary
            $existingAttachments = $maintenance->attachments ? explode(',', $maintenance->attachments) : [];

            foreach ($request->file('attachments') as $file) {
                $filePaths[] = $file->store('attachments', 'public'); // Save new files
            }

            // Combine old and new file paths
            $allFilePaths = array_merge($existingAttachments, $filePaths);

            // Save file paths as a comma-separated string
            $maintenanceData['attachments'] = implode(',', $allFilePaths);
        }

        // Update maintenance record
        $maintenance->update($maintenanceData);

        return redirect()->route('users.maintenance.index')->with('success', 'Maintenance request updated successfully.');
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

    /**
     * Display the form for completing the specified maintenance request.
     */
       public function completionForm(string $encryptedId)
    {
        try {
            $id = Crypt::decryptString($encryptedId);
            $maintenance = Maintenance::findOrFail($id);
            $nextControlNo = $this->generateNextControlNo(); // Replace with your logic to get the next control number
            return view('users.maintenance.completionForm', compact('maintenance', 'nextControlNo'));
        } catch (\Exception $e) {
            abort(404, 'Invalid or tampered ID.');
        }
    }

    private function generateNextControlNo()
    {
        // Your logic to generate the next control number
        return 'GSO-' . str_pad(Maintenance::max('id') + 1, 6, '0', STR_PAD_LEFT);
    }

    public function storeCompletionForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'requesting_office' => 'required|string|max:255',
            'control_no' => 'required|string|max:255',
            'date_requested' => 'required|date',
            'service_requested' => 'required|string',
            'location' => 'required|string|max:255',
        ]);

        // Store the completion form data
        $completionData = $request->only([
            'name',
            'requesting_office',
            'control_no',
            'date_requested',
            'service_requested',
            'location',
        ]);

        // Add the maint_id to the completion data
        $completionData['maint_id'] = $request->input('maint_id');

        // Assuming you have a CompletionForm model to store the data
        $completionForm = new CompletionForm($completionData);
        $completionForm->save();

        return redirect()->route('users.maintenance.index')->with('success', 'Completion form submitted successfully.');
    }
}
