@extends('layouts.Admin.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 30px;
            margin-bottom: 20px;
            font-family: 'Arial', sans-serif;
        }

        h1 {
            font-weight: bold;
            color: #2c3e50;
        }

        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        th {
            background-color: #2c3e50;
            color: white;
            text-align: left;
            padding: 10px;
        }

        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        td img {
            border: 2px solid #2c3e50;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .fa {
            margin-right: 8px;
            color: #e74c3c;
        }

        .fa-file-word {
            color: #2980b9;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-sm-6 {
            flex: 1;
            max-width: 48%;
            margin: 1%;
            text-align: center;
        }

        .no-files {
            font-style: italic;
            color: #7f8c8d;
        }
    </style>

    <div class="container py-12">
        <div class="bg-white overflow-hidden sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="card">
                    <h1 class="text-center text-4xl">MAINTENANCE RECORD</h1>
                    <hr>
                    <table>
                        <tr>
                            <th>Building Name:</th>
                            <td>{{ $maintenance->buildings_name }}</td>
                        </tr>
                        <tr>
                            <th>Maintenance Type:</th>
                            <td>{{ $maintenance->maintenance_type }}</td>
                        </tr>
                        <tr>
                            <th>Issue Description:</th>
                            <td>{{ $maintenance->issue_description }}</td>
                        </tr>
                        <tr>
                            <th>Priority:</th>
                            <td>{{ $maintenance->priority }}</td>
                        </tr>
                        <tr>
                            <th>Submitter:</th>
                            <td>{{ $maintenance->submitter_name }}</td>
                        </tr>
                        <tr>
                            <th>Submission Date:</th>
                            <td>{{ $maintenance->submittion_date }}</td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>{{ $maintenance->status }}</td>
                        </tr>
                        <tr>
                            <th>Last Renovation Date:</th>
                            <td>{{ $maintenance->last_renovation_date }}</td>
                        </tr>
                        <tr>
                            <th>Request Status:</th>
                            <td>{{ $maintenance->request_status }}</td>
                        </tr>
                        <tr>
                            <th>Attachments:</th>
                            <td>
                                @if (!empty($maintenance) && $maintenance->attachments)
                                    <div class="row">
                                        @foreach (explode(',', $maintenance->attachments) as $attachment)
                                            <div class="col-sm-6">
                                                <a href="{{ asset('storage/' . $attachment) }}" data-lightbox="roadtrip">
                                                    <img src="{{ asset('storage/' . $attachment) }}" class="img-fluid img-thumbnail" alt="Attachment">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="no-files">No attachments available.</p>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="text-center mt-4">
                    <a href="javascript:history.back()" class="btn-primary">Back to Maintenance</a>
                </div>
            </div>
        </div>
    </div>
@endsection
