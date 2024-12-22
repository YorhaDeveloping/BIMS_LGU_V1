@extends('layouts.Admin.app')

@section('content')

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between">
                    <h4 class="mb-0"><i class="fa fa-bullhorn"></i> LGU APARRI - Maintenance Reports</h4>
                    <a href="{{ route('admin.reports.export') }}" class="btn btn-success">Export</a>
                </div>
            </div>
            <div class="card-body">

                @if (count($maintenances) == 0)
                <div class="alert alert-primary">
                    No maintenance report available.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">Building Name</th>
                                <th scope="col">Building Location</th>
                                <th scope="col">Maintenance Type</th>
                                <th scope="col">Priority</th>
                                <th scope="col">Submission Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Request Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($maintenances as $maintenance)
                                <tr>
                                    <td>{{ $maintenance->buildings_name }}</td>
                                    <td>{{ $maintenance->building_location }}</td>
                                    <td>{{ Str::limit($maintenance->maintenance_type, 20) }}</td>
                                    <td>{{ $maintenance->priority }}</td>
                                    <td>{{ $maintenance->submittion_date }}</td>
                                    <td>{{ $maintenance->status }}</td>
                                    <td>{{ $maintenance->request_status }}</td>
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


