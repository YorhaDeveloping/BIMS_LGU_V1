@extends('layouts.Users.app')

@section('content')
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fa fa-bullhorn"></i> LGU APARRI - Maintenance Requests</h4>
            </div>
            <div class="card-body">
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


                <div class="mb-4">
                    <a href="{{ route('users.maintenance.create') }}" class="btn btn-primary">Add New Maintenance
                        Request</a>
                </div>
                
                @if (count($maintenances) == 0)
                <div class="alert alert-primary">
                    No maintenance requests available.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
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
                                        <a href="{{ route('users.maintenance.show', $maintenance->id) }}"
                                            class="btn btn-info btn-sm me-2">View</a>
                                        <a href="{{ route('users.maintenance.edit', $maintenance->id) }}"
                                            class="btn btn-warning btn-sm me-2">Edit</a>
                                        <form action="{{ route('users.maintenance.destroy', $maintenance->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this maintenance request?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

