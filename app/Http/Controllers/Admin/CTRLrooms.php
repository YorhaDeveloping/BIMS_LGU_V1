<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\room;

class CTRLrooms extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = room::all(); 
        return view('admin.room.index', compact('rooms'))
            ->with('rooms', $rooms);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.room.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => ['required', 'integer'],
            'room_area' => ['required', 'numeric'], // changed 'double' to 'numeric'
            'room_capacity' => ['required', 'integer'],
            'room_door' => ['required', 'string'],
            'room_window' => ['required', 'string'],
            'room_size' => ['required', 'numeric'],
            'room_use' => ['required', 'string'],
            'room_remark' => ['required', 'string']
        ]);
        
        $rooms = new room([
            'room_id' => $request->room_id,
            'room_area' => $request->room_area,
            'room_capacity' => $request->room_capacity,
            'room_door' => $request->room_capacity,
            'room_window' => $request->room_capacity,
            'room_size' => $request->room_capacity,
            'room_use' => $request->room_capacity,
            'room_remark' => $request->room_capacity
        ]);
    
        $rooms->save();
    
        return redirect()->route('admin.room.index')->with('success', 'Room created successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rooms = room::find($id);

       return view('admin.room.edit')
            ->with('rooms', $rooms);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rooms = room::findOrFail($id);
    
        $rooms->update([
            'room_id' => $request->room_id,
            'room_area' => $request->room_area,
            'room_capacity' => $request->room_capacity,
        ]);
    
        return redirect()->route('admin.room.index', $rooms->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
