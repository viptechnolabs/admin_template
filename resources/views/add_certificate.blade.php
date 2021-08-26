@extends('layout.app')
@section('content')

    <div class="content-wrapper" style="min-height: 1342.88px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Certificate</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add Certificate</li>
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
                            <form action="{{ route('submit_certificate') }}" method="POST" name="add_certificate" id="add_certificate">
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
                                                <label for="name">Student</label>
                                                <select class="form-control" name="student" id="student">
                                                    <option value="">Choose..</option>
                                                    @foreach($students as $student)
                                                            <option value=" {{ $student->id }} "> {{ $student->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName1">Student College</label>
                                                <select class="form-control" name="student_clg" id="student_clg">
                                                    <option value="">Choose..</option>
                                                    @foreach($colleges as $college)
                                                        <option value="{{ $college->id }}">{{ $college->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Certificate Name</label>
                                                <input type="text" class="form-control" name="certificate_name" id="certificate_name" placeholder="Certificate Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Issue Date</label>
                                                <input type="date" class="form-control" name="issue_dob" id="issue_dob">
                                            </div>
                                            <div class="form-group">
                                                <label>Stream</label>
                                                <select class="form-control" name="student_stream">
                                                    <option value="">Choose..</option>
                                                    @foreach(App\Models\Student::STREAM as $key => $value )
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Language</label>
                                                @foreach(App\Models\Student::LANGUAGE as $key => $value )
                                                    <input type="radio"  name="language" id="language" value="{{ $key }}">
                                                    {{ $value }}
                                                @endforeach
                                            </div>
                                            <div class="form-group">
                                                <label>Passing Year</label>
                                                <input type="text" class="form-control" id="passing_year" name="passing_year" placeholder="Passing Year">
                                            </div>
                                            <div class="form-group">
                                                <label>Grade</label>
                                                <select class="form-control" name="grade">
                                                    <option value="">Choose..</option>
                                                    @foreach(App\Models\Student::OBTAIN_CLASS as $key => $value )
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
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
