@extends('website.layout.master')

@section('content')
<style>
.parsley-errors-list {
    color: red;
    list-style-type: none;
    padding: 0;
    margin: 0.25rem 0 0;
    font-size: 0.875rem;
}
.modal-fixed-size {
    max-height: 90vh; /* Sets maximum height to 90% of the viewport height */
    overflow-y: auto; /* Adds a scrollbar if the content overflows */
}
</style>

<nav class="custom-navbar navbar navbar-expand-lg ">
    <div class="container">
    <a class="navbar-brand m-0" href="{{ route('homepage') }}">
            <img class="logo-white" src="/frontAssets/images/university-logo__1__1-removebg-preview.png" alt="University Logo" 
                style="width: 150px; height: 100px;">
            <img class="logo-dark" src="/frontAssets/images/university-logo__1__1-removebg-preview.png" alt="University Logo" 
                style="width: 150px; height: 100px;">
        </a>
        <div class="d-flex order-lg-2">
            <!-- start button -->
            <a href="{{ route('signIn')}}" class="btn btn-primary d-none d-sm-flex fw-medium gap-2 hstack rounded">
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
                <a class="nav-link active" href="{{ route('universityList') }}">Universities</a>

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

<div class="skeleton-container">
    <!-- Skeleton Card -->
    <div class="skeleton-card">
        <div class="skeleton skeleton-image skeleton-image-chnage shimmer"></div>
        <div class="skeleton-title skeleton shimmer"></div>
        <div class="skeleton-text skeleton shimmer"></div>
        <div class="skeleton-text skeleton shimmer"></div>
        <div class="skeleton-button skeleton shimmer"></div>
    </div>
</div>

<div class="py-4 actual-content" id="university-info"> <!-- Content container -->
    <div class="container-fluid px-5">
        <div class="justify-content-between row align-items-center g-4">
            <div class="col-lg col-xxl-8">
                <ul class="list-inline list-separator d-flex align-items-center mb-0">
                    <img src="{{ $university->logo }}" alt="University Logo" class="rounded-circle" width="80" height="80">
                    <h1 class="h2 page-header-title fw-semibold mb-0 me-3 ms-2">
                        @if($university && !empty($university->name))
                            {{ $university->name }}
                        @else
                            <div class="skeleton skeleton-heading shimmer" style="width: 200px; height: 32px;"></div>
                        @endif
                    </h1>
                </ul>

                <!-- Other details like phone, website, etc. -->
                <ul class="fs-14 fw-medium list-inline list-separator mb-0 text-muted">
                    <div class="d-flex flex-wrap gap-3 z-1" style="margin-left:90px;">
                        <!-- Phone -->
                        <a href="tel:+{{ $university->phone }}" class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                            <i class="fa-solid fa-phone"></i>
                            <span>
                                @if($university && !empty($university->phone))
                                    {{ $university->phone }}
                                @else
                                    <div class="skeleton shimmer" style="width: 80px; height: 20px;"></div>
                                @endif
                            </span>
                        </a>

                        <!-- Country -->
                        <a href="#" class="d-flex gap-2 align-items-center fs-14 text-muted">
                            <i class="fa-solid fa-globe"></i>
                            <span>
                                @if($university && $university->country && !empty($university->country->country_name))
                                    {{ $university->country->country_name }}
                                @else
                                    <div class="skeleton shimmer" style="width: 100px; height: 20px;"></div>
                                @endif
                            </span>
                        </a>
                        <!-- Website -->
                        <a href="{{ $university->website }}" class="d-flex gap-2 align-items-center fs-14 text-muted">
                            <i class="fa-solid fa-link"></i>
                            <span>
                                @if($university && !empty($university->website))
                                    {{ $university->website }}
                                @else
                                    <div class="skeleton shimmer" style="width: 150px; height: 20px;"></div>
                                @endif
                            </span>
                        </a>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid px-5" id="skeleton-container">
    <div class="rounded-4 overflow-hidden">
        <div class="row gx-2 zoom-gallery">
            <!-- First large skeleton image -->
            <div class="col-md-8">
                <div class="skeleton shimmer skeleton-large"></div>
            </div>

            <!-- Two smaller skeleton images -->
            <div class="col-md-4 d-none d-md-inline-block">
                <div class="skeleton shimmer skeleton-small"></div>
                <div class="skeleton shimmer skeleton-small"></div>
            </div>
        </div>
    </div>
</div>
<!-- Actual Content Container -->
<div class="container-fluid px-5 hidden" id="content-img">
    <div class="rounded-4 overflow-hidden">
        <div class="row gx-2 zoom-gallery">
            <!-- First large image -->
            <div class="col-md-8">
                @if($university && !empty($university->photos[0]))
                <a class="d-block position-relative" href="{{ $university->photos[0] }}">
                    <img class="img-fluid w-100" src="{{ $university->photos[0] }}" alt="Image Description"
                        style="width: 100%; height: 408px; object-fit: cover;">
                </a>
                @else
                <div class="skeleton shimmer" style="width: 100%; height: 408px; object-fit: cover;"></div>
                @endif
            </div>

            <!-- Two smaller images -->
            <div class="col-md-4 d-none d-md-inline-block">
                @if($university && !empty($university->photos[1]))
                <a class="d-block mb-2" href="{{ $university->photos[1] }}">
                    <img class="img-fluid w-100" src="{{ $university->photos[1] }}" alt="Image Description"
                        style="width: 100%; height: 200px; object-fit: cover;">
                </a>
                @else
                <div class="skeleton shimmer" style="width: 100%; height: 200px; object-fit: cover;"></div>
                @endif

                @if($university && !empty($university->photos[2]))
                <a class="d-block position-relative" href="{{ $university->photos[2] }}">
                    <img class="img-fluid w-100" src="{{ $university->photos[2] }}" alt="Image Description"
                        style="width: 100%; height: 200px; object-fit: cover;">
                </a>
                @else
                <div class="skeleton shimmer" style="width: 100%; height: 200px; object-fit: cover;"></div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container-fluid px-5">
        <div class="row">
             <div class="col-lg-8 content">
             <div class="mb-4">
    <!-- Skeleton loading for university name -->
    <div class="skeleton-heading skeleton-loading mb-3" style="height: 30px; width: 200px;"></div>
    
    <h4 class="fw-semibold fs-3 mb-4 d-none">
        <span class="">{{ $university->name }}</span>
    </h4>

    <div class="skeleton-loading mb-4" style="height: 20px; width: 100%;"></div>
    
    <div class="mb-4">
        {{ $university->description }}
    </div>
</div>

               
                <div class="mb-4">
                <div class="skeleton-heading skeleton-loading mb-4" style="height: 30px; width: 200px;"></div>

        <h4 class="fw-semibold fs-3 mb-4 d-none" id="availableProgramsHeading">
            Available Programs <span class="font-caveat text-primary"></span>
        </h4>    
    <div class="skeleton-tabs skeleton-loading mb-4"></div>

    <ul class="nav nav-tabs d-none" id="programTabs" role="tablist">
        @foreach($university->programs as $program)
        <li class="nav-item" role="presentation">
            <button class="nav-link @if($loop->first) active @endif"
                id="program-{{ $program['program_id'] }}-tab" data-bs-toggle="tab"
                data-bs-target="#program-{{ $program['program_id'] }}" type="button" role="tab"
                aria-controls="program-{{ $program['program_id'] }}" aria-selected="true">
                <i class="fa-solid fa-user-graduate text-primary me-2"></i>
                {{ $program['program_name'] }}
            </button>
        </li>
        @endforeach
    </ul>
</div>

   
<div class="tab-content" id="programTabsContent">
    @foreach($university->programs as $program)
    <div class="tab-pane fade @if($loop->first) show active @endif"
        id="program-{{ $program['program_id'] }}" role="tabpanel"
        aria-labelledby="program-{{ $program['program_id'] }}-tab">

        <!-- Skeleton loading for Departments heading -->
        <div class="skeleton-heading skeleton-loading mb-3"></div>
        
        <!-- Actual Departments heading (Initially hidden) -->
        <h4 class="fw-semibold fs-3 mt-4 d-none">Departments</h4>

        <!-- Skeleton loading for departments (Hidden initially) -->
        <div class="department-skeleton skeleton-loading mb-3"></div>

        <!-- Actual department content -->
        <div class="department-content d-none">
            @foreach($program['departments'] as $department)
            <div class="mb-3 ">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <button class="btn btn-link d-flex align-items-center text-dark" type="button"
                            onclick="toggleDepartmentDetails('{{ $department['department_id'] }}')">
                            <div class="d-flex align-items-center justify-content-between flex-grow-1">
                                <span class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-laptop-code text-blue"></i>
                                    <strong class="fs-15">{{ $department['department_name'] }}
                                        ({{ $program['program_name'] }})</strong>
                                </span>
                                <i class="fa-solid fa-chevron-down ms-5 arrow-icon"></i>
                            </div>
                        </button>
                    </div>
                </div>

                <!-- Skeleton loading for subjects inside the department -->
                <div class="subject-skeleton skeleton-loading mb-3"></div>

                <!-- Department details -->
                <div id="department-{{ $department['department_id'] }}-details" class="department-details d-none"
                    style="display: none;">
                    <div class="pt-2">
                        <div class="row gx-4 gy-3">
                            @foreach($department['subjects'] as $subject)
                            <div class="col-md-6">
                                <div class="align-items-center border-bottom d-flex pb-2">
                                    <div class="flex-grow-1 fs-15 fw-medium">
                                        {{ $subject['subject_name'] }}
                                    </div>
                                    <div class="flex-shrink-0">
                                        <img src="assets/images/car-parts/01.png" alt="" width="70">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
                <hr class="my-5">

                <div id="skeleton-admin" class="skeleton-container mb-5 border-bottom pb-5">
                    <!-- Skeleton for Headline -->
                    <div class="skeleton-headline mb-4 shimmer"></div>

                    <!-- Skeleton for Paragraph -->
                    <div class="skeleton-paragraph mb-3 shimmer"></div>
                    <div class="skeleton-paragraph mb-3 shimmer"></div>
                    <div class="skeleton-paragraph shimmer"></div>

                    <!-- Skeleton for Image -->
                    <div class="skeleton-image shimmer"></div>
                </div>

                <div id="main-content" class="mb-5 border-bottom pb-5" style="display: none;">

                <div class="mb-4">
                    <h4 class="fw-semibold fs-3 mb-4">Admission Requirements & Scholorships</h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3 menu pb-2">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <i class="fa-solid fa-clipboard-check text-primary mb-3"></i> Admission
                                        Requirements</h4>
                                        <div class="tab-content" id="admissionTabContent">
                                            <!-- Admission Requirements Tab -->
                                            <div class="tab-pane fade show active" id="admission-requirements"
                                                role="tabpanel" aria-labelledby="admission-requirements-tab">
                                                <div class="row">
                                                @if($university->admissionRequirements->isNotEmpty())
                                                @foreach($university->admissionRequirements as $requirement)
                                                    <div class="col-md-12 row">
                                                        <div class="col-md-2 col-6 border-end">
                                                            <label for="gpa" class="d-block">GPA</label>
                                                            <div class="range-value text-danger" id="gpa-value">
                                                                {{$requirement->gpa}}</div>
                                                        </div>
                                                        <div class="col-md-2 col-6 mb-3 border-end">
                                                            <label for="gre" class="d-block">GRE / GMAT</label>
                                                            <div class="range-value text-success" id="gre-value">
                                                                {{$requirement->gre}}</div>
                                                        </div>
                                                        <div class="col-md-2 col-6 border-end">
                                                            <label for="toefl" class="d-block">TOEFL</label>
                                                            <div class="range-value  text-danger" id="toefl-value">
                                                                {{$requirement->toefl}}</div>
                                                        </div>

                                                        <div class="col-md-2 col-6 mb-3 border-end">
                                                            <label for="ielts" class="d-block">IELTS</label>
                                                            <div class="range-value text-success" id="ielts-value">
                                                                {{$requirement->ielts}}</div>
                                                        </div>

                                                        <div class="col-md-2 col-6 border-end">
                                                            <label for="pte" class="d-block">PTE</label>
                                                            <div class="range-value  text-danger" id="pte-value">
                                                                {{$requirement->pte}}</div>
                                                        </div>

                                                        <div class="col-md-2 col-6">
                                                            <label for="det" class="d-block">DET</label>
                                                            <div class="range-value text-success" id="det-value">
                                                                {{$requirement->det}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <p>No admission requirements available.</p>
                                @endif
                                @if($university->admissionRequirements->isNotEmpty() && $university->admissionRequirements->first()->pdf)
                                <div class="col-sm-4 text-end">
                                    <a href="{{ $university->admissionRequirements->first()->pdf }}" class="btn btn-primary" target="_blank">
                                        <i class="fa-solid fa-file-pdf"></i> View PDF
                                    </a>
                                </div>
                            @endif
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4">
                                <div class="mb-3 menu pb-2">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <i class="fa-solid fa-graduation-cap text-primary mb-3"></i> Scholarships
                                            </h4>
                                            <div class="fs-14 menu-detail text-muted ms-4">
                                            {{ $university->scholarship && $university->scholarship->scholarship_available ? 'Yes' : 'No' }}
                                            </div>
                                        </div>
                                        <div class="col-sm-4 text-end">
                                        @if($university->scholarship && $university->scholarship->scholarship_available && $university->scholarship->scholarship_pdf)
                                        <a href="{{ $university->scholarship->scholarship_pdf }}" class="btn btn-primary" target="_blank">
                                            <i class="fa-solid fa-file-pdf"></i> View PDF
                                        </a>
                                    @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5 border-bottom pb-5">
                    <img src="{{$university->banner_image}}" class="img-fluid rounded-4 w-100" alt=""
                        style="height: 300px;">
                </div>
                </div>
                
                <!-- start reviews section -->
                <div class="mb-4">
                    <h4 class="fw-semibold fs-3 mb-4">University <span class="font-caveat text-primary">Reviews</span>
                    </h4>
                    <div class="border p-4 mb-5 rounded-4">
                        <div class="row g-4 align-items-center">
                            <div class="col-sm-auto">
                                <div class="rating-block text-center">
                                    <!-- start title -->
                                    <h5 class="font-caveat fs-4 mb-4">Average user rating</h5>
                                    <!-- end /. title -->
                                    <!-- Start Rating Point -->
                                    <div class="rating-point position-relative ml-auto mr-auto">
                                        <!-- Start Svg Icon  -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width=".5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-star text-primary">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                            </polygon>
                                        </svg>
                                        <!-- /.End Svg Icon  -->
                                        <h3 class="position-absolute mb-0 fs-18 text-primary">4.3</h3>
                                    </div>
                                    <!-- End Rating Point -->
                                    <span class="fs-13">2,525 Ratings &amp;</span><br>
                                    <span class="fs-13">293 Reviews</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="rating-position">
                                    <!-- start title -->
                                    <h5 class="font-caveat fs-4 mb-4">Rating breakdown</h5>

                                    <div class="align-items-center d-flex mb-2 rating-dimension gap-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fs-14 fw-semibold rating-points">5</span>
                                            <div class="d-flex align-items-center text-primary rating-stars">
                                                <i class="fa-star-icon"></i>
                                                <i class="fa-star-icon"></i>
                                                <i class="fa-star-icon"></i>
                                                <i class="fa-star-icon"></i>
                                                <i class="fa-star-icon"></i>
                                            </div>
                                        </div>

                                        <div class="progress flex-grow-1 me-2">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 90%"
                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <!-- /.End Progress -->
                                        <!-- Start User Rating -->
                                        <div
                                            class="bg-dark fs-11 fw-medium px-2 py-1 rounded-pill text-white user-rating">
                                            4.5</div>
                                        <!-- /.End User Rating -->
                                    </div>
                                    <!-- end /. rating dimension -->
                                    <!-- start rating dimension -->
                                    <div class="align-items-center d-flex mb-2 rating-dimension gap-2">
                                        <!-- start rating quantity -->
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fs-14 fw-semibold rating-points">5</span>
                                            <div class="d-flex align-items-center text-primary rating-stars">
                                                <i class="fa-star-icon"></i>
                                                <i class="fa-star-icon"></i>
                                                <i class="fa-star-icon"></i>
                                                <i class="fa-star-icon half"></i>
                                                <i class="fa-star-icon none"></i>
                                            </div>
                                        </div>
                                        <!-- end /. rating quantity -->
                                        <!-- start progress -->
                                        <div class="progress flex-grow-1 me-2">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 80%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <!-- end /. progress -->
                                        <!-- start user rating -->
                                        <div
                                            class="bg-dark fs-11 fw-medium px-2 py-1 rounded-pill text-white user-rating">
                                            3.5</div>
                                        <!-- end /. user rating -->
                                    </div>
                                    <!-- end /. rating dimension -->
                                    <!-- start rating dimension -->
                                    <div class="align-items-center d-flex mb-2 rating-dimension gap-2">
                                        <!-- start rating quantity -->
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fs-14 fw-semibold rating-points">3</span>
                                            <div class="d-flex align-items-center text-primary rating-stars">
                                                <i class="fa-star-icon"></i>
                                                <i class="fa-star-icon"></i>
                                                <i class="fa-star-icon half"></i>
                                                <i class="fa-star-icon none"></i>
                                                <i class="fa-star-icon none"></i>
                                            </div>
                                        </div>
                                        <!-- end /. rating quantity -->
                                        <!-- start progress -->
                                        <div class="progress flex-grow-1 me-2">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 60%"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <!-- end /. progress -->
                                        <!-- start user rating -->
                                        <div
                                            class="bg-dark fs-11 fw-medium px-2 py-1 rounded-pill text-white user-rating">
                                            1.5</div>
                                        <!-- end /. user rating -->
                                    </div>
                                    <!-- end /. rating dimension -->
                                    <!-- start rating dimension -->
                                    <div class="align-items-center d-flex mb-2 rating-dimension gap-2">
                                        <!-- start rating quantity -->
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fs-14 fw-semibold rating-points">3</span>
                                            <div class="d-flex align-items-center text-primary rating-stars">
                                                <i class="fa-star-icon"></i>
                                                <i class="fa-star-icon half"></i>
                                                <i class="fa-star-icon none"></i>
                                                <i class="fa-star-icon none"></i>
                                                <i class="fa-star-icon none"></i>
                                            </div>
                                        </div>
                                        <!-- end /. rating quantity -->
                                        <!-- start progress -->
                                        <div class="progress flex-grow-1 me-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 40%"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div
                                            class="bg-dark fs-11 fw-medium px-2 py-1 rounded-pill text-white user-rating">
                                            5.2</div>
                                    </div>

                                    <div class="align-items-center d-flex mb-2 rating-dimension gap-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fs-14 fw-semibold rating-points">1</span>
                                            <div class="d-flex align-items-center text-primary rating-stars">
                                                <i class="fa-star-icon"></i>
                                                <i class="fa-star-icon none"></i>
                                                <i class="fa-star-icon none"></i>
                                                <i class="fa-star-icon none"></i>
                                                <i class="fa-star-icon none"></i>
                                            </div>
                                        </div>
                                        <!-- end /. rating quantity -->
                                        <!-- start progress -->
                                        <div class="progress flex-grow-1 me-2">
                                            <div class="progress-bar text-bg-danger" role="progressbar"
                                                style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <!-- end /. progress -->
                                        <!-- start user rating -->
                                        <div
                                            class="bg-dark fs-11 fw-medium px-2 py-1 rounded-pill text-white user-rating">
                                            6.9</div>
                                        <!-- end /. user rating -->
                                    </div>
                                    <!-- end /. rating dimension -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mb-4 border-bottom pb-4">
                        <div class="flex-shrink-0">
                            <img src="/frontAssets/images/listing-details/gallery/01.jpg" alt="..." height="70"
                                width="70" class="object-fit-cover rounded-circle">
                        </div>
                        <div class="flex-grow-1 ms-4">
                            <div class="comment-header d-flex flex-wrap gap-2 mb-3">
                                <div>
                                    <h4 class="fs-18 mb-0">- Ethan Blackwood</h4>
                                    <div class="comment-datetime fs-12 text-muted">25 Oct 2023 at 12.27 pm</div>
                                </div>
                                <!-- start rating -->
                                <div class="d-flex align-items-center gap-2 ms-auto">
                                    <div class="d-flex align-items-center text-primary rating-stars">
                                        <i class="fa-star-icon"></i>
                                        <i class="fa-star-icon"></i>
                                        <i class="fa-star-icon"></i>
                                        <i class="fa-star-icon half"></i>
                                        <i class="fa-star-icon none"></i>
                                    </div>
                                    <span class="fs-14 fw-semibold rating-points">3.5/5</span>
                                </div>
                                <!-- end /. rating -->
                            </div>
                            <div class="fs-15">There are many variations of passages of Lorem Ipsum available, but the
                                majority have suffered alteration in some form, by injected humour, or randomised words
                                which.</div>
                            <!-- start review -->
                            <a href="#" class="btn btn-light btn-sm mt-4 px-3 rounded-pill gap-2 d-inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                    <path
                                        d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
                                </svg>
                                Helpful Review
                                <div class="vr d-none d-sm-inline-block"></div>
                                <span class="fw-semibold">16</span>
                            </a>
                            <!-- end /. review -->
                            <div class="row mt-3 g-2 review-image zoom-gallery">
                                <div class="col-auto">
                                    <a href="frontAssets/images/listing-details/gallery/image-01.jpg"
                                        class="galary-overlay-hover dark-overlay position-relative d-block overflow-hidden rounded-3">
                                        <img src="/frontAssets/images/listing-details/gallery/blog-01.jpg" alt=""
                                            class="img-fluid rounded-3 object-fit-cover" height="70" width="112">
                                        <div
                                            class="galary-hover-element h-100 position-absolute start-50 top-50 translate-middle w-100">
                                            <i
                                                class="fa-solid fa-expand text-white position-absolute top-50 start-50 translate-middle bg-primary rounded-1 p-2 lh-1"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <a href="frontAssets/images/listing-details/gallery/image-01.jpg"
                                        class="galary-overlay-hover dark-overlay position-relative d-block overflow-hidden rounded-3">
                                        <img src="/frontAssets/images/listing-details/gallery/blog-02.jpg" alt=""
                                            class="img-fluid rounded-3 object-fit-cover" height="70" width="112">
                                        <div
                                            class="galary-hover-element h-100 position-absolute start-50 top-50 translate-middle w-100">
                                            <i
                                                class="fa-solid fa-expand text-white position-absolute top-50 start-50 translate-middle bg-primary rounded-1 p-2 lh-1"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <a href="frontAssets/images/listing-details/gallery/image-03.jpg"
                                        class="galary-overlay-hover dark-overlay position-relative d-block overflow-hidden rounded-3">
                                        <img src="/frontAssets/images/listing-details/gallery/blog-04.jpg" alt=""
                                            class="img-fluid rounded-3 object-fit-cover" height="70" width="112">
                                        <div
                                            class="galary-hover-element h-100 position-absolute start-50 top-50 translate-middle w-100">
                                            <i
                                                class="fa-solid fa-expand text-white position-absolute top-50 start-50 translate-middle bg-primary rounded-1 p-2 lh-1"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex mt-4 border-top pt-4">
                                <div class="flex-shrink-0">
                                    <img src="/frontAssets/images/listing-details/gallery/04.jpg" alt="..." height="60"
                                        width="60" class="object-fit-cover rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <div class="comment-header d-flex flex-wrap gap-2 mb-3">
                                        <div>
                                            <h4 class="fs-18 mb-0">- Gabriel North</h4>
                                            <div class="comment-datetime fs-12 text-muted">25 Oct 2023 at 12.27 pm</div>
                                        </div>
                                    </div>
                                    <div class="fs-15"> This is some content from a media component. You can replace
                                        this with any content and adjust it as needed.</div>
                                    <!-- start review -->
                                    <a href="#" class="btn btn-light btn-sm mt-4 px-3 rounded-pill gap-2 d-inline-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                            <path
                                                d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
                                        </svg>
                                        Helpful Review
                                        <div class="vr d-none d-sm-inline-block"></div>
                                        <span class="fw-semibold">16</span>
                                    </a>
                                    <!-- end /. review -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mb-4 border-bottom pb-4">
                        <div class="flex-shrink-0">
                            <img src="/frontAssets/images/listing-details/gallery/05.jpg" alt="..." height="70"
                                width="70" class="object-fit-cover rounded-circle">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <div class="comment-header d-flex flex-wrap gap-2 mb-3">
                                <div>
                                    <h4 class="fs-18 mb-0">- Pranoti Deshpande</h4>
                                    <div class="comment-datetime fs-12 text-muted">25 Oct 2023 at 12.27 pm</div>
                                </div>
                                <!-- start rating -->
                                <div class="d-flex align-items-center gap-2 ms-auto">
                                    <div class="d-flex align-items-center text-primary rating-stars">
                                        <i class="fa-star-icon"></i>
                                        <i class="fa-star-icon"></i>
                                        <i class="fa-star-icon"></i>
                                        <i class="fa-star-icon half"></i>
                                        <i class="fa-star-icon none"></i>
                                    </div>
                                    <span class="fs-14 fw-semibold rating-points">3.5/5</span>
                                </div>
                                <!-- end /. rating -->
                            </div>
                            <div class="fs-15">There are many variations of passages of Lorem Ipsum available, but the
                                majority have suffered alteration in some form, by injected humour, or randomised words
                                which don't look even slightly believable. </div>
                            <!-- start review -->
                            <a href="#" class="btn btn-light btn-sm mt-4 px-3 rounded-pill gap-2 d-inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                    <path
                                        d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
                                </svg>
                                Helpful Review
                                <div class="vr d-none d-sm-inline-block"></div>
                                <span class="fw-semibold">16</span>
                            </a>
                            <!-- end /. review -->
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <img src="/frontAssets/images/listing-details/gallery/06.jpg" alt="..." height="70"
                                width="70" class="object-fit-cover rounded-circle">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <div class="comment-header d-flex flex-wrap gap-2 mb-3">
                                <div>
                                    <h4 class="fs-18 mb-0">- Marcus Knight</h4>
                                    <div class="comment-datetime fs-12 text-muted">25 Oct 2023 at 12.27 pm</div>
                                </div>
                                <!-- start rating -->
                                <div class="d-flex align-items-center gap-2 ms-auto">
                                    <div class="d-flex align-items-center text-primary rating-stars">
                                        <i class="fa-star-icon"></i>
                                        <i class="fa-star-icon"></i>
                                        <i class="fa-star-icon"></i>
                                        <i class="fa-star-icon half"></i>
                                        <i class="fa-star-icon none"></i>
                                    </div>
                                    <span class="fs-14 fw-semibold rating-points">3.5/5</span>
                                </div>
                            </div>
                            <div class="fs-15"> This is some content from a media component. You can replace this with
                                any content and adjust it as needed.</div>
                            <a href="#" class="btn btn-light btn-sm mt-4 px-3 rounded-pill gap-2 d-inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                    <path
                                        d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
                                </svg>
                                Helpful Review
                                <div class="vr d-none d-sm-inline-block"></div>
                                <span class="fw-semibold">16</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mb-4 mb-lg-0">
                    <h4 class="fw-semibold fs-3 mb-4">Leave a <span class="font-caveat text-primary">Comment</span></h4>
                    <form class="row g-4">
                        <div class="col-sm-6">
                            <div class="">
                                <label class="required fw-medium mb-2">Full Name</label>
                                <input type="text" class="form-control" placeholder="Enter your name" required="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="">
                                <label class="required fw-medium mb-2">Email Address</label>
                                <input type="text" class="form-control" placeholder="Enter your email address">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="">
                                <label class="required fw-medium mb-2">Comment</label>
                                <textarea class="form-control" rows="7"
                                    placeholder="Tell us what we can help you with!"></textarea>
                            </div>

                        </div>
                        <div class="col-sm-12 text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 ps-xxl-5 sidebar">
                <div class="border mb-4 p-4 rounded-4">
                    <h4 class="fw-semibold mb-4">Connect with Us<span class="font-caveat text-primary"></span></h4>
                    <form class="row g-4 custom-validation" id="student_form_main" data-parsley-validate
                        action="{{ route('student.contacts.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="university_id" value="{{ $university->id }}">
                        <!-- Hidden university ID -->
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="fw-medium mb-2">Full Name<span class="text-danger">*</span></label>
                                <input type="text" name="full_name" class="form-control" placeholder="Enter your name" required
                                    data-parsley-required-message="Full name is required.">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="fw-medium mb-2">Email Address<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email address" required
                                    data-parsley-type="email" data-parsley-required-message="Email address is required."
                                    data-parsley-type-message="Please enter a valid email address.">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="fw-medium mb-2">Phone Number<span class="text-danger">*</span></label>
                                <input type="tel" name="phone" class="form-control" placeholder="Enter your phone number" required
                                    data-parsley-required-message="Phone number is required.">
                                @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="fw-medium mb-2">Program<span class="text-danger">*</span></label>
                                <select name="program_id" id="program-select" class="form-control select2" required
                                    data-parsley-required-message="Program selection is required."
                                    data-parsley-errors-container="#program-error"
                                    onchange="updateDepartments(this.value)">
                                    <option value="">Select a program</option>
                                    @foreach($university->programs as $program)
                                    <option value="{{ $program['program_id'] }}"
                                        {{ old('program_id') == $program['program_id'] ? 'selected' : '' }}>
                                        {{ $program['program_name'] }}
                                    </option>
                                    @endforeach
                                </select>
                                <div id="program-error" class="text-danger"></div>
                                @error('program_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="fw-medium mb-2">Departments<span class="text-danger">*</span></label>
                                <select name="department_ids[]" data-placeholder="Select Departments" class="form-control select2" multiple required
                                    data-parsley-required-message="At least one department must be selected."
                                    data-parsley-errors-container="#department-error" id="department-select">
                                </select>
                                <div id="department-error" class="text-danger"></div>
                                @error('department_ids')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="fw-medium mb-2">Message</label>
                                <textarea name="message" class="form-control" rows="7"
                                    placeholder="Tell us what we can help you with!"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="successModalLabel">Success</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                We will contact you soon!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- start opening hours -->
                <div class="border mb-4 p-4 rounded-4">
                    <h4 class="fw-semibold mb-2">
                        <i class="fa-solid fa-circle-info text-primary"></i> More Information
                    </h4>

                    <div class="row g-0">
                        <div class="col-sm-6 ps-0 py-3">
                            <h6 class="fw-medium text-capitalize text-center">
                                <i class="fa-solid fa-graduation-cap text-primary"></i>Application Fees
                            </h6>
                            <p class="fs-5 fw-bold fw-medium mb-0 text-primary text-center">${{$university->fees}}</p>
                        </div>
                        <div class="col-sm-6 pe-0 py-3">
                        <h6 class="fw-medium text-capitalize text-center">
                            <i class="fa-solid fa-book text-primary"></i> Tuition Fees
                        </h6>
                        <p class="fs-5 fw-bold fw-medium mb-0 text-primary text-center">
                            @if($university->tuitionFee)
                                ${{ $university->tuitionFee->amount }}
                            @else
                                Not available
                            @endif
                        </p>
                    </div>
                    </div>
                </div>
                <!-- end /. opening hours -->
            </div>
        </div>
    </div>
</div>
<div class="py-5 position-relative overflow-hidden">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-10 col-lg-8 col-xl-7">
                <!-- Start Section Header -->
                <div class="section-header text-center mb-5" data-aos="fade-down">
                    <div class="d-inline-block font-caveat fs-1 fw-medium section-header__subtitle text-capitalize text-primary">
                        Similar Listings
                    </div>
                    <h2 class="display-5 fw-semibold mb-3 section-header__title text-capitalize">
                        Similar Listings You May Like
                    </h2>
                    <div class="sub-title fs-16">
                        Discover exciting categories. <span class="text-primary fw-semibold">Find what you’re looking for.</span>
                    </div>
                </div>
                <!-- End Section Header -->
            </div>
        </div>

        <!-- Check if there are similar universities -->
        @if(count($similarUniversities) > 0)
            <div class="listings-carousel owl-carousel owl-theme owl-nav-bottom">
                <!-- Start Listing Card -->
                @foreach($similarUniversities as $listing)
                <div class="card rounded-3 w-100 flex-fill overflow-hidden" style="height:400px;">
                    <!-- Start Card Link -->
                    <a href="{{ route('listing', ['slug' => $listing->slug]) }}" class="stretched-link"></a>
                    <!-- End Card Link -->
                    <!-- Start Card Image Wrap -->
                    <div class="card-img-wrap card-image-hover overflow-hidden">
                        <img style="height:250px;" src="{{$listing->featured_image}}" alt="" class="img-fluid object-fit-cover">
                        <div class="d-flex end-0 gap-2 me-3 mt-3 position-absolute top-0 z-1">
                            <a href="" class="btn-icon shadow-sm d-flex align-items-center justify-content-center text-primary bg-light rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Bookmark">
                                <!-- Bookmark Icon -->
                            </a>
                            <a href="" class="btn-icon shadow-sm d-flex align-items-center justify-content-center text-primary bg-light rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Quick View">
                                <!-- Quick View Icon -->
                            </a>
                        </div>
                    </div>
                    <!-- End Card Image Wrap -->
                    <div class="d-flex flex-column h-100 position-relative p-4">
                        <div class="align-items-center bg-primary cat-icon d-flex justify-content-center position-absolute rounded-circle text-white">
                            <i class="fa-solid fa-shop"></i>
                        </div>
                        <div class="align-items-center d-flex flex-wrap gap-1 text-primary card-start">
                            <i class="fa-solid fa-star"></i>
                            <span class="fw-medium text-primary"><span class="fs-5 fw-semibold me-1">(0)</span></span>
                        </div>
                        @php
                        $maxLength = 50;
                        $universityName = $listing->name;
                        $truncatedName = strlen($universityName) > $maxLength ? substr($universityName, 0, $maxLength) . '...' : $universityName;
                        @endphp
                        <h4 class="fs-5 fw-semibold mb-0">{{ $truncatedName }}</h4>
                    </div>
                </div>
                @endforeach
                <!-- End Listing Card -->
            </div>
        @else
            <div class="text-center my-5">
                <p class="fs-5 text-muted">No matching university listings were found. Please try expanding your search criteria.</p>
                <!-- Search Box Design -->
                <form action="" method="GET" class="d-flex justify-content-center">
                    <input type="text" id="search" name="query" class="form-control me-2" placeholder="Search for universities or colleges..." aria-label="Search">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
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
                            <img src="/frontAssets/images/popup/popup1.jpg" class="object-fit-cover w-100 h-100 ">
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
                            <img src="/frontAssets/images/popup/cities.jpg" class="object-fit-cover w-100 h-100">
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
                            <img src="/frontAssets/images/popup/programs.jpg" class="object-fit-cover w-100 h-100 ">
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
                            <img src="/frontAssets/images/popup/departments.jpg" class="object-fit-cover w-100 h-100 ">
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
                            <img src="/frontAssets/images/popup/scholorships.jpg" class="object-fit-cover w-100 h-100">
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
<div class="modal fade" id="Student_modal" tabindex="-1" aria-labelledby="Student_modal" aria-hidden="true" style="height:650px;">
<div class="modal-dialog modal-lg modal-fixed-size">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row gx-0">
                        <div class="col-md-6">
                            <!-- <div class="px-4 mt-2">
                                    <h4 class="fw-semibold mb-2 text-center">Help us to know you better</h4>
                                    <p class="text-muted text-center">We'll provide guidance and recommendations based on your unique preferences and goals.</p>
                                </div> -->
                            <img src="/frontAssets/images/popup/contact-us-img.jpg" class="object-fit-cover w-100 h-100">
                        </div>
                        <div class="col-md-6 d-flex py-3 px-4 flex-column justify-content-between bg-white">
                                <div class="modal-header d-flex">
                                <h4 class="fw-semibold">Connect with Us<span class="font-caveat text-primary"></span></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <!-- <div class="px-4 mt-2">
                                    <h4 class="fw-semibold mb-2 text-center">Help us to know you better</h4>
                                    <p class="text-muted text-center">We'll provide guidance and recommendations based on your unique preferences and goals.</p>
                                </div> -->
                                <form class="row g-4 custom-validation" id="student_form_modal" data-parsley-validate
                                    action="{{ route('student.contacts.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="university_id" value="{{ $university->id }}">
                                    <!-- Hidden university ID -->
                                    
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="fw-medium mb-2">Full Name<span class="text-danger">*</span></label>
                                            <input type="text" name="full_name" class="form-control" placeholder="Enter your name" required
                                                data-parsley-required-message="Full name is required.">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="fw-medium mb-2">Email Address<span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control" placeholder="Enter your email address" required
                                                data-parsley-type="email" data-parsley-required-message="Email address is required."
                                                data-parsley-type-message="Please enter a valid email address.">
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="fw-medium mb-2">Phone Number<span class="text-danger">*</span></label>
                                            <input type="tel" name="phone" class="form-control" placeholder="Enter your phone number" required
                                                data-parsley-required-message="Phone number is required.">
                                            @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="fw-medium mb-2">Program<span class="text-danger">*</span></label>
                                            <select name="program_id" id="program-select" class="form-control select2" required
                                                data-parsley-required-message="Program selection is required."
                                                data-parsley-errors-container="#program-error-modal"
                                                onchange="updateDepartments(this.value)">
                                                <option value="">Select a program</option>
                                                @foreach($university->programs as $program)
                                                <option value="{{ $program['program_id'] }}"
                                                    {{ old('program_id') == $program['program_id'] ? 'selected' : '' }}>
                                                    {{ $program['program_name'] }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <div id="program-error-modal" class="text-danger"></div>
                                            @error('program_id')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="fw-medium mb-2">Departments<span class="text-danger">*</span></label>
                                            <select name="department_ids[]" data-placeholder="Select Departments" class="form-control select2" multiple required
                                                data-parsley-required-message="At least one department must be selected."
                                                data-parsley-errors-container="#department-error-modal" id="departmentSelect">
                                            </select>
                                            <div id="department-error-modal" class="text-danger"></div>
                                            @error('department_ids')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="fw-medium mb-2">Message</label>
                                            <textarea name="message" class="form-control" rows="7"
                                                placeholder="Tell us what we can help you with!"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
<script>
function toggleDepartment(programId) {
    // Get all department lists
    const departmentLists = document.querySelectorAll('.department-list');

    // Hide all department lists
    departmentLists.forEach(list => list.style.display = 'none');

    // Show the selected department list
    const selectedDepartmentList = document.getElementById(`program-${programId}-departments`);
    if (selectedDepartmentList) {
        selectedDepartmentList.style.display = 'block';
    }
}

function toggleDepartmentDetails(departmentId) {
    var details = document.getElementById('department-' + departmentId + '-details');
    var arrow = details.previousElementSibling.querySelector('.arrow-icon');

    if (details.style.display === 'none') {
        details.style.display = 'block';
        arrow.style.transform = 'rotate(180deg)';
    } else {
        details.style.display = 'none';
        arrow.style.transform = 'rotate(0deg)';
    }
}

// document.addEventListener("DOMContentLoaded", function() {
//     // Simulate loading time
//     setTimeout(function() {
//         document.getElementById('skeleton-container').style.display = 'none'; // Hide skeletons
//         document.getElementById('content-container').style.display = 'block'; // Show content
//     }, 3000); // Simulate a loading time of 3 seconds
// });
function toggleDepartmentDetails(departmentId) {
    const details = document.getElementById(`department-${departmentId}-details`);
    if (details.style.display === "none" || !details.style.display) {
        details.style.display = "block";
    } else {
        details.style.display = "none";
    }
}
$('#program-select').on('change', function() {
        if ($(this).val()) {
            $('#program-error').text('');
        }
    });
</script>

<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Handle main form submission
    $('#student_form_main').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        Swal.fire({
            title: 'Submitting...',
            text: 'Please wait while we process your request.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            success: function(response) {
                Swal.fire('Success!', 'Your details have been submitted.', 'success');
                $('#student_form_main')[0].reset();
            },
            error: function(xhr) {
    if (xhr.status === 422) {
        var errors = xhr.responseJSON.errors;
        var errorMessages = '';

        // Loop through the errors and format them
        $.each(errors, function(key, messages) {
            errorMessages += '<p>' + messages[0] + '</p>'; // Display only the first message for each field
        });

        Swal.fire({
            title: 'Validation Error',
            html: errorMessages, // Use 'html' to display formatted messages
            icon: 'error'
        });
    } else {
        Swal.fire('Error!', 'There was an issue submitting your form. Please try again.', 'error');
    }
}

        });
    });

    // Handle modal form submission
    $('#student_form_modal').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        Swal.fire({
            title: 'Submitting...',
            text: 'Please wait while we process your request.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            success: function(response) {
                Swal.fire('Success!', 'Your details have been submitted.', 'success');
                $('#student_form_modal')[0].reset();
                $('#Student_modal').modal('hide');
            },
            error: function(xhr) {
    if (xhr.status === 422) {
        var errors = xhr.responseJSON.errors;
        var errorMessages = '';

        // Loop through the errors and format them
        $.each(errors, function(key, messages) {
            errorMessages += '<p>' + messages[0] + '</p>'; // Display only the first message for each field
        });

        Swal.fire({
            title: 'Validation Error',
            html: errorMessages, // Use 'html' to display formatted messages
            icon: 'error'
        });
    } else {
        Swal.fire('Error!', 'There was an issue submitting your form. Please try again.', 'error');
    }
}

        });
    });
});

    function updateDepartments(programId) {
        const departments = @json($university->programs->mapWithKeys(function($program) {
            return [$program['program_id'] => $program['departments']];
        }));

        const departmentSelect = document.getElementById('departmentSelect');
        departmentSelect.innerHTML = '';

        if (programId && departments[programId]) {
            departments[programId].forEach(department => {
                const option = document.createElement('option');
                option.value = department['department_id'];
                option.textContent = department['department_name'];
                departmentSelect.appendChild(option);
            });
        }
    }
    
    
    document.addEventListener("DOMContentLoaded", function () {
        // For the skeleton loading state for university photos
        const skeletonImages = document.querySelectorAll('.skeleton-image');
        const universityPhotos = [
            @if($university && !empty($university->photos[0])) '{{ $university->photos[0] }}' @else 'null' @endif,
            @if($university && !empty($university->photos[1])) '{{ $university->photos[1] }}' @else 'null' @endif,
            @if($university && !empty($university->photos[2])) '{{ $university->photos[2] }}' @else 'null' @endif
        ];

        // Function to stop skeleton loading and display content for university photos
        function stopPhotoSkeletonLoading() {
            skeletonImages.forEach((skeleton, index) => {
                if (universityPhotos[index] !== 'null') {
                    skeleton.style.display = 'none'; // Hide skeleton
                } else {
                    skeleton.style.display = 'block'; // Show skeleton if photo is missing
                }
            });
        }

        const departmentSkeletons = document.querySelectorAll('.department-skeleton');
        const departmentContents = document.querySelectorAll('.department-content');
        const subjectSkeletons = document.querySelectorAll('.subject-skeleton');

        const programTabsSkeleton = document.querySelector('.skeleton-tabs');
        const programTabsContent = document.getElementById('programTabs');

        // For the "Available Programs" heading skeleton
        const headingSkeleton = document.querySelector('.skeleton-heading');
        const availableProgramsHeading = document.getElementById('availableProgramsHeading');

        // For university name and description skeletons
        const universityNameSkeleton = document.querySelector('.skeleton-heading');
        const universityDescriptionSkeleton = document.querySelector('.skeleton-loading:nth-of-type(2)');
        const universityName = document.querySelector('h4.fw-semibold.fs-3.mb-4');
        const universityDescription = document.querySelector('.mb-4.d-none');

        // Function to stop skeleton loading for various sections
        function stopSkeletonLoading(skeletonElements, contentElements) {
            if (skeletonElements instanceof NodeList) {
                skeletonElements.forEach(skeleton => skeleton.style.display = 'none');
            } else if (skeletonElements) {
                skeletonElements.style.display = 'none';
            }

            if (contentElements instanceof NodeList) {
                contentElements.forEach(content => content.classList.remove('d-none'));
            } else if (contentElements) {
                contentElements.classList.remove('d-none');
            }
        }

        // Simulate loading delay and hide skeletons after content loads
        setTimeout(function () {
            // Stop skeleton loading for university photos
            stopPhotoSkeletonLoading();

            // Stop skeleton loading for departments and subjects
            stopSkeletonLoading(departmentSkeletons, departmentContents);
            stopSkeletonLoading(subjectSkeletons, document.querySelectorAll('.department-details'));

            // Stop skeleton loading for program tabs and "Available Programs" heading
            stopSkeletonLoading(programTabsSkeleton, programTabsContent);
            stopSkeletonLoading(headingSkeleton, availableProgramsHeading);

            // Stop skeleton loading for university name and description
            stopSkeletonLoading(universityNameSkeleton, universityName);
            stopSkeletonLoading(universityDescriptionSkeleton, universityDescription);

            // Hide heading skeletons and show actual headings
            document.querySelectorAll('.skeleton-heading').forEach(skeleton => {
                skeleton.style.display = 'none';
                const heading = skeleton.nextElementSibling;
                if (heading) heading.classList.remove('d-none');
            });

            // Hide general skeletons and show actual content
            document.querySelectorAll('.skeleton').forEach(skeleton => {
                skeleton.style.display = 'none';
            });

        }, 3000); // Adjust the time as necessary
    });


    document.addEventListener("DOMContentLoaded", function () {
        // Get the actual content and loading elements
        const actualContent = document.getElementById('university-info');
        const loadingContainer = document.querySelector('.skeleton-container');
        
        // Show shimmer for 3 seconds before displaying the actual content
        setTimeout(() => {
            loadingContainer.style.display = 'none'; 
            actualContent.style.display = 'block';
        }, 3000); 
    });

    document.addEventListener("DOMContentLoaded", function () {
        // Get the skeleton and content containers
        const skeletonContainer = document.getElementById('skeleton-container');
        const contentContainer = document.getElementById('content-img');
        
        setTimeout(() => {
            skeletonContainer.classList.add('hidden'); 
            contentContainer.classList.remove('hidden'); 
        }, 3000); 
    });

    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            // Hide the skeleton and show the main content
            document.getElementById("skeleton-admin").style.display = "none";
            document.getElementById("main-content").style.display = "block";
        }, 2000); // Adjust the delay as needed
    });
</script>
<script>
     $(document).ready(function() {
        $('#program-select').on('change', function() {
            if ($(this).val()) {
                $('#program-error').hide();
            }
        });

        $('#department-select').on('change', function() {
            if ($(this).val().length > 0) {
                $('#department-error').hide();
            }
        });
        $('#program-select-modal').on('change', function () {
        if ($(this).val()) {
            $('#program-error-modal').hide();
        }
    });

    $('#department-select-modal').on('change', function () {
        if ($(this).val().length > 0) {
            $('#department-error-modal').hide();
        }
    });
    });
</script>
@if(request()->has('show_modal'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = new bootstrap.Modal(document.getElementById('Student_modal'), {
                keyboard: false
            });
            modal.show();
        });
    </script>
@endif
@endsection