@extends('layouts.Admin.app')

@section('content')
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                                <th>Building In-Charge</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($buildings as $building)
                                <tr>
                                    <td>{{ $building->building_name }}</td>

                                    <td>{{ $building->building_in_charge }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('admin.building.show', $building->id) }}" class="btn btn-info btn-sm me-1">View</a>
                                        <a href="{{ route('admin.building.edit', $building->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                        <form action="" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to archive this building?');">Archive</button>
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


