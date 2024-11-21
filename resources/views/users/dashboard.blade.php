@can('user-access')
    @extends('layouts.Users.app')

    @section('content')

        @php
            $buildings = \App\Models\Admin\Building::all();

        @endphp

        <div class="py-4 text-center">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="card p-2">LGU-Aparri BUILDINGS</h2>
                        <div class="slideshow-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slideshow-container"
                                    style="height: 500px; width: 100%; border: 1px solid #ddd;">
                                    @foreach ($buildings as $building)
                                        <div class="mySlides" style="height: 500px; width: 100%;">
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
                            </div>
                        </div>
                    </div>
                    <br>

                    <div style="text-align:center">
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>

                    <script>
                        let slideIndex = 0;
                        showSlides();

                        function showSlides() {
                            let i;
                            let slides = document.getElementsByClassName("mySlides");
                            let dots = document.getElementsByClassName("dot");
                            for (i = 0; i < slides.length; i++) {
                                slides[i].style.display = "none";
                            }
                            slideIndex++;
                            if (slideIndex > slides.length) {
                                slideIndex = 1
                            }
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" active", "");
                            }
                            slides[slideIndex - 1].style.display = "block";
                            dots[slideIndex - 1].className += " active";
                            setTimeout(showSlides, 2000); // Change image every 2 seconds
                        }
                    </script>

                </div>
            </div>
        </div>
    @endsection
@endcan

