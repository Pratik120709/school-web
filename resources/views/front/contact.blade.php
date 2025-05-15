@extends('website.layout.master')

@section('content')
<div id="fullPageLoader">
    <div class="loader-spinner"></div>
</div>
<!-- header -->
<nav class="custom-navbar navbar navbar-expand-lg ">
    <div class="container">
    <a class="navbar-brand m-0" href="{{ route('homepage') }}">
            <img class="logo-white" src="frontAssets/images/university-logo__1__1-removebg-preview.png" alt="University Logo" 
                style="width: 150px; height: 100px;">
            <img class="logo-dark" src="frontAssets/images/university-logo__1__1-removebg-preview.png" alt="University Logo" 
                style="width: 150px; height: 100px;">
        </a>
        <div class="d-flex order-lg-2">
            <!-- start button -->
            <a href="{{ route('signIn') }}" class="btn btn-primary d-none d-sm-flex fw-medium gap-2 hstack rounded">
                <i class="fa-solid fa-user-plus"></i>
                <div class="vr d-none d-sm-inline-block"></div>
                <span class="d-none d-sm-inline-block">Sign in</span>
            </a>
            <!-- end /. button -->
            <!-- start button -->

            <!-- end /. button -->
            <!-- start navbar toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span id="nav-icon" class="">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>
            <!-- end /. navbar toggle button -->
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-3 mb-2 mb-lg-0">
                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('homepage') }}">
                        Home
                    </a>
                </li>
                <!-- Universities -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('universityList') ? 'active' : '' }}"
                        href="{{ route('universityList') }}">
                        Universities
                    </a>
                </li>
                <!-- Programs -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('programs') ? 'active' : '' }}" href="{{ route('programs') }}">
                        Programs
                    </a>
                </li>
                <!-- Admissions -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admission') ? 'active' : '' }}"
                        href="{{ route('admission') }}">
                        Admissions
                    </a>
                </li>
                <!-- Contact Us -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="">
                        Contact Us
                    </a>
                </li>
            </ul>
            <div class="d-sm-none">
                <!-- start button -->
                <a href="{{ route('signIn') }}" class="btn btn-primary d-flex gap-2 hstack justify-content-center rounded">
                <i class="fa-solid fa-user-plus"></i>
                <div class="vr d-none d-sm-inline-block"></div>
                <span class="">Sign in</span>
            </a>
                <!-- end /. button -->
            </div>
        </div>
    </div>
</nav>
<section class="dark-overlay hero mx-3 overflow-hidden position-relative py-4 py-lg-5 rounded-4 text-white">
        <img class="bg-image" src="frontAssets/images/business-people.jpg" alt="Image">
        <div class="container overlay-content py-5">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 col-lg-6">
                    <!-- start section header -->
                    <div class="section-header" data-aos="fade-down">
                        <!-- start description -->
                        <div class="bg-primary d-inline-block fs-14 mb-3 px-4 py-2 rounded-5 sub-title text-uppercase">Contact us</div>
                        <!-- end /. section header sub title -->
                        <!-- start section header -->
                        <h2 class="display-4 fw-semibold mb-3 section-header__title text-capitalize">Do you have any<br> questions?
                            <span class="font-caveat text-white">Let us Know!</span>
                        </h2>
                        <!-- end /. section header title -->
                        <p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                    </div>
                    <!-- end /. section header -->
                </div>
                <div class="col-md-5 col-lg-4">
                    <h5 class="fw-bold mb-4">General contact</h5>
                    <div class="mb-5">
                        <!-- <div>1123 Fictional St, San Francisco<br class="d-none d-xxl-block"> , CA 94103</div> -->
                        <div class="mt-4">
                            <a class="d-block fw-medium mb-1" href="#">
                                <!-- <i class="fa-solid fa-phone me-2"></i><span>(123) 456-7890</span> -->
                            </a>
                            <a class="email-link d-block fw-medium" href="#">
                                <i class="fa-solid fa-envelope me-2"></i>
                                support@FindMyUniversities.com
                            </a>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-4">follow us</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="fb d-flex align-items-center justify-content-center fs-19 rounded mr-2">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="tw d-flex align-items-center justify-content-center fs-21 rounded mr-2">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="ins d-flex align-items-center justify-content-center fs-21 rounded mr-2">
                            <i class="fab fa-instagram"></i></a>
                        <a href="#" class="pr d-flex align-items-center justify-content-center fs-21 rounded mr-2">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                        <a href="#" class="li d-flex align-items-center justify-content-center fs-21 rounded mr-2">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end /. page header -->
    <div class="py-5 bg-light mx-3 rounded-4 my-3">
        <div class="container py-5">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xl-5">
                    <h3 class="h1 mb-4 font-caveat text-primary">My contact data</h3>
                    <!-- Start Form Group -->
                    <div class="mb-4">
                        <label class="required fw-medium mb-2">Full Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="David Hall" required="">
                    </div>
                    <!-- /.End Form Group -->
                    <!-- Start Form Group -->
                    <div class="mb-4">
                        <label class="required fw-medium mb-2">Your Email</label>
                        <input type="email" class="form-control" id="email" placeholder="hello@email.com">
                    </div>
                    <!-- /.End Form Group -->
                    <!-- Start Form Group -->
                    <div class="mb-4">
                        <label class="required fw-medium mb-2">Your Phone</label>
                        <input type="number" class="form-control" id="phone">
                    </div>
                    <!-- /.End Form Group -->
                </div>
                <div class="col-md-6 col-xl-5">
                    <h3 class="h1 mb-4 font-caveat text-primary">My message</h3>
                    <!-- Start Form Group -->
                    <div class="mb-4">
                        <label class="required fw-medium mb-2">Your Comments</label>
                        <textarea class="form-control" rows="7" placeholder="Tell us what we can help you with!"></textarea>
                    </div>
                    <!-- /.End Form Group -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            YES, I AUTHORIZE THE USE OF MY PERSONAL DATA IN ACCORDANCE WITH THE PRIVACY POLICY DESCRIBED ON THE WEBSITE.
                        </label>
                    </div>
                    <!-- Start Submit Button -->
                    <button type="submit" class="btn btn-primary btn-lg d-inline-flex hstack gap-2 mt-4">
                        <span>Send message</span>
                        <span class="vr"></span>
                        <i class="fa-arrow-right fa-solid fs-14"></i>
                    </button>
                    <!-- /.End Submit Button -->
                </div>
            </div>
            <!-- <div class="row g-4 gx-xxl-5 mt-5 justify-content-center">
                <div class="col-md-12">
                    <h2 class="display-6 fw-medium">Are you coming to see us? Make an<br> <span class="font-caveat text-primary">appointment</span> at any of our huts.</h2>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="address-card dark-overlay position-relative rounded-4 overflow-hidden">
                        <img class="bg-image" src="frontAssets/images/address-01-1.jpg" alt="Image">
                        <div class="address-card-info position-relative text-white z-1">
                            <h3 class="mb-4">Paris</h3>
                            <div>1123 Fictional St, San Francisco<br class="d-none d-xxl-block"> , CA 94103</div>
                            <div class="mt-4">
                                <a class="d-block fw-medium mb-1" href="#">
                                    <i class="fa-solid fa-phone me-2"></i><span>(123) 456-7890</span>
                                </a>
                                <a class="email-link d-block fw-medium" href="#">
                                    <i class="fa-solid fa-envelope me-2"></i>
                                    support@ListOn.com
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="address-card dark-overlay position-relative rounded-4 overflow-hidden">
                        <img class="bg-image" src="frontAssets/images/address-02-1.jpg" alt="Image">
                        <div class="address-card-info position-relative text-white z-1">
                            <h3 class="mb-4">London</h3>
                            <div>1123 Fictional St, San Francisco<br class="d-none d-xxl-block"> , CA 94103</div>
                            <div class="mt-4">
                                <a class="d-block fw-medium mb-1" href="#">
                                    <i class="fa-solid fa-phone me-2"></i><span>(123) 456-7890</span>
                                </a>
                                <a class="email-link d-block fw-medium" href="#">
                                    <i class="fa-solid fa-envelope me-2"></i>
                                    support@ListOn.com
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="address-card dark-overlay position-relative rounded-4 overflow-hidden">
                        <img class="bg-image" src="frontAssets/images/address-03-1.jpg" alt="Image">
                        <div class="address-card-info position-relative text-white z-1">
                            <h3 class="mb-4">New York</h3>
                            <div>1123 Fictional St, San Francisco<br class="d-none d-xxl-block"> , CA 94103</div>
                            <div class="mt-4">
                                <a class="d-block fw-medium mb-1" href="#">
                                    <i class="fa-solid fa-phone me-2"></i><span>(123) 456-7890</span>
                                </a>
                                <a class="email-link d-block fw-medium" href="#">
                                    <i class="fa-solid fa-envelope me-2"></i>
                                    support@ListOn.com
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <div class="py-5 bg-light mx-3 rounded-4 my-3">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-10 col-lg-8">
                    <!-- start section header -->
                    <div class="section-header text-center mb-5" data-aos="fade-down">
                        <!-- start subtitle -->
                        <div class="d-inline-block font-caveat fs-1 fw-medium section-header__subtitle text-capitalize text-primary">F.A.Q.</div>
                        <!-- end /. subtitle -->
                        <!-- start title -->
                        <h2 class="display-5 fw-semibold mb-3 section-header__title text-capitalize">Frequently asked questions</h2>
                        <!-- end /. title -->
                        <!-- start description -->
                        <div class="sub-title fs-16">Discover exciting categories. <span class="text-primary fw-semibold">Find what you’re looking for.</span></div>
                        <!-- end /. description -->
                    </div>
                    <!-- end /. section header -->
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item mb-3 rounded-4">
                            <h2 class="accordion-header">
                                <button class="accordion-button fs-5 p-4 text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What Types Of Houses Are Available For Rent?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body p-4 pt-0">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was <code>.accordion-body</code> popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 rounded-4">
                            <h2 class="accordion-header">
                                <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    What Is The Rental Application Process?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body p-4 pt-0">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was <code>.accordion-body</code> popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 rounded-4">
                            <h2 class="accordion-header">
                                <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    What Are Your Rental Rates?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body p-4 pt-0">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was <code>.accordion-body</code> popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 rounded-4">
                            <h2 class="accordion-header">
                                <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    What Are The Lease Terms?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body p-4 pt-0">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was <code>.accordion-body</code> popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 rounded-4">
                            <h2 class="accordion-header">
                                <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    What Is Your Policy On Pets?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body p-4 pt-0">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was <code>.accordion-body</code> popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
window.onload = function() {
    var loader = document.getElementById('fullPageLoader');
    loader.style.opacity = '0';

    setTimeout(function() {
        loader.style.display = 'none';
    }, 500);
};
</script>
@endsection