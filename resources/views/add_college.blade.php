@extends('layout.app')
@section('content')

    <div class="content-wrapper" style="min-height: 1342.88px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add College</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add College</li>
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
                            <form action="{{ route('submit_college') }}" method="POST" name="add_college" id="add_college">
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
                                                <label for="name">College Name</label>
                                                <input type="text" class="form-control" name="college_name" id="college_name"
                                                       placeholder="college name"/>
                                            </div>
                                            <div class="form-group">
                                                <label>College Code</label>
                                                <input type="text" class="form-control" name="college_code" id="college_code" onkeypress="return isNumberKey(event)"
                                                       placeholder="college Code"/>
                                            </div>
                                            @if (Session::get('userType') === 'admin')
                                                <div class="form-group">
                                                    <label for="exampleInputName1">University</label>
                                                    <select class="form-control" name="uni" id="uni">
                                                        <option value="">Choose..</option>
                                                        @foreach($universities as $university)
                                                            <option value="{{ $university->university->id }}" >{{ $university->university->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <label>College Contact</label>
                                                <input type="phone" class="form-control" name="college_contact" id="college_contact" onkeypress="return isNumberKey(event)"
                                                       placeholder="college Contact No"/>
                                            </div>
                                            <div class="form-group">
                                                <label>College Email address</label>
                                                <input type="email" class="form-control" id="college_email" name="college_email"
                                                       placeholder="college Email"/>
                                            </div>
                                            <div class="form-group">
                                                <label>College Address</label>
                                                <textarea type="text" class="form-control" name="college_address" id="college_address" rows="4"
                                                          placeholder="college Address"></textarea>
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
