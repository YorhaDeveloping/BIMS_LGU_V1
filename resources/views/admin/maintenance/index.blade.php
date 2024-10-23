@extends('layouts.Admin.app')

@section('content')
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h4 class="w-100"><i class="fa fa-bullhorn"></i> LGU APARRI - MAINTENANCE REQUESTS</h4><br>

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
                    <a href="{{ route('admin.maintenance.create') }}" class="btn btn-primary">Add New Maintenance Request</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">Building Name</th>
                                <th scope="col">Maintenance Type</th>
                                <th scope="col">Priority</th>
                                <th scope="col">Submitter</th>
                                <th scope="col">Submission Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($maintenances as $maintenance)
                                <tr>
                                    <td>{{ $maintenance->buildings_name }}</td>
                                    <td>{{ $maintenance->maintenance_type }}</td>
                                    <td>{{ $maintenance->priority }}</td>
                                    <td>{{ $maintenance->submitter_name }}</td>
                                    <td>{{ $maintenance->submittion_date }}</td>
                                    <td>{{ $maintenance->status }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.maintenance.show', $maintenance->id) }}" class="btn btn-info btn-sm me-1">View</a>
                                        <a href="{{ route('admin.maintenance.edit', $maintenance->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                        <form action="" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this maintenance request?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection


