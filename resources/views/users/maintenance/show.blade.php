@extends('layouts.Users.app')

@section('content')
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @if ($maintenance)
                            <h3>Maintenance Record</h3>
                        @else
                            <h3>No maintenance record found.</h3>
                        @endif
                    </div>
                    <div class="card-body">
                        @if ($maintenance)
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-black"><strong>Building Name: </strong> {{ $maintenance->buildings_name }}</p>
                                    <p class="text-black"><strong>Maintenance Type: </strong> {{ $maintenance->maintenance_type }}</p>
                                    <p class="text-black"><strong>Issue Description: </strong>{{ $maintenance->issue_description }}</p>
                                    <p class="text-black"><strong>Priority: </strong>{{ $maintenance->priority }}</p>
                                    <p class="text-black"><strong>Submitter:</strong> {{ $maintenance->submitter_name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-black"><strong>Submission Date: </strong> {{ $maintenance->submittion_date }}</p>
                                    <p class="text-black"><strong>Status:</strong> {{ $maintenance->status }}</p>
                                    <p class="text-black"><strong>Last Renovation Date:</strong> {{ $maintenance->last_renovation_date }}</p>
                                    <p class="text-black"><strong>Request Status:</strong> {{ $maintenance->request_status }}</p>
                                </div>
                            </div>
                            <hr>
                            <p class="text-black"><strong>Attachments:</strong></p>
                            <div class="row">
                                @foreach(explode(',', $maintenance->attachments) as $attachment)
                                    <div class="col-sm-6 col-md-4">
                                        <a href="{{ asset('storage/' . $attachment) }}" data-lightbox="roadtrip">
                                            <img src="{{ asset('storage/' . $attachment) }}" class="img-fluid img-thumbnail" alt="{{ $attachment }}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="javascript:history.back()" class="btn btn-outline-dark">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

