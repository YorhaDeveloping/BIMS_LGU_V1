@can('admin-access')
    @extends('layouts.Admin.app')

    @section('content')
        <div class="py-4 text-center">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

                        <link
                            href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"
                            rel="stylesheet" />
                        <link rel="preconnect" href="https://fonts.googleapis.com" />
                        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
                        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap"
                            rel="stylesheet" />
                        <link rel="stylesheet" href="https://js.arcgis.com/4.26/esri/themes/light/main.css" />
                        <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                        @csrf

                        <style>
                            body {
                                font-family: 'Rubik', sans-serif;
                                background-color: #f9f9f9;
                            }

                            .container {
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                max-width: 1000px;
                                margin: 0 auto;
                                width: 100%;
                            }

                            .chart-heading {
                                color: #023047;
                                text-transform: uppercase;
                                font-size: 25px;
                                text-align: center;
                                margin: 5px 0;
                            }

                            .programming-stats {
                                display: flex;
                                flex-direction: row;
                                align-items: flex-start;
                                gap: 24px;
                                margin: 0 auto;
                                padding: 5px 20px;
                                color: #023047;
                                background-color: #fff;
                                width: 100%;
                                margin-top: 20px;
                            }

                            .chart-container {
                                width: 100%;
                                max-width: 500px;
                                position: relative;
                                height: 300px;
                            }

                            /* Media Queries for different screen sizes */
                            @media (max-width: 768px) {
                                .programming-stats {
                                    flex-direction: column;
                                    align-items: center;
                                }
                            }
                        </style>

                        <div class="container-fluid">
                            <div class="row">
                                <!-- Column for Chart -->
                                <div class="col-sm-6">
                                    <div class="programming-stats">
                                        <div class="chart-container">
                                            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                        </div>
                                    </div>

                                    @php
                                        // Count occurrences of each status
                                        $maintenanceStatuses = \App\Models\Admin\Maintenance::pluck('status');
                                        $statusCounts = [
                                            'Operational' => $maintenanceStatuses
                                                ->filter(fn($status) => $status === 'Operational')
                                                ->count(),
                                            'Under Renovation' => $maintenanceStatuses
                                                ->filter(fn($status) => $status === 'Under Renovation')
                                                ->count(),
                                            'Inactive' => $maintenanceStatuses
                                                ->filter(fn($status) => $status === 'Inactive')
                                                ->count(),
                                        ];

                                        // Format data points for CanvasJS
                                        $statusDataPoints = collect($statusCounts)
                                            ->map(function ($count, $status) {
                                                return ['label' => $status, 'y' => $count];
                                            })
                                            ->values()
                                            ->all();
                                    @endphp

                                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                    <script>
                                        window.onload = function() {
                                            const chart = new CanvasJS.Chart("chartContainer", {
                                                animationEnabled: true,
                                                theme: "light2",
                                                title: {
                                                    text: "Building Maintenance Status"
                                                },
                                                data: [{
                                                    type: "pie",
                                                    showInLegend: true,
                                                    legendText: "{label}",
                                                    toolTipContent: "<b>{label}</b>: {y} (#percent%)",
                                                    indexLabel: "{label} - {y}",
                                                    dataPoints: @json($statusDataPoints)
                                                }]
                                            });

                                            chart.render();
                                        }
                                    </script>
                                </div>

                                <!-- Column for Map -->
                                <div class="col-sm-6">
                                    <div class="chart-container" style="height: 300px; width: 100%; border: 1px solid #ddd;">
                                        <div id="mapContainer" style="height: 100%; width: 100%;"></div>
                                        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
                                        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
                                        @php
                                            $buildings = \App\Models\Admin\Building::all();
                                        @endphp
                                        <script>
                                            var map = L.map('mapContainer').setView([18.35508, 121.64201], 15);

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

                                <div class="col-sm-6">
                                    <div class="slideshow-container"
                                        style="height: 300px; width: 100%; border: 1px solid #ddd;">
                                        @foreach ($buildings as $building)
                                            <div class="mySlides" style="height: 300px; width: 100%;">
                                                <img src="{{ asset('storage/' . $building->image) }}"
                                                    style="height: 100%; width: 100%; object-fit: cover;">
                                                <p>{{ $building->building_name }}</p>
                                            </div>
                                        @endforeach



                                        <div class="caption-container">
                                            <p id="caption"></p>
                                        </div>
                                    </div>

                                    <script>
                                        var slideIndex = 0;
                                        showSlides();

                                        function plusSlides(n) {
                                            showSlides(slideIndex += n);
                                        }

                                        function currentSlide(n) {
                                            showSlides(slideIndex = n);
                                        }

                                        function showSlides() {
                                            var i;
                                            var slides = document.getElementsByClassName("mySlides");
                                            for (i = 0; i < slides.length; i++) {
                                                slides[i].style.display = "none";
                                            }
                                            slideIndex++;
                                            if (slideIndex > slides.length) {
                                                slideIndex = 1
                                            }
                                            slides[slideIndex - 1].style.display = "block";
                                            setTimeout(showSlides, 3000); // Change image every 3 seconds
                                        }
                                    </script>
                                </div>


                                <!-- Column for Calendar -->
                                <div class="col-sm-6">
                                    <div class="calendar" style="background-color: #f9f9f9; padding: 20px;">
                                        <div class="header" style="display: flex; justify-content: space-between; align-items: center;">
                                            <button id="prev"
                                                style="background-color: #4CAF50; color: white; border: none; padding: 10px 15px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 10px;">Previous</button>

                                            <h2 id="monthYear" style="font-size: 20px; font-weight: bold; color: #333;"></h2>
                                            <h2 id="todayDate" style="font-size: 20px; font-weight: bold; color: #333;"></h2>
                                            <button id="next"
                                                style="background-color: #4CAF50; color: white; border: none; padding: 10px 15px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 10px;">Next</button>
                                        </div>
                                        <div class="days" style="display: flex; justify-content: space-between; flex-wrap: wrap;">
                                            <div class="day-name" style="font-weight: bold; width: calc(100% / 7); text-align: center; padding: 10px; border: 1px solid #ddd; margin: 5px 0;">Sun</div>
                                            <div class="day-name" style="font-weight: bold; width: calc(100% / 7); text-align: center; padding: 10px; border: 1px solid #ddd; margin: 5px 0;">Mon</div>
                                            <div class="day-name" style="font-weight: bold; width: calc(100% / 7); text-align: center; padding: 10px; border: 1px solid #ddd; margin: 5px 0;">Tue</div>
                                            <div class="day-name" style="font-weight: bold; width: calc(100% / 7); text-align: center; padding: 10px; border: 1px solid #ddd; margin: 5px 0;">Wed</div>
                                            <div class="day-name" style="font-weight: bold; width: calc(100% / 7); text-align: center; padding: 10px; border: 1px solid #ddd; margin: 5px 0;">Thu</div>
                                            <div class="day-name" style="font-weight: bold; width: calc(100% / 7); text-align: center; padding: 10px; border: 1px solid #ddd; margin: 5px 0;">Fri</div>
                                            <div class="day-name" style="font-weight: bold; width: calc(100% / 7); text-align: center; padding: 10px; border: 1px solid #ddd; margin: 5px 0;">Sat</div>
                                            <div id="days" style="display: flex; flex-wrap: wrap;"></div>
                                        </div>
                                    </div>

                                    <div id="eventDetails" style="display: none; background-color: #fff; border: 1px solid #ddd; padding: 10px; margin-top: 10px;">
                                        <h3>Event Details</h3>
                                        <div id="eventContent"></div>
                                    </div>

                                    @php
                                        $maintenanceStatuses = \App\Models\Admin\Maintenance::all();
                                    @endphp

                                    <script>
                                        let today = new Date();
                                        let day = today.getDate();
                                        let month = today.getMonth() + 1; // 1-12
                                        let year = today.getFullYear();
                                        let daysInMonth = new Date(year, month, 0).getDate();

                                        // Update the month and year display
                                        function updateMonthYear() {
                                            let monthName = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
                                                "November", "December"][month - 1];
                                            document.getElementById("monthYear").innerHTML = `${monthName} ${year}`;
                                        }

                                        // Render the calendar days
                                        function renderCalendar() {
                                            // Update daysInMonth whenever month or year changes
                                            daysInMonth = new Date(year, month, 0).getDate();
                                            let days = document.getElementById("days");
                                            while (days.firstChild) {
                                                days.removeChild(days.firstChild);
                                            }

                                            for (let i = 1; i <= daysInMonth; i++) {
                                                let dayElement = document.createElement("div");
                                                dayElement.classList.add("day");
                                                dayElement.style.width = "calc(100% / 7)";
                                                dayElement.style.textAlign = "center";
                                                dayElement.style.padding = "10px";
                                                dayElement.style.border = "1px solid #ddd";
                                                dayElement.style.margin = "5px 0";
                                                dayElement.innerHTML = i;

                                                if (i === day && month === today.getMonth() + 1 && year === today.getFullYear()) {
                                                    dayElement.style.backgroundColor = "#4CAF50";
                                                    dayElement.style.color = "white";
                                                }

                                                let date = year + '-' + String(month).padStart(2, '0') + '-' + String(i).padStart(2, '0');
                                                let events = @json($maintenanceStatuses).filter(event => event.submittion_date === date);

                                                if (events.length > 0) {
                                                    dayElement.style.backgroundColor = "#ffc107";
                                                    dayElement.style.color = "white";
                                                    dayElement.style.cursor = "pointer";

                                                    dayElement.addEventListener("click", function() {
                                                        const eventContent = events.map(event => `
                                                            <p><strong>Event:</strong> ${event.buildings_name || "N/A"}</p>
                                                            <p><strong>Maintenance Type:</strong> ${event.maintenance_type || "N/A"}</p>
                                                            <p><strong>Status:</strong> ${event.status || "N/A"}</p>
                                                        `).join("");
                                                        document.getElementById("eventContent").innerHTML = eventContent;
                                                        const eventDetailsDiv = document.getElementById("eventDetails");
                                                        eventDetailsDiv.style.display = eventDetailsDiv.style.display === "none" ? "block" : "none";
                                                    });
                                                }

                                                days.appendChild(dayElement);
                                            }
                                        }

                                        // Event listeners for navigation buttons
                                        document.getElementById("prev").addEventListener("click", function() {
                                            if (month > 1) {
                                                month--;
                                            } else {
                                                month = 12;
                                                year--;
                                            }
                                            updateMonthYear();
                                            renderCalendar();
                                        });

                                        document.getElementById("next").addEventListener("click", function() {
                                            if (month < 12) {
                                                month++;
                                            } else {
                                                month = 1;
                                                year++;
                                            }
                                            updateMonthYear();
                                            renderCalendar();
                                        });

                                        updateMonthYear(); // Initial month/year display
                                        renderCalendar(); // Initial calendar rendering
                                    </script>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endcan
