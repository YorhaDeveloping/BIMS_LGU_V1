@extends('layouts.Admin.app')

@section('content')
<div class="py-12 mb-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-lg font-bold mb-4">Search Buildings</h1>
                
                <!-- Search Form -->
                <form action="{{ route('admin.admin.building.search') }}" method="GET" class="mb-4">
                    <div class="flex items-center justify-center sm:justify-start">
                        <div class="relative search-container flex items-center w-full sm:w-auto">
                            <i class='bx bx-search absolute left-3 text-gray-400 text-xl'></i>
                            
                            <input type="text" name="search" placeholder="Search by building name, location or type" 
                                   class="w-full sm:w-64 pl-10 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-center" 
                                   value="{{ request()->input('search') }}"> <!-- Preserve search input -->
                            
                            <!-- Search button -->
                            <button type="submit" class="ml-2 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-300">
                                <!-- Display dynamic text if a search is performed -->
                                {{ request()->input('search') ? "Searching for: " . request()->input('search') : "Search" }}
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Display Search Results -->
                @if(isset($buildings) && $buildings->isNotEmpty())
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Building Name</th>
                                <th>Building Structure</th>
                                <th>Building Type</th>
                                <th>Building Area (sq ft)</th>
                                <th>Lot Area (sq ft)</th>
                                <th>Building Location</th>
                                <th>Building In-Charge</th>
                                <th>Date of Completion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buildings as $building)
                            <tr>
                                <td>{{ $building->building_name }}</td>
                                <td>{{ $building->building_structure }}</td>
                                <td>{{ $building->building_type }}</td>
                                <td>{{ $building->building_area }}</td>
                                <td>{{ $building->lot_area }}</td>
                                <td>{{ $building->building_location }}</td>
                                <td>{{ $building->building_in_charge }}</td>
                                <td>{{ \Carbon\Carbon::parse($building->date_of_completion)->format('Y-m-d') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @elseif(isset($buildings))
                    <div class="text-center">No buildings found for your search.</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
