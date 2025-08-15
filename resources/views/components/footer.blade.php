<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <a href="{{ route('home') }}" class="d-inline-block mb-3">
                    <img src="{{ asset('img/base/KTX_logo.png') }}" alt="KTX Nova Compressor Group Logo" style="width: 100px; height: auto;">
                </a>
                <h6 class="text-white"><span class="text-primary">KTX</span> Nova Compressor Group</h6>
                <p class="mb-0">KTX specializes in industrial compressors with unique and innovative technology. We provide cutting-edge solutions for industrial applications worldwide.</p>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                <h5 class="text-white mb-4">Get In Touch</h5>
                <p><i class="fa fa-map-marker-alt me-3"></i>No 624, Business Village B Block<br>Deira, Dubai, UAE</p>
                <p><i class="fa fa-phone-alt me-3"></i>+971 4 220 7531</p>
                <p><i class="fa fa-mobile me-3"></i>+971 50 724 2884</p>
                <p><i class="fa fa-envelope me-3"></i>info@ktxcompressor.com</p>
                <div class="d-flex pt-2 d-none">
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                <h5 class="text-white mb-4">Quick Links</h5>
                <a class="btn btn-link" href="{{ route('about') }}">About Us</a>
                <a class="btn btn-link" href="{{ route('products') }}">Our Products</a>
                <a class="btn btn-link" href="{{ route('portfolio') }}">Portfolio</a>
                <a class="btn btn-link" href="{{ route('services') }}">Services</a>
                <a class="btn btn-link" href="{{ route('contact') }}">Contact Us</a>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                <h5 class="text-white mb-4">Our Services</h5>
                <a class="btn btn-link" href="#">Industrial Compressors</a>
                <a class="btn btn-link" href="#">Air Compressors</a>
                <a class="btn btn-link" href="#">Maintenance Services</a>
                <a class="btn btn-link" href="#">Technical Support</a>
                <a class="btn btn-link" href="#">Spare Parts</a>
            </div>
        </div>
    </div>
    <div class="container wow fadeIn" data-wow-delay="0.1s">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="{{ route('home') }}">KTX Compressor</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('about') }}">About</a>
                        <a href="{{ route('products') }}">Products</a>
                        <a href="{{ route('contact') }}">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
