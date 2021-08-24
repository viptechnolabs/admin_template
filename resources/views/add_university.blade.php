@extends('layout.app')
@section('content')

    <div class="content-wrapper" style="min-height: 1342.88px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add University</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add University</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('submit_university') }}" method="POST" name="add_university" id="add_university">
                            @csrf
                                @if ($errors->any())
                                    @foreach ($errors->all() as $message)
                                        <div class="alert alert-danger alert-dismissible "
                                             role="alert">
                                            <button type="button" class="close"
                                                    data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endforeach
                                @endif
                                @if (session()->has('message'))
                                    <div class="alert alert-success alert-dismissible "
                                         role="alert">
                                        <button type="button" class="close"
                                                data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('message') }}</strong>
                                    </div>
                            @endif
                            <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">University Name</label>
                                                <input type="text" class="form-control" name="university_name" id="university_name"
                                                       placeholder="University name"/>
                                            </div>
                                            <div class="form-group">
                                                <label>University Code</label>
                                                <input type="text" class="form-control" name="university_code" id="university_code" onkeypress="return isNumberKey(event)"
                                                       placeholder="University Code"/>
                                            </div>
                                            <div class="form-group">
                                                <label>University Contact</label>
                                                <input type="phone" class="form-control" name="university_contact" id="university_contact" onkeypress="return isNumberKey(event)"
                                                       placeholder="University Contact No"/>
                                            </div>
                                            <div class="form-group">
                                                <label>University Email address</label>
                                                <input type="email" class="form-control" id="university_email" name="university_email"
                                                       placeholder="University Email"/>
                                            </div>
                                            <div class="form-group">
                                                <label>University Address</label>
                                                <textarea type="text" class="form-control" name="university_address" id="university_address" rows="4"
                                                          placeholder="University Address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <div class="card-footer">
                                    <div class="form-group">
                                        <a href="{{ route('index') }}"><input type="button" class="btn btn-danger align-content-end" value="cancel"></a>
                                        <input type="reset" class="btn btn-default" value="reset">
                                        <input type="submit" class="btn btn-success" value="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
@push('scripts')
{{--    <!-- jQuery -->--}}
{{--    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>--}}
{{--    <!-- Bootstrap 4 -->--}}
{{--    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}
{{--    <!-- AdminLTE App -->--}}
{{--    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>--}}
{{--    --}}{{--<script src="{{ asset('assets/jquery-validation/additional-methods.min.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>--}}

@endpush
