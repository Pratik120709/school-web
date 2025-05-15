@extends('layouts.master')

@section('title') @lang('translation.Dashboards') @endsection

@section('content')

<div class="row">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-primary bg-soft">
                <div class="row">
                    <div class="col-7">
                        <div class="text-white p-3">
                            <h5 class="text-white">Welcome Back !</h5>
                            <p>University Dashboard</p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="{{ URL::asset('/assets/images/profile-img.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="avatar-md profile-user-wid mb-4">
                            <img src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/images/users/avatar-1.jpg') }}"
                                alt="" class="img-thumbnail rounded-circle">
                        </div>
                        <h5 class="font-size-15 text-truncate">{{ Str::ucfirst(Auth::user()->name) }}</h5>
                        <!-- <p class="text-muted mb-0 text-truncate">UI/UX Designer</p> -->
                    </div>

                    <!-- <div class="col-sm-8">
                        <div class="pt-4">

                            <div class="row">
                                <div class="col-6">
                                    <h5 class="font-size-15">125</h5>
                                    <p class="text-muted mb-0">Projects</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="font-size-15">$1245</h5>
                                    <p class="text-muted mb-0">Revenue</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="row">
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Universities</p>
                                <h4 class="mb-0">{{$universityCount}}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                    <span class="avatar-title">
                                        <i class="bx bx-buildings    font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Programs</p>
                                <h4 class="mb-0">{{ $programCount }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center ">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="mdi mdi-book-education font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Departments</p>
                                <h4 class="mb-0">{{ $departmentCount }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-git-branch font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Countries</p>
                                <h4 class="mb-0">{{ $countryCount }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="fas fa-globe font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">States</p>
                                <h4 class="mb-0">{{ $stateCount }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="fas fa-map font-size-24"></i>
                                    </span>
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
            <div class="d-flex justify-content-between align-items-center mb-3 datatable-custom-button">
            </div>
            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                <thead class="table-light">
                    <tr>
                        <th width="90">Sr. No.</th>
                        <th>Universities Details</th>
                        <th>Countries / States</th>
                        <th>Scholarships</th>
                        <th>Is Features</th>
                        <th>Status</th>
                        <!-- <th>Action </th> -->
                    </tr>
                </thead>
                <tbody>
                    @if(count($university) > 0)
                    @php $i = 1; @endphp
                    @foreach ($university as $data)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar-md profile-user-wid pe-0 mt-0 me-2">
                                    <img src="{{ asset($data->logo) }}" alt="University Logo"
                                        class="img-thumbnail rounded-circle" style="height:70px; width: 70px;">
                                </div>
                                <div class="ps-0">
                                    <p class="mb-0">
                                        <i class="bx bx-buildings me-2 text-primary"></i>
                                        <span id="university-name">{{ucfirst($data->name)}}</span>
                                    </p>
                                    <p class="mb-0">
                                        <i class="bx bxs-contact me-2 text-primary"></i>
                                        <span id="university-email">{{$data->email}}</span>
                                    </p>
                                    <p class="mb-0">
                                        <i class="bx bx-phone-incoming me-2 text-primary"></i>
                                        <span id="university-phone">{{$data->phone}}</span>
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td>{{ucfirst($data->country_name)}} / {{ucfirst($data->state_name)}}</td>
                        <td>
                            @if(isset($data) && $data->scholarship_available)
                            <span class="badge bg-success">Yes</span>
                            @if($data->scholarship_pdf)
                            <a href="{{ asset($data->scholarship_pdf) }}"
                                class="btn btn-primary waves-effect waves-light btn-sm btn-view ms-4" download>
                                <i class="fa fa-download"></i>
                            </a>
                            @else
                            <span class="text-danger ms-4">N/A</span>
                            @endif
                            @else
                            <span class="badge bg-danger">No</span>
                            <span class="text-danger ms-4">N/A</span>
                            @endif
                        </td>
                        <td>
                            <span
                                class="badge bg-{{ $data->is_featured ? 'success' : 'danger' }}">{{ $data->is_featured ? 'Yes' : 'No' }}</span>
                        </td>
                        <td>
                            @if($data->status == 'ACTIVE')
                            <span class="badge bg-success">ACTIVE</span>
                            @else
                            <span class="badge bg-danger">INACTIVE</span>
                            @endif
                        </td>
                        <!-- <td>
                            <a href="{{ route('admin.university.viewUniversity', $data->id) }}"
                                class="btn btn-primary waves-effect waves-light btn-sm btn-view" data-toggle="tooltip"
                                data-placement="top" title="View">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td> -->
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->

<!-- dashboard init -->
<script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
<script>
$(document).ready(function() {
    setTimeout(function() {
        $('#subscribeModal').modal('show');
    }, 2000);
});
</script>
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
</script>
@endsection