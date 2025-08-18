<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Kenzo Laundry</title>
    <meta name="description"
        content="Sistem Informasi Laundry Kenzo - Layanan laundry profesional dengan pemantauan real-time">
    <meta name="keywords" content="laundry, cuci pakaian, antar jemput laundry, kenzo laundry">
    <!-- Favicons -->
    <link href="{{ url('assets-user') }}/img/Monev.png" rel="icon">
    <link href="{{ url('assets-user') }}/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
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
        /* Color Variables */
        :root {
            --primary-color: #006A67;
            /* Dark Teal */
            --secondary-color: #A64D79;
            /* Plum Purple */
            --accent-color: #FFD700;
            /* Gold */
            --dark-blue: #003161;
            /* Navy Blue */
            --light-bg: #f8f9fa;
            /* Light background */
            --text-dark: #333;
            /* Dark text */
            --text-light: #f8f9fa;
            /* Light text */
            --card-bg: #fff;
            /* White for cards */
        }

        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            background-color: var(--light-bg);
        }

        /* Header Styles */
        .custom-header {
            background: linear-gradient(135deg, var(--dark-blue), var(--secondary-color), var(--primary-color));
            color: var(--text-light);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .custom-header .nav-link {
            color: var(--text-light) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 4px;
        }

        .custom-header .nav-link:hover,
        .custom-header .nav-link.active {
            color: var(--accent-color) !important;
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Button Styles */
        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #8e3f66;
            border-color: #8e3f66;
        }

        .btn-outline-primary {
            border-color: var(--secondary-color);
            color: var(--secondary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--secondary-color);
            color: white;
        }

        .btn-accent {
            background-color: var(--accent-color);
            color: var(--dark-blue);
            font-weight: 600;
        }

        .btn-accent:hover {
            background-color: #e6c200;
            color: var(--dark-blue);
        }

        /* Section Styles */
        .section {
            padding: 5rem 0;
        }

        .section-title {
            margin-bottom: 3rem;
        }

        .section-title h2 {
            color: var(--primary-color);
            font-weight: 700;
            position: relative;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 50%;
            height: 3px;
            background: var(--accent-color);
            bottom: -10px;
            left: 25%;
        }

        .section-title p {
            color: #666;
            font-size: 1.1rem;
        }

        /* Hero Section */
        #hero {
            background: linear-gradient(135deg, var(--dark-blue), var(--secondary-color), var(--primary-color));
            color: white;
            padding: 7rem 0;
        }

        #hero h1 {
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--accent-color);
        }

        #hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        /* About Section */
        #about {
            background-color: white;
        }

        #about .about-meta {
            color: var(--secondary-color);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
        }

        #about .about-title {
            color: var(--primary-color);
            font-weight: 700;
        }

        #about .about-description {
            color: #555;
            line-height: 1.8;
        }

        /* Features Section */
        #fitur {
            background-color: var(--light-bg);
        }

        .feature-item {
            padding: 2rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            background-color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .feature-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .feature-item i {
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .feature-item h3 {
            color: var(--primary-color);
            font-weight: 600;
        }

        /* Testimonials */
        #testimonials {
            background-color: white;
        }

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
            background: var(--card-bg);
            padding: 30px 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 2px 24px rgba(0, 0, 0, 0.05);
            height: 100%;
            transition: all 0.3s ease;
        }

        .testimonial-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .testimonial-item h3 {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
            color: var(--primary-color);
        }

        .testimonial-item .stars {
            margin: 10px 0;
            color: var(--accent-color);
        }

        .testimonial-item p {
            font-style: italic;
            color: #666;
        }

        /* Contact Section */
        #contact {
            background: linear-gradient(135deg, var(--dark-blue), var(--secondary-color), var(--primary-color));
            color: white;
        }

        .contact__v2 .form-wrapper {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            padding: 2rem;
        }

        .contact__v2 .form-control {
            border: 1px solid #ddd;
            padding: 0.75rem 1rem;
            border-radius: 5px;
        }

        .contact__v2 .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(166, 77, 121, 0.25);
        }

        .contact__v2 label {
            color: var(--primary-color);
            font-weight: 500;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--dark-blue), var(--secondary-color), var(--primary-color));
            color: white;
            padding: 4rem 0 2rem;
        }

        footer h3 {
            color: var(--accent-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        footer a {
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        footer h5 {
            color: #e6c200;
        }

        footer a:hover {
            color: var(--accent-color);
            transform: translateX(5px);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .section {
                padding: 3rem 0;
            }

            #hero {
                padding: 5rem 0;
                text-align: center;
            }

            .hero-buttons {
                justify-content: center;
            }
        }
    </style>
</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center fixed-top shadow-sm custom-header">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <!-- Logo -->
            <div class="position-absolute start-0">
                <a href="#hero" class="logo d-flex align-items-center">
                    <img src="{{ url('assets-user/img/monevv.png') }}" alt="Kenzo Laundry Logo" height="60">
                </a>
            </div>

            <!-- Navigation -->
            <nav id="navmenu" class="navmenu d-none d-xl-flex align-items-center mx-auto">
                <ul class="d-flex align-items-center gap-3 mb-0 list-unstyled">
                    <li><a href="#hero" class="nav-link active">Home</a></li>
                    <li><a href="#about" class="nav-link">Tentang Kami</a></li>
                    <li><a href="#fitur" class="nav-link">Fitur</a></li>
                    <li><a href="#inovasi" class="nav-link">Keunggulan</a></li>
                    <li><a href="#testimonials" class="nav-link">Jenis Layanan</a></li>
                    <li><a href="#contact" class="nav-link">Kontak</a></li>
                </ul>
            </nav>

            <!-- Login Button -->
            <div class="position-absolute end-0 me-3 d-flex align-items-center gap-2">
                @if (Auth::guard('pelanggan')->check())
                    <span class="text-accent fw-bold">
                        Halo, {{ Auth::guard('pelanggan')->user()->nama }}
                    </span>
                    <form id="logout-form" action="{{ route('pelanggan.logout') }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                    <button type="button" class="btn btn-outline-light btn-sm" id="btn-logout">
                        Logout
                    </button>
                @else
                    <a class="btn btn-accent" href="{{ route('pelanggan.login') }}">
                        Login Sekarang
                    </a>
                @endif
            </div>


            <!-- Mobile Nav Toggle -->
            <i class="mobile-nav-toggle d-xl-none bi bi-list ms-3" style="color: white;"></i>
        </div>
    </header>

    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-center">
                    <!-- Text Content -->
                    <div class="col-lg-6">
                        <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                            <h1 class="fw-bold mb-2">Selamat Datang di</h1>
                            <h2 class="fw-bold mb-4">Kenzo Laundry</h2>
                            <p class="mb-4">Layanan laundry profesional dengan sistem pemantauan real-time untuk
                                pengalaman laundry yang lebih mudah, cepat, dan terpercaya.</p>
                            <div class="hero-buttons d-flex gap-3">
                                <a href="https://youtu.be/6PxwXbr1VqM"
                                    class="btn btn-light d-inline-flex align-items-center glightbox">
                                    <i class="bi bi-chat-left-dots me-2"></i> Pesan Sekarang
                                </a>
                                <a href="#contact" class="btn btn-outline-light d-inline-flex align-items-center">
                                    <i class="bi bi-whatsapp me-2"></i> Hubungi Kami
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="col-lg-6 text-center">
                        <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                            <img src="{{ url('assets-user') }}/img/logokenzo.jpg" alt="Hero Image"
                                class="img-fluid rounded shadow" style="border: 4px solid var(--accent-color);">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="about section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 align-items-center justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                        <span class="about-meta">Tentang Kenzo Laundry</span>
                        <h2 class="about-title">Layanan Laundry Profesional dengan Teknologi Modern</h2>
                        <p class="about-description">Kenzo Laundry adalah penyedia jasa laundry profesional yang
                            menghadirkan kemudahan dan kenyamanan bagi pelanggan dengan sistem pemesanan online,
                            pelacakan real-time, dan layanan antar-jemput gratis.</p>

                        <!-- Feature Lists -->
                        <div class="row feature-list-wrapper">
                            <div class="col-md-6">
                                <ul class="feature-list" style="list-style: none; padding-left: 0;">
                                    <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Pencucian berkualitas
                                        tinggi</li>
                                    <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Bahan pembersih ramah
                                        lingkungan</li>
                                    <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Sistem pemantauan
                                        real-time</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="feature-list" style="list-style: none; padding-left: 0;">
                                    <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Layanan antar-jemput
                                        gratis</li>
                                    <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Notifikasi status
                                        otomatis</li>
                                    <li><i class="bi bi-check-circle-fill text-primary me-2"></i> Harga terjangkau &
                                        transparan</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Right Image -->
                    <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="image-wrapper text-center">
                            <img src="{{ url('assets-user') }}/img/logokenzo.jpg" alt="About Image"
                                class="img-fluid rounded-4 shadow" style="border: 4px solid var(--accent-color);">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="fitur" class="fitur section">
            <div class="container">
                <!-- Section Title -->
                <div class="section-title text-center mb-5" data-aos="fade-up">
                    <h2>Fitur Unggulan</h2>
                    <p>Nikmati kemudahan layanan laundry dengan fitur-fitur modern kami</p>
                </div>

                <!-- Features Content -->
                <div class="row gy-4">
                    <!-- Feature 1 -->
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-item text-center p-4">
                            <i class="bi bi-phone mb-3"></i>
                            <h3>Pemesanan Online</h3>
                            <p>Pesan layanan laundry kapan saja melalui website atau aplikasi kami dengan mudah dan
                                cepat.</p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-item text-center p-4">
                            <i class="bi bi-geo-alt mb-3"></i>
                            <h3>Antar-Jemput Gratis</h3>
                            <p>Kami menjemput dan mengantar laundry Anda tanpa biaya tambahan.</p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-item text-center p-4">
                            <i class="bi bi-bell mb-3"></i>
                            <h3>Notifikasi Real-Time</h3>
                            <p>Dapatkan update status laundry Anda secara real-time melalui notifikasi.</p>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-item text-center p-4">
                            <i class="bi bi-truck mb-3"></i>
                            <h3>Pelacakan Kurir</h3>
                            <p>Lacak posisi kurir kami saat menjemput atau mengantar laundry Anda.</p>
                        </div>
                    </div>

                    <!-- Feature 5 -->
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-item text-center p-4">
                            <i class="bi bi-credit-card mb-3"></i>
                            <h3>Pembayaran Digital</h3>
                            <p>Berbagai metode pembayaran digital yang aman dan nyaman.</p>
                        </div>
                    </div>

                    <!-- Feature 6 -->
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-item text-center p-4">
                            <i class="bi bi-award mb-3"></i>
                            <h3>Kualitas Terjamin</h3>
                            <p>Standar kualitas tinggi dengan bahan pembersih ramah lingkungan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Innovation Section -->
        <section id="inovasi" class="features-2 section bg-light">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="section-title text-center mb-5">
                    <h2>Keunggulan Kami</h2>
                    <p>Apa yang membuat Kenzo Laundry berbeda dari yang lain</p>
                </div>

                <div class="row align-items-center">
                    <!-- Left Column -->
                    <div class="col-lg-4">
                        <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="200">
                            <div class="d-flex align-items-center justify-content-end gap-4">
                                <div class="feature-content">
                                    <h3>Teknologi Modern</h3>
                                    <p>Sistem pemantauan digital yang memudahkan pelanggan melacak status laundry
                                        mereka.</p>
                                </div>
                                <div class="feature-icon flex-shrink-0">
                                    <i class="bi bi-phone"
                                        style="color: var(--secondary-color); font-size: 2rem;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="300">
                            <div class="d-flex align-items-center justify-content-end gap-4">
                                <div class="feature-content">
                                    <h3>Efisiensi Waktu</h3>
                                    <p>Proses cepat dengan standar kualitas tinggi untuk menghemat waktu berharga Anda.
                                    </p>
                                </div>
                                <div class="feature-icon flex-shrink-0">
                                    <i class="bi bi-stopwatch"
                                        style="color: var(--secondary-color); font-size: 2rem;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="feature-item text-end" data-aos="fade-right" data-aos-delay="400">
                            <div class="d-flex align-items-center justify-content-end gap-4">
                                <div class="feature-content">
                                    <h3>Ramah Lingkungan</h3>
                                    <p>Menggunakan bahan pembersih yang aman untuk lingkungan dan kulit sensitif.</p>
                                </div>
                                <div class="feature-icon flex-shrink-0">
                                    <i class="bi bi-tree" style="color: var(--secondary-color); font-size: 2rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Center Image -->
                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="text-center">
                            <img src="{{ url('assets-user') }}/img/logokenzo.jpg" alt="Kenzo Laundry"
                                class="img-fluid rounded-circle"
                                style="width: 300px; height: 300px; object-fit: cover; border: 5px solid var(--accent-color);">
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-lg-4">
                        <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="200">
                            <div class="d-flex align-items-center gap-4">
                                <div class="feature-icon flex-shrink-0">
                                    <i class="bi bi-shield-check"
                                        style="color: var(--secondary-color); font-size: 2rem;"></i>
                                </div>
                                <div class="feature-content">
                                    <h3>Keamanan Data</h3>
                                    <p>Sistem kami menjamin keamanan data pribadi dan transaksi pelanggan.</p>
                                </div>
                            </div>
                        </div>

                        <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="300">
                            <div class="d-flex align-items-center gap-4">
                                <div class="feature-icon flex-shrink-0">
                                    <i class="bi bi-people"
                                        style="color: var(--secondary-color); font-size: 2rem;"></i>
                                </div>
                                <div class="feature-content">
                                    <h3>Tim Profesional</h3>
                                    <p>Dilayani oleh tim yang terlatih dan berpengalaman di bidang laundry.</p>
                                </div>
                            </div>
                        </div>

                        <div class="feature-item" data-aos="fade-left" data-aos-delay="400">
                            <div class="d-flex align-items-center gap-4">
                                <div class="feature-icon flex-shrink-0">
                                    <i class="bi bi-heart"
                                        style="color: var(--secondary-color); font-size: 2rem;"></i>
                                </div>
                                <div class="feature-content">
                                    <h3>Kepuasan Pelanggan</h3>
                                    <p>Komitmen kami untuk memberikan layanan terbaik dan kepuasan pelanggan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section">
            <div class="container">
                <!-- Section Title -->
                <div class="section-title text-center mb-5" data-aos="fade-up">
                    <h2>Jenis Layanan Kami</h2>
                    <p>Kami menyediakan berbagai layanan laundry untuk memenuhi kebutuhan Anda</p>
                </div>

                <!-- Services Content -->
                <div class="row g-4">
                    <!-- Layanan 1 -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="testimonial-item">
                            <div class="text-center mb-3">
                                <img src="{{ url('assets-user') }}/img/ekspres.jpg" class="testimonial-img"
                                    alt="Laundry Express / Cepat">
                            </div>
                            <h5 class="text-center fw-bold">Laundry Express / Cepat</h5>
                            <p class="text-center text-muted fst-italic">Layanan laundry dengan waktu pengerjaan cepat,
                                cocok untuk kebutuhan mendesak Anda.</p>
                        </div>
                    </div>

                    <!-- Layanan 2 -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="testimonial-item">
                            <div class="text-center mb-3">
                                <img src="{{ url('assets-user') }}/img/kiloan.png" class="testimonial-img"
                                    alt="Cuci Kiloan">
                            </div>
                            <h5 class="text-center fw-bold">Cuci Kiloan</h5>
                            <p class="text-center text-muted fst-italic">Laundry pakaian sehari-hari dengan harga per
                                kilogram, hemat dan praktis.</p>
                        </div>
                    </div>

                    <!-- Layanan 3 -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="testimonial-item">
                            <div class="text-center mb-3">
                                <img src="{{ url('assets-user') }}/img/kiloan.png" class="testimonial-img"
                                    alt="Laundry Karpet">
                            </div>
                            <h5 class="text-center fw-bold">Laundry Karpet</h5>
                            <p class="text-center text-muted fst-italic">Membersihkan karpet hingga bersih, segar, dan
                                bebas debu.</p>
                        </div>
                    </div>

                    <!-- Layanan 4 -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="testimonial-item">
                            <div class="text-center mb-3">
                                <img src="{{ url('assets-user') }}/img/gorden.png" class="testimonial-img"
                                    alt="Laundry Gorden">
                            </div>
                            <h5 class="text-center fw-bold">Laundry Gorden</h5>
                            <p class="text-center text-muted fst-italic">Layanan cuci gorden untuk menjaga kebersihan
                                dan keindahan interior rumah Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="section contact__v2">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-8 mx-auto text-center">
                        <span class="subtitle text-uppercase mb-3 d-inline-block px-3 py-1 rounded-pill shadow-sm"
                            style="background-color: var(--secondary-color); color: white;">Hubungi Kami</span>
                        <h2 class="mb-3" style="color: white;">Butuh Bantuan?</h2>
                        <p class="text-light opacity-75">Tim kami siap membantu Anda 7 hari seminggu. Hubungi kami
                            melalui formulir berikut atau langsung via WhatsApp.</p>
                    </div>
                </div>

                <div class="row">
                    <!-- Contact Info -->
                    <div class="col-md-5 mb-4 mb-md-0">
                        <div class="contact-info">
                            <div class="d-flex align-items-start mb-4">
                                <div class="icon d-flex align-items-center justify-content-center rounded-circle shadow me-3"
                                    style="background-color: var(--accent-color); color: var(--dark-blue); width: 50px; height: 50px;">
                                    <i class="bi bi-geo-alt fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1" style="color: var(--accent-color);">Alamat</h5>
                                    <p class="mb-0 text-light">Taluak, Kec. Lintau Buo, Kabupaten Tanah Datar, Sumatera
                                        Barat.
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex align-items-start mb-4">
                                <div class="icon d-flex align-items-center justify-content-center rounded-circle shadow me-3"
                                    style="background-color: var(--accent-color); color: var(--dark-blue); width: 50px; height: 50px;">
                                    <i class="bi bi-envelope fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1" style="color: var(--accent-color);">Email</h5>
                                    <p class="mb-0 text-light">info@kenzolaundry.com</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-start mb-4">
                                <div class="icon d-flex align-items-center justify-content-center rounded-circle shadow me-3"
                                    style="background-color: var(--accent-color); color: var(--dark-blue); width: 50px; height: 50px;">
                                    <i class="bi bi-telephone fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1" style="color: var(--accent-color);">Telepon</h5>
                                    <p class="mb-0 text-light">(0752) 82815</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-start">
                                <div class="icon d-flex align-items-center justify-content-center rounded-circle shadow me-3"
                                    style="background-color: var(--accent-color); color: var(--dark-blue); width: 50px; height: 50px;">
                                    <i class="bi bi-whatsapp fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1" style="color: var(--accent-color);">WhatsApp</h5>
                                    <p class="mb-0 text-light">+62 812-3456-7890</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="col-md-7">
                        <div class="form-wrapper p-4 rounded-4 shadow-lg">
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subjek</label>
                                    <input type="text" class="form-control" id="subject">
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Pesan</label>
                                    <textarea class="form-control" id="message" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-2">Kirim Pesan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <img src="{{ url('assets-user/img/monevv.png') }}" alt="Kenzo Laundry" height="60"
                        class="mb-3">
                    <p class="text-light">Kenzo Laundry memberikan layanan laundry profesional dengan teknologi modern
                        untuk kenyamanan dan kepuasan pelanggan.</p>
                    <div class="social-icons mt-4">
                        <a href="#" class="text-light me-3"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#" class="text-light me-3"><i class="bi bi-instagram fs-5"></i></a>
                        <a href="#" class="text-light me-3"><i class="bi bi-twitter fs-5"></i></a>
                        <a href="#" class="text-light"><i class="bi bi-whatsapp fs-5"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4">
                    <h5 class="mb-3">Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#hero">Beranda</a></li>
                        <li class="mb-2"><a href="#about">Tentang Kami</a></li>
                        <li class="mb-2"><a href="#fitur">Fitur</a></li>
                        <li class="mb-2"><a href="#testimonials">Jenis Layanan</a></li>
                        <li><a href="#contact">Kontak</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4">
                    <h5 class="mb-3">Layanan</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Laundry Kiloan</a></li>
                        <li class="mb-2"><a href="#">Laundry Satuan</a></li>
                        <li class="mb-2"><a href="#">Dry Cleaning</a></li>
                        <li class="mb-2"><a href="#">Laundry Sepatu</a></li>
                        <li><a href="#">Laundry Bed Cover</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4">
                    <h5 class="mb-3">Jam Operasional</h5>
                    <ul class="list-unstyled text-light">
                        <li class="mb-2">Senin - Jumat: 08.00 - 20.00</li>
                        <li class="mb-2">Sabtu: 08.00 - 18.00</li>
                        <li>Minggu: 10.00 - 16.00</li>
                    </ul>
                    <h5 class="mt-4 mb-3">Pembayaran</h5>
                    <div class="payment-methods">
                        <img src="{{ url('assets-user') }}/img/bri.jpg" alt="Bank Transfer" class="me-2"
                            style="width:40px; height:auto;">
                        <img src="{{ url('assets-user') }}/img/ovo.jpg" alt="OVO" class="me-2"
                            style="width:40px; height:auto;">
                        <img src="{{ url('assets-user') }}/img/dana.jpg" alt="Dana" class="me-2"
                            style="width:40px; height:auto;">
                        <img src="{{ url('assets-user') }}/img/gopay.jpeg" alt="Gopay"
                            style="width:40px; height:auto;">
                    </div>

                </div>
            </div>

            <div class="border-top border-secondary mt-4 pt-4 text-center text-light">
                <p class="mb-0">&copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Kenzo Laundry. Taluak, Kec. Lintau Buo, Kabupaten Tanah Datar, Sumatera
                    Barat.
                </p>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="{{ url('assets-user') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('assets-user') }}/vendor/php-email-form/validate.js"></script>
    <script src="{{ url('assets-user') }}/vendor/aos/aos.js"></script>
    <script src="{{ url('assets-user') }}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ url('assets-user') }}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ url('assets-user') }}/vendor/purecounter/purecounter_vanilla.js"></script>

    <!-- Main JS File -->
    <script src="{{ url('assets-user') }}/js/main.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    <script>
        document.getElementById('btn-logout')?.addEventListener('click', function() {
            Swal.fire({
                title: 'Yakin ingin keluar?',
                text: "Anda akan logout dari sistem!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        });

        // Contact form submission
        document.getElementById('contactForm')?.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                icon: 'success',
                title: 'Pesan Terkirim!',
                text: 'Terima kasih telah menghubungi kami. Kami akan segera merespons pesan Anda.',
                confirmButtonColor: '#A64D79'
            });
            this.reset();
        });
    </script>
</body>

</html>
