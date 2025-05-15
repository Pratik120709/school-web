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
            <!-- end page title -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="custom-validation" action="{{ route('admin.program.store') }}" id="program"
                            method="post">
                            @csrf
                            <input type="hidden" name="edit_id" />
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <label>Program Name<span class="text-danger">*</span></label>
                                    <input type="text" name="program_name" id="Programs" class="form-control" required
                                        placeholder="Enter Program Name" value="{{ ucfirst(old('program_name')) }}">
                                    <span id="stateNameError" class="text-danger"></span>
                                    @error('program_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 col-12">
                                    <label>Status<span class="text-danger">*</span> </label>
                                    <select class="form-select" name="status" id="select-id" required
                                        data-parsley-required="true"
                                        data-parsley-errors-container="#machine_model_id_error">
                                        <option value="">Select Status</option>
                                        <option value="ACTIVE" {{ old('status') == 'ACTIVE' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="INACTIVE" {{ old('status') == 'INACTIVE' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    <div id="machine_model_id_error"></div>
                                    @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!--/.col-->
                                <div class="col-md-3 col-12 pt-3 mt-2 my-auto">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit"><i
                                            class="bx bx-save me-1" style="font-size:16px;"></i> Submit</button>
                                    <button id="reset-form" class="btn btn-secondary waves-effect waves-light"
                                        type="reset"><i class="bx bx-reset me-1" style="font-size:16px;"></i>
                                        Reset</button>
                                </div>
                                <!--/.col-->
                            </div>
                            <!--/.row-->
                        </form>
                    </div>
                </div>
            </div>
            <!--/.col-->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead class="table-light">
                                <tr>
                                    <th width="70">Sr. No.</th>
                                    <th width="140">Action</th>
                                    <th>Programs Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($program) && count($program) > 0)
                                @php $i = 1; @endphp
                                @foreach ($program as $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>

                                        <button class="btn btn-info waves-effect waves-light btn-sm"
                                            onclick="editProgram(this)" data-id="{{$data->id}}"
                                            data-program_name="{{ $data->program_name}}" data-status="{{$data->status}}"
                                            type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                class=" fas fa-pencil-alt"></i></button>
                                        <!-- <button class="btn btn-danger waves-effect waves-light btn-sm" type="button"
                                            title="Delete" data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                class="fa fa-trash"></i></button> -->
                                    </td>
                                    <td>{{ ucfirst($data->program_name)}}</td>
                                    <td>
                                        @if( $data->status == 'ACTIVE')
                                        <span class="badge bg-success">ACTIVE</span>
                                        @else
                                        <span class="badge bg-danger">INACTIVE</span>
                                        @endif

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

function editProgram(obj) {
    let id = $(obj).attr('data-id');
    let program_name = $(obj).attr('data-program_name');
    let status = $(obj).attr('data-status');

    $("#program input[name='program_name']").val(program_name).trigger('change');
    $("#program select[name='status']").val(status).trigger('change');
    $("#program button[type='submit']").text('Update');

    var url = "{{ url('admin/programs/update') }}/" + id;
    $('#program').attr('action', url);

    $('html,body').animate({
        scrollTop: $("#program").offset().top - 100
    }, 'fast');
}
$('#reset-form').on('click', function() {
    $('#program').parsley().reset();
})
</script>
@php
Session::forget('message');
Session::forget('error');
@endphp
@endsection
@section('script')