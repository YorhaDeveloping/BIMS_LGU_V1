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
        $query = Building::query()->where('is_archived', 0);

        // Apply the search filter
        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('building_name', 'like', '%' . $request->search . '%')
                    ->orWhere('barangay', 'like', '%' . $request->search . '%')
                    ->orWhere('building_in_charge', 'like', '%' . $request->search . '%');
            });
        }

        // Apply the barangay filter if selected
        if ($request->filled('barangay') && $request->barangay !== 'all') {
            $query->where('barangay', $request->barangay);
        }

        // Get the filtered buildings
        $buildings = $query->paginate(10);

        // Pass unique barangays for the dropdown
        $barangays = Building::select('barangay')->distinct()->get();

        return view('admin.building.index', compact('buildings', 'barangays'));
    }

    public function archived(Request $request)
    {
        $query = building::query()->where('is_archived', 1);

        // Implement search
        if ($search = $request->input('search')) {
            $query
                ->where('building_name', 'like', "%$search%")
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

        return view('admin.building.archived', compact('buildings'));
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
            'position' => 'required',
            'lati' => 'required',
            'longti' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'files.*' => 'mimes:pdf,doc,docx|max:5120',
            'date_constructed' => 'required|date',
            'date_of_completion' => 'required|date',
        ]);

        $path = $request->file('image')->store('images', 'public');

        $filePaths = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filePaths[] = $file->store('documents', 'public');
            }
        }

        $building = new Building([
            'building_name' => $request->building_name,
            'building_structure' => $request->building_structure,
            'building_type' => $request->building_type,
            'building_cost' => $request->building_cost,
            'building_area' => $request->building_area,
            'lot_area' => $request->lot_area,
            'building_location' => $request->building_location,
            'barangay' => $request->barangay,
            'building_in_charge' => $request->building_in_charge,
            'position' => $request->position,
            'lati' => $request->lati,
            'longti' => $request->longti,
            'image' => $path,
            'files' => json_encode($filePaths),
            'date_constructed' => $request->date_constructed,
            'date_of_completion' => $request->date_of_completion,
            'is_archived' => 0,
        ]);

        if ($building->save()) {
            return redirect()->route('admin.building.index')->with('success', 'Building created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create building.');
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

        return redirect()->back()->with('success', 'Building Archived successfully');
    }

    /**
     * Unarchive the specified resource from storage.
     */
    public function unarchive(string $id)
    {
        $building = building::findOrFail($id);
        $building->is_archived = 0;
        $building->save();

        return redirect()->back()->with('success', 'Building unarchived successfully');
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
        'building_cost' => 'required',
        'building_area' => 'required',
        'lot_area' => 'required',
        'building_location' => 'required',
        'barangay' => 'required',
        'building_in_charge' => 'required',
        'position' => 'required',
        'lati' => 'required',
        'longti' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image is optional for updates
        'files.*' => 'mimes:pdf,doc,docx|max:5120', // Optional for updates
        'date_constructed' => 'required|date',
        'date_of_completion' => 'required|date',
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
    $building->building_location = $request->building_location;
    $building->barangay = $request->barangay;
    $building->building_in_charge = $request->building_in_charge;
    $building->position = $request->position;
    $building->lati = $request->lati;
    $building->longti = $request->longti;
    $building->date_constructed = $request->date_constructed;
    $building->date_of_completion = $request->date_of_completion;

    // Handle image upload if a new image is provided
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($building->image && \Storage::disk('public')->exists($building->image)) {
            \Storage::disk('public')->delete($building->image);
        }

        // Store the new image
        $building->image = $request->file('image')->store('images', 'public');
    }

    // Handle files upload if new files are provided
    if ($request->hasFile('files')) {
        // Delete the old files if they exist
        if ($building->files) {
            foreach (json_decode($building->files) as $file) {
                if (\Storage::disk('public')->exists($file)) {
                    \Storage::disk('public')->delete($file);
                }
            }
        }

        // Store the new files
        $filePaths = [];
        foreach ($request->file('files') as $file) {
            $filePaths[] = $file->store('documents', 'public');
        }
        $building->files = json_encode($filePaths);
    }

    // Save the updated building details
    if ($building->save()) {
        return redirect()->route('admin.building.index')->with('success', 'Building updated successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to update building.');
    }
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

       public function printAll(Request $request)
    {
        $query = Building::query()->where('is_archived', 0);

        // Apply the search filter if provided
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('building_name', 'like', '%' . $request->search . '%')
                    ->orWhere('barangay', 'like', '%' . $request->search . '%')
                    ->orWhere('building_in_charge', 'like', '%' . $request->search . '%');
            });
        }

        // Apply the barangay filter if selected
        if ($request->filled('barangay') && $request->barangay !== 'all') {
            $query->where('barangay', $request->barangay);
        }

        $buildings = $query->get(); // Fetch buildings based on the query
        return view('admin.building.print', compact('buildings'));
    }
}
