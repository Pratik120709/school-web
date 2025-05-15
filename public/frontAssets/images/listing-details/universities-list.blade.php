@extends('website.layout.master')

@section('content')

<!-- header -->
<nav class="custom-navbar navbar navbar-expand-lg ">
    <div class="container">
    <a class="navbar-brand m-0" href="{{route('homepage')}}">
            <img class="logo-white" src="frontAssets/images/university-logo__1__1-removebg-preview.png" alt="" style="width: 110px;
    height: 80px;">
            <img class="logo-dark" src="frontAssets/images/university-logo__1__1-removebg-preview.png" alt="" style="width: 110px;
    height: 80px;">
        </a>
        <div class="d-flex order-lg-2">
            <!-- start button -->
            <a href="" class="d-flex align-items-center justify-content-center p-0 btn-user position-relative"
                data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"
                data-bs-title="Favourite">
                <i class="fa-solid fa-heart"></i>
                <span
                    class="align-items-center bg-primary d-flex end-0 fs-11 justify-content-center nav-count position-absolute rounded-circle text-white">0</span>
            </a>
            <!-- end /. button -->
            <!-- start button -->
            <a href="" class="d-flex align-items-center justify-content-center p-0 btn-user" data-bs-toggle="tooltip"
                data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Sign In">
                <i class="fa-solid fa-user-plus"></i>
            </a>
            <!-- end /. button -->
            <!-- start button -->
            <button type="button" id="themeToggleBtn"
                class="align-items-center bg-transparent border-0 btn-user d-flex justify-content-center p-0">
                <i class="fa-solid fa-moon"></i>
            </button>
            <!-- end /. button -->
            <!-- start button -->
            <!-- <a href="add-listing.html" class="btn btn-primary d-none d-sm-flex fw-medium gap-2 hstack rounded-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
                <div class="vr d-none d-sm-inline-block"></div>
                <span class="d-none d-sm-inline-block">Add Listing</span>
            </a> -->
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
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('homepage') }}" aria-current="page" role="button" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false">
                        Home
                    </a>

                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homepage') }}" aria-current="page">
                        Home
                    </a>
                </li>
                <li class="nav-item dropdown">

                    <a class="nav-link active" href="" role="button" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false">
                        <i class="typcn typcn-weather-stormy top-menu-icon"></i>Universities
                    </a>
                </li>
            </ul>
            <!-- <div class="d-sm-none">
               
                <a href="" class="btn btn-primary d-flex gap-2 hstack justify-content-center rounded-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    <div class="vr d-none d-sm-inline-block"></div>
                    <span>Add Listing</span>
                </a>
               
            </div> -->
        </div>
    </div>
</nav>
<!-- end header -->
<div class="col-lg-12">
    <!-- start search content -->
  
   
        <div class="col-lg-3 col-md-4 col-mg-3 mt-3 d-xl-none gap-3 gap-md-2 hstack justify-content-center">
                    <a href="#" class="sidebarCollapse align-items-center d-flex justify-content-center filters-text fw-semibold gap-2">
                        <i class="fa-solid fa-arrow-up-short-wide fs-18"></i>
                        <span>All filters</span>
                    </a>
                    <div class="h-75 mt-auto vr d-md-none"></div>
                    <!-- <a href="#" id="mapCollapse" class="align-items-center d-flex justify-content-center filters-text fw-semibold gap-2">
                        <i class="fa-solid fa-map-location-dot fs-18"></i>
                        <span>Map</span>
                    </a> -->
                </div>
        <!-- <button type="submit" class="btn btn-primary rounded-5 mt-3 mt-md-0 d-flex align-items-center">
            <i class="fas fa-search me-2"></i> Search
        </button> -->
    </div>
    <!-- end /. search content -->
</div>

<div class="py-3 py-xl-5 bg-gradient">
    <div class="container-fluid px-5">
        <div class="row">
            <aside class="col-xl-3 filters-col content pe-lg-4 pe-xl-5 shadow-end">
                <!-- start sidebar filters -->
                <div class="js-sidebar-filters-mobile">
                    <!-- filter header -->
                    <div
                        class="border-bottom d-flex justify-content-between align-items-center p-3 sidebar-filters-header d-xl-none">
                        <div
                            class="align-items-center btn-icon d-flex filter-close justify-content-center rounded-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path
                                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                            </svg>
                        </div>
                        <span class="fs-3 fw-semibold">Filters</span>
                        <span class="text-primary fw-medium">Clear</span>
                    </div>
                    <!-- end /. filter header -->
                    <div class="sidebar-filters-body p-3 p-xl-0">
                        <div class="mb-4 border-bottom pb-4">
                            <!-- <div class="mb-3">
                                    <h4 class="fs-5 fw-semibold mb-2">Categories</h4>
                                    <p class="mb-0 small">Duis a leo sit amet odio volutpat auctor ut a lorem.</p>
                                </div> -->
                            <!-- Start Form Check -->
                            <div class="mb-4 border-bottom pb-4">
                                <div class="mb-3">
                                    <h4 class="fs-5 fw-semibold mb-1">Location</h4>
                                </div>
                                <!-- Start Select2 -->
                                <div class="mb-3">
                                    <label for="country-select" class="form-label">Country</label>
                                    <select id="country-select" class="form-select">
                                    <option value="">Select Country</option>

                                    @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->country_name }}</option> 
                                @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="state-select" class="form-label">State</label>
                                    <select id="state-select" class="form-select">
                                        <option value="">Select State</option>
                                        @foreach ($state as $states)
                                        <option value="{{ $states->id }}">{{ $states->state_name }}</option> 
                                    @endforeach
                                    </select>
                                </div>
                                <!-- /.End Select2 -->
                            </div>

                            <div class="mb-4 border-bottom pb-4">
                                <div class="mb-3">
                                    <h4 class="fs-5 fw-semibold mb-1">Programs</h4>
                                </div>
                                <!-- Start Select2 -->
                                <div class="mb-3">
                                    <select id="country-select" class="form-select">
                                        <option value="">Select Programs</option>
                                        @foreach ($programs as $program)
                                            <option value="{{ $program->id }}">{{ $program->program_name }}</option> <!-- Adjust fields as needed -->
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-4 border-bottom pb-4">
                                <div class="mb-3">
                                    <h4 class="fs-5 fw-semibold mb-1">Deparment</h4>
                                </div>
                                <!-- Start Select2 -->
                                <div class="mb-3">
                                    <select id="country-select" class="form-select">
                                        <option value="">Select Dep</option>
                                        @foreach ($programs as $program)
                                            <option value="{{ $program->id }}">{{ $program->program_name }}</option> <!-- Adjust fields as needed -->
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-4 border-bottom pb-4">
                                <div class="">
                                    <h4 class="fs-5 fw-semibold mb-1">Tution Fees</h4>
                                </div>
                                <!-- Start Select2 -->
                                <div class="">
                                    <div class="js-slider"></div>
                                </div>
                            </div>
                            <!-- End Form Check -->
                            <!-- Start Form Check -->
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="skillsFour">
                                <label class="form-check-label" for="skillsFour">Scholorships<span
                                        class="count fs-13 ms-1 text-muted"></span></label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="skillsFour">
                                <label class="form-check-label" for="skillsFour">Application Fees<span
                                        class="count fs-13 ms-1 text-muted"></span></label>
                            </div>
                            <!-- End Form Check -->
                            <!-- Start Form Check -->
                            <!-- <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" id="skillsFive">
                                    <label class="form-check-label" for="skillsFive">Fees<span class="count fs-13 ms-1 text-muted"></span></label>
                                </div> -->
                            <!-- End Form Check -->
                            <!-- Start Form Check -->
                            <!-- <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" id="skillsSix">
                                    <label class="form-check-label" for="skillsSix">Fitness<span class="count fs-13 ms-1 text-muted">(22)</span></label>
                                </div> -->
                            <!-- End Form Check -->
                            <!-- Start Form Check -->
                            <!-- <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" id="skillsSeven">
                                    <label class="form-check-label" for="skillsSeven">Events<span class="count fs-13 ms-1 text-muted">(21)</span></label>
                                </div> -->
                            <!-- End Form Check -->
                            <!-- Start Form Check -->
                            <!-- <div class="form-check mb-0">
                                    <input class="form-check-input" type="checkbox" value="" id="skillsEight">
                                    <label class="form-check-label" for="skillsEight">Other<span class="count fs-13 ms-1 text-muted">(17)</span></label>
                                </div> -->
                            <!-- End Form Check -->
                        </div>
                        <div class="mb-4 border-bottom pb-4">
                            <div class="mb-3">
                                <h4 class="fs-5 fw-semibold mb-1">Admission Requirements</h4>
                            </div>
                            <!-- Start Select2 -->
                            <label for="fs-13">GPA</label>
                            <div class="js-slider"></div>
                            <label for="fs-13 ">GRE / GMAT</label>
                            <div class="js-slider mb-3"></div>
                            <label for="fs-13 ">TOEFL</label>
                            <div class="js-slider mb-3"></div>
                            <label for="fs-13 ">IELTS</label>
                            <div class="js-slider mb-3"></div>
                            <label for="fs-13 ">PTE</label>
                            <div class="js-slider mb-3"></div>
                            <label for="fs-13 ">DET</label>
                            <div class="js-slider mb-3"></div>
                            <!-- /.End Select2 -->
                        </div>
                        <!-- start apply button -->
                        <button type="button" class="btn btn-primary w-100">Apply filters</button>
                        <!-- end /. apply button -->
                        <!-- start clear filters -->
                        <a href="#"
                            class="align-items-center d-flex fw-medium gap-2 justify-content-center mt-2 small text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                <path
                                    d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                            </svg>
                            Clear filters
                        </a>
                    </div>
                </div>
            </aside>
            @foreach ($query as $university)
            <div class="col-xl-9 ps-lg-4 ps-xl-5 sidebar">
                <div class="d-flex flex-wrap align-items-center mb-3 gap-2">
                    <div class="col fs-18 text-nowrap">All <span class="fw-bold text-dark">{{ $universities->count() }}</span> listing found
                    </div>
                    <div class="border-0 card d-inline-flex flex-row flex-wrap gap-1 p-1 rounded-3 shadow-sm">
                        <a href="" class="btn btn-light btn-sm px-2 py-1"><i class="fa-solid fa-border-all"></i></a>
                        <a href="" class="btn btn-light btn-sm px-2 py-1"><i class="fa-solid fa-list"></i></a>
                    </div>
                </div>
              
                <div class="card border-0 shadow-sm overflow-hidden rounded-4 mb-4 card-hover card-hover-bg">
                    <a href="" class=""></a>
                    <div class="card-body p-0">
                        <div class="g-0 row">
                            <div class="col-lg-5 col-md-5 col-xl-4 position-relative">
                                <div class="card-image-hover dark-overlay h-100 overflow-hidden position-relative">
                                    <img src="{{ $university->featured_image}}" alt=""
                                        class="h-100 w-100 object-fit-cover">
                                    <div
                                        class="bg-blur card-badge d-inline-block position-absolute start-0 text-white z-2">
                                        <i class="fa-solid fa-star me-1"></i>Featured
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-xl-8 p-3 p-lg-4 p-md-3 p-sm-4">
                                <div class="d-flex flex-column h-100">
                                    <div class="d-flex end-0 gap-2 me-3 mt-3 position-absolute top-0 z-1">
                                        <a href=""
                                            class="btn-icon shadow-sm d-flex align-items-center justify-content-center text-primary bg-light rounded-circle"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Bookmark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                <path
                                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div
                                        class="align-items-center d-flex flex-wrap gap-1 text-primary  card-start mb-2">
                                        <i class="fa-solid fa-star"></i>
                                       
                                        <span class="fw-medium text-primary"><span
                                                class="fs-6 fw-semibold me-1">5</span>
                                    </div>
                                    <h4 class="fs-18 fw-semibold mb-0">
                                       {{$university->name}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            fill="currentColor" class="bi bi-patch-check-fill text-success"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z">
                                            </path>
                                        </svg>
                                    </h4>
                                    <div class="d-flex flex-wrap gap-3 mt-2 z-1">
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
                                            <span>{{$university->address}}</span>
                                        </a>
                                    </div>
                                   
                                    <p class="mt-2 fs-15">{{$university->description}}</p>
                                    <div class="mt-2 mb-3" style="min-height: 120px;">
    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                Admission Requirements
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                Scholarships & Tuition Fees
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                Programs
            </a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <!-- Admission Requirements Tab -->
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-md-12 row">
                    <div class="col-md-2 col-6 border-end">
                        <label for="gpa" class="d-block">GPA</label>
                        <div class="range-value" id="gpa-value">{{ $university->gpa }}</div>
                    </div>
                    <div class="col-md-2 col-6 mb-3 border-end">
                        <label for="gre" class="d-block">GRE / GMAT</label>
                        <div class="range-value" id="gre-value">{{ $university->gre }}</div>
                    </div>
                    <div class="col-md-2 col-6 border-end">
                        <label for="toefl" class="d-block">TOEFL</label>
                        <div class="range-value" id="toefl-value">{{ $university->toefl }}</div>
                    </div>
                    <div class="col-md-2 col-6 mb-3 border-end">
                        <label for="ielts" class="d-block">IELTS</label>
                        <div class="range-value" id="ielts-value">{{ $university->ielts }}</div>
                    </div>
                    <div class="col-md-2 col-6 border-end">
                        <label for="pte" class="d-block">PTE</label>
                        <div class="range-value" id="pte-value">{{ $university->pte }}</div>
                    </div>
                    <div class="col-md-2 col-6">
                        <label for="det" class="d-block">DET</label>
                        <div class="range-value" id="det-value">{{ $university->det }}</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Scholarships & Tuition Fees Tab -->
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row">
                <div class="col-md-12 row">
                    <div class="col-md-4 col-6 border-end">
                        <label for="scholarships" class="d-block">Scholarships</label>
                        <div class="range-value" id="scholarships-value">
                            {{ $university->scholarship_available ? 'Yes' : 'No' }}
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <label for="tuition" class="d-block">Tuition Fees</label>
                        <div class="range-value" id="tuition-value">{{ $university->amount }}</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Programs Tab -->
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="row g-4">
                <div class="col-auto col-lg-3 col-6">
                    <div class="d-flex align-items-center text-dark">
                        <div class="flex-shrink-0">
                            <i class="fa-solid fa-user-graduate fs-18 text-primary"></i>
                        </div>
                        <div class="flex-grow-1 fs-16 fw-medium ms-3">
                            {{ $university->program_ename }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                                    <div class="d-flex flex-wrap gap-3 mt-3 z-1">
    <a href="{{ route('listing', ['slug' => $university->slug]) }}" type="button" class="btn btn-primary">View Details</a>
    <a href="#" type="button" class="btn" style="background:#f7a70d;">Apply Now</a>
</div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <nav class="justify-content-center mt-5 pagination align-items-center">
    @if ($universities->onFirstPage())
        <span class="page-numbers prev disabled">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
            </svg>
            Previous
        </span>
    @else
        <a class="prev page-numbers" href="{{ $universities->previousPageUrl() }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
            </svg>
            Previous
        </a>
    @endif

    @foreach ($universities->links()->elements as $element)
        @if (is_string($element))
            <span class="page-numbers current">{{ $element }}</span>
        @elseif (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $universities->currentPage())
                    <span class="page-numbers current">{{ $page }}</span>
                @else
                    <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($universities->hasMorePages())
        <a class="next page-numbers" href="{{ $universities->nextPageUrl() }}">
            Next
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
            </svg>
        </a>
    @else
        <span class="next page-numbers disabled">
            Next
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
            </svg>
        </span>
    @endif
</nav>


                <!-- end /. pagination -->
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- <div>
<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
   <li class="nav-item" role="presentation">
      <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tab 1</a>
   </li>
   <li class="nav-item" role="presentation">
      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tab 2</a>
   </li>
   <li class="nav-item" role="presentation">
      <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Tab 3</a>
   </li>
</ul>
<div class="tab-content" id="myTabContent">
   <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Tab 1 content</div>
   <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Tab 2 content</div>
   <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Tab 3 content</div>
</div>
</div> -->

@endsection