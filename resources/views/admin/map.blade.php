<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Map</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://js.arcgis.com/4.26/esri/themes/light/main.css" />
</head>

<body>
    @can('admin-access')
        @extends('layouts.Admin.app')
        @section('content')

        <div style="margin-top: 56px;" class="col-sm-12">
            <div id="viewDiv" style="height: 80vh; width: 90vw; margin: 0 auto;">
                <style>
                    #viewDiv {
                        padding: 0;
                        height: 80vh;
                        width: 90vw;
                        margin: 0 auto;
                    }

                    .leaflet-popup-content-wrapper {
                        background-color: #f5f5f5;
                        border-radius: 10px;
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                        padding: 10px;
                    }

                    .leaflet-popup-content {
                        font-size: 14px;
                        line-height: 1.5;
                    }

                    .leaflet-popup-tip {
                        background-color: #f5f5f5;
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                    }

                    .leaflet-popup-header {
                        font-size: 16px;
                        font-weight: bold;
                        margin-bottom: 10px;
                    }

                    .leaflet-popup-body {
                        display: flex;
                        flex-direction: column;
                        gap: 10px;
                    }

                    .leaflet-popup-item {
                        display: flex;
                        justify-content: space-between;
                    }

                    .leaflet-popup-label {
                        font-weight: bold;
                    }

                    .leaflet-popup-value {
                        font-size: 14px;
                    }
                </style>

                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
                <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

                <script>
                    var map = L.map('viewDiv').setView([18.35508, 121.64201], 15);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);

                    @foreach ($buildings as $building)
                        var popupContent = `<div class="leaflet-popup-header">{{ $building->building_name }}</div>
                        <div class="leaflet-popup-body">
                            <div class="leaflet-popup-item">
                                <div class="leaflet-popup-label">Building Type:</div>
                                <div class="leaflet-popup-value">{{ $building->building_type }}</div>
                            </div>
                            <div class="leaflet-popup-item">
                                <div class="leaflet-popup-label">Building Location:</div>
                                <div class="leaflet-popup-value">{{ $building->building_location }}</div>
                            </div>
                            <div class="leaflet-popup-item">
                                <div class="leaflet-popup-label">Building In-Charge:</div>
                                <div class="leaflet-popup-value">{{ $building->building_in_charge }}</div>
                            </div>
                            <div class="leaflet-popup-item">
                                <div class="leaflet-popup-label">Date of Completion:</div>
                                <div class="leaflet-popup-value">{{ \Carbon\Carbon::parse($building->date_of_completion)->format('Y-m-d') }}</div>
                            </div>
                        </div>`;

                        L.marker([{{ $building->lati }}, {{ $building->longti }}])
                            .addTo(map)
                            .bindPopup(popupContent);
                    @endforeach
                </script>
            </div>
        </div>



        @endsection
    @endcan
</body>

</html>

