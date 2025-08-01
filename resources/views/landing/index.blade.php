<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>KenzoLoundry</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- Favicons -->
    <link href="{{ url('assets-user') }}/img/Monev.png" rel="icon">
    <link href="{{ url('assets-user') }}/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ url('assets-user') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('assets-user') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ url('assets-user') }}/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ url('assets-user') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ url('assets-user') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="{{ url('assets-user') }}/css/main.css" rel="stylesheet">
    <style>
        .testimonial-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin: 0 auto 15px;
            display: block;
        }

        .testimonial-item {
            background: #fff;
            padding: 30px 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 2px 24px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .testimonial-item h3 {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
        }

        .testimonial-item .stars {
            margin: 10px 0;
            color: #ffc107;
        }

        .testimonial-item p {
            font-style: italic;
            color: #555;
        }
    </style>
</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center fixed-top bg-white shadow-sm">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <!-- Kiri: Logo -->
            <div class="d-flex align-items-center me-auto">
                <a href="#hero" class="logo d-flex align-items-center">
                    <img src="{{ url('assets-user/img/monevv.png') }}" alt="Logo Monevv" height="60">
                </a>
            </div>

            <!-- Tengah: Navigation -->
            <nav id="navmenu" class="navmenu d-none d-xl-flex align-items-center mx-auto">
                <ul class="d-flex align-items-center gap-3 mb-0 list-unstyled">
                    <li><a href="#hero" class="nav-link active">Home</a></li>
                    <li><a href="#about" class="nav-link">Tentang KenzoLoundry</a></li>
                    <li><a href="#fitur" class="nav-link">Fitur</a></li>
                    <li><a href="#inovasi" class="nav-link">Inovasi</a></li>
                    <li><a href="#testimonials" class="nav-link">testimoni</a></li>
                    <li><a href="#contact" class="nav-link">contact</a></li>
                </ul>
            </nav>

            <!-- Kanan: Login Button -->
            <div class="d-flex align-items-center ms-auto">
                <a class="btn btn-primary" href="{{route('login')}}">Login Sekarang</a>
            </div>

            <!-- Mobile Nav Toggle -->
            <i class="mobile-nav-toggle d-xl-none bi bi-list ms-3"></i>

        </div>
    </header>

    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                            <h1 class="mb-4 fw-bold"
                                style="color: #007bff; font-family: 'Poppins', sans-serif; font-size: 3rem;">
                                Selamat Datang di
                            </h1>
                            <h1 class="mb-4 fw-bold"
                                style="color: #007bff; font-family: 'Poppins', sans-serif; font-size: 3rem;">
                                KenzoLoundry
                            </h1>
                            <p class="mb-4 mb-md-5">
                                Sistem Informasi Monitoring dan Evaluasi Inovasi Kota Padang Panjang sebagai wujud
                                komitmen dalam mendukung inovasi daerah secara digital, transparan, dan berkelanjutan.
                            </p>
                            <div class="hero-buttons">
                                <a href="https://youtu.be/6PxwXbr1VqM"
                                    class="btn d-inline-flex align-items-center text-white glightbox"
                                    style="
                              background: linear-gradient(135deg, #00bfff, #007bff);
                              padding: 10px 20px;
                              font-size: 1rem;
                              border-radius: 40px;
                              text-decoration: none;
                              font-weight: 500;
                              transition: background 0.3s ease;
                              ">
                                    <i class="bi bi-play-circle me-2" style="font-size: 1.1rem;"></i>
                                    Play Video
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                            <img src="{{ url('assets-user') }}/img/logokenzo.jpg" alt="Hero Image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
        </section>
        <!-- /Hero Section -->
        <!-- About Section -->
        <section id="about" class="about section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 align-items-center justify-content-between">
                    <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                        <span class="about-meta">Tentang E Monev</span>
                        <h2 class="about-title">Platform Digital untuk Monitoring dan Evaluasi Inovasi</h2>
                        <p class="about-description"> KenzoLoundry adalah sistem informasi berbasis web yang dirancang
                            untuk membantu instansi pemerintah, khususnya Kota Padang Panjang, dalam memantau,
                            mengevaluasi, dan melaporkan inovasi dari seluruh OPD secara efisien, transparan, dan
                            terstruktur.</p>
                        <div class="row feature-list-wrapper">
                            <div class="col-md-6">
                                <ul class="feature-list">
                                    <li><i class="bi bi-check-circle-fill"></i> Pengelolaan data inovasi terpusat</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Monitoring progres inovasi secara
                                        real-time</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Evaluasi otomatis berbasis indikator
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="feature-list">
                                    <li><i class="bi bi-check-circle-fill"></i> Laporan PDF yang bisa dicetak langsung
                                    </li>
                                    <li><i class="bi bi-check-circle-fill"></i> Akses pengguna disesuaikan berdasarkan
                                        peran dan tanggung jawab</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Notifikasi untuk deadline evaluasi</li>
                                </ul>
                            </div>
                        </div>
                        <div class="info-wrapper">
                            <div class="row gy-4">
                                <div class="col-lg-5">
                                    <div class="profile d-flex align-items-center gap-3">
                                        <img src="{{ url('assets-user') }}/img/logokenzo.jpg" alt="CEO Profile"
                                            class="profile-image">
                                        <div>
                                            <h4 class="profile-name"> Kenzo Loundry</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="contact-info d-flex align-items-center gap-2">
                                        <i class="bi bi-telephone-fill"></i>
                                        <div>
                                            <p class="contact-label">Hubungi Kami</p>
                                            <p class="contact-number">(0752) 82815</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="image-wrapper">
                            <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                                <img src="{{ url('assets-user') }}/img/logokenzo.jpg" alt="Business Meeting"
                                    class="img-fluid main-image rounded-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /About Section -->
        <!-- Fitur Section -->
        <section id="fitur" class="fitur section bg-light py-4">
            <!-- Section Title -->
            <div class="container section-title text-center mb-3" data-aos="fade-up">
                <h2 class="mb-1">Fitur</h2>
                <p class="text-muted mb-2">Mudah, Cepat, dan Terpantau – Semua dalam Genggaman.</p>
            </div>

            <div class="container">
                <div class="d-flex justify-content-center mb-2">
                    <ul class="nav nav-tabs border-0" data-aos="fade-up" data-aos-delay="100">
                        <li class="nav-item">
                            <button class="nav-link active show bg-primary text-white rounded mx-1 px-4 py-2"
                                data-bs-toggle="tab" data-bs-target="#features-tab-1">
                                <h5 class="m-0 text-white">Pemesanan & Tracking</h5>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link bg-success text-white rounded mx-1 px-4 py-2" data-bs-toggle="tab"
                                data-bs-target="#features-tab-2">
                                <h5 class="m-0 text-white">Layanan Antar-Jemput</h5>
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link bg-warning text-white rounded mx-1 px-4 py-2" data-bs-toggle="tab"
                                data-bs-target="#features-tab-3">
                                <h5 class="m-0 text-white">Laporan & Notifikasi</h5>
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content mt-3" data-aos="fade-up" data-aos-delay="200">

                    <!-- Tab 1: Pemesanan & Tracking -->
                    <div class="tab-pane fade active show" id="features-tab-1">
                        <div class="row align-items-center mb-4">
                            <div class="col-lg-6">
                                <h3 class="text-primary mb-2">Pemesanan & Pelacakan Real-Time</h3>
                                <p class="fst-italic mb-2">
                                    KenzoLoundry memudahkan pelanggan memesan layanan laundry langsung dari aplikasi,
                                    dan memantau prosesnya secara real-time.
                                </p>
                                <ul class="mb-2">
                                    <li>Booking online dengan jadwal fleksibel sesuai kebutuhan pelanggan.</li>
                                    <li>Tracking proses cucian dari penjemputan hingga pengantaran.</li>
                                    <li>Update status cucian secara otomatis melalui aplikasi atau WhatsApp.</li>
                                </ul>
                            </div>
                            <div class="col-lg-5 text-center">
                                <img src="{{ url('assets-user') }}/img/pemesanan.png" alt="Pemesanan Laundry"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <!-- Tab 2: Antar-Jemput -->
                    <div class="tab-pane fade" id="features-tab-2">
                        <div class="row align-items-center mb-4">
                            <div class="col-lg-6">
                                <h3 class="text-success mb-2">Layanan Antar-Jemput Gratis</h3>
                                <p class="fst-italic mb-2">
                                    Kami menawarkan layanan antar-jemput laundry secara gratis untuk memberikan
                                    kenyamanan maksimal.
                                </p>
                                <ul class="mb-2">
                                    <li>Kurir kami siap menjemput cucian langsung ke rumah atau kantor pelanggan.</li>
                                    <li>Jadwal fleksibel & dapat disesuaikan melalui aplikasi.</li>
                                    <li>Dukungan GPS & pelacakan posisi kurir secara langsung.</li>
                                </ul>
                            </div>
                            <div class="col-lg-5 text-center">
                                <img src="{{ url('assets-user') }}/img/antarjemput.png" alt="Antar Jemput"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <!-- Tab 3: Laporan & Notifikasi -->
                    <div class="tab-pane fade" id="features-tab-3">
                        <div class="row align-items-center mb-4">
                            <div class="col-lg-6">
                                <h3 class="text-warning mb-2">Laporan & Notifikasi Otomatis</h3>
                                <ul class="mb-2">
                                    <li>Notifikasi dikirim otomatis saat cucian selesai atau dalam proses pengantaran.
                                    </li>
                                    <li>Struk digital dan ringkasan transaksi langsung masuk ke email atau aplikasi.
                                    </li>
                                    <li>Laporan pemakaian berkala untuk pelanggan loyal dan corporate.</li>
                                </ul>
                                <p class="fst-italic mb-0">
                                    Semua komunikasi berlangsung otomatis & efisien, membuat pengalaman pelanggan
                                    semakin nyaman.
                                </p>
                            </div>
                            <div class="col-lg-5 text-center">
                                <img src="{{ url('assets-user') }}/img/notifikasi.png" alt="Notifikasi"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- /Fitur Section -->
        <!-- Features 2 Section -->
        <section id="inovasi" class="features-2 section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="200">
                            <div class="d-flex align-items-center justify-content-end gap-4">
                                <div class="feature-content">
                                    <h3>Akses Fleksibela</h3>
                                    <p>E MONEV dapat diakses melalui berbagai perangkat seperti komputer, tablet, dan
                                        smartphone untuk memantau inovasi kapan saja dan di mana saja</p>
                                </div>
                                <div class="feature-icon flex-shrink-0">
                                    <i class="bi bi-phone"></i>
                                </div>
                            </div>
                        </div>
                        <!-- End .feature-item -->
                        <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="300">
                            <div class="d-flex align-items-center justify-content-end gap-4">
                                <div class="feature-content">
                                    <h3>Indikator Inovatif</h3>
                                    <p>E MONEV dilengkapi indikator evaluasi inovasi yang sistematis dan terukur untuk
                                        memastikan inovasi berjalan efektif dan berdampak nyata</p>
                                </div>
                                <div class="feature-icon flex-shrink-0">
                                    <i class="bi bi-lightbulb"></i>
                                </div>
                            </div>
                        </div>
                        <!-- End .feature-item -->
                        <div class="feature-item text-end" data-aos="fade-right" data-aos-delay="400">
                            <div class="d-flex align-items-center justify-content-end gap-4">
                                <div class="feature-content">
                                    <h3>Pantauan Real-Time</h3>
                                    <p>Setiap perkembangan inovasi dapat dipantau secara langsung dan real-time, lengkap
                                        dengan status, progres, serta notifikasi penting</p>
                                </div>
                                <div class="feature-icon flex-shrink-0">
                                    <i class="bi bi-speedometer2"></i>
                                </div>
                            </div>
                        </div>
                        <!-- End .feature-item -->
                    </div>
                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="phone-mockup text-center">
                            <img src="{{ url('assets-user') }}/img/animasi.png" alt="Phone Mockup"
                                class="img-fluid">
                        </div>
                    </div>
                    <!-- End Phone Mockup -->
                    <div class="col-lg-4">
                        <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="200">
                            <div class="d-flex align-items-center gap-4">
                                <div class="feature-icon flex-shrink-0">
                                    <i class="bi bi-code-square"></i>
                                </div>
                                <div class="feature-content">
                                    <h3>Sistem Valid & Andal</h3>
                                    <p>Seluruh komponen E MONEV dibangun berdasarkan standar pengembangan sistem yang
                                        valid dan andal untuk menjamin keakuratan data inovasi.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End .feature-item -->
                        <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="300">
                            <div class="d-flex align-items-center gap-4">
                                <div class="feature-icon flex-shrink-0">
                                    <i class="bi bi-puzzle"></i>
                                </div>
                                <div class="feature-content">
                                    <h3>Responsif & Modern</h3>
                                    <p>Tampilan antarmuka E MONEV dirancang secara responsif dan modern, sehingga nyaman
                                        digunakan oleh semua pengguna dari berbagai perangkat.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End .feature-item -->
                        <div class="feature-item" data-aos="fade-left" data-aos-delay="400">
                            <div class="d-flex align-items-center gap-4">
                                <div class="feature-icon flex-shrink-0">
                                    <i class="bi bi-globe"></i>
                                </div>
                                <div class="feature-content">
                                    <h3>Kompatibel Multi-Browser</h3>
                                    <p>E MONEV dapat diakses melalui berbagai browser populer seperti Chrome, Firefox,
                                        dan Edge tanpa mengurangi performa dan fungsionalitas.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End .feature-item -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /Features 2 Section -->
        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row content justify-content-center align-items-center position-relative"
                    style="background: linear-gradient(135deg, #e0f2ff, #f0fbff); padding: 40px 20px; border-radius: 12px;">
                    <div class="col-lg-8 mx-auto text-center">
                        <h2 class="mb-3" style="color: #0056b3; font-weight: 600; font-size: 1.75rem;">
                            Inovasi Lebih Mudah, Pantau Lebih Cepat
                        </h2>
                        <p class="mb-3" style="color: #333; font-size: 1rem; line-height: 1.6;">
                            Dengan KenzoLoundry, instansi Anda dapat memantau dan mengevaluasi inovasi secara real-time,
                            fleksibel, dan terintegrasi. Sistem kami dirancang modern, responsif, dan kompatibel di
                            berbagai perangkat.
                        </p>
                        <a href="#" class="btn btn-cta"
                            style="background-color: #007bff; color: #fff; padding: 10px 24px; border-radius: 8px; font-size: 0.95rem;">
                            Mulai Sekarang
                        </a>
                    </div>
                </div>
                <!-- Abstract Background Elements -->
                <div class="shape shape-1">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M47.1,-57.1C59.9,-45.6,68.5,-28.9,71.4,-10.9C74.2,7.1,71.3,26.3,61.5,41.1C51.7,55.9,35,66.2,16.9,69.2C-1.3,72.2,-21,67.8,-36.9,57.9C-52.8,48,-64.9,32.6,-69.1,15.1C-73.3,-2.4,-69.5,-22,-59.4,-37.1C-49.3,-52.2,-32.8,-62.9,-15.7,-64.9C1.5,-67,34.3,-68.5,47.1,-57.1Z"
                            transform="translate(100 100)"></path>
                    </svg>
                </div>
                <div class="shape shape-2">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M41.3,-49.1C54.4,-39.3,66.6,-27.2,71.1,-12.1C75.6,3,72.4,20.9,63.3,34.4C54.2,47.9,39.2,56.9,23.2,62.3C7.1,67.7,-10,69.4,-24.8,64.1C-39.7,58.8,-52.3,46.5,-60.1,31.5C-67.9,16.4,-70.9,-1.4,-66.3,-16.6C-61.8,-31.8,-49.7,-44.3,-36.3,-54C-22.9,-63.7,-8.2,-70.6,3.6,-75.1C15.4,-79.6,28.2,-58.9,41.3,-49.1Z"
                            transform="translate(100 100)"></path>
                    </svg>
                </div>
                <!-- Dot Pattern Groups -->
                <div class="dots dots-1">
                    <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <pattern id="dot-pattern" x="0" y="0" width="20" height="20"
                            patternUnits="userSpaceOnUse">
                            <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                        </pattern>
                        <rect width="100" height="100" fill="url(#dot-pattern)"></rect>
                    </svg>
                </div>
                <div class="dots dots-2">
                    <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <pattern id="dot-pattern-2" x="0" y="0" width="20" height="20"
                            patternUnits="userSpaceOnUse">
                            <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                        </pattern>
                        <rect width="100" height="100" fill="url(#dot-pattern-2)"></rect>
                    </svg>
                </div>
                <div class="shape shape-3">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M43.3,-57.1C57.4,-46.5,71.1,-32.6,75.3,-16.2C79.5,0.2,74.2,19.1,65.1,35.3C56,51.5,43.1,65,27.4,71.7C11.7,78.4,-6.8,78.3,-23.9,72.4C-41,66.5,-56.7,54.8,-65.4,39.2C-74.1,23.6,-75.8,4,-71.7,-13.2C-67.6,-30.4,-57.7,-45.2,-44.3,-56.1C-30.9,-67,-15.5,-74,0.7,-74.9C16.8,-75.8,33.7,-70.7,43.3,-57.1Z"
                            transform="translate(100 100)"></path>
                    </svg>
                </div>
            </div>
            </div>
        </section>
        <!-- /Call To Action Section -->
        <!-- Clients Section -->
        <section id="clients" class="clients section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                    {
                       "loop": true,
                       "speed": 600,
                       "autoplay": {
                         "delay": 5000
                       },
                       "slidesPerView": "auto",
                       "pagination": {
                         "el": ".swiper-pagination",
                         "type": "bullets",
                         "clickable": true
                       },
                       "breakpoints": {
                         "320": {
                           "slidesPerView": 2,
                           "spaceBetween": 40
                         },
                         "480": {
                           "slidesPerView": 3,
                           "spaceBetween": 60
                         },
                         "640": {
                           "slidesPerView": 4,
                           "spaceBetween": 80
                         },
                         "992": {
                           "slidesPerView": 6,
                           "spaceBetween": 120
                         }
                       }
                     }
                  </script>
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="{{ url('assets-user') }}/img/clients/client-1.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ url('assets-user') }}/img/clients/client-2.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ url('assets-user') }}/img/clients/client-3.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ url('assets-user') }}/img/clients/client-4.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ url('assets-user') }}/img/clients/client-5.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ url('assets-user') }}/img/clients/client-6.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ url('assets-user') }}/img/clients/client-7.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ url('assets-user') }}/img/clients/client-8.png"
                                class="img-fluid" alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <!-- Testimonials Section -->
            <section id="testimonials" class="testimonials section light-background">
                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Testimoni Pengguna</h2>
                    <p>Pendapat para pengguna KenzoLoundry yang telah merasakan manfaat dalam memantau, mengevaluasi,
                        dan melaporkan inovasi secara digital, cepat, dan akurat</p>
                </div>
                <!-- End Section Title -->
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="testimonial-item">
                                <img src="{{ url('assets-user') }}/img/testimonials/dhea.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Dhea Aprillia</h3>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Dengan hadirnya KenzoLoundry, proses evaluasi inovasi di instansi kami menjadi
                                        jauh lebih terstruktur dan efisien</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                        <!-- End testimonial item -->
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="testimonial-item">
                                <img src="{{ url('assets-user') }}/img/testimonials/putri.jpg"
                                    class="testimonial-img" alt="">
                                <h3>Rj.Saputri</h3>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Saya sangat terkesan dengan tampilan antarmuka KenzoLoundry. Desainnya modern,
                                        ringan, dan responsif di semua perangkat. Hal ini memudahkan saya dalam
                                        mendampingi tim inovator saat proses input dan evaluasi data</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                        <!-- End testimonial item -->
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="testimonial-item">
                                <img src="{{ url('assets-user') }}/img/testimonials/mega.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Megha Asteria</h3>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>KenzoLoundry memudahkan kami dalam memantau perkembangan inovasi secara
                                        real-time</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                        <!-- End testimonial item -->
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="testimonial-item">
                                <img src="{{ url('assets-user') }}/img/testimonials/yolanda.jpg"
                                    class="testimonial-img" alt="">
                                <h3>Yolanda R</h3>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>KenzoLoundry sangat membantu kami mengelola data inovasi dengan mudah dan
                                        terorganisir</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                        <!-- End testimonial item -->
                    </div>
                </div>
            </section>
            <!-- /Testimonials Section -->
            <!-- ======= Contact =======-->
            <section class="section contact__v2" id="contact">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-7 mx-auto text-center"><span class="subtitle text-uppercase mb-3"
                                data-aos="fade-up" data-aos-delay="0">Contact</span>
                            <h2 class="h2 fw-bold mb-3" data-aos="fade-up" data-aos-delay="0">Contact Us</h2>
                            <p data-aos="fade-up" data-aos-delay="100">Utilize our tools to develop your concepts and
                                bring your vision to life. Once complete, effortlessly share your creations.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex gap-5 flex-column">

                                <div class="d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="100">
                                    <div class="icon d-block"><i class="bi bi-send"></i></div><span> <span
                                            class="d-block">Email</span><strong>info@mydomain.com</strong></span>
                                </div>
                                <div class="d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="200">
                                    <div class="icon d-block"><i class="bi bi-geo-alt"></i></div><span> <span
                                            class="d-block">Address</span>
                                        <address class="fw-bold">123 Main Street Apt 4B Springfield, <br> IL 62701
                                            United States</address>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                                <form id="contactForm">
                                    <div class="row gap-3 mb-3">
                                        <div class="col-md-12">
                                            <label class="mb-2" for="name">Name</label>
                                            <input class="form-control" id="name" type="text" name="name"
                                                required="">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-2" for="email">Email</label>
                                            <input class="form-control" id="email" type="email" name="email"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="row gap-3 mb-3">
                                        <div class="col-md-12">
                                            <label class="mb-2" for="subject">Subject</label>
                                            <input class="form-control" id="subject" type="text"
                                                name="subject">
                                        </div>
                                    </div>
                                    <div class="row gap-3 gap-md-0 mb-3">
                                        <div class="col-md-12">
                                            <label class="mb-2" for="message">Message</label>
                                            <textarea class="form-control" id="message" name="message" rows="5" required=""></textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary fw-semibold" type="submit">Send Message</button>
                                </form>
                                <div class="mt-3 d-none alert alert-success" id="successMessage">Message sent
                                    successfully!</div>
                                <div class="mt-3 d-none alert alert-danger" id="errorMessage">Message sending failed.
                                    Please try again later.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Contact-->

            <!-- ======= Footer =======-->
            <footer class="footer pt-5 pb-5">
                <div class="container">
                    <div class="row justify-content-between mb-5 g-xl-5">
                        <div class="col-md-4 mb-5 mb-lg-0">
                            <h3 class="mb-3">About</h3>
                            <p class="mb-4">Utilize our tools to develop your concepts and bring your vision to life.
                                Once complete, effortlessly share your creations.</p>
                        </div>
                        <div class="col-md-7">
                            <div class="row g-2">
                                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                                    <h3 class="mb-3">Company</h3>
                                    <ul class="list-unstyled">
                                        <li><a href="page-about.html">Leadership</a></li>
                                        <li><a href="page-careers.html">Careers <span class="badge ms-1">we're
                                                    hiring</span></a></li>
                                        <li><a href="page-case-studies.html">Case Studies</a></li>
                                        <li><a href="page-terms-conditions.html">Terms &amp; Conditions</a></li>
                                        <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                        <li><a href="page-404.html">404 page</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                                    <h3 class="mb-3">Accounts</h3>
                                    <ul class="list-unstyled">
                                        <li><a href="page-signup.html">Register</a></li>
                                        <li><a href="page-signin.html">Sign in</a></li>
                                        <li><a href="page-forgot-password.html">Fogot Password</a></li>
                                        <li><a href="page-coming-soon.html">Coming soon</a></li>
                                        <li><a href="page-portfolio-masonry.html">Portfolio Masonry</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 quick-contact">
                                    <h3 class="mb-3">Contact</h3>
                                    <p class="d-flex mb-3"><i class="bi bi-geo-alt-fill me-3"></i><span>123 Main
                                            Street Apt 4B Springfield, <br> IL 62701 United States</span></p><a
                                        class="d-flex mb-3" href="mailto:info@mydomain.com"><i
                                            class="bi bi-envelope-fill me-3"></i><span>info@mydomain.com</span></a><a
                                        class="d-flex mb-3" href="tel://+123456789900"><i
                                            class="bi bi-telephone-fill me-3"></i><span>+1 (234) 5678 9900</span></a><a
                                        class="d-flex mb-3" href="https://freebootstrap.net"><i
                                            class="bi bi-globe me-3"></i><span>FreeBootstrap.net</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row credits pt-3">
                        <div class="col-xl-8 text-center text-xl-start mb-3 mb-xl-0">
                            <!--
                Note:
                =>>> Please keep all the footer links intact. <<<=
                =>>> You can only remove the links if you buy the pro version. <<<=
                =>>> Buy the pro version, which includes a functional PHP/AJAX contact form and many additional features.: https://freebootstrap.net/template/vertex-pro-bootstrap-website-template-for-portfolio/ <<<=
                -->
                            &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> Nova.
                            All rights reserved. Designed with <i class="bi bi-heart-fill text-danger"></i> by <a
                                href="https://freebootstrap.net">FreeBootstrap.net</a>
                        </div>
                        <div
                            class="col-xl-4 justify-content-start justify-content-xl-end quick-links d-flex flex-column flex-xl-row text-center text-xl-start gap-1">
                            Distributed by<a href="https://themewagon.com" target="_blank">ThemeWagon</a></div>
                    </div>
                </div>
            </footer>
            </a>
            </div>
            </div>
            </div>
            </div>

            <!-- Scroll Top -->
            <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
                    class="bi bi-arrow-up-short"></i></a>
            <!-- Vendor JS Files -->
            <script src="{{ url('assets-user') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="{{ url('assets-user') }}/vendor/php-email-form/validate.js"></script>
            <script src="{{ url('assets-user') }}/vendor/aos/aos.js"></script>
            <script src="{{ url('assets-user') }}/vendor/glightbox/js/glightbox.min.js"></script>
            <script src="{{ url('assets-user') }}/vendor/swiper/swiper-bundle.min.js"></script>
            <script src="{{ url('assets-user') }}/vendor/purecounter/purecounter_vanilla.js"></script>
            <!-- Main JS File -->
            <script src="{{ url('assets-user') }}/js/main.js"></script>
</body>

</html>
