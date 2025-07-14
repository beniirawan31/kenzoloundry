@extends('layout.user.apps')

@section('content')
    <!-- ======= Hero =======-->
    <section class="hero__v6 section" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="row">
                        <div class="col-lg-11"><span class="hero-subtitle text-uppercase" data-aos="fade-up"
                                data-aos-delay="0">Innovative Fintech Solutions</span>
                            <h1 class="hero-title mb-3" data-aos="fade-up" data-aos-delay="100">Secure,
                                Efficient, and User-Friendly Financial Services</h1>
                            <p class="hero-description mb-4 mb-lg-5" data-aos="fade-up" data-aos-delay="200">
                                Experience the future of finance with our secure, efficient, and user-friendly
                                financial services.</p>
                            <div class="cta d-flex gap-2 mb-4 mb-lg-5" data-aos="fade-up" data-aos-delay="300"><a
                                    class="btn" href="#">Get Started Now</a><a class="btn btn-white-outline"
                                    href="#">Learn More
                                    <svg class="lucide lucide-arrow-up-right" xmlns="http://www.w3.org/2000/svg"
                                        width="18" height="18" viewbox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M7 7h10v10"></path>
                                        <path d="M7 17 17 7"></path>
                                    </svg></a></div>
                            <div class="logos mb-4" data-aos="fade-up" data-aos-delay="400"><span
                                    class="logos-title text-uppercase mb-4 d-block">Trusted by major companies
                                    worldwide</span>
                                <div class="logos-images d-flex gap-4 align-items-center"><img
                                        class="img-fluid js-img-to-inline-svg"
                                        src="{{ asset('templete/landing/images/logo/actual-size/logo-air-bnb__black.svg') }}"
                                        alt="Company 1" style="width: 110px;"><img class="img-fluid js-img-to-inline-svg"
                                        src="{{ asset('templete/landing/images/logo/actual-size/logo-ibm__black.svg') }}"
                                        alt="Company 2" style="width: 80px;"><img class="img-fluid js-img-to-inline-svg"
                                        src="{{ asset('templete/landing/images/logo/actual-size/logo-google__black.svg') }}"
                                        alt="Company 3" style="width: 110px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img"><img class="img-card img-fluid"
                            src="{{ asset('templete/landing/images/card-expenses.png') }}" alt="Image card"
                            data-aos="fade-down" data-aos-delay="600"><img class="img-main img-fluid rounded-4"
                            src="{{ asset('templete/landing/images/hero-img-1-min.jpg') }}" alt="Hero Image"
                            data-aos="fade-in" data-aos-delay="500"></div>
                </div>
            </div>
        </div>
        <!-- End Hero-->
    </section>
    <!-- End Hero-->

    @include('layou.user.about')

    @include('layout.user.pricing')

    @include('layout.user.work')

    @include('layout.user.service')


    @include('layout.user.contact')
@endsection
