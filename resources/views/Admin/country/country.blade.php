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
                        <h4 class="mb-sm-0 font-size-18">Country</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Country</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="custom-validation" action="{{ route('admin.country.store') }}" id="country"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="edit_id" />
                            <div class="row">
                               <div class="col-md-2 col-12">
                                    <label>Country Name<span class="text-danger">*</span></label>
                                    <input type="text" name="country_name" id="countryName" class="form-control"
                                        required placeholder="Enter Country Name" value="{{ ucfirst(old('country_name')) }}">
                                    @error('country_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                               <div class="col-md-3 col-12">
                                    <label>Country Flag<span class="text-danger">*</span></label>
                                    <input type="file" name="flag" id="flag" class="form-control" onchange="readFlagURL(this);" required>
                                    @error('flag')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-1 col-12 my-auto">
                                    <img id="flagPreview" class="rounded-3"
                                        src="{{ URL::asset('assets/images/img/180.png') }}" alt="your image"
                                        style="width:60px; height:60px;" />
                                </div>
                                <div class="col-md-3 col-12">
                                    <label>Country Image (306x459 Image Size)<span class="text-danger">*</span></label>
                                    <input type="file" name="image" id="image" class="form-control"
                                        onchange="readImageURL(this);" placeholder="Upload Country Image" required>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-1 col-12 my-auto">
                                    <img id="imagePreview" class="rounded-3"
                                        src="{{ URL::asset('assets/images/img/180.png') }}" alt="your image"
                                        style="width:60px; height:60px;" />
                                </div>
                                <div class="col-md-2 col-12">
                                    <label>Status<span class="text-danger">*</span></label>
                                    <select class="form-select" name="status" id="select-id" required
                                        data-parsley-required="true"
                                        data-parsley-errors-container="#machine_model_id_error">
                                        <option value="">Select Status</option>
                                        <option value="ACTIVE" {{ old('status') == 'ACTIVE' ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="INACTIVE" {{ old('status') == 'INACTIVE' ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>
                                    <div id="machine_model_id_error"></div>
                                    @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-12 pt-3 mt-2 d-flex justify-content-between">
                                <button id="reset-form" class="btn btn-secondary waves-effect waves-light"
                                        type="reset">
                                        <i class="bx bx-reset me-1" style="font-size:16px;"></i> Reset
                                    </button>
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                                        <i class="bx bx-save me-1" style="font-size:16px;"></i> Submit
                                    </button>
                                  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/.col-->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                            <thead class="table-light">
                                <tr>
                                    <th width="70">Sr. No.</th>
                                    <th width="140">Action</th>
                                    <th>Country Image</th>
                                    <th>Countries Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($country) > 0)
                                @php $i = 1; @endphp
                                @foreach ($country as $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        <button class="btn btn-info waves-effect waves-light btn-sm"
                                            onclick="editCountry(this)" data-id="{{$data->id}}"
                                            data-country_name="{{ $data->country_name }}"data-image="{{ asset($data->image) }}" data-flag="{{ asset($data->flag) }}"
                                            data-status="{{ $data->status }}" type="button" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i class="fas fa-pencil-alt"></i></button>
                                    </td>
                                    <td>
                                        <img src="{{ asset($data->image) }}" alt="Country Image"
                                            style="width: 50px; height: 50px;">
                                    </td>
                                    <td><img src="{{ asset($data->flag  ) }}" alt=""
                                    style="width: 50px; height: 50px;">
                                    {{ ucfirst($data->country_name) }}</td>
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
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

$('#reset-form').on('click', function() {
    $("#country")[0].reset();
    $('#country').parsley().reset();
    $('#countryName').val('').trigger('change');
    $('#select-id').val('').trigger('change');
    $('#flagPreview').attr('src', '{{ URL::asset('assets/images/img/180.png') }}');
    $('#imagePreview').attr('src', '{{ URL::asset('assets/images/img/180.png') }}');
});


$("#datatable").DataTable({
    lengthChange: false,
    "bPaginate": true,
    "aaSorting": [],
    "dom": '<"pull-left"f><"toolbar">tip'
});

function editCountry(obj) {
    let id = $(obj).attr('data-id');
    let country_name = $(obj).attr('data-country_name');
    let image = $(obj).attr('data-image');
    let flag = $(obj).attr('data-flag');
    let status = $(obj).attr('data-status');

    $("#country input[name='country_name']").val(country_name).trigger('change');
    $("#country select[name='status']").val(status).trigger('change');
    $("#country button[type='submit']").text('Update');
    $("#country input[name='image']").removeAttr('required');
    $("#country input[name='flag']").removeAttr('required');

    $('#imagePreview').attr('src', image || '{{ URL::asset('assets/images/img/180.png') }}'); // Show country image
    $('#flagPreview').attr('src', flag || '{{ URL::asset('assets/images/img/180.png') }}'); // Show flag image

    var url = "{{ url('admin/country/update') }}/" + id;
    $('#country').attr('action', url);

    $('html,body').animate({
        scrollTop: $("#country").offset().top - 100
    }, 'fast');
}

function readImageURL(input) {
    var file = input.files[0];
    if (file) {
        if (!file.type.startsWith('image/')) {
            $(input).val('');
            $('#imagePreview').attr('src', '{{ URL::asset('assets/images/img/180.png') }}');
            toastr.error('Please select a valid image file.');
            return;
        }

        var img = new Image();
        var reader = new FileReader();

        reader.onload = function(e) {
            img.src = e.target.result;
            img.onload = function() {
                if (img.width !== 306 || img.height !== 459) {
                    $(input).val('');
                    $('#imagePreview').attr('src', '{{ URL::asset('assets/images/img/180.png') }}');
                    toastr.error('Please select an image with dimensions 306x459 pixels.');
                } else {
                    $('#imagePreview').attr('src', img.src);
                }
            };
        };

        reader.readAsDataURL(file);
    }
}

function readFlagURL(input) {
    var file = input.files[0];
    if (file) {
        // Validate if the file is an image
        if (!file.type.startsWith('image/')) {
            $(input).val('');
            $('#flagPreview').attr('src', '{{ URL::asset('assets/images/img/180.png')}}');
            toastr.error('Please select a valid image file.');
            return;
        }
        
        // Validate file size
        if (file.size > 2097152) { 
            $(input).val(''); 
            $('#flagPreview').attr('src', '{{ URL::asset('assets/images/img/180.png')}}'); 
            toastr.error('Please select an image file smaller than 2MB.');
        } else {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#flagPreview').attr('src', e.target.result); 
            }
            reader.readAsDataURL(file);
        }
    }
}


</script>
@endsection
