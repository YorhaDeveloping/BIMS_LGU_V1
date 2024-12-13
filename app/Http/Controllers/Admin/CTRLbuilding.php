<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\building;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;


class CTRLbuilding extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = building::query();

        // Implement search
        if ($search = $request->input('search')) {
            $query->where('building_name', 'like', "%$search%")
                  ->orWhere('barangay', 'like', "%$search%")
                  ->orWhere('building_in_charge', 'like', "%$search%");
        }

        // Implement sorting
        if ($sort = $request->input('sort')) {
            $direction = $request->input('direction', 'asc');
            $query->orderBy($sort, $direction);
        }

        // Paginate results
        $buildings = $query->paginate(10);

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
            'building_cost' => 'required',
            'building_area' => 'required',
            'lot_area' => 'required',
            'building_location' => 'required',
            'barangay' => 'required',
            'building_in_charge' => 'required',
            'lati' => 'required',
            'longti' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date_constructed' => 'required|date',
            'date_of_completion' => 'required|date',
        ]);

        $path = $request->file('image')->store('images', 'public');

        $buildings = new Building([
            'building_name' => $request->building_name,
            'building_structure' => $request->building_structure,
            'building_type' => $request->building_type,
            'building_cost' => $request->building_cost,
            'building_area' => $request->building_area,
            'lot_area' => $request->lot_area,
            'building_location' => $request->building_location,
            'barangay' => $request->barangay,
            'building_in_charge' => $request->building_in_charge,
            'lati' => $request->lati,
            'longti' => $request->longti,
            'image' => $path,
            'date_constructed' => $request->date_constructed,
            'date_of_completion' => $request->date_of_completion,
            'is_archived' => 0,

        ]);

        if ($buildings->save()) {
            return redirect()->route('admin.building.index')->with('success', 'Building created successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to create building');
        }
    }

    /**
     * Archive the specified resource.
     */
    public function archive(string $id)
    {
        $building = building::findOrFail($id);
        $building->is_archived = 1;
        $building->save();

        return redirect()->route('admin.building.index')->with('success', 'Building archived successfully');
    }

    /**
     * Unarchive the specified resource from storage.
     */
    public function unarchive(string $id)
    {
        $building = building::findOrFail($id);
        $building->is_archived = 0;
        $building->save();

        return redirect()->route('admin.building.index')->with('success', 'Building unarchived successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $encryptedId)
    {
        try {
            // Decrypt the ID from the URL
            $id = Crypt::decryptString($encryptedId);

            // Retrieve the building using the decrypted ID
            $buildings = Building::findOrFail($id);

            // Pass the building data to the view
            return view('admin.building.show')->with('buildings', $buildings);
        } catch (\Exception $e) {
            return redirect()->route('admin.building.index')->with('error', 'Building not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $encryptedId)
{
    try {
        // Decrypt the ID from the URL
        $id = Crypt::decryptString($encryptedId);

        // Retrieve the building using the decrypted ID
        $buildings = Building::findOrFail($id);

        // Pass the building data to the view
        return view('admin.building.edit')->with('buildings', $buildings);
    } catch (\Exception $e) {
        // Handle cases where decryption fails
        abort(404, 'Invalid or tampered ID.');
    }
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
            'barangay' => 'required',
            'building_in_charge' => 'required',
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
        $building->building_cost = $request->building_cost;
        $building->building_area = $request->building_area;
        $building->lot_area = $request->lot_area;
        $building->barangay = $request->barangay;
        $building->building_location = $request->building_location;
        $building->building_in_charge = $request->building_in_charge;
        $building->lati = $request->lati;
        $building->longti = $request->longti;
        $building->date_constructed = $request->date_constructed;

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
