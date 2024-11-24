@extends('layouts.Admin.app')

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

                @if (count($maintenances) == 0)
                    <div class="alert alert-primary">
                        No Maintenance Request Available.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col">Building Name</th>

                                    <th scope="col">Submitter</th>

                                    <th scope="col">Request Status</th>php
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($maintenances as $maintenance)
                                    <tr>
                                        <td>{{ $maintenance->buildings_name }}</td>
                                        <td>{{ $maintenance->submitter_name }}</td>
                                        <td>{{ $maintenance->request_status }}</td>
                                        <td>
                                            <a href="{{ route('admin.maintenance.show', $maintenance->id) }}" class="btn btn-info btn-sm me-1">View</a>

                                            <form action="{{ route('admin.maintenance.approve', $maintenance->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm"
                                                    onclick="return confirm('Are you sure you want to approve this maintenance request?');">Approve</button>
                                            </form>

                                            <form action="{{ route('admin.maintenance.reject', $maintenance->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to reject this maintenance request?');">Reject</button>
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

