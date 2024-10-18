@extends('layouts.Admin.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">


                <form method="POST" action="{{ route('admin.maintenance.store') }}" enctype="multipart/form-data">
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
            @foreach($buildings as $building)
                <option value="{{ $building->building_name }}">{{ $building->building_name }}</option>
            @endforeach
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
<input type="date" class="form-control" id="last_renovation_date" name="last_renovation_date"><br>

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
<select class="form-control" id="maintenance_type" name="maintenance_type" required>
    <option value="painting">Painting</option>
    <option value="electrical">Electrical</option>
    <option value="hvac">HVAC (Heating, Ventilation, and Air Conditioning)</option>
    <option value="general_repairs">General Repairs</option>
    <option value="plumbing">Plumbing</option>
    <option value="roofing">Roofing</option>
    <option value="flooring">Flooring</option>
    <option value="cleaning">Cleaning</option>
    <option value="landscaping">Landscaping</option>
    <option value="fire_safety">Fire Safety Equipment Maintenance</option>
    <option value="security_systems">Security Systems Maintenance</option>
    <option value="pest_control">Pest Control</option>
    <option value="equipment_repair">Gym Equipment Repair</option>
    <option value="lighting">Lighting Maintenance</option>
    <option value="furniture">Furniture Repairs/Replacements</option>
    <option value="windows_doors">Windows and Doors Maintenance</option>
    <option value="hvac_filter">HVAC Filter Replacement</option>
    <option value="electrical_inspection">Electrical System Inspection</option>
</select>

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

        <label for="attachments">Attachments (Optional):</label>
        <input type="file" class="form-control-file" id="attachments" name="attachments" multiple>
    </div>

    <div class="col-md-4">
    <div class="text-center">
                <h5 class="card p-2 border-black">CONTACT INFORMATION</h5>
            </div>
            <br>
        <label for="submitter_name">Name:</label>
        <input type="text" class="form-control" id="submitter_name" name="submitter_name" placeholder="Enter your name" required><br>

        <label for="submitter_email">Email Address:</label>
        <input type="email" class="form-control" id="submitter_email" name="submitter_email" placeholder="Enter your email" required><br>

        <label for="submitter_phone">Phone Number:</label>
        <input type="tel" class="form-control" id="submitter_phone" name="submitter_phone" placeholder="Enter your phone number" required><br>

        <label for="submittion_date">Submission Date:</label>
        <input type="date" class="form-control" id="submittion_date" name="submittion_date" required>
    </div>
</div>

<button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
