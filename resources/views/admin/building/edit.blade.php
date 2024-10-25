@extends('layouts.Admin.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h4 class="justify-content-center">
                        <center>Building Informations</center>
                    </h4>

                    <form action="{{ route('admin.building.update', $buildings->id) }}" method="POST" class="was-validated" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="container">
                            <div class="row pt-3">
                                <div class="col-sm-6">
                                    <label for="building_name">Building Name</label><br>
                                    <input type="text" name="building_name" class="form-control"
                                        value="{{ $buildings->building_name }}" required><br>

                                    <label for="building_structure">Building Structure</label><br>
                                    <input type="text" name="building_structure" class="form-control"
                                        value="{{ $buildings->building_structure }}" required><br>

                                    <label for="building_type">Building Type</label>
                                    <select name="building_type" class="form-control" required>
                                        <option value="">Select Building Type</option>
                                        <option value="Residential Buildings"
                                            {{ $buildings->building_type === 'Residential Buildings' ? 'selected' : '' }}>
                                            Residential Buildings</option>
                                        <option value="Commercial Buildings"
                                            {{ $buildings->building_type === 'Commercial Buildings' ? 'selected' : '' }}>
                                            Commercial Buildings</option>
                                        <option value="Industrial Buildings"
                                            {{ $buildings->building_type === 'Industrial Buildings' ? 'selected' : '' }}>
                                            Industrial Buildings</option>
                                        <option value="Institutional Buildings"
                                            {{ $buildings->building_type === 'Institutional Buildings' ? 'selected' : '' }}>
                                            Institutional Buildings</option>
                                        <option value="Mixed-Use Buildings"
                                            {{ $buildings->building_type === 'Mixed-Use Buildings' ? 'selected' : '' }}>
                                            Mixed-Use Buildings</option>
                                        <option value="Agricultural Buildings"
                                            {{ $buildings->building_type === 'Agricultural Buildings' ? 'selected' : '' }}>
                                            Agricultural Buildings</option>
                                        <option value="Recreational Buildings"
                                            {{ $buildings->building_type === 'Recreational Buildings' ? 'selected' : '' }}>
                                            Recreational Buildings</option>
                                        <option value="Cultural Buildings"
                                            {{ $buildings->building_type === 'Cultural Buildings' ? 'selected' : '' }}>
                                            Cultural Buildings</option>
                                        <option value="Transportation Facilities"
                                            {{ $buildings->building_type === 'Transportation Facilities' ? 'selected' : '' }}>
                                            Transportation Facilities</option>
                                        <option value="Special Purpose Building"
                                            {{ $buildings->building_type === 'Special Purpose Building' ? 'selected' : '' }}>
                                            Special Purpose Building</option>
                                    </select>

                                    <label for="building_area" class="pt-4">Building Area</label><br>
                                    <input type="text" name="building_area" class="form-control"
                                        value="{{ $buildings->building_area }}" required><br>
                                </div>

                                <div class="col-sm-6">
                                    <label for="lot_area">Lot Area</label><br>
                                    <input type="text" name="lot_area" class="form-control"
                                        value="{{ $buildings->lot_area }}" required><br>

                                    <label for="building_location">Building Location</label><br>
                                    <input type="text" name="building_location" class="form-control"
                                        value="{{ $buildings->building_location }}" required><br>

                                    <label for="building_in_charge">Building In-Charge</label><br>
                                    <input type="text" name="building_in_charge" class="form-control"
                                        value="{{ $buildings->building_in_charge }}" required><br>

                                    <label for="date_of_completion">Date of Completion</label><br>
                                    <input type="date" name="date_of_completion" class="form-control"
                                        value="{{ $buildings->date_of_completion }}" required><br>
                                    <br>
                                </div>

                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control-file" name="image" accept="image/*">
                                            @if (!empty($buildings) && $buildings->image)
                                                <img src="{{ asset('storage/' . $buildings->image) }}"
                                                     style="max-width: 300px; margin-top: 1em;"
                                                     alt="Building Image"/>
                                            @else
                                                <p>No image available.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div style="margin-top: 1em" class="card">
                                    <div class="card-body">
                                        <div class="form-group mt-3">
                                            <label>Building Location Coordinates</label>
                                            <div class="row">
                                                <div class="col-5">
                                                    <label for="latitude" class="form-label">Latitude</label>
                                                    <input type="text" class="form-control" name="lati" id="latitude"
                                                        value="{{ $buildings->lati }}" placeholder="Enter latitude"
                                                        required readonly>
                                                </div>
                                                <div class="col-6">
                                                    <label for="longitude" class="form-label">Longitude</label>
                                                    <input type="text" class="form-control" name="longti" id="longitude"
                                                        value="{{ $buildings->longti }}" placeholder="Enter longitude"
                                                        required readonly>
                                                </div>
                                                <div class="col-1 d-flex align-items-center mt-4">
                                                    <button id="openModal" type="button" class="btn btn-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-crosshair"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8.5.5a.5.5 0 0 0-1 0v.518A7 7 0 0 0 1.018 7.5H.5a.5.5 0 0 0 0 1h.518A7 7 0 0 0 7.5 14.982v.518a.5.5 0 0 0 1 0v-.518A7 7 0 0 0 14.982 8.5h.518a.5.5 0 0 0 0-1h-.518A7 7 0 0 0 8.5 1.018zm-6.48 7A6 6 0 0 1 7.5 2.02v.48a.5.5 0 0 0 1 0v-.48a6 6 0 0 1 5.48 5.48h-.48a.5.5 0 0 0 0 1h.48a6 6 0 0 1-5.48 5.48v-.48a.5.5 0 0 0-1 0v.48A6 6 0 0 1 2.02 8.5h.48a.5.5 0 0 0 0-1zM8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer mt-4" style="display: flex; justify-content: flex-end;">
                            <button type="submit" class="btn btn-primary" style="margin-right: 10px;">
                                <i class="fa fa-check-circle"></i> Update
                            </button>

                            <a href="{{ route('admin.building.index') }}" class="btn btn-danger">
                                <i class="fa fa-times-circle"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="exampleModal" class="custom-map-modal" style="display:none;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Building Location</h5>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <div id="map" style="height: 400px;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModal">Close</button>
                <button type="button" class="btn btn-primary" id="saveLocation">Save Location</button>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <style>
        .custom-map-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            width: 80%;
            max-width: 600px;
        }
    </style>
    <script>
        $(document).ready(function() {
            let map = L.map('map').setView([{{ $buildings->lati }}, {{ $buildings->longti }}], 13);
            let marker = L.marker([{{ $buildings->lati }}, {{ $buildings->longti }}], {
                draggable: true
            }).addTo(map);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            $('#openModal').on('click', function() {
                $('#exampleModal').fadeIn();
                setTimeout(function() {
                    map.invalidateSize();
                    map.panTo(marker.getLatLng());
                }, 100);
            });

            $('.close, #closeModal').on('click', function() {
                $('#exampleModal').fadeOut();
            });

            $('#saveLocation').on('click', function() {
                const lat = marker.getLatLng().lat;
                const lng = marker.getLatLng().lng;

                // Update the latitude and longitude input fields with the new values
                $('#latitude').val(lat);
                $('#longitude').val(lng);

                // Close the modal after saving the location
                $('#exampleModal').fadeOut();
            });

        });
    </script>
@endsection
