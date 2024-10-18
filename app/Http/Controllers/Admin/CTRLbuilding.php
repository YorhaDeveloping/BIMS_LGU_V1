<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\building;
use Illuminate\View\View;

class CTRLbuilding extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buildings = building::all();
        $buildings = building::paginate(5);
        return view('admin.building.index', compact('buildings'));
    }

    // In your CTRLbuilding controller
public function search(Request $request)
{
    $search = $request->input('search');

    // Assuming you have a Building model to interact with your buildings table
    $buildings = Building::where('building_name', 'LIKE', "%{$search}%")
        ->orWhere('building_location', 'LIKE', "%{$search}%")
        ->orWhere('building_type', 'LIKE', "%{$search}%")
        ->get();

    return view('admin.building.search', compact('buildings'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.building.create');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
{
    $request->validate([
        'building_name' => 'required',
        'building_structure' => 'required',
        'building_type' => 'required',
        'building_area' => 'required',
        'lot_area' => 'required',
        'building_location' => 'required',
        'building_in_charge' => 'required',
        'date_of_completion' => 'required',
        'lati' => 'required',
        'longti' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Save the image to the storage/app/public/images directory
    // Only store the relative path without 'public/'
    $path = $request->file('image')->store('images', 'public');

    $buildings = new Building([ // Ensure the model name is capitalized (Building instead of building)
        'building_name' => $request->building_name,
        'building_structure' => $request->building_structure,
        'building_type' => $request->building_type,
        'building_area' => $request->building_area,
        'lot_area' => $request->lot_area,
        'building_location' => $request->building_location,
        'building_in_charge' => $request->building_in_charge,
        'date_of_completion' => $request->date_of_completion,
        'lati' => $request->lati,
        'longti' => $request->longti,
        'image' => $path, // This path will be stored as 'images/your_image.jpg'
    ]);

    // Save the building instance to the database
    if ($buildings->save()) {
        return redirect()->route('admin.building.index')->with('success', 'Building created successfully');
    } else {
        return redirect()->back()->with('error', 'Failed to create building');
    }
}






    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buildings = building::all();
        $buildings = building::findOrFail($id);
        return view('admin.building.show', compact('buildings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $buildings = building::find($id);

       return view('admin.building.edit')
            ->with('buildings', $buildings);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'building_name' => 'required|string|max:255',
        'building_structure' => 'required|string|max:255',
        'building_type' => 'required|string|max:255',
        'building_area' => 'required|string|max:255',
        'lot_area' => 'required|string|max:255',
        'building_location' => 'required|string|max:255',
        'building_in_charge' => 'required|string|max:255',
        'date_of_completion' => 'required|date',
        'lati' => 'required|numeric',
        'longti' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
    ]);

    // Find the building record
    $buildings = Building::findOrFail($id);

    // Update the building data
    $buildings->update([
        'building_name' => $request->input('building_name'),
        'building_structure' => $request->input('building_structure'),
        'building_type' => $request->input('building_type'),
        'building_area' => $request->input('building_area'),
        'lot_area' => $request->input('lot_area'),
        'building_location' => $request->input('building_location'),
        'building_in_charge' => $request->input('building_in_charge'),
        'date_of_completion' => $request->input('date_of_completion'),
        'lati' => $request->input('lati'),
        'longti' => $request->input('longti'),
    ]);

    // Handle the image upload if a new image is provided
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($buildings->image && \Storage::exists(str_replace('storage/', 'public/', $buildings->image))) {
            \Storage::delete(str_replace('storage/', 'public/', $buildings->image));
        }

        // Upload the new image
        $image = $request->file('image');
        $imagePath = $image->store('public/images'); // Save to storage/app/public/images
        $buildings->image = str_replace('public/', 'storage/', $imagePath); // Update the image path

        // Save the updated building with the new image path
        $buildings->save();
    }

    return redirect()->route('admin.building.index')->with('success', 'Building updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the building by ID
        $building = building::find($id);

        // Check if the building exists
        if (!$building) {
            return redirect()->route('admin.building.index')->with('error', 'Building not found.');
        }

        // Delete the building
        if ($building->delete()) {
            return redirect()->route('admin.building.index')->with('success', 'Building deleted successfully.');
        } else {
            return redirect()->route('admin.building.index')->with('error', 'Failed to delete building.');
        }
    }
}
