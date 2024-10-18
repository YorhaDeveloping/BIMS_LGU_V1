<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Maintenance;
use App\Models\Admin\building;
use Illuminate\View\View;

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
        return view('admin.maintenance.index', compact('maintenances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buildings = building::all();
        return view('admin.maintenance.create', compact('buildings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'buildings_name' => ['required', 'string', 'max:255'],
            'maintenance_type' => ['required', 'numeric'],
            'issue_description' => ['required', 'string', 'max:255'],
            'priority' => ['required', 'string', 'max:255'],
            'aattachments' => ['required', 'string', 'max:255'],
            'submitter_name' => ['required', 'numeric'],
            'submitter_email' => ['required', 'string', 'max:255'],
            'submitter_phone' => ['required', 'numeric'],
            'submittion_date' => ['required', 'date']
        ]);

        $maintenances = new Maintenance([
            'buildings_name' => $request->buildings_name,
            'maintenance_type' => $request->maintenance_type,
            'issue_description' => $request->issue_description,
            'priority' => $request->priority,
            'attachments' => $request->attachments,
            'submitter_name' => $request->submitter_name,
            'submitter_email' => $request->submitter_email,
            'submitter_phone' => $request->submitter_phone,
            'submittion_date' => $request->submittion_date
        ]);

        // Save the building instance to the database
        $maintenances->save();

        // Redirect back to the index page with a success message
        return redirect()->route('admin.maintenance.store');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $maintenance = Maintenance::all();
        $maintenance = Maintenance::findOrFail($id);
        return view('admin.maintenance.show', compact('maintenance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
