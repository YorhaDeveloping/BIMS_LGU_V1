@extends('layouts.Admin.app')

@section('content')
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
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

                <form method="GET" action="{{ route('admin.building.index') }}" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search by building name, location, or in-charge" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>
                                    <a href="{{ route('admin.building.index', array_merge(request()->except(['sort', 'direction']), ['sort' => 'building_name', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}" class="text-black">
                                        Building Name
                                        <i class="fa fa-sort-{{ request('sort') === 'building_name' && request('direction') === 'asc' ? 'asc' : 'desc' }} ml-1" aria-hidden="true"></i>
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('admin.building.index', array_merge(request()->except(['sort', 'direction']), ['sort' => 'building_type', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}" class="text-black">
                                        Building Type
                                        <i class="fa fa-sort-{{ request('sort') === 'building_type' && request('direction') === 'asc' ? 'asc' : 'desc' }} ml-1" aria-hidden="true"></i>
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('admin.building.index', array_merge(request()->except(['sort', 'direction']), ['sort' => 'barangay', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}" class="text-black">
                                        Building Location
                                        <i class="fa fa-sort-{{ request('sort') === 'barangay' && request('direction') === 'asc' ? 'asc' : 'desc' }} ml-1" aria-hidden="true"></i>
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('admin.building.index', array_merge(request()->except(['sort', 'direction']), ['sort' => 'building_in_charge', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}" class="text-black">
                                        Building In-Charge
                                        <i class="fa fa-sort-{{ request('sort') === 'building_in_charge' && request('direction') === 'asc' ? 'asc' : 'desc' }} ml-1" aria-hidden="true"></i>
                                    </a>
                                </th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($buildings as $building)
                                <tr>
                                    <td>{{ $building->building_name }}</td>
                                    <td>{{ $building->building_type }}</td>
                                    <td>{{ $building->barangay }}</td>
                                    <td>{{ $building->building_in_charge }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('admin.building.show', Crypt::encryptString($building->id)) }}" class="btn btn-info btn-sm me-1">View</a>
                                        <a href="{{ route('admin.building.edit', Crypt::encryptString($building->id)) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                        <form action="{{ $building->is_archived ? route('admin.building.unarchive', $building->id) : route('admin.building.archive', $building->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn {{ $building->is_archived ? 'btn-success' : 'btn-danger' }} btn-sm" onclick="return confirm('Are you sure you want to {{ $building->is_archived ? 'un-archive' : 'archive' }} this building?');">{{ $building->is_archived ? 'Un-archive' : 'Archive' }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No buildings found.</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                {{ $buildings->appends(request()->except('page'))->links() }}

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
