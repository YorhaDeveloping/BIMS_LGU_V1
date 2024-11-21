@extends('layouts.Users.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('users.maintenance.update', $maintenance->id) }}" enctype="multipart/form-data">
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
                                            @foreach ($buildings->where('is_archived', 0) as $building)
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
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="painting" name="maintenance_type[]" value="painting"
                                                {{ in_array('painting', explode(',', $maintenance->maintenance_type)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="painting">Painting</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Electrical" name="maintenance_type[]" value="Electrical"
                                                {{ in_array('Electrical', explode(',', $maintenance->maintenance_type)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Electrical">Electrical</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="HVAC" name="maintenance_type[]" value="HVAC"
                                                {{ in_array('HVAC', explode(',', $maintenance->maintenance_type)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="HVAC">HVAC (Heating, Ventilation, and Air Conditioning)</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="General Repairs" name="maintenance_type[]" value="General Repairs"
                                                {{ in_array('General Repairs', explode(',', $maintenance->maintenance_type)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="General Repairs">General Repairs</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Plumbing" name="maintenance_type[]" value="Plumbing"
                                                {{ in_array('Plumbing', explode(',', $maintenance->maintenance_type)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Plumbing">Plumbing</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Roofing" name="maintenance_type[]" value="Roofing"
                                                {{ in_array('Roofing', explode(',', $maintenance->maintenance_type)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Roofing">Roofing</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Flooring" name="maintenance_type[]" value="Flooring"
                                                {{ in_array('Flooring', explode(',', $maintenance->maintenance_type)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Flooring">Flooring</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Cleaning" name="maintenance_type[]" value="Cleaning"
                                                {{ in_array('Cleaning', explode(',', $maintenance->maintenance_type)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Cleaning">Cleaning</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Landscaping" name="maintenance_type[]" value="Landscaping"
                                                {{ in_array('Landscaping', explode(',', $maintenance->maintenance_type)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Landscaping">Landscaping</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Fire Safety Equipment Maintenance" name="maintenance_type[]" value="Fire Safety Equipment Maintenance"
                                                {{ in_array('Fire Safety Equipment Maintenance', explode(',', $maintenance->maintenance_type)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Fire Safety Equipment Maintenance">Fire Safety Equipment Maintenance</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Security Systems Maintenance" name="maintenance_type[]" value="Security Systems Maintenance"
                                                {{ in_array('Security Systems Maintenance', explode(',', $maintenance->maintenance_type)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Security Systems Maintenance">Security Systems Maintenance</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Pest Control" name="maintenance_type[]" value="Pest Control"
                                                {{ in_array('Pest Control', explode(',', $maintenance->maintenance_type)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Pest Control">Pest Control</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Gym Equipment Repair" name="maintenance_type[]" value="Gym Equipment Repair"
                                                {{ in_array('Gym Equipment Repair', explode(',', $maintenance->maintenance_type)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Gym Equipment Repair">Gym Equipment Repair</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Lighting Maintenance" name="maintenance_type[]" value="Lighting Maintenance"
                                                {{ in_array('Lighting Maintenance', explode(',', $maintenance->maintenance_type)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Lighting Maintenance">Lighting Maintenance</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Furniture Repairs/Replacements" name="maintenance_type[]" value="Furniture Repairs/Replacements"
                                                {{ in_array('Furniture Repairs/Replacements', explode(',', $maintenance->maintenance_type)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Furniture Repairs/Replacements">Furniture Repairs/Replacements</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Windows and Doors Maintenance" name="maintenance_type[]" value="Windows and Doors Maintenance"
                                                {{ in_array('Windows and Doors Maintenance', explode(',', $maintenance->maintenance_type)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Windows and Doors Maintenance">Windows and Doors Maintenance</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="HVAC Filter Replacement" name="maintenance_type[]" value="HVAC Filter Replacement"
                                                {{ in_array('HVAC Filter Replacement', explode(',', $maintenance->maintenance_type)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="HVAC Filter Replacement">HVAC Filter Replacement</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="Electrical System Inspection" name="maintenance_type[]" value="Electrical System Inspection"
                                                {{ in_array('Electrical System Inspection', explode(',', $maintenance->maintenance_type)) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Electrical System Inspection">Electrical System Inspection</label>
                                        </div>

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
                                            value="{{ $maintenance->submitter_name }}" readonly><br>

                                        <label for="submitter_email">Email Address:</label>
                                        <input type="email" class="form-control" id="submitter_email"
                                            name="submitter_email" placeholder="Enter your email" required
                                            value="{{ $maintenance->submitter_email }}" readonly><br>

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
