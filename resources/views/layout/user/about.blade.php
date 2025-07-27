<!-- ======= About =======-->
<section class="about__v4 section" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2">
                <div class="row justify-content-end">
                    <div class="col-md-11 mb-4 mb-md-0"><span class="subtitle text-uppercase mb-3" data-aos="fade-up"
                            data-aos-delay="0">About us</span>
                        <h2 class="mb-4" data-aos="fade-up" data-aos-delay="100">Experience the future
                            of finance with our secure, efficient, and user-friendly financial services</h2>
                        <div data-aos="fade-up" data-aos-delay="200">
                            <p>Founded with the vision of revolutionizing the financial industry, we are a
                                leading fintech company dedicated to providing innovative and secure
                                financial solutions.</p>
                            <p>Our cutting-edge platform ensures your transactions are safe, streamlined,
                                and easy to manage, empowering you to take control of your financial journey
                                with confidence and convenience.</p>
                        </div>
                        <!-- Tombol Modal -->
                        <a href="{{ route('pesanan.create') }}" class="btn btn-primary mt-4">
                            Tambah Pesanan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Gambar -->
            <div class="col-md-6">
                <div class="img-wrap position-relative">
                    <img class="img-fluid rounded-4" src="{{ asset('templete/landing/images/about_2-min.jpg') }}"
                        alt="Order image" data-aos="fade-up" data-aos-delay="0">
                    <div class="mission-statement p-4 rounded-4 d-flex gap-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="mission-icon text-center rounded-circle">
                            <i class="bi bi-stars fs-4"></i>
                        </div>
                        <div>
                            <h3 class="text-uppercase fw-bold">Layanan Laundry Express</h3>
                            <p class="fs-5 mb-0">Layanan laundry express cepat dan terpercaya untuk kebutuhan harian
                                Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
