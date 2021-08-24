@extends('pages.collage.navbar')
@section('content')
    <div>
        <div class="container content-wrapper">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Student Enrollment Form</h3>
                </div>
                <form action="{{ route('addCertificate') }}" method="POST" name="add_student" id="add_student">
                @csrf
                <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Student Roll No</label>
                                    <div class="form-group">
                                        <select name="roll_no" class="form-control">
                                            <option class="hidden" selected disabled>Select Student Roll No</option>
                                            @foreach(App\Models\Student::all() as $student)
                                                <option
                                                    value="{{ $student->id }}">{{ $student->id .'-'.$student->FullName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label>Student Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name"
                                               placeholder="Student Full Name *"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Streaming</label>
                                    <select name="stream_class" class="form-control">
                                        <option class="hidden" selected disabled>Select Stream</option>
                                        @foreach(App\Models\Certificate::STREAMING as $key=>$value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="issue_date" class="form-control"
                                           placeholder="Student Last Name *"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- /.col -->
                                <div class="form-group col-sm-6">
                                    <label>Language</label>
                                    <select name="language" class="form-control">
                                        <option class="hidden" selected disabled>Select Stream</option>
                                        @foreach(App\Models\Certificate::LANGUAGE as $key=>$value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Passing Year</label>
                                    <select name="passing_year" class="form-control">
                                        <option class="hidden" selected disabled>Passing Year</option>
                                        @foreach(App\Models\Certificate::PassYear as $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Obtain Class</label>
                                    <select name="obtain_class" class="form-control">
                                        <option class="hidden" selected disabled>Select Obtain Class</option>
                                        @foreach(App\Models\Certificate::OBTAIN as $key=>$value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option class="hidden" selected disabled>Select Status</option>
                                        @foreach(App\Models\Certificate::STATUS as $key=>$value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="form-group">
                            <input type="button" class="btn btn-danger align-content-end" value="cancel">
                            <input type="button" class="btn btn-default" value="reset">
                            <input type="submit" class="btn btn-success" value="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('styles')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
@push('scripts')
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    {{--<script src="{{ asset('assets/jquery-validation/additional-methods.min.js') }}"></script>--}}
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        $(function () {
            $('#add_student').validate({
                rules: {
                    roll_no: {
                        required: true,
                    },
                    name: {
                        required: true,
                    },
                    stream: {
                        required: true,
                    },
                    language: {
                        required: true,
                    },
                    passing_year: {
                        required: true,
                    },
                    issue_date: {
                        required: true,
                    },
                    obtain_class: {
                        required: true,
                    },
                    status: {
                        required: true,
                    }
                },
                messages: {
                    roll_no: {
                        required: "please Select Student.",
                    },
                    name: {
                        required: "Enter Student Name.",
                    },
                    stream: {
                        required: "Please Select Stream.",
                    },
                    language: {
                        required: "Please Select Language.",
                    },
                    passing_year: {
                        required: "Please Select Passing Year.",
                    },
                    issue_date: {
                        required: "Please Enter Date.",
                    },
                    obtain_class: {
                        required: "Select Obtain Class.",
                    },
                    status: {
                        required: "Select Status.",
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endpush
