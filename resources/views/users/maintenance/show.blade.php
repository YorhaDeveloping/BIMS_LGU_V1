@extends('layouts.Users.app')

@section('content')
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($maintenance)
                        <h1>Maintenance Record</h1>
                        <hr>
                        <p class="text-xl"><strong>Building Name: </strong> {{ $maintenance->buildings_name }}</p>
                        <p class="text-xl"><strong>Maintenance Type: </strong> {{ $maintenance->maintenance_type }}</p>
                        <p class="text-xl"><strong>Issue Description: </strong>{{ $maintenance->issue_description }}</p>
                        <p class="text-xl"><strong>Priority: </strong>{{ $maintenance->priority }}</p>
                        <p class="text-xl"><strong>Submitter:</strong> {{ $maintenance->submitter_name }}</p>
                        <p class="text-xl"><strong>Submission Date: {{ $maintenance->submittion_date }}</p>
                        <p class="text-xl"><strong>Status:</strong> {{ $maintenance->status }}</p>
                        <p class="text-xl"><strong>Request Status:</strong> {{ $maintenance->request_status }}</p>
                    @else
                        <p>No maintenance record found.</p>
                    @endif
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('users.maintenance.index') }}" class="btn btn-secondary">Back to Maintenance List</a>
            </div>
        </div>
    </div>
@endsection
