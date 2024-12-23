<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Completion Form</title>
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

            .container {
                width: 100%;
                margin: 0;
                padding: 0;
            }

            .row {
                display: flex;
                flex-wrap: wrap;
                margin-right: -15px;
                margin-left: -15px;
            }

            .col-md-6 {
                flex: 0 0 50%;
                max-width: 50%;
                padding-right: 15px;
                padding-left: 15px;
            }

            .col-md-12 {
                flex: 0 0 100%;
                max-width: 100%;
                padding-right: 15px;
                padding-left: 15px;
            }

            .footer {
                font-size: 12px;
                color: gray;
                margin-top: 20px;
            }
        }

        body {
            margin: 20px;
        }

        .footer {
            font-size: 12px;
            color: gray;
            margin-top: 20px;
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
            border: 1px solid black;
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
            <div class="f-gso">
                <h1>F-GSO-APA-81701</h1>
            </div>
        </div>
        <button style="margin-top: 10px;" class="btn btn-danger no-print" onclick="window.print()">Print</button>
        <br>
        <hr style="border-top: 2px solid black;">
        <h4 class="text-center">GENERAL SERVICES OFFICE</h4>
        <hr style="border-top: 2px solid black;">
        <div class="mt-4">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Name:</strong> {{ $completionForm->name }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Control No:</strong> {{ $completionForm->control_no }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Requesting Office:</strong> {{ $completionForm->requesting_office }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Date Requested:</strong> {{ $completionForm->date_requested }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Service Requested:</strong> {{ str_replace(',', ', ', $completionForm->service_requested) }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Location:</strong> {{ $completionForm->location }}</p>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>This is a system-generated report.</p>
            <p>Generated on: {{ \Carbon\Carbon::now()->format('Y-m-d') }}</p>
        </div>
    </div>
</body>

</html>
