@extends('layouts.Users.app')

@section('content')
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fa fa-bullhorn"></i> Completion Form</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('users.maintenance.completionForm.store') }}" method="POST">
                    @csrf

                    <p><strong>Note:</strong> <i>Please only fillup this form if the maintenance has been completed</i> </p>
                    <input type="hidden" name="maint_id" value="{{ $maintenance->id }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="requesting_office">Requesting Office</label>
                        <input type="text" name="requesting_office" id="requesting_office" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="control_no">Control No.</label>
                        <input type="text" name="control_no" id="control_no" class="form-control" value="{{ $nextControlNo }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="date_requested">Date Requested</label>
                        <input type="date" name="date_requested" id="date_requested" class="form-control" value="{{ $maintenance->created_at->format('Y-m-d') }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="service_requested">Service Requested</label>
                        <textarea name="service_requested" id="service_requested" class="form-control" required>{{ ($maintenance->maintenance_type) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" id="location" class="form-control" value="{{ $maintenance->building_location }}" readonly>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Submit Completion</button>
                </form>
            </div>
        </div>
    </div>
@endsection
