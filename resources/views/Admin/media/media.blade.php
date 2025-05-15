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
                        <h4 class="mb-sm-0 font-size-18">Media</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Media</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="custom-validation" action="{{ route('admin.media.store') }}" id="media_form" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="edit_id" />
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <label>Upload Image / PDF<span class="text-danger">*</span></label>
                                    <input type="file" id="file" name="file[]" class="form-control" onchange="readFileURL(this);" accept="image/*,.pdf" multiple required>
                                    @error('file')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-1 col-12 my-auto">
                                    <img id="filePreview" class="rounded-3" src="{{ URL::asset('assets/images/img/180.png') }}" alt="your image" style="width:60px; height:60px;" />
                                </div>
                                <div class="col-md-3 col-12 pt-3 mt-2 my-auto">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                                        <i class="bx bx-save me-1" style="font-size:16px;"></i> Submit
                                    </button>
                                    <button id="reset-form" class="btn btn-secondary waves-effect waves-light" type="reset">
                                        <i class="bx bx-reset me-1" style="font-size:16px;"></i> Reset
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
                        <form id="deleteSelectedForm" action="{{ route('admin.deleteSelectedMedia') }}" method="post">
                            @csrf
                            <div class="d-flex justify-content-between align-items-center mb-3 gap-4 datatable-custom-button">
                                <button type="button" id="selectAll" class="btn btn-outline-primary btn-sm">Select All</button>
                                <button type="submit" class="btn btn-danger btn-sm">Delete Selected</button>
                            </div>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead class="table-light">
                                        <tr>
                                            <th width="30"><input type="checkbox" id="checkAll"></th>
                                            <th width="70">Sr. No.</th>
                                            <th width="140">Action</th>
                                            <th>Image / PDF</th>
                                            <th class="d-none d-md-table-cell">Image / PDF path</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($mediaFiles) && count($mediaFiles) > 0)
                                        @php $i = 1; @endphp
                                        @foreach ($mediaFiles as $media)
                                        <tr>
                                            <td><input type="checkbox" name="selectedFiles[]" class="fileCheckbox" value="{{ $media->id }}"></td>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                <div class="d-flex gap-4 align-items-center">
                                                    <a href="{{ asset($media->file) }}" target="_blank" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="View">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a type="button" class="copy-icon" data-toggle="tooltip" title="Copy Path" onclick="copyToClipboard('{{ asset($media->file) }}', this)">
                                                        <i class="dripicons-copy fs-4"></i>
                                                    </a>
                                                    <a href="{{url('admin/media/'.$media->id)}}"
                                                        class="btn btn-danger waves-effect waves-light btn-sm record-delete"
                                                        type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                </div>
                                            </td>
                                            <td>
                                                @if (preg_match('/\.(pdf)$/i', $media->file))
                                                    <iframe src="{{ asset($media->file) }}" width="200" height="100" style="border: none;object-fit: contain;"></iframe>
                                                @else
                                                    <img src="{{ asset($media->file) }}" alt="Image" style="width: 100px; height:100px;object-fit: contain;">
                                                @endif
                                            </td>
                                            <td class="d-none d-md-table-cell">{{ asset($media->file) }}</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/.col-->
        </div>
    </div>
</div>
<!-- end row -->
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    // Initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();
});

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

$('#reset-form').on('click', function() {
    $('#media_form').parsley().reset();
    $('#filePreview').attr('src', '{{ URL::asset('assets/images/img/180.png') }}');

});

function copyToClipboard(text, element) {
    const tempInput = document.createElement("textarea");
    tempInput.value = text;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);

    $(element).tooltip('dispose')
        .attr('title', 'Copied!')
        .tooltip({
            trigger: 'manual'
        })
        .tooltip('show');

    setTimeout(() => {
        $(element).tooltip('dispose')
            .attr('title', 'Copy Path')
            .tooltip();
    }, 2000);
}

function readFileURL(input) {
    var files = input.files;
    const maxFileSize = 2 * 1024 * 1024; 

    for (let i = 0; i < files.length; i++) {
        var file = files[i];

        if (!file.type.startsWith('image/') && !file.type.endsWith('pdf')) {
            $(input).val('');
            $('#filePreview').attr('src', '{{ URL::asset('assets/images/img/180.png') }}'); // Reset to default preview
            toastr.error('Please select a valid image or PDF file.');
            return;
        }

        if (file.size > maxFileSize) {
            $(input).val('');
            $('#filePreview').attr('src', '{{ URL::asset('assets/images/img/180.png') }}'); // Reset to default preview
            toastr.error('The file size exceeds the 2 MB limit. Please upload a smaller file.');
            return;
        }

        if (file.type.startsWith('image/')) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#filePreview').attr('src', e.target.result); // Update image preview
            }
            reader.readAsDataURL(file);
        }
    }
}

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

$(document).ready(function() {
    // Initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();

    // Handle "check all" checkbox
    $('#checkAll').on('click', function() {
        $('.fileCheckbox').prop('checked', $(this).prop('checked'));
    });
    // Handle "Select All" button
    $('#selectAll').on('click', function() {
        var allChecked = $('.fileCheckbox:checked').length === $('.fileCheckbox').length;
        $('.fileCheckbox').prop('checked', !allChecked);
        $('#checkAll').prop('checked', !allChecked);
    });

    // Handle delete selected button with SweetAlert confirmation
    $('#deleteSelectedForm').on('submit', function(e) {
        e.preventDefault(); // Prevent form submission

        var selectedFiles = $('.fileCheckbox:checked').length;
        if (selectedFiles === 0) {
            toastr.error('Please select at least one file to delete.');
            return;
        }

        // Show SweetAlert confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete selected!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#loader').removeClass('hide-loader');
                this.submit(); // Submit the form if confirmed
            }
        });
    });
});
</script>

@php
Session::forget('message');
Session::forget('error');
@endphp
@endsection
