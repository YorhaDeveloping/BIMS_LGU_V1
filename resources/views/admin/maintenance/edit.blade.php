@extends('layouts.Admin.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.maintenance.update', $maintenance->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


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
                                            <option value="" {{ $maintenance->buildings_name == null ? 'selected' : '' }}>Select Building Name</option>
                                            @foreach ($buildings as $building)
                                                <option value="{{ $building->building_name }}"
                                                    {{ $maintenance->buildings_name == $building->building_name ? 'selected' : '' }}>
                                                    {{ $building->building_name }}</option>
                                            @endforeach
                                        </select><br>

                                        <label for="building_type">Building Type:</label>
                                        <select class="form-control" id="building_type" name="building_type" required>
                                            <option value="gymnasium"
                                                {{ $maintenance->building_type == 'gymnasium' ? 'selected' : '' }}>Gymnasium
                                            </option>
                                            <option value="community_center"
                                                {{ $maintenance->building_type == 'community_center' ? 'selected' : '' }}>
                                                Community Center</option>
                                            <option value="administrative_office"
                                                {{ $maintenance->building_type == 'administrative_office' ? 'selected' : '' }}>
                                                Administrative Office</option>
                                            <option value="library"
                                                {{ $maintenance->building_type == 'library' ? 'selected' : '' }}>Library
                                            </option>
                                            <option value="recreation_center"
                                                {{ $maintenance->building_type == 'recreation_center' ? 'selected' : '' }}>
                                                Recreation Center</option>
                                        </select><br>

                                        <label for="last_renovation_date">Last Renovation Date:</label>
                                        <input type="date" class="form-control" id="last_renovation_date"
                                            name="last_renovation_date"
                                            value="{{ $maintenance->last_renovation_date }}"><br>

                                        <label for="status">Building Status:</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="Operational"
                                                {{ $maintenance->status == 'Operational' ? 'selected' : '' }}>Operational
                                            </option>
                                            <option value="Under Renovation"
                                                {{ $maintenance->status == 'Under Renovation' ? 'selected' : '' }}>Under
                                                Renovation</option>
                                            <option value="Inactive"
                                                {{ $maintenance->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select><br>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <h5 class="card p-2 border-black">MAINTENANCE</h5>
                                        </div><br>

                                        <label for="maintenance_type">Type of Maintenance Request</label>
                                        <select class="form-control" id="maintenance_type" name="maintenance_type" required>
                                            <option value="painting"
                                                {{ $maintenance->maintenance_type == 'painting' ? 'selected' : '' }}>
                                                Painting</option>
                                            <option value="electrical"
                                                {{ $maintenance->maintenance_type == 'electrical' ? 'selected' : '' }}>
                                                Electrical</option>
                                            <option value="hvac"
                                                {{ $maintenance->maintenance_type == 'hvac' ? 'selected' : '' }}>HVAC
                                                (Heating, Ventilation, and Air Conditioning)</option>
                                            <option value="general_repairs"
                                                {{ $maintenance->maintenance_type == 'general_repairs' ? 'selected' : '' }}>
                                                General Repairs</option>
                                            <option value="plumbing"
                                                {{ $maintenance->maintenance_type == 'plumbing' ? 'selected' : '' }}>
                                                Plumbing</option>
                                            <option value="roofing"
                                                {{ $maintenance->maintenance_type == 'roofing' ? 'selected' : '' }}>Roofing
                                            </option>
                                            <option value="flooring"
                                                {{ $maintenance->maintenance_type == 'flooring' ? 'selected' : '' }}>
                                                Flooring</option>
                                            <option value="cleaning"
                                                {{ $maintenance->maintenance_type == 'cleaning' ? 'selected' : '' }}>
                                                Cleaning</option>
                                            <option value="landscaping"
                                                {{ $maintenance->maintenance_type == 'landscaping' ? 'selected' : '' }}>
                                                Landscaping</option>
                                            <option value="fire_safety"
                                                {{ $maintenance->maintenance_type == 'fire_safety' ? 'selected' : '' }}>
                                                Fire Safety Equipment Maintenance</option>
                                            <option value="security_systems"
                                                {{ $maintenance->maintenance_type == 'security_systems' ? 'selected' : '' }}>
                                                Security Systems Maintenance</option>
                                            <option value="pest_control"
                                                {{ $maintenance->maintenance_type == 'pest_control' ? 'selected' : '' }}>
                                                Pest Control</option>
                                            <option value="equipment_repair"
                                                {{ $maintenance->maintenance_type == 'equipment_repair' ? 'selected' : '' }}>
                                                Gym Equipment Repair</option>
                                            <option value="lighting"
                                                {{ $maintenance->maintenance_type == 'lighting' ? 'selected' : '' }}>
                                                Lighting Maintenance</option>
                                            <option value="furniture"
                                                {{ $maintenance->maintenance_type == 'furniture' ? 'selected' : '' }}>
                                                Furniture Repairs/Replacements</option>
                                            <option value="windows_doors"
                                                {{ $maintenance->maintenance_type == 'windows_doors' ? 'selected' : '' }}>
                                                Windows and Doors Maintenance</option>
                                            <option value="hvac_filter"
                                                {{ $maintenance->maintenance_type == 'hvac_filter' ? 'selected' : '' }}>
                                                HVAC Filter Replacement</option>
                                            <option value="electrical_inspection"
                                                {{ $maintenance->maintenance_type == 'electrical_inspection' ? 'selected' : '' }}>
                                                Electrical System Inspection</option>
                                        </select><br>

                                        <label for="issue_description">Description of the Issue:</label>
                                        <textarea class="form-control" id="issue_description" name="issue_description" rows="5" required>{{ $maintenance->issue_description }}</textarea><br>

                                        <label for="priority">Priority Level:</label>
                                        <select class="form-control" id="priority" name="priority" required>
                                            <option value="low" {{ $maintenance->priority == 'low' ? 'selected' : '' }}>
                                                Low</option>
                                            <option value="medium"
                                                {{ $maintenance->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                                            <option value="high"
                                                {{ $maintenance->priority == 'high' ? 'selected' : '' }}>High</option>
                                            <option value="urgent"
                                                {{ $maintenance->priority == 'urgent' ? 'selected' : '' }}>Urgent</option>
                                        </select><br>

                                        <label for="attachments">Attachments (Optional):</label>
                                        <input type="file" class="form-control-file" id="attachments"
                                            name="attachments[]" multiple>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <h5 class="card p-2 border-black">CONTACT INFORMATION</h5>
                                        </div>
                                        <br>
                                        <label for="submitter_name">Name:</label>
                                        <input type="text" class="form-control" id="submitter_name" name="submitter_name"
                                            placeholder="Enter your name" required
                                            value="{{ $maintenance->submitter_name }}"><br>

                                        <label for="submitter_email">Email Address:</label>
                                        <input type="email" class="form-control" id="submitter_email"
                                            name="submitter_email" placeholder="Enter your email" required
                                            value="{{ $maintenance->submitter_email }}"><br>

                                        <label for="submitter_phone">Phone Number:</label>
                                        <input type="tel" class="form-control" id="submitter_phone"
                                            name="submitter_phone" placeholder="Enter your phone number" required
                                            value="{{ $maintenance->submitter_phone }}"><br>

                                        <label for="submittion_date">Submission Date:</label>
                                        <input type="date" class="form-control" id="submittion_date"
                                            name="submittion_date" required value="{{ $maintenance->submittion_date }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
