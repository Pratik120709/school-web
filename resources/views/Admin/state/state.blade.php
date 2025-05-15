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
                        <h4 class="mb-sm-0 font-size-18">State</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">State</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="custom-validation" action="{{ route('admin.state.store') }}" id="state"
                            method="post">
                            @csrf
                            <input type="hidden" name="edit_id" />
                            <div class="row">
                            <div class="col-md-3 col-12">
                                    <label>Country<span class="text-danger">*</span></label>
                                    <select class="form-control select2" id="country_id" name="country_id" required
                                        data-parsley-required="true" data-parsley-errors-container="#state_error">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->id }}" data-flag="{{ asset($country->flag) }}">
                                            {{ $country->country_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <div id="state_error"></div>
                                    @error('country_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-12">
                                    <label>State Name<span class="text-danger">*</span></label>
                                    <input type="text" name="state_name" id="stateName" class="form-control" required
                                        placeholder="Enter State Name" value="{{ old('state_name') }}">
                                    <span id="stateNameError" class="text-danger"></span>
                                    @error('state_name')
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
                                <div class="col-md-3 col-12 pt-3 mt-2 my-auto">
                                    <button id="submit" class="btn btn-primary waves-effect waves-light"
                                        type="submit"><i class="bx bx-save me-1" style="font-size:16px;"></i>
                                        Submit</button>
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
                                    <th>Countries Name</th>
                                    <th>States Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($states) > 0)
                                @php $i = 1; @endphp
                                @foreach ($states as $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>

                                        <button class="btn btn-info waves-effect waves-light btn-sm"
                                            onclick="editState(this)" data-id="{{ $data->id }}"
                                            data-country_id="{{ $data->country_id }}"
                                            data-state_name="{{ $data->state_name }}" data-status="{{ $data->status }}"
                                            type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                class=" fas fa-pencil-alt"></i></button>
                                    </td>
                                    <td>{{ ucfirst($data->country_name) }}</td>
                                    <td>{{ ucfirst($data->state_name) }}</td>
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

$(document).ready(function() {
    $('.select2').select2();
});

function editState(obj) {
    let id = $(obj).data('id');
    let state_name = $(obj).data('state_name');
    let country_id = $(obj).data('country_id');
    let status = $(obj).data('status');

    $("#stateName").val(state_name);
    $("#country_id").val(country_id).trigger('change');
    $("#select-id").val(status).trigger('change');
    $("input[name='edit_id']").val(id);
    $("#state").attr('action', `/admin/editState/${id}`);
    $("#submit").text('Update');
}

$('#reset-form').on('click', function() {
    $('#state')[0].reset();
    $('#state').parsley().reset();
    $('#country_id').val('').trigger('change');
    $('#select-id').val('').trigger('change');
    $("#submit").text('Submit');
});

$("#datatable").DataTable({
    lengthChange: false,
    "bPaginate": true,
    "aaSorting": [],
    "dom": '<"pull-left"f><"toolbar">tip'
});

$(document).ready(function() {
    $('#country_id').on('change', function() {
        var countryId = $(this).val();
        if (countryId) {
            $.ajax({
                url: '/getStatesByCountry/' + countryId,
                type: 'GET',
                success: function(response) {
                    if (response.status === 'success') {
                        $('#state_id').html(response.html);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        } else {
            $('#state_id').html('<option value="">Select State</option>');
        }
    });
});
$(document).ready(function() {
    $('.select2').select2({
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
</script>
@php
Session::forget('message');
Session::forget('error');
@endphp
@endsection
@section('script')