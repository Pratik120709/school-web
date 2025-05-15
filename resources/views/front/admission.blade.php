@extends('website.layout.master')

@section('content')

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
<div class="py-5 bg-light rounded-4 mx-3 mt-3">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-10 col-lg-8 col-xl-7">
                <!-- start section header -->
                <div class="section-header text-center mb-5" data-aos="fade-down">
                    <h2 class="display-5 fw-semibold mb-3  text-capitalize">Admission Requirements
                    </h2>
                    <!-- end /. title -->
                    <!-- start description -->
                    <div class="sub-title fs-16">Explore essential admission criteria. <span
                            class="text-primary fw-semibold"> Find what you need to apply successfully.</span></div>
                    <!-- end /. description -->
                </div>
                <!-- end /. section header -->
            </div>
        </div>

        <div id="skeleton-admission" class="row">
            @for ($i = 0; $i < 4; $i++) <div class="col-md-12  mb-3">
            <div class="card skeleton-card">
    <div class="card-body">
        <div class="d-flex align-items-center mb-3 admin-height">
            <!-- University Logo Skeleton -->
            <div class="skeleton-avatar rounded-circle"></div>
            <!-- University Name Skeleton -->
            <div class="skeleton-title skeleton ms-3 flex-grow-1"></div>
        </div>
        <!-- Admission Requirements Title Skeleton -->
        <div class="skeleton-line skeleton mb-3" style="width: 150px;"></div>
        
        <!-- Admission Requirements Values Skeleton -->
        <div class="row">
            <div class="col-2 text-center skeleton-box"></div>
            <div class="col-2 text-center skeleton-box"></div>
            <div class="col-2 text-center skeleton-box"></div>
            <div class="col-2 text-center skeleton-box"></div>
            <div class="col-2 text-center skeleton-box"></div>
            <div class="col-2 text-center skeleton-box"></div>
        </div>

        <!-- View PDF Button Skeleton -->
        <div class="text-end mt-3">
            <div class="skeleton-btn skeleton" style="width: 80px; height: 30px;"></div>
        </div>
    </div>
</div>

        </div>
        @endfor
    </div>


    <!-- Actual Admission Requirements Content -->
    <div id="admission-requirements-list" class="container d-none">
        <div class="row">
            @if($admissionRequirements->count() > 0)
            @foreach($admissionRequirements as $requirement)
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <!-- University Logo or Initial -->
                        <ul class="list-inline list-separator d-flex align-items-center mb-3">
                            @if($requirement->university)
                            @if($requirement->university->logo)
                            <img class="rounded-circle" src="{{ asset($requirement->university->logo) }}" width="80"
                                height="80" alt="University Logo">
                            @else
                            <!-- Display First Letter of University Name if No Logo -->
                            <div class="avatar-xs">
                                <span class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                    {{ ucfirst($requirement->university->name[0]) }}
                                </span>
                            </div>
                            @endif

                            <!-- University Name -->
                            <h1 class="h2 page-header-title fw-semibold mb-0 me-3 ms-2">
                                {{ $requirement->university->name }}
                            </h1>
                            @else
                            <!-- Display a fallback if the university is not available -->
                            <div class="avatar-xs">
                                <span class="avatar-title rounded-circle bg-secondary text-white font-size-16">
                                    N/A
                                </span>
                            </div>
                            <h1 class="h2 page-header-title fw-semibold mb-0 me-3 ms-2">
                                Unknown University
                            </h1>
                            @endif
                        </ul>

                        <h3><i class="fa-solid fa-clipboard-check text-primary mb-4"></i> Admission Requirements
                        </h3>
                        <div class="row">
                            <div class="col-md-12 row">
                                <div class="col-md-8 col-sm-12 mb-3 row">
                                    <div class="col-md-2 col-6 border-end">
                                        <label for="gpa" class="d-block">GPA</label>
                                        <div class="range-value text-danger" id="gpa-value">{{ $requirement->gpa }}
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6 mb-3 border-end">
                                        <label for="gre" class="d-block">GRE / GMAT</label>
                                        <div class="range-value text-success" id="gre-value">{{ $requirement->gre }}
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6 border-end">
                                        <label for="toefl" class="d-block">TOEFL</label>
                                        <div class="range-value text-danger" id="toefl-value">{{ $requirement->toefl }}
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-6 mb-3 border-end">
                                        <label for="ielts" class="d-block">IELTS</label>
                                        <div class="range-value text-success" id="ielts-value">{{ $requirement->ielts }}
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-6 border-end">
                                        <label for="pte" class="d-block">PTE</label>
                                        <div class="range-value text-danger" id="pte-value">{{ $requirement->pte }}
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-6">
                                        <label for="det" class="d-block">DET</label>
                                        <div class="range-value text-success" id="det-value">{{ $requirement->det }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-center text-sm-end ">
                                    <a href="{{ $requirement->pdf }}" class="btn btn-primary" target="_blank">
                                        <i class="fa-solid fa-file-pdf"></i> View PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Pagination -->
            <nav class="justify-content-center mt-5 pagination align-items-center">
                @if ($admissionRequirements->onFirstPage())
                @else
                <a class="prev page-numbers" href="{{ $admissionRequirements->previousPageUrl() }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                    </svg>
                    Previous
                </a>
                @endif

                @foreach ($admissionRequirements->links()->elements as $element)
                @if (is_string($element))
                <span class="page-numbers disabled">{{ $element }}</span>
                @endif

                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $admissionRequirements->currentPage())
                <span class="page-numbers current">{{ $page }}</span>
                @else
                <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                @endif
                @endforeach
                @endif
                @endforeach

                @if ($admissionRequirements->hasMorePages())
                <a class="next page-numbers" href="{{ $admissionRequirements->nextPageUrl() }}">
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

            @else
            <p>No universities found.</p>
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
    document.getElementById('skeleton-admission').classList.remove('d-none');
    document.getElementById('admission-requirements-list').classList.add('d-none');

    setTimeout(function() {
        document.getElementById('skeleton-admission').classList.add('d-none');
        document.getElementById('admission-requirements-list').classList.remove('d-none');
    }, 2000); 
});
</script>
@endsection