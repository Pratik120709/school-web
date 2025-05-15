<!-- new Footer -->
<footer class="footer-dark main-footer overflow-hidden position-relative pt-5">
    <div class="container pt-4">
        <div class="py-5">
            <!-- start community CTA -->
            <div class="bg-primary rounded-4">
                <div class="col-xxl-10 col-md-11 col-10 mx-auto px-0 text-center py-4 text-white">
                    <h4 class="mb-3">Join Our Community of Students!</h4>
                    <p>Be a part of a growing network of learners and stay informed about opportunities tailored for
                        you.</p>
                </div>
            </div>
            <!-- end /. community CTA -->
        </div>
        <div class="border-top py-5">
            <div class="footer-row row gy-5 g-sm-5 gx-xxl-6">
                <div class="border-end col-lg-4 col-md-7 col-sm-6">
                    <h5 class="fw-bold mb-4">Contact Information</h5>
                    <p>For support or queries, feel free to reach us at:</p>
                    <a href="mailto:support@FindMyUniversities.com"
                        class="text-decoration-none text-white mb-5">support@FindMyUniversities.com</a>
                    <div class="mt-5">
                        <a href="{{route('homepage')}}" class="col-sm-auto footer-logo mb-2 mb-sm-0">
                            <img src="/frontAssets/images/university-logo__1__1-removebg-preview.png" alt=""
                                style="width: 110px; height: 80px;">
                        </a>
                    </div>
                </div>
                <div class="border-end col-lg-4 col-md-5 col-sm-6">
                    <h5 class="fw-bold mb-4">Stay Connected</h5>
                    <p>Sign up for updates about universities, scholarships, and admission tips directly in your inbox.
                    </p>
                    <div class="newsletter position-relative mt-4">
                        <input type="email" class="form-control" placeholder="name@example.com">
                        <button type="button"
                            class="btn btn-primary search-btn position-absolute top-50 rounded-circle">
                            <i class="fa-solid fa-angle-right"></i>
                        </button>
                    </div>
                    <div class="border-top my-4"></div>
                    <h5 class="fw-bold mb-4">Follow Us</h5>
                    <!-- start social icon -->
                    <ul class="d-flex flex-wrap gap-2 list-unstyled mb-0 social-icon">
                        <li>
                            <a href="#"
                                class="rounded-circle align-items-center d-flex fs-19 icon-wrap justify-content-center rounded-2 text-white inst">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="rounded-circle align-items-center d-flex fs-19 icon-wrap justify-content-center rounded-2 text-white twi">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="rounded-circle align-items-center d-flex fs-19 icon-wrap justify-content-center rounded-2 text-white fb">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="rounded-circle align-items-center d-flex fs-19 icon-wrap justify-content-center rounded-2 text-white whatsapp">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /. end social icon -->
                </div>
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-4">Quick Links</h5>
                    <ul class="list-unstyled">

                        <li>
                            <a href="{{ route('universityList') }}"
                                class="text-decoration-none {{ request()->is('universityList') ? 'active' : '' }}">
                                Universities
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('programs') }}"
                                class="text-decoration-none {{ request()->is('programs') ? 'active' : '' }}">
                                Programs
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admission') }}"
                                class="text-decoration-none {{ request()->is('admissions') ? 'active' : '' }}">
                                Admissions
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}"
                                class="text-decoration-none {{ request()->is('contact') ? 'active' : '' }}">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="container border-top">
        <div class="align-items-center g-3 py-4 row">
            <div class="col-lg-auto">
                <!-- start footer nav -->
                <ul class="list-unstyled list-separator mb-2 footer-nav">
                    <li class="list-inline-item"><a href="#">Privacy</a></li>
                    <li class="list-inline-item"><a href="#">Sitemap</a></li>
                    <li class="list-inline-item"><a href="#">Cookies</a></li>
                </ul>
                <!-- end /. footer nav -->
            </div>
            <div class="col-lg order-md-first">
                <div class="align-items-center row">
                    <!-- start footer logo -->
                    <!-- end /. footer logo -->
                    <!-- start text -->
                    <div class="col-sm-auto copy">© 2024 FindMyUniversities - All Rights Reserved</div>
                    <!-- end /. text -->
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Optional JavaScript -->
<script src="{{ URL::asset('/frontAssets/plugins/jQuery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('/frontAssets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('/frontAssets/plugins/aos/aos.min.js') }}"></script>
<script src="{{ URL::asset('/frontAssets/plugins/macy/macy.js') }}"></script>
<script src="{{ URL::asset('/frontAssets/plugins/simple-parallax/simpleParallax.min.js') }}"></script>
<script src="{{ URL::asset('/frontAssets/plugins/OwlCarousel2/owl.carousel.min.js') }}"></script>
<script src="{{ URL::asset('/frontAssets/plugins/theia-sticky-sidebar/ResizeSensor.min.js') }}"></script>
<script src="{{ URL::asset('/frontAssets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.min.js') }}"></script>
<script src="{{ URL::asset('/frontAssets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ URL::asset('/frontAssets/plugins/counter-up/jquery.counterup.min.js') }}"></script>
<script src="{{ URL::asset('/frontAssets/plugins/jquery-fancyfileuploader/fancy-file-uploader/jquery.ui.widget.js') }}">
</script>
<script
    src="{{ URL::asset('/frontAssets/plugins/jquery-fancyfileuploader/fancy-file-uploader/jquery.fileupload.js') }}">
</script>
<script
    src="{{ URL::asset('/frontAssets/plugins/jquery-fancyfileuploader/fancy-file-uploader/jquery.iframe-transport.js') }}">
</script>
<script
    src="{{ URL::asset('/frontAssets/plugins/jquery-fancyfileuploader/fancy-file-uploader/jquery.fancy-fileupload.js') }}">
</script>
<script src="{{ URL::asset('/frontAssets/plugins/ion.rangeSlider/ion.rangeSlider.min.js') }}"></script>
<script src="{{ URL::asset('/frontAssets/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ URL::asset('/frontAssets/plugins/select2/select2.min.js') }}"></script>
<!-- Custom script for this template -->
<script src="{{ URL::asset('/frontAssets/js/script.js') }}"></script>