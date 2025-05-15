@extends('website.layout.master')
@section('content')
<nav class="custom-navbar navbar navbar-expand-lg ">
    <div class="container">
    <a class="navbar-brand m-0" href="{{ route('homepage') }}">
            <img class="logo-white" src="frontAssets/images/university-logo__1__1-removebg-preview.png" alt="University Logo" 
                style="width: 150px; height: 100px;">
            <img class="logo-dark" src="frontAssets/images/university-logo__1__1-removebg-preview.png" alt="University Logo" 
                style="width: 150px; height: 100px;">
        </a>
        <div class="d-flex order-lg-2">

            <a href="{{ route('signIn')}}" class="btn btn-primary d-none d-sm-flex fw-medium gap-2 hstack rounded">
                <i class="fa-solid fa-user-plus"></i>
                <div class="vr d-none d-sm-inline-block"></div>
                <span class="d-none d-sm-inline-block">Sign in</span>
            </a>
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

        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 me-3 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('homepage') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('universityList') ? 'active' : '' }}"
                        href="{{ route('universityList') }}">
                        Universities
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('programs') ? 'active' : '' }}" href="{{ route('programs') }}">
                        Programs
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admissions') ? 'active' : '' }}"
                        href="{{ route('admission') }}">
                        Admissions
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                        Contact Us
                    </a>
                </li>
            </ul>
            <div class="d-sm-none">

                <a href="{{ route('signIn') }}"
                    class="btn btn-primary d-flex gap-2 hstack justify-content-center rounded">
                    <i class="fa-solid fa-user-plus"></i>
                    <div class="vr d-none d-sm-inline-block"></div>
                    <span class="">Sign in</span>
                </a>

            </div>
        </div>
    </div>
</nav>
<div class="col-lg-3 col-md-4 col-mg-3 d-xl-none gap-3 gap-md-2 hstack justify-content-center">
    <a href="#" class="sidebarCollapse align-items-center d-flex justify-content-center filters-text fw-semibold gap-2">
        <i class="fa-solid fa-arrow-up-short-wide fs-18"></i>
        <span>All filters</span>
    </a>
</div>
<div class="py-3 py-xl-5 bg-gradient">
    <div class="container-fluid px-5">
        <div class="row">
            <aside class="col-xl-3 filters-col content pe-lg-4 pe-xl-5 shadow-end">
                <div class="js-sidebar-filters-mobile">
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
                    </div>
                    <!-- end /. filter header -->
                    <form method="GET" action="{{ route('universityList') }}">
                        <div class="sidebar-filters-body p-3" style="height:700px; overflow-y: auto;">
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
                                        <select id="country-select" name="country[]" class="form-select select2"
                                            multiple="multiple" data-placeholder="Select Countries">
                                            <option value="">Select Country</option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}|{{ $location->country_name }}" 
                                                    data-flag="{{ asset($location->flag) }}" 
                                                    {{ 
                                                        collect(request('country', []))
                                                            ->contains(function ($value) use ($location) {
                                                                return str_contains($value, $location->id) || str_contains($value, $location->country_name);
                                                            }) 
                                                            ? 'selected' 
                                                            : '' 
                                                    }}>
                                                    {{ $location->country_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="state-select" class="form-label">State</label>
                                        <select id="state-select" name="state[]" class="form-select select2"
                                            multiple="multiple" data-placeholder="Select States">
                                            <option value="">Select State</option>
                                            @foreach ($state as $state)
                                            <!-- Ensure you have $states variable available -->
                                            <option value="{{ $state->id }}"
                                                {{ in_array($state->id, request('state', [])) ? 'selected' : '' }}>
                                                {{ $state->state_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4 border-bottom pb-4">
                                    <div class="mb-3">
                                        <h4 class="fs-5 fw-semibold mb-1">Programs</h4>
                                    </div>
                                    <div class="mb-3">
                                        <select id="program-select" name="program[]" class="form-select select2"
                                            onchange="updateDepartments()">
                                            <option value="">Select Programs</option>
                                            @foreach ($programs as $program)
                                            <option value="{{ $program->id }}"
                                                {{ in_array($program->id, (array) request('program', [])) ? 'selected' : '' }}>
                                                {{ $program->program_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4 border-bottom pb-4">
                                    <div class="mb-3">
                                        <h4 class="fs-5 fw-semibold mb-1">Department</h4>
                                    </div>
                                    <div class="mb-3">
                                        <select id="department-select" name="department[]" class="form-select select2"
                                            data-placeholder="Select Departments" multiple>
                                            <option value="">Select Department</option>
                                            @foreach ($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ in_array($department->id, request('department', [])) ? 'selected' : '' }}>
                                                {{ $department->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4 border-bottom pb-4">
                                    <div class="mb-3">
                                        <h4 class="fs-5 fw-semibold mb-1">Subject</h4>
                                    </div>
                                    <div class="mb-3">
                                        <select id="subject-select" name="subject[]" class="form-select select2"
                                            multiple data-placeholder="Select Subjects">
                                            <option value="">Select Subject</option>
                                            @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}"
                                                {{ in_array($subject->id, request('subject', [])) ? 'selected' : '' }}>
                                                {{ $subject->subject_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="scholarship" value="1"
                                        id="scholarship" {{ request('scholarship') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="scholarship">Scholarships</label>
                                </div>
                            </div>
                            <div class="mb-4 border-bottom pb-4">
                                <div class="mb-3">
                                    <h4 class="fs-5 fw-semibold mb-1">Admission Requirements</h4>
                                </div>
                                <div class="mb-3">
                                    <h5 class="fs-5 fw-semibold mb-1">Test Scores
                                    </h5>
                                </div>
                                <label for="gpa">GPA</label>
                                <input type="text" name="gpa" class="form-control mb-3"
                                    placeholder="Enter GPA (e.g., 3.5)" min="0" step="0.01"
                                    value="{{ request('gpa', '') }}">

                                <label for="gre">GRE / GMAT</label>
                                <input type="text" name="gre" class="form-control mb-3"
                                    placeholder="Enter GRE or GMAT score" min="0" step="0.01"
                                    value="{{ request('gre', '') }}">
                                    <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="gre_estimated" value="1" id="gre-estimated" {{ request('gre_estimated') ? 'checked' : '' }}>
                <label class="form-check-label" for="gre-estimated">I haven’t taken this test yet</label>
            </div>
                            </div>
                            <div class="mb-4 border-bottom pb-4">
                                <div class="mb-3">
                                    <h5 class="fs-5 fw-semibold mb-1">Language Requirements
                                    </h5>
                                </div>
                                <!-- TOEFL -->
                                <label for="toefl">TOEFL</label>
                                <div class="mb-3">
                                    <input type="text" name="toefl" class="form-control mb-3" placeholder="Enter overall TOEFL score"
                                        step="0.01" value="{{ request('toefl', '') }}">
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="toefl_estimated" value="1"
                                        id="toefl-estimated" {{ request('toefl_estimated') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="toefl-estimated">I haven’t taken the TOEFL
                                        yet</label>
                                </div>
                                <!-- IELTS -->
                                <label for="ielts">IELTS</label>
                                <div class="mb-3">
                                    <input type="text" name="ielts" class="form-control mb-3" placeholder="Enter overall IELTS score"
                                        step="0.01" value="{{ request('ielts', '') }}">
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="ielts_estimated" value="1"
                                        id="ielts-estimated" {{ request('ielts_estimated') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="ielts-estimated">I haven’t taken the IELTS
                                        yet</label>
                                </div>
                                <!-- PTE -->
                                <label for="pte">PTE</label>
                                <input type="text" name="pte" class="form-control mb-3"
                                    placeholder="Enter overall PTE score" value="{{ request('pte', '') }}">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="pte_estimated" value="1"
                                        id="pte-estimated" {{ request('pte_estimated') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pte-estimated">I haven’t taken the PTE
                                        yet</label>
                                </div>

                                <!-- DET -->
                                <label for="det">DET</label>
                                <input type="text" name="det" class="form-control mb-3"
                                    placeholder="Enter overall DET score" value="{{ request('det', '') }}">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="det_estimated" value="1"
                                        id="det-estimated" {{ request('det_estimated') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="det-estimated">I haven’t taken the DET
                                        yet</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-between ">
                            <a href="{{ route('universityList') }}" class="btn btn-secondary w-100"
                                style="background-color: grey; color: white; text-align: center; display: inline-block; padding: 10px 20px; border: none; border-radius: 8px; text-decoration: none;"
                                onmouseover="this.style.backgroundColor='red'"
                                onmouseout="this.style.backgroundColor='grey'">
                                Clear filters
                            </a>
                            <button type="submit" class="btn btn-primary w-100"
                                style="padding: 10px 20px; border-radius: 8px;">Apply filters</button>
                        </div>
                    </form>
                </div>
            </aside>
            <div class="col-xl-9 ps-lg-4 ps-xl-5 sidebar">
                <!-- start toolbox  -->
                <div class="d-flex flex-wrap align-items-center mb-3 gap-2">
                    <!-- <div class="col fs-18 text-nowrap">All <span class="fw-bold text-dark">{{$universityCount}}</span>
                        listing found
                    </div> -->
                    <!-- start button group -->
                    <!-- <div class="border-0 card d-inline-flex flex-row flex-wrap gap-1 p-1 rounded-3 shadow-sm">
                        <a href="listings-map-grid-1.html" class="btn btn-light btn-sm px-2 py-1"><i
                                class="fa-solid fa-border-all"></i></a>
                        <a href="listings-map.html" class="btn btn-light btn-sm px-2 py-1"><i
                                class="fa-solid fa-list"></i></a>
                    </div> -->
                    <!-- end /. button group -->
                </div>
                <div id="shimmer-container" class="skeleton-container">

                </div>
                <div id="content-container">

                    @if($query->isEmpty())
                    <div class="text-center">
                        <img src="/frontAssets/images/not-found-image.jpg" class="h-25 w-50" alt="">
                        <p class="fs-3">No universities found matching your criteria.</p>
                    </div>
                    @else
                    @foreach ($query as $university)
                    <div class="card feature-img border-0 shadow-sm overflow-hidden rounded-4 mb-4 card-hover card-hover-bg"
                        style="height: 100%; position: relative;">
                        <a href="" class=""></a>
                        <div class="card-body p-0">
                            <div class="g-0 row">
                                <div class="col-lg-5 col-md-5 col-xl-4 position-relative">
                                    <div
                                        class="card-image-hover dark-overlay  overflow-hidden position-relative height-img">
                                        <img src="{{$university->featured_image}}" alt=""
                                            class="feature-img w-100 object-fit-cover">
                                        <div
                                            class="bg-blur card-badge d-inline-block position-absolute start-0 text-white z-2">
                                            <i class="fa-solid fa-star me-1"></i>Featured
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-xl-8 p-3 p-lg-4 p-md-3 p-sm-4">
                                    <div class="d-flex flex-column h-100">
                                        <div
                                            class="align-items-center d-flex flex-wrap gap-1 text-primary card-start mb-2">
                                            <i class="fa-solid fa-star"></i>
                                            <span class="fw-medium text-primary">
                                                <span class="fs-6 fw-semibold me-1">5</span>
                                            </span>
                                        </div>
                                        <h4 class="fs-18 fw-semibold mb-0"><a
                                                href="{{ route('listing', ['slug' => $university->slug])}}">
                                                {{$university->name}}</a>
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

                                        @php
                                        // Set the maximum number of characters to display
                                        $maxLength = 100;
                                        $description = $university->description;

                                        // Check if the description length exceeds the maximum length
                                        $truncatedDescription = strlen($description) > $maxLength
                                        ? substr($description, 0, $maxLength) . '...'
                                        : $description;
                                        @endphp

                                        <p class="mt-2 fs-15" style="display: none;" id="description-content">
                                            {{ $truncatedDescription }}
                                        </p>

                                        <div class="mt-2 mb-3" style="min-height: 120px;">
                                            <ul class="nav nav-tabs mb-3" id="myTab{{ $loop->index }}" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="home-tab{{ $loop->index }}"
                                                        data-bs-toggle="tab" href="#home{{ $loop->index }}" role="tab"
                                                        aria-controls="home{{ $loop->index }}" aria-selected="true">
                                                        Admission Requirements
                                                    </a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="profile-tab{{ $loop->index }}"
                                                        data-bs-toggle="tab" href="#profile{{ $loop->index }}"
                                                        role="tab" aria-controls="profile{{ $loop->index }}"
                                                        aria-selected="false">
                                                        Scholarships & Tuition Fees
                                                    </a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="contact-tab{{ $loop->index }}"
                                                        data-bs-toggle="tab" href="#contact{{ $loop->index }}"
                                                        role="tab" aria-controls="contact{{ $loop->index }}"
                                                        aria-selected="false">
                                                        Programs
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="tab-content" id="myTabContent{{ $loop->index }}"
                                                data-index="{{ $loop->index }}">
                                                <!-- Admission Requirements -->
                                                <div class="tab-pane fade show active" id="home{{ $loop->index }}"
                                                    role="tabpanel" aria-labelledby="home-tab{{ $loop->index }}">

                                                    @if(!$university->gpa)
                                                    <div class="skeleton skeleton-text shimmer" style="height: 50px;">
                                                    </div>
                                                    @else
                                                    <div class="row"
                                                        id="admission-requirements-content{{ $loop->index }}">
                                                        <div class="col-md-12 row">
                                                            <div class="col-md-2 col-6 border-end">
                                                                <label for="gpa{{ $loop->index }}"
                                                                    class="d-block">GPA</label>
                                                                <div class="range-value"
                                                                    id="gpa-value{{ $loop->index }}">
                                                                    {{ $university->gpa }}</div>
                                                            </div>
                                                            <div class="col-md-2 col-6 border-end">
                                                                <label for="gre{{ $loop->index }}" class="d-block">GRE /
                                                                    GMAT</label>
                                                                <div class="range-value"
                                                                    id="gre-value{{ $loop->index }}">
                                                                    {{ $university->gre }}</div>
                                                            </div>
                                                            <div class="col-md-2 col-6 border-end">
                                                                <label for="toefl{{$loop->index}}"
                                                                    class="d-block">TOEFL</label>
                                                                <div class="range-value"
                                                                    id="toefl-value{{$loop->index}}">
                                                                    {{ $university->toefl }}
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col-6 mb-3 border-end">
                                                                <label for="ielts{{$loop->index}}"
                                                                    class="d-block">IELTS</label>
                                                                <div class="range-value"
                                                                    id="ielts-value{{$loop->index}}">
                                                                    {{ $university->ielts }}
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col-6 border-end">
                                                                <label for="pte{{$loop->index}}"
                                                                    class="d-block">PTE</label>
                                                                <div class="range-value" id="pte-value{{$loop->index}}">
                                                                    {{ $university->pte }}
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col-6">
                                                                <label for="det{{$loop->index}}"
                                                                    class="d-block">DET</label>
                                                                <div class="range-value" id="det-value{{$loop->index}}">
                                                                    {{ $university->det }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="tab-pane fade" id="profile{{ $loop->index }}"
                                                    role="tabpanel" aria-labelledby="profile-tab{{ $loop->index }}">

                                                    @if(!empty($university->scholarship_available) ||
                                                    !empty($university->amount))
                                                    <div class="row" id="scholarships-content{{ $loop->index }}">
                                                        <div class="col-md-4 col-6 border-end">
                                                            <label for="scholarships{{ $loop->index }}"
                                                                class="d-block">Scholarships</label>
                                                            <div class="range-value"
                                                                id="scholarships-value{{ $loop->index }}">
                                                                {{ $university->scholarship_available ? 'Yes' : 'No' }}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-6">
                                                            <label for="tuition{{ $loop->index }}"
                                                                class="d-block">Tuition Fees</label>
                                                            <div class="range-value"
                                                                id="tuition-value{{ $loop->index }}">
                                                                {{ $university->amount ?? 'Not Available' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <p>Scholarship and tuition fee information is not available for this
                                                        university.</p>
                                                    @endif
                                                </div>


                                                <!-- Programs -->
                                                <div class="tab-pane fade" id="contact{{ $loop->index }}"
                                                    role="tabpanel" aria-labelledby="contact-tab{{ $loop->index }}">

                                                    @if(empty($university->programs_list))

                                                    @else
                                                    <div class="row g-4" id="programs-content{{ $loop->index }}">
                                                        @php
                                                        $programs = explode(',', $university->programs_list);
                                                        $visiblePrograms = array_slice($programs, 0, 3);
                                                        $remainingCount = count($programs) - count($visiblePrograms);
                                                        @endphp

                                                        @foreach ($visiblePrograms as $program)
                                                        <div class="col-auto col-lg-3 col-6">
                                                            <div class="d-flex align-items-center text-dark">
                                                                <div class="flex-grow-1 fs-16 fw-medium ms-1">
                                                                    {{ trim($program) }}</div>
                                                            </div>
                                                        </div>
                                                        @endforeach

                                                        @if($remainingCount > 0)
                                                        <div class="col-12 mt-2">
                                                            <a href="#" class="btn btn-outline-primary btn-sm">Show
                                                                {{ $remainingCount }} more programs</a>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-wrap gap-3 mt-auto position-relative">
                                            <a href="{{ route('listing', ['slug' => $university->slug]) }}"
                                                class="btn btn-primary">View Details</a>
                                                <a href="{{ route('listing', ['slug' => $university->slug, 'show_modal' => 1]) }}"
                                                class="btn text-white"
                                                style="background-color: #f7a70d; transition: background-color 0.3s ease;"
                                                onmouseover="this.style.backgroundColor='red'"
                                                onmouseout="this.style.backgroundColor='#f7a70d'">
                                                Apply Now
                                                </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>

                @if($query->isNotEmpty())

                @if ($query->lastPage() > 1)

                <nav class="justify-content-center mt-5 pagination align-items-center">
                    @if ($query->onFirstPage())
                    @else
                    <a class="prev page-numbers" href="{{ $query->previousPageUrl() }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                        </svg>
                        Previous
                    </a>
                    @endif

                    @foreach ($query->links()->elements as $element)
                    @if (is_string($element))
                    <span class="page-numbers disabled">{{ $element }}</span>
                    @endif

                    @if (is_array($element))
                    @foreach ($element as $page => $url)
                    @if ($page == $query->currentPage())
                    <span class="page-numbers current">{{ $page }}</span>
                    @else
                    <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                    @endif
                    @endforeach
                    @endif
                    @endforeach

                    @if ($query->hasMorePages())
                    <a class="next page-numbers" href="{{ $query->nextPageUrl() }}">
                        Next
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                        </svg>
                    </a>
                    @else
                    <span class="next page-numbers disabled">Next</span>
                    @endif
                </nav>
                @endif
                @else
                @endif
            </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const shimmerContainer = document.getElementById('shimmer-container');
    const contentContainer = document.getElementById('content-container');

    // Create 4 shimmer cards
    for (let i = 0; i < 4; i++) {
        const shimmerCard = document.createElement('div');
        shimmerCard.className = "skeleton-card";

        shimmerCard.innerHTML = `
            <div class="skeleton-image shimmer"></div>
            <div class="skeleton-content">
                <div class="skeleton skeleton-title shimmer" style="width: 70%; height: 20px;"></div>
                <div class="d-flex gap-2 align-items-center mt-2">
                    <div class="skeleton skeleton-text shimmer" style="width: 30%; height: 15px;"></div>
                    <div class="skeleton skeleton-text shimmer" style="width: 30%; height: 15px;"></div>
                </div>
                <div class="skeleton skeleton-text shimmer mt-3" style="width: 90%; height: 15px;"></div>
                <div class="skeleton skeleton-text shimmer mt-1" style="width: 80%; height: 15px;"></div>
                <!-- Tabs shimmer -->
                <div class="d-flex mt-4 gap-3">
                    <div class="skeleton skeleton-tab shimmer" style="width: 100px; height: 30px;"></div>
                    <div class="skeleton skeleton-tab shimmer" style="width: 120px; height: 30px;"></div>
                    <div class="skeleton skeleton-tab shimmer" style="width: 90px; height: 30px;"></div>
                </div>
                <!-- Additional details -->
                <div class="d-flex mt-3 gap-3">
                    <div class="skeleton skeleton-text shimmer" style="width: 40px; height: 15px;"></div>
                    <div class="skeleton skeleton-text shimmer" style="width: 40px; height: 15px;"></div>
                </div>
                <div class="d-flex mt-3 gap-2">
                    <div class="skeleton skeleton-button shimmer" style="width: 100px; height: 40px;"></div>
                    <div class="skeleton skeleton-button shimmer" style="width: 100px; height: 40px;"></div>
                </div>
            </div>
        `;
        shimmerContainer.appendChild(shimmerCard);
    }
    setTimeout(() => {
        shimmerContainer.style.display = 'none';
        contentContainer.style.display = 'block';
    }, 3000);
});

$(document).ready(function() {
    $('#country-select').change(function() {
        var selectedCountries = $(this).val();
        $('#state-select').empty();

        if (selectedCountries) {
            $.each(selectedCountries, function(index, countryId) {
                $.get('/states/' + countryId, function(data) {
                    $.each(data, function(i, state) {
                        $('#state-select').append($('<option>', {
                            value: state.id,
                            text: state.state_name
                        }));
                    });
                });
            });
        }
    });
    $('#program-select').change(function() {
        let programId = $(this).val();
        $.ajax({
            url: '/getDepartments/' + programId,
            type: 'GET',
            success: function(departments) {
                $('#department-select').empty().append(
                    '<option value="">Select Department</option>');
                $.each(departments, function(index, department) {
                    $('#department-select').append('<option value="' + department
                        .id + '">' +
                        department.name + '</option>');
                });
            }
        });
    });

    $('#department-select').change(function() {
        let departmentId = $(this).val();
        $.ajax({
            url: '/getSubjects/' + departmentId,
            type: 'GET',
            success: function(subjects) {
                $('#subject-select').empty().append(
                    '<option value="">Select Subject</option>');
                $.each(subjects, function(index, subject) {
                    $('#subject-select').append('<option value="' + subject.id +
                        '">' +
                        subject.subject_name + '</option>');
                });
            }
        });
    });
});

</script>
<script>
    const form = document.getElementById('filter-form');
    const testCheckboxes = document.querySelectorAll('input[type="checkbox"][name$="_estimated"]'); // Select all checkbox elements for tests not taken
    
    form.addEventListener('submit', function(event) {
        // Check if any checkbox is checked
        const isTestNotTakenChecked = Array.from(testCheckboxes).some(checkbox => checkbox.checked);

        if (isTestNotTakenChecked) {
            // Display "No universities found" message
            document.querySelector('.university-list').innerHTML = `
                <div class="text-center">
                    <img src="/frontAssets/images/not-found-image.jpg" class="h-25 w-50" alt="">
                    <p class="fs-3">No universities found matching your criteria.</p>
                </div>
            `;
            event.preventDefault();  // Prevent form submission
        }
    });
</script>
@endsection