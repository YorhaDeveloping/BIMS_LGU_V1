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
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="card">
                    <h1 class="text-center text-4xl">BUILDING DETAILS</h1>
                    <hr>
                    <table>
                        <tr>
                            <th>Building Name:</th>
                            <td>{{ $buildings->building_name }}</td>
                        </tr>
                        <tr>
                            <th>Building Structure:</th>
                            <td>{{ $buildings->building_structure }}</td>
                        </tr>
                        <tr>
                            <th>Building Type:</th>
                            <td>{{ $buildings->building_type }}</td>
                        </tr>
                        <tr>
                            <th>Building Area (sq ft):</th>
                            <td>{{ $buildings->building_area }}</td>
                        </tr>
                        <tr>
                            <th>Lot Area (sq ft):</th>
                            <td>{{ $buildings->lot_area }}</td>
                        </tr>
                        <tr>
                            <th>Building Location:</th>
                            <td>{{ $buildings->building_location }}</td>
                        </tr>
                        <tr>
                            <th>Building In-Charge:</th>
                            <td>{{ $buildings->building_in_charge }}</td>
                        </tr>
                        <tr>
                            <th>Position:</th>
                            <td>{{ $buildings->position }}</td>
                        </tr>
                        <tr>
                            <th>Date Constructed:</th>
                            <td>{{ \Carbon\Carbon::parse($buildings->date_constructed)->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <th>Date of Completion:</th>
                            <td>{{ \Carbon\Carbon::parse($buildings->date_of_completion)->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <th>Building Image:</th>
                            <td>
                                <a href="{{ asset('storage/' . $buildings->image) }}" data-lightbox="building-image">
                                    <img src="{{ asset('storage/' . $buildings->image) }}" alt="Building Image"
                                        style="max-width: 30%; height: auto;">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>Supporting Documents:</th>
                            <td>
                                @if (!empty($buildings) && $buildings->files)
                                    <div class="row">
                                        @foreach (json_decode($buildings->files) as $file)
                                            <div class="col-sm-6">
                                                <a href="{{ asset('storage/' . $file) }}" target="_blank">
                                                    @if (strtolower(pathinfo($file, PATHINFO_EXTENSION)) == 'pdf')
                                                        <i class="fa fa-file-pdf fa-3x"></i><br>PDF Document
                                                    @else
                                                        <i class="fa fa-file-word fa-3x"></i><br>Word Document
                                                    @endif
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="no-files">No files available.</p>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('admin.building.index') }}" class="btn-primary">Back to Buildings</a>
                </div>
            </div>
        </div>
    </div>
@endsection
