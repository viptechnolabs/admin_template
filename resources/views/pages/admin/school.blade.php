@extends('pages.admin.navbar')
@section('content')
    <div>
        <div class="container content-wrapper">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Add New School</h3>
                </div>
                <form action="{{ route('admin.addSchool') }}" method="POST" name="addSchool" id="addSchool">
                @csrf
                <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">School Name</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="School name *"/>
                                </div>
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" class="form-control col-md-4" name="code" onkeypress="return isNumberKey(event)"
                                           placeholder="School Code *"/>
                                </div>
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" class="form-control" name="contact" onkeypress="return isNumberKey(event)"
                                           placeholder="Contact Address *"/>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea type="text" class="form-control" name="address"
                                              placeholder="School Address *"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email"
                                           placeholder="Email Address *"/>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <input type="button" class="btn btn-danger align-content-end" value="cancel">
                            <input type="reset" class="btn btn-default" value="reset">
                            <input type="submit" class="btn btn-success" value="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
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
        $('#addSchool').validate({
            rules: {
                name: {
                    required: true,
                },
                code: {
                    required: true,
                },
                contact: {
                    required: true,
                },
                address: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                name: {
                    required: "School Name Must be Required.",
                },
                code: {
                    required: "School Code Must be Required.",
                },
                contact: {
                    required: "Contact Must be Required.",
                },
                address: {
                    required: "Address Must be Required.",
                },
                email: {
                    required: "Email Must be Required.",
                    email:"Please Enter email Proper Format"
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
    </script>
@endpush
