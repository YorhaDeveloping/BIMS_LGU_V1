@extends('layouts.Users.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .form-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 30px;
        }
        .section-header {
            background-color: #2c3e50;
            color: white;
            padding: 12px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-weight: 600;
            text-align: center;
        }
        .form-group label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 5px;
        }
        .form-control, .form-select {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 10px 15px;
            transition: all 0.3s;
        }
        .form-control:focus, .form-select:focus {
            border-color: #2c3e50;
            box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.25);
        }
        .form-check-label {
            margin-left: 5px;
            color: #495057;
        }
        .form-check-input {
            margin-top: 0.3rem;
        }
        .btn-submit {
            background-color: #2c3e50;
            border: none;
            padding: 12px 25px;
            font-weight: 500;
            transition: all 0.3s;
            color: white;
        }
        .btn-submit:hover {
            background-color: #1a252f;
            transform: translateY(-2px);
            color: white;
        }
        .checkbox-group {
            max-height: 400px;
            overflow-y: auto;
            padding: 10px;
            border: 1px solid #e9ecef;
            border-radius: 5px;
            background-color: #f8f9fa;
        }
        .checkbox-item {
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }
        .checkbox-item:last-child {
            border-bottom: none;
        }
    </style>

    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="form-container">
                        <h3 class="text-center mb-4" style="color: #2c3e50;">Maintenance Request Form</h3>

                        <form id="maintenanceForm" method="POST" action="{{ route('users.maintenance.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- Building Information Column -->
                                <div class="col-md-4">
                                    <div class="section-header">
                                        <i class="fas fa-building mr-2"></i> BUILDING INFORMATION
                                    </div>

                                    <div class="form-group">
                                        <label for="building_name">Building Name:</label>
                                        <select class="form-control" id="buildings_name" name="buildings_name" required>
                                            <option value="">Select Building Name</option>
                                            @foreach ($buildings->where('is_archived', 0) as $building)
                                                <option value="{{ $building->building_name }}">
                                                    {{ $building->building_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="building_location">Building Location (Barangay):</label>
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
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="building_type">Building Type:</label>
                                        <select class="form-control" id="building_type" name="building_type" required>
                                            <option value="gymnasium">Gymnasium</option>
                                            <option value="community_center">Community Center</option>
                                            <option value="administrative_office">Administrative Office</option>
                                            <option value="library">Library</option>
                                            <option value="recreation_center">Recreation Center</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="last_renovation_date">Last Renovation Date:</label>
                                        <input type="date" class="form-control" id="last_renovation_date" name="last_renovation_date">
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Building Status:</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="Operational">Operational</option>
                                            <option value="Under Renovation">Under Renovation</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Maintenance Column -->
                                <div class="col-md-4">
                                    <div class="section-header">
                                        <i class="fas fa-tools mr-2"></i> MAINTENANCE DETAILS
                                    </div>

                                    <div class="form-group">
                                        <label>Type of Maintenance Request:</label>
                                        <div class="checkbox-group">
                                            @foreach([
                                                'Painting', 'Electrical', 'HVAC', 'General Repairs',
                                                'Plumbing', 'Roofing', 'Flooring', 'Cleaning',
                                                'Landscaping', 'Fire Safety Equipment Maintenance',
                                                'Security Systems Maintenance', 'Pest Control',
                                                'Gym Equipment Repair', 'Lighting Maintenance',
                                                'Furniture Repairs/Replacements', 'Windows and Doors Maintenance',
                                                'HVAC Filter Replacement', 'Electrical System Inspection'
                                            ] as $type)
                                            <div class="checkbox-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="{{ $type }}" id="{{ str_replace(' ', '_', $type) }}" name="maintenance_type[]">
                                                    <label class="form-check-label" for="{{ str_replace(' ', '_', $type) }}">{{ $type }}</label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="issue_description">Description of the Issue:</label>
                                        <textarea class="form-control" id="issue_description" name="issue_description" rows="5" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="priority">Priority Level:</label>
                                        <select class="form-control" id="priority" name="priority" required>
                                            <option value="low">Low</option>
                                            <option value="medium">Medium</option>
                                            <option value="high">High</option>
                                            <option value="urgent">Urgent</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="attachments">Attachments:</label>
                                        <input type="file" class="form-control-file" id="attachments" name="attachments[]" multiple required>
                                    </div>
                                </div>

                                <!-- Contact Information Column -->
                                <div class="col-md-4">
                                    <div class="section-header">
                                        <i class="fas fa-user mr-2"></i> CONTACT INFORMATION
                                    </div>

                                    <div class="form-group">
                                        <label for="submitter_name">Name:</label>
                                        <input type="text" class="form-control" id="submitter_name" name="submitter_name" placeholder="Enter your name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="submitter_email">Email Address:</label>
                                        <input type="email" class="form-control" id="submitter_email" name="submitter_email" placeholder="Enter your email" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="submitter_phone">Phone Number:</label>
                                        <input type="tel" class="form-control" id="submitter_phone" name="submitter_phone" placeholder="Enter your phone number" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="submittion_date">Submission Date:</label>
                                        <input type="date" class="form-control" id="submittion_date" name="submittion_date" required value="{{ date('Y-m-d') }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-submit">
                                    <i class="fas fa-paper-plane mr-2"></i> Submit Request
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Keep your existing scripts -->
    <script>
        document.getElementById('maintenanceForm').addEventListener('submit', function(event) {
            const checkboxes = document.querySelectorAll('input[name="maintenance_type[]"]');
            let checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);

            if (!checkedOne) {
                event.preventDefault();
                alert('Please select at least one type of maintenance request.');
            }
        });
    </script>
@endsection
