<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Maintenance;
use App\Models\Admin\building;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;

use Gate;
use DB;

class CTRLmntnns extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maintenances = Maintenance::where('request_status', 'Pending')->paginate(10);
        return view('admin.maintenance.index', compact('maintenances'));
    }

    public function ongoing()
    {
        $maintenances = Maintenance::where('request_status', 'Approved / Ongoing')->paginate(10);
        return view('admin.maintenance.ongoing', compact('maintenances'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $encryptedId)
    {
        try {
            $id = Crypt::decryptString($encryptedId);
            $maintenance = Maintenance::findOrFail($id);
            $attachments = explode(',', $maintenance->attachments);
            return view('admin.maintenance.show', compact('maintenance', 'attachments'));
        } catch (\Exception $e) {
            abort(404, 'Invalid or tampered ID.');
        }
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function approve(Request $request, string $id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->request_status = 'Approved / Ongoing';
        $maintenance->save();
        return redirect()->route('admin.maintenance.index');
    }

    public function complete(Request $request, string $id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->request_status = 'Completed';
        $maintenance->save();
        return redirect()->route('admin.maintenance.ongoing');
    }

    public function reject(Request $request, string $id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->request_status = 'Rejected';
        $maintenance->save();
        return redirect()->route('admin.maintenance.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
