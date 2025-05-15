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
                        <h4 class="mb-sm-0 font-size-18">Programs</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Programs</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3 datatable-custom-button">
                            <a href="{{ url('/admin/university')}}" class="btn btn-primary clickable">
                                <i class="fas fa-eye"></i>
                                <span key="t-chat">University</span>
                            </a>
                            @if(count($failedUniversity) > 0)
                            <a href="{{url('admin/university/deleteAllFailedRecord')}}"
                                class="btn btn-danger record-delete-all ms-2">
                                <i class="bx bx-trash"></i>
                                <span key="t-chat">Delete All Failed Records</span>
                            </a>
                            @endif
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead class="table-light">
                                <tr>
                                    <th width="70">Sr. No.</th>
                                    <th>Universities Name</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($failedUniversity) && count($failedUniversity) > 0)
                                @php $i = 1; @endphp
                                @foreach ($failedUniversity as $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ ucfirst($data->university_name)}}</td>
                                    <td>{{ ($data->remark)}}</td>
                                    <td>
                                        <a href="{{url('admin/university/deleteFailedRecord/'.$data->id)}}"
                                            class="btn btn-danger waves-effect waves-light btn-sm record-delete"
                                            type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div>
                        </div>
                    </div>
                    <!--/.col-->
                </div>
                <!-- container-fluid -->
            </div>

        </div>
    </div>
</div>
<!-- end row -->
</div>
</div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script src="{{ URL::asset('/assets/js/pages/sweet-alerts.init.js') }}"></script>
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

$('.record-delete').on('click', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    if (url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function(result) {
            if (result.value) {
                $('#loader').removeClass('hide-loader');
                window.location = url;
            }
        });
    }
});

$('.record-delete-all').on('click', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    if (url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function(result) {
            if (result.value) {
                $('#loader').removeClass('hide-loader');
                window.location = url;
            }
        });
    }
});
</script>
@php
Session::forget('message');
Session::forget('error');
@endphp
@endsection
@section('script')