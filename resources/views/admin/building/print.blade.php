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
                margin: 20px;
            }

            .no-print {
                display: none;
            }

            .table thead th {
                background-color: #ffffff !important;
                color: black !important;
            }

            .table-bordered th,
            .table-bordered td {
                border: 1px solid #000000 !important;
            }
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .table th {
            background-color: white;
            color: black;
        }

        body {
            margin: 20px;
            display: flex;
            flex-direction: column;
            min-height: 98vh;
        }

        .content {
            flex: 1;
        }

        .footer {
            font-size: 12px;
            color: gray;
            margin-top: auto;
        }

        .header {
            position: relative;
            text-align: center;
        }

        .header img {
            display: block;
            margin: 0 auto;
        }

        .header h5 {
            margin: 0;
        }

        .header .f-gso {
            position: absolute;
            top: 0;
            right: 0;
            border: 2px solid black;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('storage/logo/lgu_logo.png') }}" alt="Logo" width="100" height="100">
            <h5>REPUBLIC OF THE PHILIPPINES</h5>
            <h5>Local Government Unit of Aparri</h5>
            <h5>Aparri Cagayan</h5>
            <br>
            <h5>GENERAL SERVICES OFFICE</h5>
            {{-- <div class="f-gso">
                <h1>F-GSO-APA-81701</h1>
            </div> --}}
        </div>
        <button style="margin-top: 10px;" class="btn btn-danger no-print" onclick="window.print()">Print</button>
        <br>
        <hr style="border-top: 2px solid black;">
        <h4 class="text-center">BUILDING LIST</h4>
        <hr style="border-top: 2px solid black;">
        <div class="mt-4">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Building Name</th>
                            <th>Building Type</th>
                            <th>Building Structure</th>
                            {{-- <th>Building Cost</th>
                            <th>Building Barangay</th> --}}
                            <th>Building Location</th>
                            <th>Building In-Charge</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buildings->sortBy('barangay') as $building)
                            <tr>
                                <td>{{ $building->building_name }}</td>
                                <td>{{ $building->building_type }}</td>
                                <td>{{ $building->building_structure }}</td>
                                {{-- <td>{{ $building->building_cost }}</td>
                                <td>{{ $building->barangay }}</td> --}}
                                <td>{{ $building->building_location }}</td>
                                <td>{{ $building->building_in_charge }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>This is a system-generated report.</p>
        <p>Generated on: {{ \Carbon\Carbon::now()->format('Y-m-d') }}</p>
    </div>
</body>

</html>
