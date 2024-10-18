@can('user-access')
    @extends('layouts.Users.app')

        @section('content')

        <div class="py-4 text-center">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="card p-2">CSU-Aparri BUILDINGS</h2>

                        <div class="slideshow-container">
    <div class="row">
        <div class="">
            <div class="mySlides text-center">
                <img src="{{ asset('logo/gym.jpg') }}" class="mx-auto rounded" width="600px" height="45vh">
                <div class= "text  p-3"> <h5>CSU A GYMPLEX</h5>
                <p class="card p-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam beatae a explicabo omnis dolor sequi maxime, vitae illo doloremque doloribus expedita
                        voluptas quod! Iusto quasi, dicta commodi architecto dolor ipsa!</p> 
                </div>
            </div>
                <div class="mySlides text-center">
                    <img src="{{ asset('logo/collegeofchm.jpg') }}" class="mx-auto rounded" width="600px" height="45vh">
                    <div class="text p-3" ><h5>COLLEGE OF HOSPITALITY MANAGEMENT</h5>
                       <p class="card p-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam beatae a explicabo omnis dolor sequi maxime, vitae illo doloremque doloribus expedita
                        voluptas quod! Iusto quasi, dicta commodi architecto dolor ipsa!</p> 
                    </div>
                </div>

                <div class="mySlides">
                    <img src="{{ asset('logo/it.jpg') }}" class="mx-auto rounded" width="600px" height="45vh">
                    <div class="text p-3"><h5>COLLEGE OF INFORMATION AND COMPUTING SCIENCES</h5>
                    <p class="card p-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam beatae a explicabo omnis dolor sequi maxime, vitae illo doloremque doloribus expedita
                        voluptas quod! Iusto quasi, dicta commodi architecto dolor ipsa!</p> 
                    </div>
                </div>

                <div class="mySlides">
                    <img src="{{ asset('logo/gat.jpg') }}" class="mx-auto" width="600px" height="45vh">
                    <div class="text p-3"><h5>GATCHALIAN BUILDING</h5>
                    <p class="card p-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam beatae a explicabo omnis dolor sequi maxime, vitae illo doloremque doloribus expedita
                        voluptas quod! Iusto quasi, dicta commodi architecto dolor ipsa!</p> 
                    </div>
                </div>
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
                                if (slideIndex > slides.length) { slideIndex = 1 }
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
        </div>


    @endsection
@endcan
