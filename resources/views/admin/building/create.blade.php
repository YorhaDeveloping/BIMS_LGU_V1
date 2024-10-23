@can('admin-access')
    @extends('layouts.Admin.app')

    @section('content')
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <form method="post" action="{{ route('admin.building.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <h4 class="w-100"><i class="fa fa-bullhorn"><b></i>LGU APARRI - BUILDING INFORMATION</h4></b><br>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="building_name">Building Name</label>
                                                    <input type="text" name="building_name" class="form-control" required
                                                        placeholder="Enter the Building Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="building_structure">Building Structure</label>
                                                    <input type="text" name="building_structure" class="form-control"
                                                        required placeholder="Enter the Building Structure">
                                                </div>
                                                <div class="form-group">
                                                    <label for="building_type">Building Type</label>
                                                    <select name="building_type" class="form-control" required>
                                                        <option value="">Select Building Type</option>
                                                        <option value="Residential Buildings">Residential Buildings</option>
                                                        <option value="Commercial Buildings">Commercial Buildings</option>
                                                        <option value="Industrial Buildings">Industrial Buildings</option>
                                                        <option value="Institutional Buildings">Institutional Buildings</option>
                                                        <option value="Mixed-Use Buildings">Mixed-Use Buildings</option>
                                                        <option value="Agricultural Buildings">Agricultural Buildings</option>
                                                        <option value="Recreational Buildings">Recreational Buildings</option>
                                                        <option value="Cultural Buildings">Cultural Buildings</option>
                                                        <option value="Transportation Facilities">Transportation Facilities
                                                        </option>
                                                        <option value="Special Purpose Building">Special Purpose Building
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="building_area">Building Area</label>
                                                    <input type="text" name="building_area" class="form-control" required
                                                        placeholder="Enter the Building Area">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="lot_area">Lot Area</label>
                                                    <input type="text" name="lot_area" class="form-control" required
                                                        placeholder="Enter the Lot Area">
                                                </div>
                                                <div class="form-group">
                                                    <label for="building_location">Building Location</label>
                                                    <input type="text" name="building_location" class="form-control" required
                                                        placeholder="Enter the Building Location">
                                                </div>
                                                <div class="form-group">
                                                    <label for="building_in_charge">Building In-Charge</label>
                                                    <input type="text" name="building_in_charge" class="form-control"
                                                        required placeholder="Enter the Building In-Charge">
                                                </div>
                                                <div class="form-group">
                                                    <label for="date_of_completion">Expected Date of Completion</label>
                                                    <input type="date" name="date_of_completion" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div style="margin-top: 1em" class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control-file" name="image" accept="image/*">
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
                                                        autocomplete="off" placeholder="Enter latitude" required readonly>
                                                </div>
                                                <div class="col-6">
                                                    <label for="longitude" class="form-label">Longitude</label>
                                                    <input type="text" class="form-control" name="longti" id="longitude"
                                                        autocomplete="off" placeholder="Enter longitude" required readonly>
                                                </div>
                                                <div class="col-1 d-flex align-items-center mt-4">
                                                    <button id="openModal" type="button" class="btn btn-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-crosshair" viewBox="0 0 16 16">
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

                            <div class="box-footer" style="display: flex; justify-content: flex-end;">
                                <div class="text-center mt-3">
                                    <input type="submit" class="btn btn-primary" value="Add">
                                </div>
                            </div>
                        </form>

                        <!-- Modal for Map -->
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
                                let map = L.map('map').setView([18.356785670041948, 121.63707969430232], 13);
                                let marker = L.marker([18.356785670041948, 121.63707969430232], {
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
                                    $('input[name="lati"]').val(lat.toFixed(6));
                                    $('input[name="longti"]').val(lng.toFixed(6));
                                    $('#exampleModal').fadeOut();
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endcan
@endsection
