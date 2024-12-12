@extends('layouts.Admin.app')

@section('content')
<div class="py-12 mb-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

            <a href="{{ route('admin.building.index') }}" class="btn btn-primary">Back</a>
            <table class="table table-striped table-hover">
            <thead class="thead-dark">
                        <tr>
                            <th>Building Name</th>
                            <th>Building Structure</th>
                            <th>Building Type</th>
                            <th>Building Area (sq ft)</th>
                            <th>Lot Area (sq ft)</th>
                            <th>Building Location</th>
                            <th>Building In-Charge</th>
                            <th>Date Constructed</th>
                            <th>Date of Completion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $buildings->building_name }}</td>
                            <td>{{ $buildings->building_structure }}</td>
                            <td>{{ $buildings->building_type }}</td>
                            <td>{{ $buildings->building_area }}</td>
                            <td>{{ $buildings->lot_area }}</td>
                            <td>{{ $buildings->building_location }}</td>
                            <td>{{ $buildings->building_in_charge }}</td>
                            <td>{{ \Carbon\Carbon::parse($buildings->date_constructed)->format('Y-m-d') }}</td>
                            <td>{{ \Carbon\Carbon::parse($buildings->date_of_completion)->format('Y-m-d') }}</td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
