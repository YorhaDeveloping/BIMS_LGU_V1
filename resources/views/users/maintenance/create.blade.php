@extends('layouts.Users.app')

@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <form method="POST" action="{{ route('users.maintenance.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <h5 class="card p-2 border-black">BUILDING INFORMATION</h5>
                                        </div>
                                        <br>
                                        <label for="building_name">Building Name:</label>
                                        <select class="form-control" id="buildings_name" name="buildings_name" required>
                                            <option value="">Select Building Name</option>
                                            @foreach ($buildings->where('is_archived', 0) as $building)
                                                <option value="{{ $building->building_name }}">
                                                    {{ $building->building_name }}</option>
                                            @endforeach
                                        </select><br>

                                        <label for="building_location">Building Located (BARANGAY):</label>
                                                    <select name="building_location" class="form-control" required>
                                                        <option value="">Select Location</option>
                                                        <option value="Backiling">Backiling</option>
                                                        <option value="Bangag">Bangag</option>
                                                        <option value="Binalan">Binalan</option>
                                                        <option value="Bisagu">Bisagu</option>
                                                        <option value="Bukig">Bukig</option>
                                                        <option value="Bulala Norte">Bulala Norte</option>
                                                        <option value="Bulala Sur">Bulala Sur</option>
                                                        <option value="Caagaman">Caagaman</option>
                                                        <option value="Centro 1">Centro 1</option>
                                                        <option value="Centro 10">Centro 10</option>
                                                        <option value="Centro 11">Centro 11</option>
                                                        <option value="Centro 12">Centro 12</option>
                                                        <option value="Centro 13">Centro 13</option>
                                                        <option value="Centro 14">Centro 14</option>
                                                        <option value="Centro 15">Centro 15</option>
                                                        <option value="Centro 2">Centro 2</option>
                                                        <option value="Centro 3">Centro 3</option>
                                                        <option value="Centro 4">Centro 4</option>
                                                        <option value="Centro 5">Centro 5</option>
                                                        <option value="Centro 6">Centro 6</option>
                                                        <option value="Centro 7">Centro 7</option>
                                                        <option value="Centro 8">Centro 8</option>
                                                        <option value="Centro 9">Centro 9</option>
                                                        <option value="Dodan">Dodan</option>
                                                        <option value="Gaddang">Gaddang</option>
                                                        <option value="Linao">Linao</option>
                                                        <option value="Macanaya">Macanaya</option>
                                                        <option value="Mabanguc">Mabanguc</option>
                                                        <option value="Maura">Maura</option>
                                                        <option value="Minanga">Minanga</option>
                                                        <option value="Navagan">Navagan</option>
                                                        <option value="Paruddun Norte">Paruddun Norte</option>
                                                        <option value="Paruddun Sur">Paruddun Sur</option>
                                                        <option value="Plaza">Plaza</option>
                                                        <option value="Punta">Punta</option>
                                                        <option value="San Antonio">San Antonio</option>
                                                        <option value="Sanja">Sanja</option>
                                                        <option value="Tallungan">Tallungan</option>
                                                        <option value="Toran">Toran</option>
                                                        <option value="Zinarag">Zinarag</option>
                                                    </select><br>

                                        <label for="building_type">Building Type:</label>
                                        <select class="form-control" id="building_type" name="building_type" required>
                                            <option value="gymnasium">Gymnasium</option>
                                            <option value="community_center">Community Center</option>
                                            <option value="administrative_office">Administrative Office</option>
                                            <option value="library">Library</option>
                                            <option value="recreation_center">Recreation Center</option>
                                        </select><br>
                                        <label for="last_renovation_date">Last Renovation Date:</label>
                                        <input type="date" class="form-control" id="last_renovation_date"
                                            name="last_renovation_date"><br>

                                        <label for="status">Building Status:</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="Operational">Operational</option>
                                            <option value="Under Renovation">Under Renovation</option>
                                            <option value="Inactive">Inactive</option>
                                        </select><br>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <h5 class="card p-2 border-black">MAINTENANCE</h5>
                                        </div><br>
                                        <label for="maintenance_type">Type of Maintenance Request</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Painting" id="painting"
                                                name="maintenance_type[]">
                                            <label class="form-check-label" for="painting">Painting</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Electrical"
                                                id="Electrical" name="maintenance_type[]">
                                            <label class="form-check-label" for="Electrical">Electrical</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="HVAC" id="HVAC"
                                                name="maintenance_type[]">
                                            <label class="form-check-label" for="HVAC">HVAC (Heating, Ventilation, and
                                                Air Conditioning)</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="General Repairs"
                                                id="General Repairs" name="maintenance_type[]">
                                            <label class="form-check-label" for="General Repairs">General Repairs</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Plumbing" id="Plumbing"
                                                name="maintenance_type[]">
                                            <label class="form-check-label" for="Plumbing">Plumbing</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Roofing" id="Roofing"
                                                name="maintenance_type[]">
                                            <label class="form-check-label" for="Roofing">Roofing</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Flooring" id="Flooring"
                                                name="maintenance_type[]">
                                            <label class="form-check-label" for="Flooring">Flooring</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Cleaning"
                                                id="Cleaning" name="maintenance_type[]">
                                            <label class="form-check-label" for="Cleaning">Cleaning</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Landscaping"
                                                id="Landscaping" name="maintenance_type[]">
                                            <label class="form-check-label" for="Landscaping">Landscaping</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                value="Fire Safety Equipment Maintenance"
                                                id="Fire Safety Equipment Maintenance" name="maintenance_type[]">
                                            <label class="form-check-label" for="Fire Safety Equipment Maintenance">Fire
                                                Safety Equipment Maintenance</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                value="Security Systems Maintenance" id="Security Systems Maintenance"
                                                name="maintenance_type[]">
                                            <label class="form-check-label" for="Security Systems Maintenance">Security
                                                Systems Maintenance</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Pest Control"
                                                id="Pest Control" name="maintenance_type[]">
                                            <label class="form-check-label" for="Pest Control">Pest Control</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Gym Equipment Repair"
                                                id="Gym Equipment Repair" name="maintenance_type[]">
                                            <label class="form-check-label" for="Gym Equipment Repair">Gym Equipment
                                                Repair</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Lighting Maintenance"
                                                id="Lighting Maintenance" name="maintenance_type[]">
                                            <label class="form-check-label" for="Lighting Maintenance">Lighting
                                                Maintenance</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                value="Furniture Repairs/Replacements" id="Furniture Repairs/Replacements"
                                                name="maintenance_type[]">
                                            <label class="form-check-label" for="Furniture Repairs/Replacements">Furniture
                                                Repairs/Replacements</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                value="Windows and Doors Maintenance" id="Windows and Doors Maintenance"
                                                name="maintenance_type[]">
                                            <label class="form-check-label" for="Windows and Doors Maintenance">Windows
                                                and Doors Maintenance</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                value="HVAC Filter Replacement" id="HVAC Filter Replacement"
                                                name="maintenance_type[]">
                                            <label class="form-check-label" for="HVAC Filter Replacement">HVAC Filter
                                                Replacement</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                value="Electrical System Inspection" id="Electrical System Inspection"
                                                name="maintenance_type[]">
                                            <label class="form-check-label" for="Electrical System Inspection">Electrical
                                                System Inspection</label>
                                        </div>



                                        </select><br>

                                        <label for="issue_description">Description of the Issue:</label>
                                        <textarea class="form-control" id="issue_description" name="issue_description" rows="5" required></textarea><br>

                                        <label for="priority">Priority Level:</label>
                                        <select class="form-control" id="priority" name="priority" required>
                                            <option value="low">Low</option>
                                            <option value="medium">Medium</option>
                                            <option value="high">High</option>
                                            <option value="urgent">Urgent</option>
                                        </select><br>

                                        <label for="attachments">Attachments:</label>
                                        <input type="file" class="form-control-file" id="attachments" name="attachments[]" multiple required>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <h5 class="card p-2 border-black">CONTACT INFORMATION</h5>
                                        </div>
                                        <br>
                                        <label for="submitter_name">Name:</label>
                                        <input type="text" class="form-control" id="submitter_name"
                                            name="submitter_name"
                                            placeholder="Enter your name" required><br>

                                        <label for="submitter_email">Email Address:</label>
                                        <input type="email" class="form-control" id="submitter_email"
                                            name="submitter_email"
                                            placeholder="Enter your email" required><br>

                                        <label for="submitter_phone">Phone Number:</label>
                                        <input type="tel" class="form-control" id="submitter_phone"
                                            name="submitter_phone" placeholder="Enter your phone number" required><br>

                                        <label for="submittion_date">Submission Date:</label>
                                        <input type="date" class="form-control" id="submittion_date"
                                            name="submittion_date" required value="{{ date('Y-m-d') }}" readonly>
                                    </div>
                                </div>

                                <div class="box-footer" style="display: flex; justify-content: flex-end;">
                                    <div class="text-center mt-3" style="width: 100%;">
                                        <input type="submit" class="btn btn-primary" value="Submit" style="float: right;">
                                    </div>
                                </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



