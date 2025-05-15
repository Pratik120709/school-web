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
                        <h4 class="mb-sm-0 font-size-18">Universities</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Universities</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3 datatable-custom-button">
                            <a href="javascript:void(0)" class="btn btn-primary me-2 import-btn">
                                <i class="bx bx-download"></i>
                                <span key="t-chat">Import Universities</span>
                            </a>
                            <a href="{{ url('/admin/university/failedUniversity') }}"
                                class="btn btn-danger me-2 clickable">
                                <i class="bx bx-error"></i>
                                <span key="t-chat">Failed University ({{ $failedUniversityCount }})</span>
                            </a>
                            <a href="{{ url('/admin/university/addUniversity')}}" class="btn btn-primary clickable">
                                <i class="bx bx-plus"></i>
                                <span key="t-chat">Add University </span>
                            </a>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                            <thead class="table-light">
                                <tr>
                                    <th width="20">Sr. No.</th>
                                    <th>Universities Details</th>
                                    <th>Countries / States</th>
                                    <th>Scholarships</th>
                                    <th>Is Features</th>
                                    <th>Status</th>
                                    <th>Action </th>
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
                                                    class="img-thumbnail rounded-circle"
                                                    style="height:70px; width: 70px;">
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
                                            class="btn btn-primary waves-effect waves-light btn-sm btn-view ms-4"
                                            download>
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
                                    <td>
                                        <a href="{{ route('admin.university.editUniversity', $data->id) }}"
                                            class="btn btn-info waves-effect waves-light btn-sm clickable" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('admin.university.viewUniversity', $data->id) }}"
                                            class="btn btn-primary waves-effect waves-light btn-sm btn-view"
                                            data-toggle="tooltip" data-placement="top" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Import Universities</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('admin.university.import') }}"
                    enctype="multipart/form-data" id="import-player">
                    @csrf
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <label class="mb-0">Upload excel file<span
                                class="text-danger excel_sheet-label">*</span></label>
                        <a href="{{ asset('assets/excel/University_excel_sheet.xlsx') }}" class="text-end"
                            download="University-sample">Download Sample</a>
                    </div>
                    <div class="mb-3">
                        <input type="file" name="excel_sheet" id="excel_sheet" class="form-control" required
                            accept=".xls, .xlsx" data-parsley-required data-parsley-filetype=".xls, .xlsx">
                        @error('excel_sheet')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light import-submit"
                            type="submit">Upload</button>
                    </div>
                </form>
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

$('.import-btn').on('click', function() {
    $('#importModal').modal('show');
    $('#import-player').parsley();
});
</script>
@php
Session::forget('message');
Session::forget('error');
@endphp
@endsection
@section('script')