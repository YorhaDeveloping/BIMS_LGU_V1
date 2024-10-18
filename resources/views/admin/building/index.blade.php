@extends('layouts.Admin.app')

@section('content')
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h4 class="w-100"><i class="fa fa-bullhorn"></i> LGU APARRI - BUILDING INFORMATION</h4><br>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="mb-3">
                    <a href="{{ route('admin.building.create') }}" class="btn btn-primary">Add New Building</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Building Name</th>
                                <th>Building Structure</th>
                                <th>Building Type</th>
                                <th>Building Area (sq ft)</th>
                                <th>Lot Area (sq ft)</th>
                                <th>Building Location</th>
                                <th>Building In-Charge</th>
                                <th>Date of Completion</th>
                                <th>Actions</th>
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
                                    <td class="d-flex">
                                        <a href="{{ route('admin.building.show', $building->id) }}" class="btn btn-info btn-sm me-1">View</a>
                                        <a href="{{ route('admin.building.edit', $building->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                        <form action="{{ route('admin.building.destroy', $building->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this building?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $buildings->links() }}

                @if($buildings->isEmpty())
                    <div class="alert alert-info" role="alert">
                        No buildings found.
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection

