@extends('layouts.fe.index')

@section('content')

    <!-- TESTIMONIALS, CTA & SERVICE -->
    <div class="container" style="margin: 100px 0px;">
        <div class="testimonials-box">
            <div class="testimonial"></div>
            <div class="cta-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15867.689671027176!2d106.7519097!3d-6.1411239!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7d9384abf23%3A0x49758ffe249162d0!2sPT.%20Batman%20Kencana!5e0!3m2!1sid!2sid!4v1723330112675!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!-- SERVICE -->
            <div class="service">
                <h2 class="title">Our Services</h2>
                <div class="service-container">
                    <a href="javascript:void(0)" class="service-item">
                        <div class="service-icon">
                            <ion-icon name="call-outline"></ion-icon>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">Call Center</h3>
                            <p class="service-desc">Jam Kerja: 9AM - 9PM</p>
                        </div>
                    </a>
                    <a href="javascript:void(0)" class="service-item">
                        <div class="service-icon">
                            <ion-icon name="arrow-undo-outline"></ion-icon>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">Cashback Promo</h3>
                            <p class="service-desc">Untuk Member Baru & Lama</p>
                        </div>
                    </a>
                    <a href="javascript:void(0)" class="service-item">
                        <div class="service-icon">
                            <ion-icon name="ticket-outline"></ion-icon>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">Voucher Discount</h3>
                            <p class="service-desc">Untuk Member Baru & Lama</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- TESTIMONIALS, CTA & SERVICE -->

@endsection
