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
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
    ]);

    // Find the building by its ID
    $building = Building::findOrFail($id);

    // Update building details
    $building->building_name = $request->building_name;
    $building->building_structure = $request->building_structure;
    $building->building_type = $request->building_type;
    $building->building_area = $request->building_area;
    $building->lot_area = $request->lot_area;
    $building->building_location = $request->building_location;
    $building->building_in_charge = $request->building_in_charge;
    $building->date_of_completion = $request->date_of_completion;
    $building->lati = $request->lati;
    $building->longti = $request->longti;

    // Handle image upload if a new image is provided
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($building->image && \Storage::disk('public')->exists($building->image)) {
            \Storage::disk('public')->delete($building->image);
        }

        // Store the new image and get its path
        $imagePath = $request->file('image')->store('images', 'public');

        // Update the image path in the database
        $building->image = $imagePath;
    }

    // Save the updated building details
    $building->save();

    // Redirect or respond with success message
    return redirect()->back()->with('success', 'Building updated successfully.');
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
