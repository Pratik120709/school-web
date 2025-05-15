@extends('layouts.master')

@section('title') @lang('translation.Dashboards') @endsection

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<div class="row">
    <div class="col-12">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">
                            <a href="javascript:void(0)" onclick="history.back(-1)">
                                <i class="bx bx-left-arrow-circle"></i> Back -
                            </a>Add Universities
                        </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/admin/university')}}"
                                        class="{{ request()->is('admin/university*') ? 'active' : '' }}">Universities</a>
                                </li>
                                <li class="breadcrumb-item active">Add Universities</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="custom-validation repeater" action="{{ route('admin.university.store') }}"
                            id="adduniversity" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="edit_id" value="{{ old('edit_id') }}" />
                            <h5 class="mb-3">
                                <i class="fas fa-university text-primary"></i> University Information
                            </h5>
                            <div class="row mb-3">
                                <div class="col-md-6 col-12 mb-3">
                                    <label>University Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="universityName" class="form-control" required
                                        placeholder="Enter University Name" value="{{ old('name') }}">
                                    <span id="universityNameError" class="text-danger"></span>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>Website<span class="text-danger">*</span></label>
                                    <input type="url" name="website" id="website" class="form-control"
                                        placeholder="Enter Website URL" value="{{ old('website') }}" required>
                                    <span id="websiteError" class="text-danger"></span>
                                    @error('website')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>Contact Number<span class="text-danger">*</span></label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="Enter Contact Number" value="{{ old('phone') }}" required>
                                    <span id="phoneError" class="text-danger"></span>
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Enter Email ID" value="{{ old('email') }}" required>
                                    <span id="emailError" class="text-danger"></span>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                        <label>Country<span class="text-danger">*</span></label>
                                        <select class="form-control select2" id="country_id" name="country_id" required
                                            data-parsley-required="true" data-parsley-errors-container="#country_error">
                                            <option value="">Select Country</option>
                                            @foreach($countries as $country)
                                            <option value="{{ $country->id }}"data-flag="{{ asset($country->flag) }}"
                                                {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                {{ $country->country_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div id="country_error"></div>
                                        @error('country_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 col-12 mb-3">
                                        <label>State<span class="text-danger">*</span></label>
                                        <select class="form-control select2" id="state_id" name="state_id" required
                                            data-parsley-required="true" data-parsley-errors-container="#state_error">
                                            <option value="">Select State</option>
                                            @foreach($states as $state)
                                            <option value="{{ $state->id }}"
                                                {{ old('state_id') == $state->id ? 'selected' : '' }}>
                                                {{ $state->state_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div id="state_error"></div>
                                        @error('state_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                <div class="col-md-6 col-12 mb-3">
                                    <label>Address<span class="text-danger">*</span></label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        placeholder="Enter Address" value="{{ old('address') }}" required>
                                    <span id="addressError" class="text-danger"></span>
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-12 mb-3">
                                    <label class="form-check-label">Is Featured<span
                                            class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input type="checkbox" name="is_featured" id="isFeatured"
                                            class="form-check-input" value="1"
                                            {{ old('is_featured', 0) ? 'checked' : '' }}>
                                        <span id="isFeaturedError" class="text-danger"></span>
                                        @error('is_featured')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <h5 class="mb-3">
                                <i class="fas fa-graduation-cap text-primary"></i> Program & Other Details
                            </h5>
                            <div data-repeater-list="group-a">
                                <div data-repeater-item class="row mb-3 repeater-item">
                                    <div class="col-md-4 col-12 mb-3">
                                        <label>Programs<span class="text-danger">*</span></label>
                                        <select class="form-select" id="program_id" name="program_id" required
                                            data-parsley-required="true" data-parsley-errors-container="#program_error">
                                            <option value="">Select Program</option>
                                            @foreach($programs as $program)
                                            <option value="{{ $program->id }}"
                                                {{ old('program_id') == $program->id ? 'selected' : '' }}>
                                                {{ $program->program_name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="program_error"></div>
                                        @error('program_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-12 mb-3">
                                        <label>Department<span class="text-danger">*</span></label>
                                        <select class="form-select" id="department_id" name="department_id"
                                            required data-parsley-required="true"
                                            data-parsley-errors-container="#department_error">
                                            <option value="">Select Department</option>
                                            @foreach($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                                {{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="department_error"></div>
                                        @error('department_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 col-12 mb-3">
                                        <label>Subject<span class="text-danger">*</span></label>
                                        <select class="form-control select2" id="subject_id" name="subject_id"  required
                                            data-parsley-required="true" data-parsley-errors-container="#subject_error">
                                            <option value="">Select Subject</option>
                                            @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}"
                                                {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                                {{ $subject->subject_name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="subject_error"></div>
                                        @error('subject_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-1 align-self-center">
                                        <div class="d-flex gap-2">
                                            <button type="button"
                                                class="btn btn-danger delete-btn">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button data-repeater-create type="button"
                                                class="btn btn-success mb-3 mt-lg-0 add-btn">
                                                <i class="bx bx-plus"></i>
                                            </button>
                            <div class="row mb-3">
                                <div class="col-md-4 col-12 mb-3">
                                    <label>Application Fees<span class="text-danger">*</span></label>
                                    <input type="text" name="fees" id="fees" class="form-control"
                                        placeholder="Enter Application Fees" value="{{ old('fees') }}" required>
                                    <span id="feesError" class="text-danger"></span>
                                    @error('fees')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label>Level<span class="text-danger">*</span></label>
                                    <input type="text" name="level" id="level" class="form-control"
                                        placeholder="Enter Level" value="{{ old('level') }}" required>
                                    <span id="levelError" class="text-danger"></span>
                                    @error('level')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label>Ranking<span class="text-danger">*</span></label>
                                    <input type="text" name="ranking" id="ranking" class="form-control"
                                        placeholder="Enter Ranking" value="{{ old('ranking') }}" required>
                                    <span id="rankingError" class="text-danger"></span>
                                    @error('ranking')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                    <h5 class="mb-3">
                                        <i class="fas fa-award text-primary"></i> Scholarships
                                    </h5>
                                    <div class="col-md-2 col-12 mb-3">
                                        <label>Scholarship Available<span class="text-danger">*</span></label>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="scholarship_available" id="inlineRadio1" value="1"
                                                {{ old('scholarship_available') == '1' ? 'checked' : '' }} onclick="togglePdfInput(true)">
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="scholarship_available" id="inlineRadio2" value="0"
                                                {{ old('scholarship_available') == '0' ? 'checked' : '' }} onclick="togglePdfInput(false)">
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                        @error('scholarship_available')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12 mb-3" id="pdf-section" style="display: none;">
                                        <label>PDF<span class="text-danger pdf-label">*</span></label>
                                        <input type="file" name="scholarship_pdf" id="scholarship_pdf" class="form-control" accept=".pdf" onchange="validatePDFSize(this);">
                                        @error('scholarship_pdf')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            <div class="row mb-3">
                                <h5 class="mb-3">
                                    <i class="fas fa-dollar-sign text-primary"></i> Tuition Fees
                                </h5>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>Amount<span class="text-danger">*</span></label>
                                    <input type="text" name="amount" id="amount" class="form-control"
                                        placeholder="Enter Amount" value="{{ old('amount') }}" required>
                                    <span id="amountError" class="text-danger"></span>
                                    @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>Payment Frequency<span class="text-danger">*</span></label>
                                    <select class="form-select" id="payment_frequency" name="payment_frequency"
                                        required>
                                        <option value="">Select Payment Frequency</option>
                                        <option value="ANNUAL"
                                            {{ old('payment_frequency') == 'ANNUAL' ? 'selected' : '' }}>Annual</option>
                                        <option value="SEMESTER"
                                            {{ old('payment_frequency') == 'SEMESTER' ? 'selected' : '' }}>Semester
                                        </option>
                                    </select>
                                    <span id="paymentFrequencyError" class="text-danger"></span>
                                    @error('payment_frequency')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <h5 class="mb-3">
                                    <i class="fas fa-file-alt text-primary"></i> Admission Requirements
                                </h5>
                                <div class="col-md-2 col-12 mb-3">
                                    <label>GPA<span class="text-danger">*</span></label>
                                    <input type="text" name="gpa" class="form-control" placeholder="Enter GPA"
                                        required  value="{{ old('gpa') }}">
                                    <span id="gpaError" class="text-danger"></span>
                                    @error('gpa')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2 col-12 mb-3">
                                    <label>GRE/GMAT<span class="text-danger">*</span></label>
                                    <input type="text" name="gre" class="form-control"
                                        placeholder="Enter GRE/GMAT Score" required 
                                        value="{{ old('gre') }}">
                                    <span id="greError" class="text-danger"></span>
                                    @error('gre')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2 col-12 mb-3">
                                    <label>TOEFL<span class="text-danger">*</span></label>
                                    <input type="text" name="toefl" class="form-control"
                                        placeholder="Enter TOEFL Score" required 
                                        value="{{ old('toefl') }}">
                                    <span id="toeflError" class="text-danger"></span>
                                    @error('toefl')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2 col-12 mb-3">
                                    <label>IELTS<span class="text-danger">*</span></label>
                                    <input type="text" name="ielts" class="form-control"
                                        placeholder="Enter IELTS Score" required 
                                        value="{{ old('ielts') }}">
                                    <span id="ieltsError" class="text-danger"></span>
                                    @error('ielts')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2 col-12 mb-3">
                                    <label>PTE<span class="text-danger">*</span></label>
                                    <input type="text" name="pte" class="form-control" placeholder="Enter PTE Score"
                                        required  value="{{ old('pte') }}">
                                    <span id="pteError" class="text-danger"></span>
                                    @error('pte')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2 col-12 mb-3">
                                    <label>DET<span class="text-danger">*</span></label>
                                    <input type="text" name="det" class="form-control" placeholder="Enter DET Score"
                                        required  value="{{ old('det') }}">
                                    <span id="detError" class="text-danger"></span>
                                    @error('det')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label>PDF<span class="text-danger pdf-label">*</span></label>
                                    <input type="file" name="pdf" class="form-control" accept=".pdf" required
                                        data-parsley-max-file-size="10mb" value="{{ old('pdf') }}" onchange="validatePDFSize(this);">
                                    @error('pdf')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <h5 class="mb-3">
                                <i class="fas fa-plus-circle text-primary"></i> Additional Information
                            </h5>
                            <div class="row mb-3">
                                <div class="col-md-6 col-12 mb-3">
                                    <label>Longitude<span class="text-danger">*</span></label>
                                    <input type="text" name="longitude" id="longitude" class="form-control"
                                        placeholder="Enter Longitude" value="{{ old('longitude') }}" required>
                                    <span id="longitudeError" class="text-danger"></span>
                                    @error('longitude')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>Latitude<span class="text-danger">*</span></label>
                                    <input type="text" name="latitude" id="latitude" class="form-control"
                                        placeholder="Enter Latitude" value="{{ old('latitude') }}" required>
                                    <span id="latitudeError" class="text-danger"></span>
                                    @error('latitude')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                    <!-- Featured Image -->
                                    <div class="col-md-3 col-12 mb-3">
                                        <label>Featured Image<span class="text-danger">*</span></label>
                                        <input type="file" name="featured_image" id="featured_image" class="form-control"
                                            onchange="readURL(this);" data-preview="featured_image_preview" required>
                                        <span id="featured_imageError" class="text-danger"></span>
                                        @error('featured_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-1 col-12">
                                        <img id="featured_image_preview" class="rounded-3"
                                            src="{{ URL::asset('assets/images/img/180.png') }}" alt="your image"
                                            style="width:60px; height:60px;" />
                                    </div>

                                    <!-- Logo -->
                                    <div class="col-md-3 col-12">
                                        <label>Logo<span class="text-danger">*</span></label>
                                        <input type="file" name="logo" id="logo" class="form-control"
                                            onchange="readURL(this);" data-preview="logo_preview" required>
                                        <span id="logoError" class="text-danger"></span>
                                        @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-1 col-12">
                                        <img id="logo_preview" class="rounded-3"
                                            src="{{ URL::asset('assets/images/img/180.png') }}" alt="your image"
                                            style="width:60px; height:60px;" />
                                    </div>

                                    <!-- University Banner -->
                                    <div class="col-md-3 col-12">
                                        <label>University Banner<span class="text-danger">*</span></label>
                                        <input type="file" name="banner_image" id="banner_image" class="form-control"
                                            onchange="readURL(this);" data-preview="banner_image_preview" required>
                                        <span id="banner_imageError" class="text-danger"></span>
                                        @error('banner_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-1 col-12">
                                        <img id="banner_image_preview" class="rounded-3"
                                            src="{{ URL::asset('assets/images/img/180.png') }}" alt="your image"
                                            style="width:60px; height:60px;" />
                                    </div>

                                    <!-- Gallery Images -->
                                    <div class="col-md-6 col-12 mb-3">
                                        <label>Gallery Images<span class="text-danger">*</span></label>
                                        <input type="file" name="photo[]" id="photo" multiple class="form-control"
                                            accept="image/jpeg, image/png, image/jpg, image/webp" onchange="readURL(this);" required>
                                        <span id="imageError" class="text-danger"></span>
                                        @error('photo.*')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                <div class="col-6 mb-3">
                                    <label>Status<span class="text-danger">*</span></label>
                                    <select class="form-select" name="status" required>
                                        <option value="">Select Status</option>
                                        <option value="ACTIVE" {{ old('status') == 'ACTIVE' ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="INACTIVE" {{ old('status') == 'INACTIVE' ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>
                                    @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label>Description<span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" class="form-control" rows="4" required
                                        placeholder="Enter University Description">{{ old('description') }}</textarea>
                                    <span id="descriptionError" class="text-danger"></span>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-secondary waves-effect waves-light" id="reset-btn"
                                        type="reset">
                                        <i class="bx bx-reset me-1" style="font-size:16px;"></i> Reset
                                    </button>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                                        <i class="bx bx-save me-1" style="font-size:16px;"></i> Submit
                                    </button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-repeater.int.js') }}"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
<script>
    @if(Session::has('message'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    };
    toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    };
    toastr.error("{{ session('error') }}", 'Failed');
    @endif

    $("#datatable").DataTable({
        lengthChange: false,
        "bPaginate": true,
        "aaSorting": [],
        "dom": '<"pull-left"f><"toolbar">tip'
    });

    $(document).ready(function() {
        $('.select2').select2();
    });

    $(document).ready(function() {
        $('.delete-btn').hide();

        $('body').on('added.fv.repeater', function() {
            $('.delete-btn').show();
        });

        $('body').on('deleted.fv.repeater', function() {
            if ($('.repeater-item').length === 1) {
                $('.delete-btn').hide();
            }
        });

        if ($('.repeater-item').length === 1) {
            $('.delete-btn').hide();
        }
    });

    $('#reset-btn').on('click', function() {
        $("#adduniversity")[0].reset();
        $('#adduniversity').parsley().reset();
        $('#featured_image_preview').attr('src', '{{ URL::asset('assets/images/img/180.png') }}');
        $('#country_id').val('').trigger('change'); 
        $('#state_id').empty().append('<option value="">Select State</option>').val(null).trigger('change');
    });

    $(document).ready(function() {
        $('body').on('click', '.delete-btn', function(e) {
            e.preventDefault();
            var $this = $(this);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $this.closest('.repeater-item').remove();

                    Swal.fire(
                        'Deleted!',
                        'Your record has been deleted.',
                        'success'
                    );
                }
            });
        });
    });

    function readURL(input) {
    const files = input.files;
    const maxSize = 2 * 1024 * 1024;
    let valid = true;

    $('#imageError').text('');

    Array.from(files).forEach(file => {
        if (file.size > maxSize) { 
            valid = false;
            $(input).val(''); 
            toastr.error('Please select image files smaller than 2 MB.');
            return;
        }
    });

    if (valid) {
        Array.from(files).forEach((file, index) => {
            const previewId = $(input).data('preview'); 
            if (previewId) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#' + previewId).attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    }
}

function validatePDFSize(input) {
    var file = input.files[0]; 
    if (file) {
        if (file.size > 2097152) { 
            $(input).val('');
            toastr.error('Please select a PDF file smaller than 2MB.');
        }
    }
}

    $('#country_id').on('change', function() {
        let countryId = $(this).val();
        if (countryId !== "") {
            $.ajax({
                url: "{{ route('admin.getStatesByCountry', ['countryId' => ':countryId']) }}".replace(':countryId', countryId),
                type: 'GET',
                beforeSend: function() {
                    $('#loader').removeClass('hide-loader'); 
                },
                success: function(response) {
                    $('#state_id').html(response.html).trigger('change');
                    $('#state_id').select2(); 
                    $('#loader').addClass('hide-loader'); 
                },
                error: function() {
                    toastr.error('Something went wrong!');
                    $('#loader').addClass('hide-loader');
                }
            });
        } else {
            $('#state_id').empty().select2();
        }
    });

    $(document).ready(function() {
    initializeSelect2();
   
    $('[data-repeater-create]').on('click', function() {
        setTimeout(function() {
            initializeSelect2();
            attachDependencyHandlers();
        }, 100); 
    });

    function initializeSelect2() {
        $('.select2').select2(); 
    }
    // $('#subject_id').select2({
    //         placeholder: "Select Subjects",
    //         allowClear: true,
    //         closeOnSelect: false
    //     });

    function attachDependencyHandlers() {
        $('.repeater-item').each(function() {
            var $repeaterItem = $(this);

            $repeaterItem.find('#program_id').off('change').on('change', function() {
                var programId = $(this).val();
                var departmentSelect = $repeaterItem.find('#department_id');
                var subjectSelect = $repeaterItem.find('#subject_id');

                if (programId) {
                    $.ajax({
                        url: '{{ route('admin.getDepartmentsByProgram', ['programId' => ':programId']) }}'.replace(':programId', programId),
                        type: 'GET',
                        success: function(data) {
                            departmentSelect.empty().append('<option value="">Select Department</option>');
                            $.each(data, function(key, value) {
                                departmentSelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                            subjectSelect.empty().append('<option value="">Select Subject</option>');
                        },
                        error: function(xhr) {
                            console.error('Error fetching departments:', xhr);
                        }
                    });
                } else {
                    departmentSelect.empty().append('<option value="">Select Department</option>');
                    subjectSelect.empty().append('<option value="">Select Subject</option>');
                }
            });

            $repeaterItem.find('#department_id').off('change').on('change', function() {
                var departmentId = $(this).val();
                var subjectSelect = $repeaterItem.find('#subject_id');

                if (departmentId) {
                    $.ajax({
                        url: '{{ route('admin.getSubjectsByDepartment', ['departmentId' => ':departmentId']) }}'.replace(':departmentId', departmentId),
                        type: 'GET',
                        success: function(data) {
                            subjectSelect.empty().append('<option value="">Select Subject</option>');
                            $.each(data, function(key, value) {
                                subjectSelect.append('<option value="' + value.id + '">' + value.subject_name + '</option>');
                            });
                        },
                        error: function(xhr) {
                            console.error('Error fetching subjects:', xhr);
                        }
                    });
                } else {
                    subjectSelect.empty().append('<option value="">Select Subject</option>');
                }
            });
        });
    }
    attachDependencyHandlers();
});

    function togglePdfInput(isAvailable) {
        if (isAvailable) {
            document.getElementById('pdf-section').style.display = 'block';
            document.getElementById('scholarship_pdf').setAttribute('required', 'required');
        } else {
            document.getElementById('pdf-section').style.display = 'none';
            document.getElementById('scholarship_pdf').removeAttribute('required');
        }
    }

    window.onload = function() {
        let scholarshipAvailable = document.querySelector('input[name="scholarship_available"]:checked').value;
        togglePdfInput(scholarshipAvailable === '1');
    };

    document.getElementById('photo').addEventListener('change', function() {
    const files = this.files;
    const errorMessage = document.getElementById('imageError');

    if (files.length < 4) {
        errorMessage.textContent = 'You must upload at least four images.';
    } else {
        errorMessage.textContent = ''; 
    }
});

$(document).ready(function() {
    $('#country_id').select2({
        templateResult: function(state) {
            if (!state.id) {
                return state.text; 
            }
            var flagUrl = $(state.element).data('flag'); 
            var $state = $(
                '<span><img src="' + flagUrl +
                '" style="width: 20px; height: 15px; margin-right: 5px;">' + state.text +
                '</span>'
            );
            return $state;
        }
    });
});
</script>


@php
Session::forget('message');
Session::forget('error');
@endphp
@endsection
@section('script')