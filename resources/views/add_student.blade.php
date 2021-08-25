@extends('layout.app')
@section('content')

    <div class="content-wrapper" style="min-height: 1342.88px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Student</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add Student</li>
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
                            <form action="{{ route('submit_student') }}" method="POST" name="add_student" id="add_student">
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
                                                <label for="name">Student Name</label>
                                                <input type="text" class="form-control" name="student_name" id="student_name"
                                                       placeholder="Student name"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName1">Stream</label>
                                                <select class="form-control" name="student_stream">
                                                    <option value="">Choose..</option>
                                                    @foreach(App\Models\Student::STREAM as $key => $value )
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Student Date of Birth</label>
                                                <input type="date" class="form-control" name="student_dob" id="student_dob">
                                            </div>
                                            <div class="form-group">
                                                <label>Student Gender</label>
                                                @foreach(App\Models\Student::GENDER as $key => $value )
                                                    <input type="radio"  name="gender" id="gender" value="{{ $key }}">
                                                    {{ $value }}
                                                @endforeach
                                            </div>
                                            <div class="form-group">
                                                <label>Student College</label>
                                                <select class="form-control" name="student_clg" id="student_clg">
                                                    <option value="">Choose..</option>
                                                    @foreach($colleges as $college)
                                                        <option value="{{ $college->id }}">{{ $college->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Student Contact</label>
                                                <input type="text" class="form-control" name="student_contact" id="student_contact"
                                                       placeholder="Student Contact">
                                            </div>
                                            <div class="form-group">
                                                <label>Student Email address</label>
                                                <input type="email" class="form-control" id="student_email" name="student_email"
                                                       placeholder="student Email">
                                            </div>
                                            <div class="form-group">
                                                <label>Student Address</label>
                                                <textarea type="text" class="form-control" name="student_address" id="student_address" rows="4"
                                                          placeholder="Student Address"></textarea>
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
