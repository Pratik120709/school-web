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
                            <h4 class="mb-sm-0 font-size-18">Student Contacts</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">Student Contacts</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <!--/.col-->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="custom-validation" id="filterForm" method="GET" action="">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label>University</label>
                                        <select class="form-select select2" name="university_id" id="university-select">
                                            <option value="">Select University</option>
                                            @foreach($universities as $university)
                                            <option value="{{ $university->id }}"
                                                @if(request('university_id')==$university->id) selected @endif>
                                                {{ $university->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <span id="universityError" class="error-message"
                                            style="color: red; display: none;">Please select a university.</span>
                                    </div>
                                    <div class="col-md-3 col-12 pt-4 my-auto">
                                        <button id="searchBtn" class="btn btn-primary waves-effect waves-light me-1"
                                            type="submit">
                                            <i class="bx bx-search-alt me-1" style="font-size:16px;"></i> Search
                                        </button>
                                        <a href="" class="btn btn-secondary waves-effect waves-light clickable"
                                            id="reset-btn">
                                            <i class="bx bx-reset me-1" style="font-size:16px;"></i> Reset
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3 datatable-custom-button">
                                <a href="{{ route('student.export') }}" class="btn btn-success me-2" id="export-btn">
                                    <i class="bx bx-download"></i>
                                    <span key="t-chat">Export</span>
                                </a>
                            </div>

                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead class="table-light">
                                    <tr>
                                        <th width="70">Sr. No.</th>
                                        <th>Universities Name</th>
                                        <th>Students Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Program Name</th>
                                        <th>Department Names</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($studentContacts) > 0)
                                    @php $i = 1; @endphp
                                    @foreach($studentContacts as $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $data->university->name ?? 'N/A' }}</td>
                                        <td>{{ $data->full_name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->program->program_name ?? 'N/A' }}</td>
                                        <td>
                                            @if($data->department_names)
                                            {{ implode(', ', $data->department_names) }}
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);"
                                                class="btn btn-primary waves-effect waves-light btn-sm btn-view"
                                                data-toggle="tooltip" data-placement="top" title="View"
                                                data-university="{{ $data->university->name ?? 'N/A' }}"
                                                data-student="{{ $data->full_name }}" data-email="{{ $data->email }}"
                                                data-phone="{{ $data->phone }}"
                                                data-program="{{ $data->program->program_name ?? 'N/A' }}"
                                                data-departments="{{ implode(', ', $data->department_names) }}"
                                                data-logo="{{ asset($data->university->logo) }}"
                                                data-website="{{ $data->university->website ?? 'N/A' }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
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
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="viewModalLabel">
                        <i class="fas fa-user-graduate me-2 text-primary"></i>
                        Student Details
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="student-details">
                        <div class="row mb-4">
                            <div class="col-lg-6 d-flex align-items-center">
                                <i class="fas fa-user me-2 text-primary"></i>
                                <p class="mb-0"><strong>Student Name:</strong> <span id="student-name"></span></p>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center">
                                <i class="fas fa-envelope me-2 text-primary"></i>
                                <p class="mb-0"><strong>Email:</strong> <span id="student-email"></span></p>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6 d-flex align-items-center">
                                <i class="fas fa-phone me-2 text-primary"></i>
                                <p class="mb-0"><strong>Phone:</strong> <span id="student-phone"></span></p>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center">
                                <i class="fas fa-graduation-cap me-2 text-primary"></i>
                                <p class="mb-0"><strong>Program Name:</strong> <span id="program-name"></span></p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-12 d-flex align-items-center">
                                <i class="fas fa-building me-2 text-primary"></i>
                                <p class="mb-0"><strong>Department Names:</strong> <span id="department-names"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 class="modal-title mb-3">
                        <i class="fas fa-university me-2 text-primary"></i>
                        University Details
                    </h4>
                    <div class="row mb-4 align-items-center">
                        <div class="col-lg-2">
                            <img src="" id="university-logo" alt="University Logo" class="img-fluid rounded-circle"
                                style="max-width: 100%;">
                        </div>
                        <div class="col-lg-10">
                            <h4 id="university-name" class="mb-2"></h4>
                            <p>
                                <i class="bx bxs-contact me-2 text-primary"></i>
                                <a id="website-link" href="" target="_blank">Website</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
$(document).ready(function() {
    // Initialize DataTable
    $("#datatable").DataTable({
        lengthChange: false,
        "bPaginate": true,
        "aaSorting": [],
        "dom": '<"pull-left"f><"toolbar">tip'
    });

    // Initialize Select2 for university selection
    $('#university-select').select2();

    // On button click, open the modal and populate with data
    $(document).on('click', '.btn-view', function() {
        const university = $(this).data('university');
        const student = $(this).data('student');
        const email = $(this).data('email');
        const phone = $(this).data('phone');
        const program = $(this).data('program');
        const departments = $(this).data('departments');
        const logo = $(this).data('logo');
        const website = $(this).data('website');

        // Set the modal fields
        $('#university-logo').attr('src', logo);
        $('#university-name').text(university);
        $('#website-link').attr('href', website).text(website);
        $('#student-name').text(student);
        $('#student-email').text(email);
        $('#student-phone').text(phone);
        $('#program-name').text(program);
        $('#department-names').text(departments);

        $('#viewModal').modal('show');
    });

    $('#filterForm').on('submit', function(e) {
        e.preventDefault();

        let universityId = $('#university-select').val();
        let isValid = true;

        // Reset error message
        $('#universityError').hide();

        // Validate university selection
        if (!universityId) {
            $('#universityError').show();
            isValid = false;
        }

        // If the form is not valid, return
        if (!isValid) {
            return;
        }

        // Update the export button link
        $('#export-btn').attr('href', `{{ route('student.export') }}?university_id=${universityId}`);

        // Make an AJAX request if the form is valid
        $.ajax({
            url: '{{ route('admin.student_contact.filter') }}',
            method: 'GET',
            data: {
                university_id: universityId
            },
            success: function(data) {
                $('#datatable tbody').empty();

                if (data.length > 0) {
                    $.each(data, function(index, item) {
                        let departments = item.department_names ? item
                            .department_names.join(', ') : 'N/A';
                        let logoPath = item.university?.logo ?
                            `{{ asset('') }}${item.university.logo}` : '';

                        let row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.university?.name || 'N/A'}</td>
                            <td>${item.full_name}</td>
                            <td>${item.email}</td>
                            <td>${item.phone}</td>
                            <td>${item.program?.program_name || 'N/A'}</td>
                            <td>${departments}</td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light btn-sm btn-view" 
                                    data-toggle="tooltip" data-placement="top" title="View" 
                                    data-university="${item.university?.name || 'N/A'}" 
                                    data-student="${item.full_name}" 
                                    data-email="${item.email}" 
                                    data-phone="${item.phone}" 
                                    data-program="${item.program?.program_name || 'N/A'}" 
                                    data-departments="${departments}" 
                                    data-logo="${logoPath}" 
                                    data-website="${item.university?.website || 'N/A'}">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    `;
                        $('#datatable tbody').append(row);
                    });
                } else {
                    $('#datatable tbody').append(
                        '<tr><td colspan="8" class="text-center">No data found</td></tr>'
                    );
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    // Update the export link when the university selection changes
    $('#university-select').on('change', function() {
        let universityId = $(this).val();
        if (universityId) {
            $('#universityError').hide();
            $('#export-btn').attr('href',
                `{{ route('student.export') }}?university_id=${universityId}`);
        } else {
            $('#export-btn').attr('href', `{{ route('student.export') }}`);
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