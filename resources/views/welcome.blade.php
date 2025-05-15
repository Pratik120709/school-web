@extends('website.layout.master')

@section('content')
<!-- <div id="fullPageLoader">
    <div class="loader-spinner"></div>
</div> -->
<style>
@media (max-width: 768px) {
    .bg-image-overlay {
        background-size: contain;
        background-position: center center;
    }
}

.modal-body {
    max-height: 80vh;
    overflow-y: auto;
}

.modal-body::-webkit-scrollbar {
    width: 8px;
}

.modal-body::-webkit-scrollbar-thumb {
    background-color: rgba(0, 75, 135, 0.5);
    border-radius: 10px;
}

.modal-body::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.1);
}

@media (max-width: 576px) {
    .modal-dialog {
        margin: 0;
        height: 100%;
        max-height: none;
    }

}

/* Hover Effects for Step Circles */
.number-wrap .number-circle {
    transition: transform 0.3s ease, background-color 0.3s ease;
}

.number-wrap .number-circle:hover {
    transform: scale(1.1);
    background-color: #004085;
    /* Darker shade of blue */
}

/* Adding Interactive Hover for Steps */
.number-wrap:hover h4 {
    color: #004085;
    /* Change text color on hover */
}

.parsley-custom-error-message {
    display: block;
}

.testimonial-carousel.owl-theme .owl-nav [class*="owl-"] {
    color: #6c757d;
    background-color: antiquewhite;
}
</style>
<!-- header -->
<nav class="custom-navbar navbar navbar-expand-lg navbar-fixed navbar-transfarent">
    <div class="container">
        <a class="navbar-brand m-0" href="{{ route('homepage') }}">
            <img class="logo-white" src="frontAssets/images/university-logo__1__1-removebg-preview.png"
                alt="University Logo" style="width: 150px; height: 100px;">
            <img class="logo-dark" src="frontAssets/images/university-logo__1__1-removebg-preview.png"
                alt="University Logo" style="width: 150px; height: 100px;">
        </a>
        <div class="d-flex order-lg-2">
            <!-- <a href="#" class="d-flex align-items-center justify-content-center p-0 btn-user"
                data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                data-bs-title="Sign In">
                <i class="fa-solid fa-user-plus"></i>
            </a> -->
            <a href="{{ route('signIn') }}" class="btn btn-primary d-none d-sm-flex fw-medium gap-2 hstack rounded">
                <i class="fa-solid fa-user-plus"></i>
                <div class="vr d-none d-sm-inline-block"></div>
                <span class="d-none d-sm-inline-block">Sign in</span>
            </a>
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
            <ul class="navbar-nav ms-auto mb-2 me-3 mb-lg-0">
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
                    <a class="nav-link {{ request()->is('admissions') ? 'active' : '' }}"
                        href="{{ route('admission') }}">
                        Admissions
                    </a>
                </li>
                <!-- Contact Us -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                        Contact Us
                    </a>
                </li>
            </ul>
            <div class="d-sm-none">
                <!-- start button -->
                <a href="{{ route('signIn') }}"
                    class="btn btn-primary d-flex gap-2 hstack justify-content-center rounded">
                    <i class="fa-solid fa-user-plus"></i>
                    <div class="vr d-none d-sm-inline-block"></div>
                    <span class="">Sign in</span>
                </a>
                <!-- end /. button -->
            </div>
        </div>
    </div>
</nav>
<!--  end header -->
<!-- start hero header (classic) -->
<div class="align-items-center bg-dark d-flex hero-header-classic overflow-hidden position-relative">
    <!-- start background image -->
    <img class="bg-image bg-image-overlay bg-gradient-vertical js-bg-image bg-cover bottom-0 end-0 position-absolute start-0 top-0"
        src="frontAssets/images/header/university-img.jpg" alt="Image">

    <!-- end /. background image -->

    <!-- Skeleton Loader Section -->


    <!-- Actual Content Hidden Initially -->
    <div class="container position-relative z-1 ">
        <div class="hero-header-subtitle text-center text-white text-uppercase mb-3"></div>
        <h1 class="home-font-size fw-bold hero-header_title text-capitalize text-white text-center mb-2">Find the Right
            University for Your Future</h1>
        <div class="lead mb-4 mb-sm-3 text-center text-white">
            <p>Where Ambition Meets Achievement</p>
        </div>
        <div class="text-center mt-4 mb-5">
            <a href="{{ route('universityList') }}" class="btn btn-primary py-3 px-5 fw-bold text-white">Find Your University</a>
        </div>
        <div id="skeleton-loader" class="container position-relative z-1">

            <div class="skeleton skeleton-text mb-3"></div>
            <div class="skeleton skeleton-btn mb-4"></div>
        </div>
        <div id="form-content" class="row justify-content-center content d-none">
            <div class="col-lg-12">
                <div class="p-4 p-sm-5 position-relative rounded-5 z-1 search-content">
                    <h2 class="h3 hero-header_title mb-2 text-capitalize text-white text-start">Discover universities
                        that match your academic and career goals</h2>
                    <div class="fs-18 mb-4 text-start text-white">Find the perfect university to support your future
                        aspirations</div>
                    <form action="{{ route('universityList') }}" id="search-form" method="GET"
                        class="border-0 card d-flex flex-md-row position-relative search-wrapper custom-validation"
                        data-parsley-validate>
                        <div class="align-items-center d-flex search-field w-100">
                            <i class="fas fa-graduation-cap me-2 text-primary fs-4"></i>
                            <div class="w-100">
                                <select name="program[]" id="program-select"
                                    class="form-select select2 search-select-field" required
                                    data-parsley-required="true" data-parsley-errors-container="#program-error"
                                    data-parsley-error-message="Please select a program" required>
                                    <option value="">Select Programs</option>
                                    @if(count($programs) > 0)
                                    @foreach ($programs as $program)
                                    <option value="{{ $program->id }}"
                                        {{ request('program') == $program->id ? 'selected' : '' }}>
                                        {{ $program->program_name }}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                                <div class="text-danger mt-2" id="program-error"></div>
                            </div>
                        </div>
                        <div class="align-items-center d-flex search-field w-100">
                            <i class="fas fa-map-marker-alt me-2 text-primary fs-4"></i>
                            <div class="w-100">
                                <select name="country[]" id="country-select" data-placeholder="Select Countries"
                                    class="form-select select2 search-select-field" multiple
                                    data-parsley-errors-container="#country-error"
                                    data-parsley-error-message="Please select countries" required>
                                    <option value="">Select Location</option>
                                    @if(count($locations) > 0)
                                    @foreach ($locations as $location)
                                    <option value="{{ $location->id }}" data-flag="{{ asset($location->flag) }}"
                                        {{ in_array($location->id, request('country', [])) ? 'selected' : '' }}>
                                        {{ $location->country_name }}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                                <div class="text-danger mt-2" id="country-error"></div>
                                <div class="text-muted" id="country-limit-message"></div>
                            </div>
                        </div>
                        <div class="align-items-center d-flex search-field w-100">
                            <i class="fas fa-building me-2 text-primary fs-4"></i>
                            <div class="w-100">
                                <select name="department[]" id="department-select" data-placeholder="Select Departments"
                                    class="form-select select2 search-select-field" multiple
                                    data-parsley-errors-container="#department-error"
                                    data-parsley-error-message="Please select departments" required>
                                    <option value="">Select Departments</option>
                                    @if(count($departments) > 0)
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"
                                        {{ in_array($department->id, request('department', [])) ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                                <div class="text-danger mt-2" id="department-error"></div>
                                <div class="text-muted" id="department-limit-message"></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 mt-md-0 d-flex align-items-center h-50">
                            <i class="fas fa-search me-2"></i> Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="skeleton-container" class="bg-dark overflow-hidden position-relative py-5 text-white">
    <div class="bg-dark overflow-hidden position-relative py-5 text-white">
        <div class="container pb-4">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-10 col-lg-8 col-xl-7">
                    <!-- Skeleton for Title -->
                    <div class="skeleton-title shimmer mb-3"></div>

                    <!-- Skeleton for Subtitle -->
                    <div class="skeleton-subtitle shimmer mb-4"></div>
                </div>
            </div>

            <!-- Skeleton for Program Cards -->
            <div class="row g-3 g-ld-4">
                <!-- Skeleton Card 1 -->
                <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
                    <div class="skeleton-card p-3 rounded-4 w-100">
                        <div class="skeleton-icon shimmer mb-3"></div>
                        <div class="skeleton-title shimmer mb-2"></div>
                        <div class="skeleton-text shimmer"></div>
                    </div>
                </div>
                <!-- Skeleton Card 2 -->
                <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
                    <div class="skeleton-card p-3 rounded-4 w-100">
                        <div class="skeleton-icon shimmer mb-3"></div>
                        <div class="skeleton-title shimmer mb-2"></div>
                        <div class="skeleton-text shimmer"></div>
                    </div>
                </div>
                <!-- Skeleton Card 3 -->
                <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
                    <div class="skeleton-card p-3 rounded-4 w-100">
                        <div class="skeleton-icon shimmer mb-3"></div>
                        <div class="skeleton-title shimmer mb-2"></div>
                        <div class="skeleton-text shimmer"></div>
                    </div>
                </div>
            </div>

            <!-- Skeleton for View More Button -->
            <div class="row justify-content-center mt-4">
                <div class="skeleton-button shimmer"></div>
            </div>
        </div>
    </div>
</div>
<!-- end /. hero header (classic) -->
<!-- start categories -->
<div id="program-container" class="bg-dark overflow-hidden position-relative pb-5 text-white" style="display: none;">
    <div class="container pb-4">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-10 col-lg-8 col-xl-7">
                <!-- start section header -->
                <!-- <div class="section-header text-center mb-5" data-aos="fade-down"> -->
                <!-- start subtitle -->
                <!-- <div class="d-inline-block font-caveat fs-1 fw-medium section-header__subtitle text-capitalize text-primary">Categories</div> -->
                <!-- end /. subtitle -->
                <!-- start title -->
                <h2 class="display-5 fw-semibold mb-3 section-header__title text-capitalize text-center">Explore Our
                    Program
                    Offerings Here</h2>
                <!-- end /. title -->
                <!-- start description -->
                <div class="sub-title fs-16 mb-4 text-center my-5">Discover a World of Opportunities. <span
                        class="text-primary fw-semibold">Find what you’re looking for.</span></div>
                <!-- end /. description -->
            </div>
            <!-- end /. section header -->
        </div>
        <div class="row g-3 g-ld-4">
            @if(count($programs) > 0)
            @foreach ($programs as $program)
            <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
                <div
                    class="align-items-center bg-blur find-university-card-hover d-flex flex-fill flex-wrap p-3 p-sm-3 rounded-4 mx-2 shadow-sm w-100">
                    <div class="flex-shrink-0">
                        <div
                            class="align-items-center bg-dark category-icon-box d-flex fs-4 justify-content-center rounded-3 text-primary">
                            <i class="fa-solid fa-building-user"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-2 ms-md-3">
                        <h3 class="fs-19 fw-semibold mb-1">
                            <a
                                href="{{ route('universityList', ['program' => $program->id]) }}">{{ $program->program_name }}</a>
                        </h3>
                        <p class="mb-0 small">{{ $program->universities_count }} listings</p>
                    </div>
                    <a href="{{ route('universityList', ['program' => $program->id]) }}"
                        class="align-items-center d-flex fw-semibold gap-2 link-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('programs') }}" class="btn btn-primary py-3 px-5 fw-bold text-white">Explore All Programs</a>
        </div>
    </div>
</div>
</div>
<!-- end /. categories -->
<!-- start process -->
<div class="py-5 border-top position-relative overflow-hidden">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-10 col-lg-8 col-xl-7">
                <!-- start section header -->
                <div class="section-header text-center mb-5" data-aos="fade-down">
                    <!-- start subtitle -->
                    <div
                        class="d-inline-block font-caveat fs-1 fw-medium section-header__subtitle text-capitalize text-primary">
                        Your Path to Success in 3 Steps</div>
                    <!-- end /. subtitle -->
                    <!-- start title -->
                    <h2 class="display-5 fw-semibold mb-3 section-header__title text-capitalize">Find Your Ideal
                        University in 3 Easy Steps</h2>
                    <!-- end /. title -->
                </div>
                <!-- end /. section header -->
            </div>
        </div>
        <div class="bg-no-repeat numbers-wrapper">
            <div class="row g-4">
                <!-- Step 1 -->
                <div class="col-md-4 explore-card-hover">
                    <div class="mx-xl-4 number-wrap text-center" data-aos="fade" data-aos-delay="300">
                        <div
                            class="align-items-center d-flex font-caveat fs-1 justify-content-center mb-4 mx-auto number-circle rounded-circle text-white step-1">
                            <img src="frontAssets/images/first.svg" alt="" width="100"></div>
                        <h4><span class="fw-bold">1.</span> Enter your desired program, country, and department to explore the top universities that
                            meet your academic interests.</h4>
                        <p class="fs-15 m-0 opacity-75"></p>
                        <!-- Visual Element: Magnifying Glass -->
                    </div>
                </div>
                <!-- Step 2 -->
                <div class="col-md-4 explore-card-hover">
                    <div class="mx-xl-4 number-wrap text-center second" data-aos="fade" data-aos-delay="400">
                        <div
                            class="align-items-center bg-primary d-flex font-caveat fs-1 justify-content-center mb-4 mx-auto number-circle rounded-circle text-white step-2">
                            <img src="frontAssets/images/second.svg" alt="" width="100"></div>
                        <h4><span class="fw-bold">2.</span> Refine your choices using filters like GPA, language requirements, and exam scores. Save and
                            compare your favorite universities.</h4>
                        <p class="fs-15 m-0 opacity-75"></p>
                        <!-- Visual Element: Checklist -->
                    </div>
                </div>
                <!-- Step 3 -->
                <div class="col-md-4 explore-card-hover">
                    <div class="mx-xl-4 number-wrap text-center" data-aos="fade" data-aos-delay="500">
                        <div
                            class="align-items-center bg-primary d-flex font-caveat fs-1 justify-content-center mb-4 mx-auto number-circle rounded-circle text-white step-3">
                            <img src="frontAssets/images/third.svg" alt="" width="100"></div>
                        <h4><span class="fw-bold">3.</span> Reach out to universities for more details about admissions, scholarships, and visit
                            opportunities. Send your profile to start the application process.</h4>
                        <p class="fs-15 m-0 opacity-75"></p>
                        <!-- Visual Element: Envelope -->
                    </div>
                </div>
            </div>
        </div>
        <!-- CTA Button -->
        <div class="text-center mt-4">
            <a href="{{ route('universityList') }}" class="btn btn-primary py-3 px-5 fw-bold text-white">Get Started
                Today</a>
        </div>
    </div>
</div>
<!-- end /. process -->
<!-- start explore cities & about -->
<div id="skeleton-top-regions" class="py-5 bg-primary position-relative overflow-hidden text-white">
    <div class="container py-4">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-10 col-lg-8 col-xl-7">
                    <!-- Skeleton Header -->
                    <div class="text-center mb-5">
                        <div class="skeleton-subtitle shimmer mx-auto mb-2"></div>
                        <div class="skeleton-title shimmer mx-auto"></div>
                    </div>
                </div>
            </div>

            <!-- Skeleton for Region Cards -->
            <div class="d-flex justify-content-center gap-3">
                <!-- Skeleton for each Region Card (repeat as needed) -->
                <div class="region-card-skeleton d-flex align-items-center rounded-pill overflow-hidden">
                    <div class="skeleton-flag shimmer"></div>
                    <div class="skeleton-country-name shimmer mx-2"></div>
                </div>
                <div class="region-card-skeleton d-flex align-items-center rounded-pill overflow-hidden">
                    <div class="skeleton-flag shimmer"></div>
                    <div class="skeleton-country-name shimmer mx-2"></div>
                </div>
                <div class="region-card-skeleton d-flex align-items-center rounded-pill overflow-hidden">
                    <div class="skeleton-flag shimmer"></div>
                    <div class="skeleton-country-name shimmer mx-2"></div>
                </div>
                <div class="region-card-skeleton d-flex align-items-center rounded-pill overflow-hidden">
                    <div class="skeleton-flag shimmer"></div>
                    <div class="skeleton-country-name shimmer mx-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div id="actual-top-regions"
    class="py-5 bg-primary position-relative overflow-hidden text-white bg-primary bg-size-contain home-about js-bg-image"
    data-image-src="frontAssets/images/lines.svg" style="display: none;">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-10 col-lg-8 col-xl-7">
                    <!-- start section header -->
                    <div class="section-header text-center mb-5" data-aos="fade-down">
                        <div class="d-inline-block font-caveat fs-1 fw-medium section-header__subtitle text-capitalize">
                            Discover Why the USA and Canada Are Top Study Destinations</div>
                        <h2 class="display-5 fw-semibold mb-3 section-header__title text-capitalize"> Why Choose the USA
                            or Canada for Your Higher Education?
                        </h2>
                    </div>
                    <!-- end /. section header -->
                </div>
            </div>
        </div>
        <div class="row d-flex align-items-stretch">
            <!-- USA Card -->
            <div class="col-12 col-md-6 mb-4 d-flex">
                <div class="card d-flex flex-column w-100">
                    <img src="frontAssets/images/popup/USA.png" class="card-img-top" alt="USA"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Study in the USA</h5>
                            <div class="mb-4">
                            <div>
                                <i class="fa fa-check-circle me-2 check-box-color"></i>
                                <strong>World-Class Education:</strong> The USA is home to many of the world’s top-ranked universities, offering cutting-edge programs and research opportunities.
                            </div>
                            <div>
                                <i class="fa fa-check-circle me-2 check-box-color"></i>
                                <strong>Diverse Programs:</strong> Study a variety of subjects, particularly in
                                technology, business, and engineering.
                            </div>
                            <div>
                                <i class="fa fa-check-circle me-2 check-box-color"></i>
                                <strong>Career Opportunities:</strong> Gain career opportunities, especially in the
                                tech and business sectors after graduation.
                            </div>    
                            <div>
                                <i class="fa fa-check-circle me-2 check-box-color"></i>
                                <strong>Scholarships for International Students:</strong> Explore numerous scholarships
                                to fund your studies.
                            </div>
                            </div>
                        <a href="{{ route('universityList', ['country[]' => 'United State America(USA)']) }}"
                            class="btn btn-primary mt-auto w-100">
                            Start Exploring Universities in the USA
                        </a>
                    </div>
                </div>
            </div>

            <!-- Canada Card -->
            <div class="col-12 col-md-6 mb-4 d-flex">
                <div class="card d-flex flex-column w-100">
                    <img src="frontAssets/images/popup/Canada.png" class="card-img-top" alt="Canada"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Study in Canada</h5>
                        <div class="mb-4">
                            <div>
                            <i class="fa fa-check-circle me-2 check-box-color"></i>
                            <strong>Affordable Education:</strong> Education in Canada is more affordable
                                compared to many other countries, with high-quality programs.
                            </div> 
                            <div>
                            <i class="fa fa-check-circle me-2 check-box-color"></i>  
                            <strong>Welcoming Environment:</strong> Canada is known for its multicultural and
                                friendly society.
                            </div> 
                            <div>
                            <i class="fa fa-check-circle me-2 check-box-color"></i>
                            <strong>Work and Study:</strong> Work during your studies and explore
                                post-graduation work permits for valuable work experience.
                            </div> 
                            <div>
                            <i class="fa fa-check-circle me-2 check-box-color"></i>
                            <strong>Safety and Quality of Life:</strong> Canada is one of the safest countries,
                                offering a high quality of life.
                            </div>     
                            </div>
                        <a href="{{ route('universityList', ['country[]' => 'Canada']) }}"
                            class="btn btn-primary mt-auto w-100">
                            Start Exploring Universities in Canada
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- start place carousel -->
        <div class="owl-carousel owl-theme place-carousel owl-nav-center" data-aos="fade-left">
            @if(count($locations) > 0)
            @foreach($locations as $location)
            <!-- start region card -->
            <div class="region-card rounded-4 overflow-hidden position-relative text-white">
                <div class="region-card-image">
                    <img src="{{ $location->image }}" alt="{{ $location->country_name }}"
                        class="h-100 object-fit-cover w-100">
                </div>
                <div class="region-card-content d-flex flex-column h-100 position-absolute start-0 top-0 w-100">
                    <div class="region-card-info">
                        <h4 class="font-caveat mb-0">{{ $location->country_name }}</h4>
                        <span>{{ $location->listings_count }} listings</span>
                    </div>
                    <a href="{{ route('universityList', ['country[]' => $location->id]) }}"
                        class="align-items-center d-flex fw-semibold justify-content-between mt-auto region-card-link">
                        <div class="fs-12 region-card-link-text text-uppercase text-white">Explore more</div>
                        <div
                            class="align-items-center bg-blur text-white btn-icon-md d-flex end-0 justify-content-center rounded-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z">
                                </path>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
<div id="skeleton" class="container py-5" style="display: block;">
    <!-- Skeleton for Heading -->
    <div class="skeleton-heading shimmer mb-4 mx-auto"></div>

    <!-- Skeleton for Top Row (Two Cards Side by Side) -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="skeleton-card shimmer rounded-4"></div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="skeleton-card shimmer rounded-4"></div>
        </div>
    </div>

    <!-- Skeleton for Bottom Card (Centered Below) -->
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="skeleton-card shimmer rounded-4"></div>
        </div>
    </div>
</div>
<!-- start testimonial section -->
<div class="py-5 dark-overlay overflow-hidden m-3 bg-white">
    <div class="container py-4 overlay-content">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-10 col-lg-8 col-xl-7">
                <!-- start section header -->
                <div class="section-header text-center mb-5" data-aos="fade-down">
                    <!-- start subtitle -->
                    <div
                        class="d-inline-block font-caveat fs-1 fw-medium section-header__subtitle text-capitalize text-primary">
                        Testimonials
                    </div>
                    <!-- end /. subtitle -->
                    <!-- start title -->
                    <h2 class="display-5 fw-semibold mb-3 section-header__title text-capitalize">
                        What Our Students Say
                    </h2>
                    <!-- end /. title -->
                    <!-- start description -->
                    <div class="sub-title fs-16">
                        Real stories from students who found success through FindMyUniversities.com
                    </div>
                    <!-- end /. description -->
                </div>
                <!-- end /. section header -->
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-10 col-lg-10">
                <div class="testimonial-carousel owl-carousel owl-theme">
                    <!-- Testimonial 1 -->
                    <div class="testimonial-item">
                        <div class="text-center mb-3">
                            <img src="assets/images/quote-white.svg" alt="" class="m-auto w-auto">
                        </div>
                        <div class="fs-3 text-center mb-3">
                            "FindMyUniversities.com helped me discover the perfect MBA program in the USA. Now, I'm
                            working at a top firm in New York City and couldn’t be happier with the direction my career
                            has taken."
                        </div>
                        <div class="d-flex justify-content-center gap-4">
                            <div>
                                <img src="frontAssets/images/john.jpeg" alt="John Doe" class="rounded-circle mb-3"
                                    style="width: 100px; height: 100px;">
                            </div>
                            <div class="mt-3">
                                <h5 class="fw-semibold mb-1">John Doe</h5>
                                <span class="text-primary fs-14">MBA Graduate, USA</span>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 2 -->
                    <div class="testimonial-item">
                        <div class="text-center mb-3">
                            <img src="assets/images/quote-white.svg" alt="" class="m-auto w-auto">
                        </div>
                        <div class="fs-3 text-center mb-3">
                            "Thanks to their guidance, I found an amazing university in Canada where I’m now studying
                            Biotechnology. The experience has been incredible both academically and personally."
                        </div>
                        <div class="d-flex justify-content-center gap-4">
                            <div>
                                <img src="frontAssets/images/emli.jpeg" alt="Emily Clark" class="rounded-circle mb-3"
                                    style="width: 100px; height: 100px;">
                            </div>
                            <div class="mt-3">
                                <h5 class="fw-semibold mb-1">Emily Clark</h5>
                                <span class="text-primary fs-14">Biotechnology Student, Canada</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end /. testimonial section -->
<div id="university" style="display: none;"
    class="py-5 bg-light rounded-4 mx-3 my-3 bg-size-contain js-bg-image js-bg-image-lines"
    data-image-src="assets/images/lines.svg">
    <div class="container">
        <div class="align-items-end row g-4 mb-5" data-aos="fade-down">
            <div class="col">
                <!-- start section header -->
                <div class="section-header">
                    <!-- start title -->
                    <h2
                        class="fw-semibold mb-0 section-header__title text-capitalize text-center text-xl-start display-6">
                        Most Popular Universities</h2>
                </div>
                <!-- end /. section header -->
            </div>
            <div class="col-12 col-xl-auto">
                <!-- start button -->
                <a href="{{ route('universityList') }}"
                    class="align-items-center d-flex fs-14 fw-bold gap-2 justify-content-center justify-content-xl-end l-spacing-1 text-primary text-uppercase">
                    See All
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z">
                        </path>
                    </svg>
                </a>
                <!-- end /. button -->
            </div>
        </div>

        <div class="row g-4">
            @if(count($universities) > 0)
            @foreach($universities as $university)
            <!-- Each university card will now take up 6 columns on large screens, 12 on small -->
            <div class="col-lg-6 col-md-12 d-flex">
                <!-- start card list -->
                <div class="border-0 card card-hover flex-fill overflow-hidden rounded-4 w-100" style="height: 270px;">
                    <a href="{{ route('listing', ['slug' => $university->slug]) }}" class="stretched-link"></a>
                    <div class="card-body p-0">
                        <div class="g-0 h-100 row">
                            <div class="bg-white col-lg-5 col-md-5 col-xxl-5 position-relative">
                                <div class="card-image-hover dark-overlay h-100 overflow-hidden position-relative">
                                    <!-- start image -->
                                    <img src="{{$university->featured_image}}" alt="{{ $university->name }}"
                                        class="w-100 object-fit-cover" style="height: 270px;">
                                    <!-- end /. image -->
                                    <div
                                        class="bg-blur card-badge d-inline-block position-absolute start-0 text-white z-2">
                                        @if($university->is_featured)
                                        <i class="fa-solid fa-star text-warning"></i>
                                        Featured
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-xxl-7 p-3 p-lg-4 p-md-3 p-sm-4">
                                <div class="d-flex flex-column h-100">
                                    <!-- <div class="d-flex end-0 gap-2 me-3 mt-3 position-absolute top-0 z-1">
                                        <a href="#"
                                            class="align-items-center bg-light btn-icon d-flex justify-content-center rounded-circle text-primary"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Bookmark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                <path
                                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div> -->
                                    <h4 class="fs-19 fw-semibold mb-0">
                                        <span>{{ Str::limit($university->name, 50) }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            fill="currentColor" class="bi bi-patch-check-fill text-success"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z">
                                            </path>
                                        </svg>
                                    </h4>
                                    <div class="d-flex flex-wrap gap-3 mt-2 z-1 mb-4">
                                        <a href="tel:+4733378901"
                                            class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                fill="#9b9b9b" class="bi bi-telephone" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                            </svg>
                                            <span>{{$university->phone}}</span>
                                        </a>
                                        <a href="#" class="d-flex gap-2 align-items-center fs-14 text-muted">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                                <path
                                                    d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                            </svg>
                                            <span>{{$university->country_name}}</span>
                                        </a>
                                    </div>
                                    <div>
                                        <p class="fs-14 text-muted mb-2">
                                            {{ Str::limit($university->description, 50) }}
                                        </p>
                                    </div>
                                    <p class="fs-16 mt-auto">
                            Scholarships Available:
                            @if($university->scholarships_available == 1)
                            Yes
                            @else
                            No
                            @endif
                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
<form action="{{ route('universityList') }}" id="pop_form" method="GET" data-parsley-validate>
    <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fixed-size">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row gx-0" style="height:650px;">
                        <div class="col-md-6">
                            <img src="frontAssets/images/popup/popup1.jpg" class="object-fit-cover w-100 h-100 ">
                        </div>
                        <div class="col-md-6 d-flex flex-column justify-content-between bg-white">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="p-4">
                                <h4 class="fw-semibold mb-2 text-center">Help us to know you better</h4>
                                <p class="mb-2 text-center">Thanks for visiting FindMyUniversities.com today!</p>
                                <p class="text-muted">Select the countries where you wish to pursue further education.
                                </p>
                            </div>
                            <div class="mb-4 px-4">
                                <select name="country" id="countryselect" data-placeholder="Select Countries"
                                    class="form-select select2 search-select-field" multiple
                                    data-parsley-errors-container="#countries-error" required>
                                    <option value="">Select Location</option>
                                    @if(count($locations) > 0)
                                    @foreach ($locations as $location)
                                    <option value="{{ $location->id }}" data-flag="{{ asset($location->flag) }}">
                                        {{ $location->country_name }}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                                <div id="countries-error"></div>
                            </div>
                            <div class="d-flex justify-content-center px-4 mb-3 mt-auto">
                                <button type="button" class="btn btn-primary w-50" id="nextButton"
                                    data-bs-target="#stateModal" data-prev="#subscribeModal">NEXT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="stateModal" tabindex="-1" aria-labelledby="stateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fixed-size">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row gx-0" style="height:650px;">
                        <div class="col-md-6">
                            <img src="frontAssets/images/popup/cities.jpg" class="object-fit-cover w-100 h-100">
                        </div>
                        <div class="col-md-6 d-flex py-3 flex-column justify-content-between bg-white">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="px-4">
                                <h4 class="fw-semibold mb-2 text-center">Help us to know you better</h4>
                                <p class="text-muted">Specify the cities where you would like to pursue your studies.
                                </p>
                            </div>
                            <div class="mb-4 px-4">
                                <label for="state-country-select" class="form-label">Selected Countries:</label>
                                <select id="state-country-select" name="country[]" class="form-select select2"
                                    multiple="multiple" data-placeholder="Select Countries">
                                    @foreach ($locations as $location)
                                    <option value="{{ $location->id }}" data-flag="{{ asset($location->flag) }}">
                                        {{$location->country_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4 px-4">
                                <select name="state[]" id="stateselect" data-placeholder="Select State"
                                    class="form-select select2 search-select-field"
                                    data-parsley-errors-container="#states-error" multiple>
                                </select>
                                <div id="states-error"></div>
                            </div>

                            <div class="d-flex justify-content-center gap-4 px-4 mb-3 mt-auto">
                                <button type="button" class="btn btn-secondary w-50" id="previousButton"
                                    data-prev="#subscribeModal">PREVIOUS</button>
                                <button type="button" class="btn btn-primary w-50" id="nextStateButton"
                                    data-bs-target="#ProgramModal" data-prev="#stateModal">NEXT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ProgramModal" tabindex="-1" aria-labelledby="ProgramModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fixed-size" style="height:700px">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row gx-0" style="height:650px;">
                        <div class="col-md-6">
                            <img src="frontAssets/images/popup/programs.jpg" class="object-fit-cover w-100 h-100 ">
                        </div>
                        <div class="col-md-6 d-flex py-3 flex-column justify-content-between bg-white">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="px-4">
                                <h4 class="fw-semibold mb-2 text-center">Help us to know you better</h4>
                                <p class="text-muted">Please select the program which most closely relates to you</p>
                            </div>
                            <!-- <h6 class="fw-semibold mb-4 px-4">India</h6> -->
                            <div class="mb-4 px-4">
                                <select name="program" id="programselect" data-placeholder="Select Program"
                                    class="form-select select2 search-select-field"
                                    data-parsley-errors-container="#programs-error" multiple>
                                    <!-- Programs will be dynamically populated here -->
                                </select>
                                <div id="programs-error"></div>
                            </div>
                            <div class="d-flex justify-content-center gap-4 px-4 mt-auto">
                                <button type="button" class="btn btn-secondary w-50" id="previousProgramButton"
                                    data-prev="#stateModal">PREVIOUS</button>
                                <button type="button" class="btn btn-primary w-50" id="nextProgramButton"
                                    data-bs-target="#departmentModal" data-prev="#ProgramModal">NEXT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="departmentModal" tabindex="-1" aria-labelledby="departmentModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fixed-size">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row gx-0" style="height:650px;">
                        <div class="col-md-6">
                            <img src="frontAssets/images/popup/departments.jpg" class="object-fit-cover w-100 h-100 ">
                        </div>
                        <div class="col-md-6 d-flex py-3 flex-column justify-content-between bg-white">

                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="px-4">
                                <h4 class="fw-semibold mb-2 text-center">Help us to know you better</h4>
                                <p class="text-muted">Select the department that will offer the most opportunities for
                                    your professional growth.</p>
                            </div>
                            <div class="mb-4 px-4">
                                <label for="selectedPrograms">Selected Programs:</label>
                                <select id="selectedPrograms" name="program[]" class="form-select select2"
                                    multiple="multiple" data-placeholder="Select Programs">
                                </select>
                            </div>
                            <div class="mb-4 px-4">
                                <label for="departmentSelect">Select Departments:</label>
                                <select name="department[]" id="departmentselect" data-placeholder="Select Departments"
                                    class="form-select select2 search-select-field departmentselect"
                                    data-parsley-errors-container="#departments-error" multiple>
                                    <option value="">Select Departments</option>
                                    @if(count($departments) > 0)
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"
                                        {{ in_array($department->id, request('department', [])) ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                                <div id="departments-error"></div>
                            </div>
                            <div class="d-flex justify-content-center gap-4 px-4 mb-3 mt-auto">
                                <button type="button" class="btn btn-secondary w-50" id="previousDepartmentButton"
                                    data-prev="#ProgramModal">PREVIOUS</button>
                                <button type="button" class="btn btn-primary w-50" id="nextDepartmentButton"
                                    data-bs-target="#scholorshipModal" data-prev="#departmentModal">NEXT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="scholorshipModal" tabindex="-1" aria-labelledby="scholorshipModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fixed-size">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row gx-0" style="height:650px;">
                        <div class="col-md-6">
                            <img src="frontAssets/images/popup/scholorships.jpg" class="object-fit-cover w-100 h-100">
                        </div>
                        <div class="col-md-6 d-flex py-3 flex-column justify-content-between bg-white">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="px-4 mt-5">
                                <h4 class="fw-semibold mb-2 text-center">Help us to know you better</h4>
                                <p class="text-muted text-center">Would you like to select scholarship options?</p>
                            </div>
                            <div class="mb-4 d-flex gap-4 justify-content-center">
                                <button
                                    class="border border-dashed rounded p-2 d-flex align-items-center justify-content-center gap-3 square-button"
                                    id="scholarshipYes">
                                    <i class="fas fa-check text-success"></i>
                                    <p class="mb-0">Yes</p>
                                </button>
                                <button
                                    class="border border-dashed rounded p-2 d-flex align-items-center justify-content-center gap-3 square-button"
                                    id="scholarshipNo">
                                    <i class="fas fa-times text-danger"></i>
                                    <p class="mb-0">No</p>
                                </button>
                            </div>
                            <div class="text-center px-4 mb-3 mt-auto">
                                <button type="button" class="btn btn-secondary w-50" id="previousScholarshipButton"
                                    data-prev="#tutionModal">PREVIOUS</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- end /. blog section -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
<script>
$(document).ready(function() {
    // Load spinner on page load
    window.onload = function() {
        var loader = document.getElementById('fullPageLoader');
        loader.style.opacity = '0';

        setTimeout(function() {
            loader.style.display = 'none';
        }, 500);
    };

    // Country select
    $('#country-select').select2({
        maximumSelectionLength: 3,
        placeholder: "Select Country",
        allowClear: true,
        width: '100%',
        templateSelection: function(selected) {
            if (selected.length > 1) {
                var remaining = selected.length - 1;
                return selected[0].text + ' + ' + remaining + ' more';
            }
            return selected.text;
        },
        templateResult: function(state) {
            if (!state.id) {
                return state.text;
            }
            var flagUrl = $(state.element).data('flag');
            var $state = $('<span><img src="' + flagUrl +
                '" style="width: 20px; height: 15px; margin-right: 5px;">' + state.text +
                '</span>');
            return $state;
        },
        dropdownParent: $('#country-select').parent()
    });

    // Initialize Select2 for department select
    // $('#department-select').select2({
    //     maximumSelectionLength: 3,
    //     placeholder: "Select Department",
    //     allowClear: true,
    //     templateSelection: function(selected) {
    //         if (selected.length > 1) {
    //             var remaining = selected.length - 1;
    //             return selected[0].text + ' + ' + remaining + ' more';
    //         }
    //         return selected.text;
    //     },
    //     dropdownParent: $('#department-select').parent()
    // });

    // Load spinner on page load
    // window.onload = function() {
    //     var loader = document.getElementById('fullPageLoader');
    //     loader.style.opacity = '0';

    //     setTimeout(function() {
    //         loader.style.display = 'none';
    //     }, 500);
    // };

    // Next button in the country modal
    $('#nextButton').on('click', function() {
        var selectedCountries = $('#countryselect').val();
        if (selectedCountries && selectedCountries.length > 0) {
            $('#state-country-select').val(selectedCountries).trigger('change');
            $.ajax({
                url: '/getStatesByCountry',
                type: 'GET',
                data: {
                    countries: selectedCountries
                },
                dataType: 'json',
                success: function(states) {
                    var stateSelect = $('#stateselect');
                    stateSelect.empty();

                    $.each(states, function(index, state) {
                        stateSelect.append(new Option(state.state_name, state.id));
                    });
                    stateSelect.trigger('change');

                    $('#stateModal').modal('show');
                }
            });
        }
    });

    // Change event for country select
    $('#state-country-select').on('change', function() {
        var selectedCountries = $(this).val();

        if (selectedCountries && selectedCountries.length > 0) {
            $.ajax({
                url: '/getStatesByCountry',
                type: 'GET',
                data: {
                    countries: selectedCountries
                },
                dataType: 'json',
                success: function(states) {
                    var stateSelect = $('#stateselect');
                    stateSelect.empty();

                    $.each(states, function(index, state) {
                        stateSelect.append(new Option(state.state_name, state.id));
                    });
                    stateSelect.trigger('change');
                }
            });
        }
    });

    // Next state button
    $('#nextStateButton').on('click', function() {
        var selectedCountry = $('#countryselect').val();
        var selectedState = $('#stateselect').val();

        if (selectedCountry && selectedState) {
            $.ajax({
                url: '/getProgramsByCountryState',
                type: 'GET',
                data: {
                    country_id: selectedCountry,
                    state_id: selectedState
                },
                dataType: 'json',
                success: function(programs) {
                    var programSelect = $('#programselect');
                    programSelect.empty();

                    $.each(programs, function(index, program) {
                        programSelect.append(new Option(program.program_name,
                            program.id));
                    });
                }
            });
        }
    });

    // Next program button
    $('#nextProgramButton').on('click', function() {
        var selectedPrograms = $('#programselect').val();
        var selectedProgramNames = $('#programselect option:selected').map(function() {
            return $(this).text();
        }).get();

        if (selectedPrograms.length > 0) {
            $('#selectedPrograms').empty();
            $.each(selectedPrograms, function(index, programId) {
                $('#selectedPrograms').append(new Option(selectedProgramNames[index], programId,
                    true, true));
            });
        }
    });

    // Program select change event to load departments
    $('#program-select, #programselect').on('change', function() {
        var programId = $(this).val();
        var target = $(this).attr('id') === 'programselect' ? '#departmentselect' :
            '#department-select';

        $(target).empty();

        if (programId) {
            $.ajax({
                url: '/get-departments-by-program/' + programId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.length > 0) {
                        $(target).append('<option value="">Select Departments</option>');
                        $.each(data, function(key, value) {
                            $(target).append('<option value="' + value.id + '">' +
                                value.name + '</option>');
                        });
                    }
                }
            });
        }
    });

    $('#countryselect').select2({
        placeholder: "Select Countries",
        allowClear: true,
        width: '100%',
        templateSelection: function(data) {
            if (data.id) {
                var flagUrl = $(data.element).data('flag');
                return $('<span><img src="' + flagUrl +
                    '" style="width: 20px; height: 15px; margin-right: 5px;"> ' + data.text +
                    '</span>');
            }
            return data.text;
        },
        templateResult: function(data) {
            if (!data.id) {
                return data.text;
            }
            var flagUrl = $(data.element).data('flag');
            if (flagUrl) {
                var $state = $('<span><img src="' + flagUrl +
                    '" style="width: 20px; height: 15px; margin-right: 5px;"> ' + data.text +
                    '</span>');
                return $state;
            }
            return data.text;
        },
        dropdownParent: $('#subscribeModal')
    });

    // Scholarship buttons
    document.getElementById('scholarshipYes').addEventListener('click', function() {
        window.location.href = "{{ route('universityList') }}?scholarship=1";
    });

    document.getElementById('scholarshipNo').addEventListener('click', function() {
        window.location.href = "{{ route('universityList') }}?scholarship=0";
        $('#departmentselect').empty();

        if (programId) {
            $.ajax({
                url: '/get-departments-by-program/' + programId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.length > 0) {
                        $('#departmentselect').append(
                            '<option value="">Select Departments</option>');
                        $.each(data, function(key, value) {
                            $('#departmentselect').append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                }
            });
        }
    });

    function validateCountries() {
        const selectedCountries = $('#countryselect').val();
        if (!selectedCountries || selectedCountries.length === 0) {
            $('#countries-error').text('Please select at least one country.').css('color', 'red');
            return false;
        } else {
            $('#countries-error').text('');
            return true;
        }
    }

    function validateStates() {
        const selectedStates = $('#stateselect').val();
        if (!selectedStates || selectedStates.length === 0) {
            $('#states-error').text('Please select at least one state.').css('color', 'red');
            return false;
        } else {
            $('#states-error').text('');
            return true;
        }
    }

    function validatePrograms() {
        const selectedPrograms = $('#programselect').val();
        if (!selectedPrograms || selectedPrograms.length === 0) {
            $('#programs-error').text('Please select at least one program.').css('color', 'red');
            return false;
        } else {
            $('#programs-error').text('');
            return true;
        }
    }

    function validateDepartments() {
        const selectedDepartment = $('#departmentselect').val();
        if (!selectedDepartment || selectedDepartment.length === 0) {
            $('#departments-error').text('Please select at least one department.').css('color', 'red');
            return false;
        } else {
            $('#departments-error').text('');
            return true;
        }
    }

    // Handle navigation between modals
    $('#nextButton').on('click', function() {
        if (validateCountries()) {
            $('#subscribeModal').modal('hide');
            $('#stateModal').modal('show');
        }
    });

    $('#previousButton').on('click', function() {
        $('#stateModal').modal('hide');
        $('#subscribeModal').modal('show');
    });

    $('#nextStateButton').on('click', function() {
        if (validateStates()) {
            $('#stateModal').modal('hide');
            $('#ProgramModal').modal('show');
        }
    });

    $('#previousProgramButton').on('click', function() {
        $('#ProgramModal').modal('hide');
        $('#stateModal').modal('show');
    });

    $('#nextProgramButton').on('click', function() {
        if (validatePrograms()) {
            $('#ProgramModal').modal('hide');
            $('#departmentModal').modal('show');
        }
    });

    $('#previousDepartmentButton').on('click', function() {
        $('#departmentModal').modal('hide');
        $('#ProgramModal').modal('show');
    });

    $('#nextDepartmentButton').on('click', function() {
        if (validateDepartments()) {
            $('#departmentModal').modal('hide');
            $('#scholorshipModal').modal('show');
        }
    });
    $('#previousScholarshipButton').on('click', function() {
        $('#scholorshipModal').modal('hide');
        $('#departmentModal').modal('show');
    });

    $('#countryselect').on('change', function() {
        if (validateCountries()) {
            $('#countries-error').text('');
        }
    });

    // Validation for states
    $('#stateselect').on('change', function() {
        if (validateStates()) {
            $('#states-error').text('');
        }
    });

    // Validation for programs
    $('#programselect').on('change', function() {
        if (validatePrograms()) {
            $('#programs-error').text('');
        }
    });
    $('#departmentselect').on('change', function() {
        if (validateDepartments()) {
            $('#programs-error').text('');
        }
    });
});
$(document).ready(function() {

    $('#program-select').on('change', function() {
        if ($(this).val()) {
            $('#program-error').text('');
        }
    });

    $('#country-select').on('change', function() {
        if ($(this).val()) {
            $('#country-error').text('');
        }
    });

    $('#department-select').on('change', function() {
        if ($(this).val()) {
            $('#department-error').text('');
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        // Hide the skeleton loader
        document.getElementById('skeleton-loader').classList.add('d-none');

        // Show the actual form content
        document.getElementById('form-content').classList.remove('d-none');
    }, 2000); // Simulate 2 seconds load time
});
document.addEventListener("DOMContentLoaded", function() {
    // Wait a short time to simulate loading
    setTimeout(function() {
        // Hide skeleton and show main content
        document.getElementById("skeleton-container").style.display = "none";
        document.getElementById("program-container").style.display = "block";
    }, 1500); // Adjust time as needed for loading effect
});

document.addEventListener("DOMContentLoaded", function() {
    // Simulate content loading delay (e.g., 2 seconds)
    setTimeout(function() {
        document.getElementById("skeleton-top-regions").style.display = "none";
        document.getElementById("actual-top-regions").style.display = "block";
    }, 2000); // Adjust delay as needed
});

function toggleVisibility() {

    document.getElementById('skeleton').style.display = 'block';
    document.getElementById('university').style.display = 'none';

    // After a delay, hide skeleton and show university
    setTimeout(function() {
        document.getElementById('skeleton').style.display = 'none';
        document.getElementById('university').style.display = 'block';
    }, 3000); // Adjust the timeout duration as needed (3000 ms = 3 seconds)
}

// Call the function to start the process
toggleVisibility();
</script>

@endsection