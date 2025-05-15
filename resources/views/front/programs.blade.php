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
                    <a class="nav-link {{ request()->is('programs') ? 'active' : '' }}" href="">
                        Programs
                    </a>
                </li>
                <!-- Admissions -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admissions') ? 'active' : '' }}" href="{{ route('admission') }}">
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
<div class="py-5 bg-light rounded-4 mx-3 mt-3">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-10 col-lg-8 col-xl-7">
                <div class="section-header text-center mb-5" data-aos="fade-down">
                    <h2 class="display-5 fw-semibold mb-3 section-header__title text-capitalize">Programs</h2>
                    <div class="sub-title fs-16">Discover exciting programs. <span class="text-primary fw-semibold">Find what you’re looking for.</span></div>
                </div>
              
            </div>
        </div>
<div id="skeleton-programs" class="row g-3 g-ld-4">
    @for ($i = 0; $i < 9; $i++) <!-- Loop to create 9 skeleton cards -->
    <div class="col-lg-4 col-md-6 col-sm-6 d-flex height-program">
        <div class="align-items-center bg-blur border-0 d-flex flex-fill flex-wrap p-3 p-sm-3 rounded-4 shadow-sm w-100">
            <div class="flex-shrink-0 skeleton-icon skeleton"></div>
            <div class="flex-grow-1 ms-2 ms-md-3">
                <div class="skeleton-title skeleton mb-1"></div>
                <div class="skeleton-line skeleton"></div>
            </div>
            <div class="skeleton-arrow skeleton"></div>
        </div>
    </div>
    @endfor
</div>

<!-- Actual Program List -->
<div id="programs-list" class="row g-3 g-ld-4 d-none">
    @if(count($programs) > 0)
    @foreach ($programs as $program)
    <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
        <div class="align-items-center bg-blur border-0 card-hover d-flex flex-fill flex-wrap p-3 p-sm-3 rounded-4 shadow-sm w-100">
            <div class="flex-shrink-0">
                <div class="align-items-center bg-dark category-icon-box d-flex fs-4 justify-content-center rounded-3 text-primary">
                    <i class="fa-solid fa-building-user"></i>
                </div>
            </div>
            <div class="flex-grow-1 ms-2 ms-md-3">
                <h3 class="fs-19 fw-semibold mb-1">
                    <a href="{{ route('universityList', ['program' => $program->id]) }}">{{ $program->program_name }}</a>
                </h3>
                <p class="mb-0 small">{{ $program->universities_count }} listings</p>
            </div>
            <a href="{{ route('universityList', ['program' => $program->id]) }}" class="align-items-center d-flex fw-semibold gap-2 link-hover">
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
    setTimeout(function() {
        // Hide the skeleton cards
        document.getElementById('skeleton-programs').classList.add('d-none');

        // Show the actual program list
        document.getElementById('programs-list').classList.remove('d-none');
    }, 2000); 
});
</script>
@endsection