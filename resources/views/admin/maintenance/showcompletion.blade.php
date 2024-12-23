@extends('layouts.Admin.app')

@section('content')
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fa fa-bullhorn"></i> Completion Form Details</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" value="{{ $completionForms->first()->name ?? '' }}" readonly>
                </div>
                <div class="form-group">
                    <label for="requesting_office">Requesting Office</label>
                    <input type="text" id="requesting_office" class="form-control" value="{{ $completionForms->first()->requesting_office ?? '' }}" readonly>
                </div>
                <div class="form-group">
                    <label for="control_no">Control No.</label>
                    <input type="text" id="control_no" class="form-control" value="{{ $completionForms->first()->control_no ?? '' }}" readonly>
                </div>
                <div class="form-group">
                    <label for="date_requested">Date Requested</label>
                    <input type="date" id="date_requested" class="form-control" value="{{ $completionForms->first()->date_requested ?? '' }}" readonly>
                </div>
                <div class="form-group">
                    <label for="service_requested">Service Requested</label>
                    <textarea id="service_requested" class="form-control" readonly>{{ $completionForms->first()->service_requested ?? '' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" class="form-control" value="{{ $completionForms->first()->location ?? '' }}" readonly>
                </div>
                <br>
                <a href="{{ route('admin.maintenance.print', Crypt::encryptString($completionForms->first()->id)) }}" class="btn btn-primary" target="_blank">Print Completion Form</a>
            </div>
        </div>
    </div>
@endsection
