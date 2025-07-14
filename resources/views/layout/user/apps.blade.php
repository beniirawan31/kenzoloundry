<!DOCTYPE html>
<!--
Template name: Nova
Template author: FreeBootstrap.net
Author website: https://freebootstrap.net/
License: https://freebootstrap.net/license
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Nova Free Bootstrap Template for Agency &mdash; by FreeBootstrap.net </title>

    <!-- ======= Google Font =======-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet">
    <!-- End Google Font-->

    <!-- ======= Styles =======-->
    <link href="{{ asset('templete/landing/vendors/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('templete/landing/vendors/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('templete/landing/vendors/glightbox/glightbox.min.css" rel="stylesheet') }}">
    <link href="{{ asset('templete/landing/vendors/swiper/swiper-bundle.min.css" rel="stylesheet') }}">
    <link href="{{ asset('templete/landing/vendors/aos/aos.css') }}" rel="stylesheet">
    <!-- End Styles-->

    <!-- ======= Theme Style =======-->
    <link href="{{ asset('templete/landing/css/style.css') }}" rel="stylesheet">
    <!-- End Theme Style-->

    <!-- ======= Apply theme =======-->
    <script>
        // Apply the theme as early as possible to avoid flicker
        (function() {
            const storedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', storedTheme);
        })();
    </script>
</head>

<body>


    <!-- ======= Site Wrap =======-->
    <div class="site-wrap">


        <!-- ======= Header =======-->
        <header class="fbs__net-navbar navbar navbar-expand-lg dark" aria-label="freebootstrap.net navbar">
            <div class="container d-flex align-items-center justify-content-between">


                <!-- Start Logo-->
                <a class="navbar-brand w-auto" href="">
                    <!-- If you use a text logo, uncomment this if it is commented-->
                    <!-- Vertex-->

                    <!-- If you plan to use an image logo, uncomment this if it is commented-->

                    <!-- logo dark--><img class="logo dark img-fluid"
                        src="{{ asset('templete/landing/images/logo-dark.svg') }}"
                        alt="FreeBootstrap.net image placeholder">

                    <!-- logo light--><img class="logo light img-fluid"
                        src="{{ asset('templete/landing/images/logo-light.svg') }}"
                        alt="FreeBootstrap.net image placeholder">

                </a>
                <!-- End Logo-->

                <!-- Start offcanvas-->
                <div class="offcanvas offcanvas-start w-75" id="fbs__net-navbars" tabindex="-1"
                    aria-labelledby="fbs__net-navbarsLabel">
                    <div class="offcanvas-header">
                        <div class="offcanvas-header-logo">
                            <a class="logo-link" id="fbs__net-navbarsLabel" href="index.html">
                                <img class="logo dark img-fluid"
                                    src="{{ asset('templete/landing/images/logo-dark.svg') }}"
                                    alt="FreeBootstrap.net image placeholder">

                                <!-- logo light--><img class="logo light img-fluid"
                                    src="{{ asset('templete/landing/images/logo-light.svg') }}"
                                    alt="FreeBootstrap.net image placeholder"></a>

                        </div>
                        <button class="btn-close btn-close-black" type="button" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body align-items-lg-center">


                        <ul class="navbar-nav nav me-auto ps-lg-5 mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link scroll-link active" aria-current="page"
                                    href="#home">Home</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="#about">About</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="#pricing">Pricing</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="#how-it-works">How It Works</a>
                            </li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="#services">Services</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="#contact">Contact</a></li>
                        </ul>

                    </div>
                </div>
                <!-- End offcanvas-->

                <div class="ms-auto w-auto">


                    <ul class="navbar-nav ml-auto align-items-center">
                        @guest
                            <!-- Jika pengguna belum login -->
                            <li class="nav-item">
                                <a class="nav-link text-danger" href="">Login</a>
                            </li>
                            <li class="nav-item mx-1 text-danger">|</li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" href="">Register</a>
                            </li>
                        @else
                            <!-- Jika pengguna sudah login -->
                            <li class="nav-item d-flex align-items-center">
                                <img src="{{ asset('templete/landing/images/hero-img-1-min.jpg') }}" class="rounded-circle" height="36"
                                    width="36" alt="User Photo">
                                <div class="ms-2 d-none d-lg-block text-danger small">
                                    {{ auth()->user()->name }}
                                </div>
                            </li>
                        @endguest
                    </ul>



                </div>
            </div>
        </header>
        <!-- End Header-->
        <!-- ======= Main =======-->
        <main>




            @yield('content')


            <!-- End Footer-->

        </main>

    </div>

    <!-- ======= Back to Top =======-->
    <button id="back-to-top"><i class="bi bi-arrow-up-short"></i></button>
    <!-- End Back to top-->

    <!-- ======= Javascripts =======-->
    <script src="{{ asset('templete/landing/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('templete/landing/vendors/gsap/gsap.min.js') }}"></script>
    <script src="{{ asset('templete/landing/vendors/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('templete/landing/vendors/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('templete/landing/vendors/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ asset('templete/landing/vendors/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('templete/landing/vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('templete/landing/vendors/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('templete/landing/js/custom.js') }}"></script>
    <script src="{{ asset('templete/landing/js/send_email.js') }}"></script>
    <!-- End JavaScripts-->
</body>

</html>
