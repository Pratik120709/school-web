@extends('layouts.master')

@section('title') @lang('translation.Dashboards') @endsection

@section('content')
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
                            </a>Edit Universities
                        </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/admin/university')}}"
                                        class="{{ request()->is('admin/university*') ? 'active' : '' }}">Universities</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Universities</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="custom-validation repeater"
                            action="{{ route('admin.university.update', $university->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="edit_id" value="{{ $university->id }}" />
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="mb-3">
                                        <i class="fas fa-university text-primary"></i> University Information
                                    </h5>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                                        <i class="bx bx-save me-1" style="font-size:16px;"></i> Update
                                    </button>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 col-12 mb-3">
                                    <label>University Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="universityName" class="form-control" required
                                        placeholder="Enter University Name" value="{{ $university->name}}">
                                    <span id="universityNameError" class="text-danger"></span>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-12 mb-3">
                                    <label>Website<span class="text-danger">*</span></label>
                                    <input type="url" name="website" id="website" class="form-control"
                                        placeholder="Enter Website URL" value="{{ $university->website}}" required>
                                    <span id="websiteError" class="text-danger"></span>
                                    @error('website')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-12 mb-3">
                                    <label>Contact Number<span class="text-danger">*</span></label>
                                    <input type="text" name="phone" id="contactPhone" class="form-control"
                                        placeholder="Enter Contact Number" value="{{ $university->phone}}" required>
                                    <span id="contactPhoneError" class="text-danger"></span>
                                    @error('contact_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-12 mb-3">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="contactEmail" class="form-control"
                                        placeholder="Enter Email ID" value="{{ $university->email}}" required>
                                    <span id="contactEmailError" class="text-danger"></span>
                                    @error('contact_email')
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
                                            {{ $country->id == old('country_id', $university->country_id) ? 'selected' : '' }}>
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
                                            {{ $state->id == old('state_id', $university->state_id) ? 'selected' : '' }}>
                                            {{ $state->state_name }}</option>
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
                                        placeholder="Enter Address" value="{{  $university->address }}" required>
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
                                            {{ $university->is_featured == 1 ? 'checked' : '' }}>
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
                                @foreach($programDetails as $detail)
                                <div data-repeater-item class="row mb-3 repeater-item">
                                    <div class="col-md-4 col-12 mb-3">
                                        <label>Programs<span class="text-danger">*</span></label>
                                        <select class="form-control" id="program_id"
                                            name="program_details[{{ $loop->index }}][program_id]" required
                                            data-parsley-required="true" data-parsley-errors-container="#program_error">
                                            <option value="">Select Program</option>
                                            @foreach($programs as $available_program)
                                            <option value="{{ $available_program->id }}"
                                                {{ $available_program->id == old('program_details.' . $loop->index . '.program_id', $detail->program_id) ? 'selected' : '' }}>
                                                {{ $available_program->program_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div id="program_error"></div>
                                        @error('program_details.' . $loop->index . '.program_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-12 mb-3">
                                        <label>Department<span class="text-danger">*</span></label>
                                        <select class="form-control" id="department_id"
                                            name="program_details[{{ $loop->index }}][department_id]" required
                                            data-parsley-required="true"
                                            data-parsley-errors-container="#department_error">
                                            <option value="">Select Department</option>
                                            @foreach($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ $department->id == old('program_details.' . $loop->index . '.department_id', $detail->department_id) ? 'selected' : '' }}>
                                                {{ $department->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div id="department_error"></div>
                                        @error('program_details.' . $loop->index . '.department_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 col-12 mb-3">
                                        <label>Subject<span class="text-danger">*</span></label>
                                        <select class="form-control select2" id="subject_id"
                                            name="program_details[{{ $loop->index }}][subject_id]" required
                                            data-parsley-required="true" data-parsley-errors-container="#subject_error">
                                            <option value="">Select Subject</option>
                                            @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}"
                                                {{ $subject->id == old('program_details.' . $loop->index . '.subject_id', $detail->subject_id) ? 'selected' : '' }}>
                                                {{ $subject->subject_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div id="subject_error"></div>
                                        @error('program_details.' . $loop->index . '.subject_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-1 align-self-center">
                                        <div class="d-flex gap-2">
                                            <button type="button" class="btn btn-danger delete-btn">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button data-repeater-create type="button"
                                class="btn btn-success mb-3 mt-3 mt-lg-0 add-btn">
                                <i class="bx bx-plus"></i>
                            </button>
                            <div class="row mb-3">
                                <div class="col-md-4 col-12 mb-3">
                                    <label>Application Fees<span class="text-danger">*</span></label>
                                    <input type="text" name="fees" id="fees" class="form-control"
                                        placeholder="Enter Application Fees" value="{{ $university->fees}}" required>
                                    <span id="feesError" class="text-danger"></span>
                                    @error('fees')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label>Level<span class="text-danger">*</span></label>
                                    <input type="text" name="level" id="level" class="form-control"
                                        placeholder="Enter Level" value="{{ $university->level}}" required>
                                    <span id="levelError" class="text-danger"></span>
                                    @error('level')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 col-12 mb-3">
                                    <label>Ranking<span class="text-danger">*</span></label>
                                    <input type="text" name="ranking" id="ranking" class="form-control"
                                        placeholder="Enter Ranking" value="{{ $university->ranking}}" required>
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
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="scholarship_available"
                                            id="inlineRadio1" value="1"
                                            {{ isset($scholarshipDetails) && $scholarshipDetails->scholarship_available == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="scholarship_available"
                                                id="inlineRadio2" value="0"
                                                {{ isset($scholarshipDetails) && $scholarshipDetails->scholarship_available == 0 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                        @error('scholarship_available')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-5 col-12 mb-3" id="pdf-section"
                                    style="display: {{ isset($scholarshipDetails) && $scholarshipDetails->scholarship_available == 1 ? 'block' : 'none' }};">
                                    <label>PDF<span class="text-danger pdf-label">*</span></label>
                                    <input type="file" name="scholarship_pdf" id="scholarship_pdf" class="form-control"
                                        accept=".pdf"  onchange="previewPDF(this)">
                                    @error('scholarship_pdf')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                @if(isset($scholarshipDetails) && $scholarshipDetails->scholarship_available == 1)
                                <div class="col-md-2 col-12 mb-3">
                                    @if($scholarshipDetails->scholarship_pdf)
                                    <a href="{{ asset($scholarshipDetails->scholarship_pdf) }}" target="_blank">View
                                        PDF</a>
                                    <div id="pdf_preview">
                                        <embed src="{{ asset($scholarshipDetails->scholarship_pdf) }}"
                                            type="application/pdf" width="100%" height="100px">
                                    </div>
                                    @else
                                    <div id="pdf_preview"></div>
                                    @endif
                                </div>
                                @endif

                                <div class="row mb-3">
                                    <h5 class="mb-3">
                                        <i class="fas fa-dollar-sign text-primary"></i> Tuition Fees
                                    </h5>

                                    @foreach($tuitionFees as $fee)
                                    <div class="col-md-6 col-12 mb-3">
                                        <label>Amount<span class="text-danger">*</span></label>
                                        <input type="text" name="tuition_fees[{{ $loop->index }}][amount]"
                                            id="amount_{{ $loop->index }}" class="form-control"
                                            placeholder="Enter Amount"
                                            value="{{ old('tuition_fees.'.$loop->index.'.amount', $fee->amount) }}"
                                            required>
                                        <span id="amountError_{{ $loop->index }}" class="text-danger"></span>
                                        @error('tuition_fees.' . $loop->index . '.amount')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <label>Payment Frequency<span class="text-danger">*</span></label>
                                        <select class="form-control" id="payment_frequency_{{ $loop->index }}"
                                            name="tuition_fees[{{ $loop->index }}][payment_frequency]" required>
                                            <option value="">Select Payment Frequency</option>
                                            <option value="ANNUAL"
                                                {{ old('tuition_fees.'.$loop->index.'.payment_frequency', $fee->payment_frequency) == 'ANNUAL' ? 'selected' : '' }}>
                                                Annual</option>
                                            <option value="SEMESTER"
                                                {{ old('tuition_fees.'.$loop->index.'.payment_frequency', $fee->payment_frequency) == 'SEMESTER' ? 'selected' : '' }}>
                                                Semester</option>
                                        </select>
                                        <span id="paymentFrequencyError_{{ $loop->index }}" class="text-danger"></span>
                                        @error('tuition_fees.' . $loop->index . '.payment_frequency')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @endforeach
                                </div>
                                <div class="row mb-3">
                                    <h5 class="mb-3">
                                        <i class="fas fa-file-alt text-primary"></i> Admission Requirements
                                    </h5>
                                    <div class="col-md-2 col-12 mb-3">
                                        <label>GPA<span class="text-danger">*</span></label>
                                        <input type="text" name="gpa" class="form-control" placeholder="Enter GPA"
                                            required value="{{ old('gpa', $admissionRequirements->gpa ?? '') }}">
                                        <span id="gpaError" class="text-danger"></span>
                                        @error('gpa')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 col-12 mb-3">
                                        <label>GRE/GMAT<span class="text-danger">*</span></label>
                                        <input type="text" name="gre" class="form-control"
                                            placeholder="Enter GRE/GMAT Score" required
                                            value="{{ old('gre', $admissionRequirements->gre ?? '') }}">
                                        <span id="greError" class="text-danger"></span>
                                        @error('gre')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 col-12 mb-3">
                                        <label>TOEFL<span class="text-danger">*</span></label>
                                        <input type="text" name="toefl" class="form-control"
                                            placeholder="Enter TOEFL Score" required
                                            value="{{ old('toefl', $admissionRequirements->toefl ?? '') }}">
                                        <span id="toeflError" class="text-danger"></span>
                                        @error('toefl')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 col-12 mb-3">
                                        <label>IELTS<span class="text-danger">*</span></label>
                                        <input type="text" name="ielts" class="form-control"
                                            placeholder="Enter IELTS Score" required
                                            value="{{ old('ielts', $admissionRequirements->ielts ?? '') }}">
                                        <span id="ieltsError" class="text-danger"></span>
                                        @error('ielts')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 col-12 mb-3">
                                        <label>PTE<span class="text-danger">*</span></label>
                                        <input type="text" name="pte" class="form-control" placeholder="Enter PTE Score"
                                            required value="{{ old('pte', $admissionRequirements->pte ?? '') }}">
                                        <span id="pteError" class="text-danger"></span>
                                        @error('pte')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 col-12 mb-3">
                                        <label>DET<span class="text-danger">*</span></label>
                                        <input type="text" name="det" class="form-control" placeholder="Enter DET Score"
                                            required value="{{ old('det', $admissionRequirements->det ?? '') }}">
                                        <span id="detError" class="text-danger"></span>
                                        @error('det')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-12 mb-3">
                                        <label>PDF<span class="text-danger pdf-label">*</span></label>
                                        <input type="file" name="pdf" class="form-control" accept=".pdf"
                                            onchange="previewPDF(this)">
                                        @error('pdf')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2 col-12 mb-3">
                                        @if($admissionRequirements->pdf)
                                        <a href="{{ asset($admissionRequirements->pdf) }}" target="_blank">View PDF</a>
                                        <div id="pdf_preview">
                                            <embed src="{{ asset($admissionRequirements->pdf) }}" type="application/pdf"
                                                width="100%" height="100px">
                                        </div>
                                        @else
                                        <div id="pdf_preview"></div>
                                        @endif
                                    </div>
                                </div>

                                <h5 class="mb-3">
                                    <i class="fas fa-plus-circle text-primary"></i> Additional Information
                                </h5>
                                <div class="row mb-3">
                                    <div class="col-md-6 col-12 mb-3">
                                        <label>Longitude<span class="text-danger">*</span></label>
                                        <input type="text" name="longitude" id="longitude" class="form-control"
                                            placeholder="Enter Longitude"
                                            value="{{ old('longitude', $university->longitude) }}" required>
                                        <span id="longitudeError" class="text-danger"></span>
                                        @error('longitude')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <label>Latitude<span class="text-danger">*</span></label>
                                        <input type="text" name="latitude" id="latitude" class="form-control"
                                            placeholder="Enter Latitude"
                                            value="{{ old('latitude', $university->latitude) }}" required>
                                        <span id="latitudeError" class="text-danger"></span>
                                        @error('latitude')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 col-12 mb-3">
                                        <label>Featured Image<span class="text-danger">*</span></label>
                                        <input type="file" name="featured_image" id="featured_image"
                                            class="form-control" onchange="readURL(this);"
                                            data-preview="featured_image_preview">
                                        <span id="featured_imageError" class="text-danger"></span>
                                        @error('featured_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-1 col-12">
                                        <img id="featured_image_preview" class="rounded-3"
                                            src="{{ $university->featured_image ? asset($university->featured_image) : URL::asset('assets/images/img/180.png') }}"
                                            alt="your image" style="width:60px; height:60px;" />
                                    </div>

                                    <div class="col-md-3 col-12 mb-3">
                                        <label>Logo<span class="text-danger">*</span></label>
                                        <input type="file" name="logo" id="logo" class="form-control"
                                            onchange="readURL(this);" data-preview="logo_preview">
                                        <span id="logoError" class="text-danger"></span>
                                        @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-1 col-12">
                                        <img id="logo_preview" class="rounded-3"
                                            src="{{ $university->logo ? asset($university->logo) : URL::asset('assets/images/img/180.png') }}"
                                            alt="your image" style="width:60px; height:60px;" />
                                    </div>

                                    <div class="col-md-3 col-12 mb-3">
                                        <label>University Banner<span class="text-danger">*</span></label>
                                        <input type="file" name="banner_image" id="banner_image" class="form-control"
                                            onchange="readURL(this);" data-preview="banner_image_preview">
                                        <span id="banner_imageError" class="text-danger"></span>
                                        @error('banner_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-1 col-12">
                                        <img id="banner_image_preview" class="rounded-3"
                                            src="{{ $university->banner_image ? asset($university->banner_image) : URL::asset('assets/images/img/180.png') }}"
                                            alt="your image" style="width:60px; height:60px;" />
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <label>Gallery Images<span class="text-danger">*</span></label>
                                        <input type="file" name="photo[]" id="photoInput" multiple class="form-control"
                                            accept="image/jpeg, image/png, image/jpg, image/webp">
                                        <span id="imageError" class="text-danger"></span>
                                        @error('photo.*')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-4 mt-3">
                                        <div class="row">
                                            @if (!empty($galleryImage) && $galleryImage->count() > 0)
                                            @foreach($galleryImage as $gallery)
                                            <div class="mb-4 mx-2 p-0 check"
                                                style="width: 100px; margin-right: 10px; position: relative">
                                                <img src="{{ asset($gallery->photo) }}" alt="Gallery Photo"
                                                    class="photoPreview"
                                                    style="width: 100px; height: 100px; border: 2px; border-radius: 10px;">
                                                <span class="delete-icon deletePhoto"
                                                    data-url="{{ route('universities.deleteGalleryImage', $gallery->id) }}"
                                                    style="position: absolute; right: -10px; top: -9px; background: #fff; border-radius: 100px; cursor: pointer;">
                                                    <i class="bx bx-x-circle font-size-24 align-middle me-1"
                                                        style="color:red"></i>
                                                </span>

                                            </div>
                                            @endforeach
                                            @else
                                            <p>No images available in the gallery.</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="photo-preview">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label>Status<span class="text-danger">*</span></label>
                                        <select class="form-select" name="status" required>
                                            <option value="">Select Status</option>
                                            <option value="ACTIVE"
                                                {{ old('status', $university->status) == 'ACTIVE' ? 'selected' : '' }}>
                                                Active
                                            </option>
                                            <option value="INACTIVE"
                                                {{ old('status', $university->status) == 'INACTIVE' ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                        @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label>Description<span class="text-danger">*</span></label>
                                        <textarea name="description" id="description" class="form-control" rows="4"
                                            required
                                            placeholder="Enter University Description">{{ old('description', $university->description) }}</textarea>
                                        <span id="descriptionError" class="text-danger"></span>
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ url('admin/university')}}"
                                            class="btn btn-secondary waves-effect waves-light" id="reset-btn"
                                            type="reset">
                                            <i class="bx bx-reset me-1" style="font-size:16px;"></i> Cancel
                                        </a>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                                            <i class="bx bx-save me-1" style="font-size:16px;"></i> Update
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
    @endsection
    @section('script')
    <script src="{{ URL::asset('/assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-repeater.int.js') }}"></script>
    <script>
    // Toastr Notifications
    @if(Session::has('message'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.error("{{ session('error') }}", 'Failed');
    @endif

    // DataTable Initialization
    $("#datatable").DataTable({
        lengthChange: false,
        "bPaginate": true,
        "aaSorting": [],
        "dom": '<"pull-left"f><"toolbar">tip'
    });

    // Select2 Initialization
    $(document).ready(function() {
        $('.select2').select2();
        
        // Photo Input Change Event
        $("#photoInput").on('change', function() {
            var input = this;
            var previewContainer = $('.photo-preview');
            previewContainer.empty(); 

            Array.from(input.files).forEach(function(file) {
                if (file.size <= 2097152) { // 2MB limit
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var img = $('<img>').attr('src', e.target.result).css({
                            'width': '100px',
                            'height': '100px',
                            'border': '2px solid #ddd',
                            'border-radius': '10px',
                            'margin': '5px'
                        });
                        previewContainer.append(img);
                    };
                    reader.readAsDataURL(file);
                } else {
                    $(this).val('');
                    toastr.error('Please select images smaller than 2MB for the gallery.');
                }
            });
        });

        // Delete Button Functionality
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
                    Swal.fire('Deleted!', 'Your record has been deleted.', 'success');
                }
            });
        });

        // Delete Icon Functionality
        $(document).on('click', '.delete-icon', function() {
            var deleteIcon = $(this);
            var url = deleteIcon.data('url');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        beforeSend: function() {
                            $('#loader').removeClass('hide-loader');
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                deleteIcon.closest('.check').remove();
                                toastr.success(response.message);
                            } else {
                                toastr.error(response.message);
                            }
                            $('#loader').addClass('hide-loader');
                        },
                        error: function(response) {
                            console.log('Error: ' + response);
                            Swal.fire('Error', 'An error occurred while deleting the photo.', 'error');
                            $('#loader').addClass('hide-loader');
                        }
                    });
                }
            });
        });

        // PDF Input Toggle
        function togglePdfInput(isAvailable) {
            const pdfSection = document.getElementById('pdf-section');
            const pdfInput = document.getElementById('scholarship_pdf');
            if (isAvailable) {
                pdfSection.style.display = 'block';
            } else {
                pdfSection.style.display = 'none';
                pdfInput.removeAttribute('required');
            }
        }

        // Scholarship Available Event Handling
        window.onload = function() {
            const scholarshipAvailable = document.querySelector('input[name="scholarship_available"]:checked');
            if (scholarshipAvailable) {
                togglePdfInput(scholarshipAvailable.value === '1');
            }

            document.querySelectorAll('input[name="scholarship_available"]').forEach((input) => {
                input.addEventListener('change', function() {
                    togglePdfInput(this.value === '1');
                });
            });
        };

        // Photo Input Validation
        document.getElementById('photoInput').addEventListener('change', function() {
            const files = this.files;
            const errorMessage = document.getElementById('imageError');

            if (files.length < 4) {
                errorMessage.textContent = 'You must upload at least four images.';
            } else {
                errorMessage.textContent = ''; // Clear error message if valid
            }
        });

        // Country Change Event
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

        // Repeater Initialization
        initializeSelect2();
        $('[data-repeater-create]').on('click', function() {
            setTimeout(function() {
                initializeSelect2();
                attachDependencyHandlers();
            }, 100); 
        });

        // Select2 Initialization
        function initializeSelect2() {
            $('.select2').select2(); 
        }

        // Attach Dependency Handlers for Dynamic Dropdowns
        function attachDependencyHandlers() {
            $('.repeater-item').each(function() {
                var $repeaterItem = $(this);
                var programSelect = $repeaterItem.find('#program_id');
                var departmentSelect = $repeaterItem.find('#department_id');
                var subjectSelect = $repeaterItem.find('#subject_id');

                // Program Change Event
                programSelect.off('change').on('change', function() {
                    var programId = $(this).val();
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

                // Department Change Event
                departmentSelect.off('change').on('change', function() {
                    var departmentId = $(this).val();
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
    
    function readURL(input) {
    var file = input.files[0];
    var previewId = $(input).data('preview');

    if (file) {
        if (file.size > 2097152) { // 2 MB limit (2 * 1024 * 1024)
            $(input).val(''); // Clear the input
            $('#' + previewId).attr('src', '{{ URL::asset('assets/images/img/180.png') }}');
            toastr.error('Please select an image file smaller than 2MB.');
        } else {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#' + previewId).attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    }
}
$(document).ready(function() {
    $('#country_id').select2({
        templateResult: function(state) {
            if (!state.id) {
                return state.text; // optgroup
            }
            var flagUrl = $(state.element).data('flag'); // Get flag URL
            var $state = $(
                '<span><img src="' + flagUrl +
                '" style="width: 20px; height: 15px; margin-right: 5px;">' + state.text +
                '</span>'
            );
            return $state;
        }
    });
});

function previewPDF(input) {
        var file = input.files[0];
        var previewId = $(input).data('preview');
        if (file) {
            if (file.size > 2097152) { // 2 MB limit (2 * 1024 * 1024)
                $(input).val(''); // Clear the input
                $('#' + previewId).attr('src', '{{ URL::asset('assets/images/img/180.png') }}');
                toastr.error('Please select a PDF file smaller than 2MB.');
            } else {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#' + previewId).attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        }
    }
</script>

    @php
    Session::forget('message');
    Session::forget('error');
    @endphp
    @endsection
    @section('script')