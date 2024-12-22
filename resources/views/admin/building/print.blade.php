<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Buildings</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
            .table thead th {
                background-color: #007bff !important;
                color: white !important;
            }
            .table-bordered th, .table-bordered td {
                border: 1px solid #dee2e6 !important;
            }
            .no-print {
                display: none;
            }
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-between">
                        <h4 class="w-100"><i class="fa fa-bullhorn"></i> LGU APARRI - BUILDING INFORMATION</h4>
                        <button style="margin-top: 10px; margin-right: 10px; float: left;" class="btn btn-danger no-print" onclick="window.print()">Print</button>
                    </div>

                    <div class="table-responsive mt-4">
                        <table class="table table-bordered table-sm">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Building Name</th>
                                    <th>Building Type</th>
                                    <th>Building Location</th>
                                    <th>Building In-Charge</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($buildings as $building)
                                    <tr>
                                        <td>{{ $building->building_name }}</td>
                                        <td>{{ $building->building_type }}</td>
                                        <td>{{ $building->barangay }}</td>
                                        <td>{{ $building->building_in_charge }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
