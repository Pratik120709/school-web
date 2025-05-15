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
                            </a>View Universities
                        </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/admin/university')}}"
                                        class="{{ request()->is('admin/university*') ? 'active' : '' }}">Universities</a>
                                </li>
                                <li class="breadcrumb-item active">View Universities</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-1">
                                <div class="mt-0 me-2">
                                    <img style="height:100px;width: 100px" src="{{ asset($university->logo) }}" alt=""
                                        class="img-thumbnail rounded-circle">
                                </div>
                            </div>
                            <div class="col-lg-11">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-3 fs-2"><span id="user-name">{{ $university->name }}</span></p>
                                    <span class="">
                                        @if($university->status == 'ACTIVE')
                                        <span class="badge bg-success">ACTIVE</span>
                                        @else
                                        <span class="badge bg-danger">INACTIVE</span>
                                        @endif
                                    </span>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="mb-3 fs-5"><i class="bx bxs-contact me-2 text-primary fs-5"></i><span
                                                id="user-email">{{ $university->email }}</span></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="mb-3 fs-5"><i
                                                class="bx bx-phone-incoming me-2 text-primary fs-5"></i><span
                                                id="user-phone">{{ $university->phone }}</span></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="mb-3 fs-5"><i class="bx bx-map me-2 text-primary fs-5"></i><span
                                                id="user-address">{{ $university->address }}</span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="fs-5"><i class="bx bx-globe me-2 text-primary fs-5"></i><span
                                                id="user-website">{{ $university->website }}</span></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="fs-5"><i class="bx bx-trophy me-2 text-warning fs-5"></i><span
                                                id="user-rank">Rank: {{ $university->ranking }}</span></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="fs-5"><i class="bx bx-star me-2 text-primary fs-5"></i><span
                                                id="user-level">Level: {{ $university->level }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <div class="col-lg-12 align-self-center">
                                <div class=" mt-4 mt-lg-0">
                                    <h4 class="mb-2 fs-5"><i
                                            class="mdi mdi-book-education me-2 text-primary fs-5"></i><span
                                            id="user-phone">Programs</span></h4>
                                    <ol class="d-flex gap-5">
                                        @if(count($programDetails) > 0)
                                        @foreach($programDetails as $program)
                                        <li>{{ $program->program_name }}</li>
                                        @endforeach
                                        @endif
                                    </ol>
                                </div>
                                <div class=" mt-5 mt-lg-0">
                                    <h4 class="mb-2 fs-5"><i class="bx bx-money me-2 text-primary fs-5"></i><span
                                            id="user-phone">Departments</span></h4>
                                    <ol class="d-flex gap-5">
                                        @if(count($programDetails) > 0)
                                        @foreach($programDetails as $program)
                                        <li>{{ $program->department_name }}</li>
                                        @endforeach
                                        @endif
                                    </ol>
                                </div>
                                <div class=" mt-5 mt-lg-0">
                                    <h4 class="mb-2 fs-5"><i
                                            class="mdi mdi-book-open-page-variant-outline me-2 text-primary fs-5"></i><span
                                            id="user-phone">Subjects</span></h4>
                                    <ol class="d-flex gap-5">
                                        @if(count($programDetails) > 0)
                                        @foreach($programDetails as $program)
                                        <li>{{ $program->subject_name }}</li>
                                        @endforeach
                                        @endif
                                    </ol>
                                </div>
                                <div class=" mt-5 mt-lg-0">
                                    <h4 class="mb-2 fs-5">
                                        <i class="fas fa-graduation-cap me-2 text-primary fs-5"></i>
                                        <span id="user-phone">Admission Requirements</span>
                                    </h4>

                                    <div class="row mt-3 ms-3">
                                        <div class="col-md-12 row mb-3 ">
                                            <div class="col-1 border-end">
                                                <label for="gpa" class="d-block">GPA</label>
                                                <div class="range-value {{ $admissionRequirements->gpa > 40 ? 'text-success' : 'text-danger' }}"
                                                    id="gpa-value">
                                                    {{ $admissionRequirements->gpa ?? 'N/A' }}
                                                </div>
                                            </div>
                                            <div class="col-1 border-end">
                                                <label for="gre" class="d-block">GRE / GMAT</label>
                                                <div class="range-value {{ $admissionRequirements->gre > 40 ? 'text-success' : 'text-danger' }}"
                                                    id="gre-value">
                                                    {{ $admissionRequirements->gre ?? 'N/A' }}
                                                </div>
                                            </div>
                                            <div class="col-1 border-end">
                                                <label for="toefl" class="d-block">TOEFL</label>
                                                <div class="range-value {{ $admissionRequirements->toefl > 40 ? 'text-success' : 'text-danger' }}"
                                                    id="toefl-value">
                                                    {{ $admissionRequirements->toefl ?? 'N/A' }}
                                                </div>
                                            </div>

                                            <div class="col-1 border-end">
                                                <label for="ielts" class="d-block">IELTS</label>
                                                <div class="range-value {{ $admissionRequirements->ielts > 40 ? 'text-success' : 'text-danger' }}"
                                                    id="ielts-value">
                                                    {{ $admissionRequirements->ielts ?? 'N/A' }}
                                                </div>
                                            </div>

                                            <div class="col-1 border-end">
                                                <label for="pte" class="d-block">PTE</label>
                                                <div class="range-value text-success" id="pte-value">50%</div>
                                            </div>

                                            <div class="col-1">
                                                <label for="det" class="d-block">DET</label>
                                                <div class="range-value {{ $admissionRequirements->det > 40 ? 'text-success' : 'text-danger' }}"
                                                    id="det-value">
                                                    {{ $admissionRequirements->det ?? 'N/A' }}
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                @if($admissionRequirements->pdf)
                                                <a href="{{ asset($admissionRequirements->pdf) }}"
                                                    class="btn btn-primary" target="_blank">
                                                    <i class="fa fa-eye"></i> View PDF
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mt-5 mt-lg-0">
                                    <div class="row mt-3">
                                        <div class="col-md-12 row mb-3 ">
                                            <div class="col-lg-3">
                                                <h4 class="mb-2 fs-5"><i
                                                        class="bx bx-award me-2 text-primary fs-4"></i><span
                                                        id="user-phone">Scholorships</span></h4>
                                                <div class="col-12 row">
                                                    <div class="col-3 ms-4">
                                                        @if (isset($scholarshipDetails))
                                                        @if ($scholarshipDetails->scholarship_available == 1)
                                                        <span class="badge bg-success">YES</span>
                                                        @else
                                                        <span class="badge bg-danger">NO</span>
                                                        @endif
                                                        @else
                                                        <span class="badge bg-secondary">Not Available</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-6">
                                                        @if (isset($scholarshipDetails) &&
                                                        $scholarshipDetails->scholarship_available == 1)
                                                        @if ($scholarshipDetails->scholarship_pdf)
                                                        <a href="{{ asset($scholarshipDetails->scholarship_pdf) }}"
                                                            class="btn btn-primary" target="_blank">
                                                            <i class="fa fa-eye"></i> View PDF
                                                        </a>
                                                        @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <h4 class="mb-2 fs-5 d-flex align-items-center">
                                                    <i class="bx bx-credit-card me-2 text-primary fs-4"></i>
                                                    <span id="user-phone">University Fees</span>
                                                </h4>
                                                <div class="ms-4 d-flex align-items-center">
                                                    <i class="bx bx-money me-2 text-success fs-4"></i>
                                                    <p class="mb-0">{{ $university->fees }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <h4 class="mb-2 fs-5">
                                                    <i class="bx bx-dollar-circle me-2 text-primary fs-4"></i>
                                                    <span id="user-phone">Tuition Fees</span>
                                                </h4>
                                                <div class="ms-4">
                                                    @if($tuitionFees->payment_frequency == 'ANNUAL')
                                                    <div class="d-flex align-items-center mb-2">
                                                        <p class="mb-0 me-3">Annual Fees :
                                                            <strong>{{ $tuitionFees->amount }}</strong>
                                                        </p>
                                                    </div>
                                                    @elseif($tuitionFees->payment_frequency == 'SEMESTER')
                                                    <div class="d-flex align-items-center mb-2">
                                                        <p class="mb-0 me-3">Semester Fees :
                                                            <strong>{{ $tuitionFees->amount }}</strong>
                                                        </p>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 align-self-center">
                                <div class=" mt-4 mt-lg-0">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mt-0 me-2">
                                                <img style="height: 400px;" src="{{asset($university->featured_image)}}"
                                                    alt="" class="img-thumbnail w-100">
                                            </div>
                                        </div>
                                        <div class="col-lg-8" style="">
                                            <p>
                                                {{ $university->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 align-self-center">
                                <div class=" mt-4 mt-lg-0">
                                    <h4 class="mb-4"><i class="bx bx-images me-2 text-primary fs-4"></i>Gallery Images
                                    </h4>

                                    <div class="row">
                                        @forelse ($galleryImages as $index => $image)
                                        @if ($index == 0)
                                        <!-- For the first image in the first column -->
                                        <div class="col-md-4">
                                            <img src="{{ asset($image->photo) }}" alt="Gallery Image 1"
                                                class="img-fluid w-100 rounded" style="height: 623px;">
                                        </div>
                                        @elseif ($index >= 1 && $index <= 3) @if ($index==1) <div class="col-lg-8">
                                            <div class="row mb-4">
                                                @endif
                                                <div class="col-md-4">
                                                    <img src="{{ asset($image->photo) }}"
                                                        alt="Gallery Image {{ $index + 1 }}" class="img-fluid w-100"
                                                        style="height: 300px;">
                                                </div>
                                                @if ($index == 3)
                                            </div>
                                            <div class="row">
                                                @endif
                                                @elseif ($index >= 4)
                                                <div class="col-md-4">
                                                    <img src="{{ asset($image->photo) }}"
                                                        alt="Gallery Image {{ $index + 1 }}" class="img-fluid w-100"
                                                        style="height: 300px;">
                                                </div>
                                                @endif
                                                @empty
                                                <div class="col-md-12">
                                                    <p>No gallery images available.</p>
                                                </div>
                                                @endforelse
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection
                @section('script')

                <script>
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

                $("#datatable").DataTable({
                    lengthChange: false,
                    "bPaginate": true,
                    "aaSorting": [],
                    "dom": '<"pull-left"f><"toolbar">tip'
                });
                $(document).ready(function() {
                    $('.select2').select2();
                });
                </script>
                @php
                Session::forget('message');
                Session::forget('error');
                @endphp
                @endsection
                @section('script')