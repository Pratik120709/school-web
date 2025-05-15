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
                        <h4 class="mb-sm-0 font-size-18">Subject</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Subject</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="custom-validation" action="{{ route('admin.subject.store') }}" id="subject"
                            method="post">
                            @csrf
                            <input type="hidden" name="edit_id" />
                            <div class="row">
                                <div class="col-md-3 col-12">
                                    <label>Programs<span class="text-danger">*</span></label>
                                    <select class="form-control select2" id="program_id" name="program_id" required
                                        data-parsley-required="true" data-parsley-errors-container="#state_error">
                                        <option value="">Select Program</option>
                                        @foreach($programs as $program)
                                        <option value="{{ $program->id }}">{{ $program->program_name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="state_error"></div>
                                    @error('program_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-12">
                                    <label>Department<span class="text-danger">*</span></label>
                                    <select class="form-control select2" id="department_id" name="department_id" required
                                        data-parsley-required="true" data-parsley-errors-container="#department_error">
                                        <option value="">Select Department</option>
                                        @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="department_error"></div>
                                    @error('department_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-12">
                                    <label>Subject Name<span class="text-danger">*</span></label>
                                    <input type="text" name="subject_name" id="stateName" class="form-control" required
                                        placeholder="Enter Subject Name" value="{{ old('subject_name') }}">
                                    <span id="stateNameError" class="text-danger"></span>
                                    @error('subject_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-12">
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
                                <div class="col-md-12 col-12 pt-3 mt-2 my-auto d-flex justify-content-between">
                                <button id="reset-form" class="btn btn-secondary waves-effect waves-light"
                                        type="reset"><i class="bx bx-reset me-1" style="font-size:16px;"></i>
                                        Reset</button>
                                    <button class="btn btn-primary waves-effect waves-light" id="submit" type="submit"><i
                                            class="bx bx-save me-1" style="font-size:16px;"></i> Submit</button>
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
                                    <th>Departments Name</th>
                                    <th>Subjects Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            @if(count($subjects) > 0)
                                @php $i = 1; @endphp
                                @foreach($subjects as $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>

                                        <button class="btn btn-info waves-effect waves-light btn-sm"
                                            onclick="editSubject(this)" data-id="{{$data->id}}"
                                            data-subject_name="{{$data->subject_name}}"
                                            data-program_id="{{$data->program_id}}" data-department_id="{{$data->department_id}}" data-status="{{$data->status}}"
                                            type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                class=" fas fa-pencil-alt"></i></button>
                                    </td>
                                    <td>{{ucfirst($data->program_name)}}</td>
                                    <td>{{ucfirst($data->department_name)}}</td> 
                                    <td>{{ucfirst($data->subject_name)}}</td>
                                    <td>
                                        @if($data->status == 'ACTIVE')
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

$(document).ready(function() {
    $('.select2').select2();
});

$('#reset-form').on('click', function() {
    $('#subject').parsley().reset();
    $("#subject")[0].reset();
    $("#program_id").val('').trigger('change');
    $("#department_id").val('').trigger('change');
    $("#select-id").val('').trigger('change');
    $("input[name='edit_id']").val('');
    $("#submit").text('Submit');
})

$("#datatable").DataTable({
    lengthChange: false,
    "bPaginate": true,
    "aaSorting": [],
    "dom": '<"pull-left"f><"toolbar">tip'
});

function editSubject(obj) {
    let id = $(obj).data('id');
    let subject_name = $(obj).data('subject_name');
    let program_id = $(obj).data('program_id');
    let department_id = $(obj).data('department_id');
    let status = $(obj).data('status');

    // Set program value and trigger change to populate departments
    $("#program_id").val(program_id).trigger('change');

    // Wait for the AJAX call to complete before setting department value
    setTimeout(() => {
        $("#department_id").val(department_id).trigger('change');
    }, 100); // Adjust timeout based on your AJAX response speed

    $("#stateName").val(subject_name);
    $("#select-id").val(status).trigger('change');
    $("input[name='edit_id']").val(id);
    $("#subject").attr('action', `/admin/editSubject/${id}`);
    $("#submit").text('Update');
}

$('#program_id').on('change', function() {
        var programId = $(this).val();
        if (programId) {
            $.ajax({
                url: '{{ route('admin.getDepartmentsByProgram', ['programId' => ':programId']) }}'.replace(':programId', programId),
                type: 'GET',
                success: function(data) {
                    $('#department_id').empty().append('<option value="">Select Department</option>');
                    $.each(data, function(key, value) {
                        $('#department_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $('#subject_id').empty().append('<option value="">Select Subject</option>');
                },
                error: function(xhr) {
                    console.error('Error fetching departments:', xhr);
                }
            });
        } else {
            $('#department_id').empty().append('<option value="">Select Department</option>');
            $('#subject_id').empty().append('<option value="">Select Subject</option>');
        }
    });
</script>

@php
Session::forget('message');
Session::forget('error');
@endphp
@endsection
@section('script')