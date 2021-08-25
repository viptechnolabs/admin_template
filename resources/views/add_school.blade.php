@extends('layout.app')
@section('content')

    <div class="content-wrapper" style="min-height: 1342.88px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add School</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add School</li>
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
                            <form action="{{ route('submit_school') }}" method="POST" name="add_college" id="add_college">
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
                                                <label for="name">School Name</label>
                                                <input type="text" class="form-control" name="school_name" id="school_name"
                                                       placeholder="School name"/>
                                            </div>
                                            <div class="form-group">
                                                <label>School Code</label>
                                                <input type="text" class="form-control" name="school_code" id="school_code" onkeypress="return isNumberKey(event)"
                                                       placeholder="School Code"/>
                                            </div>
                                            <div class="form-group">
                                                <label>School Contact</label>
                                                <input type="phone" class="form-control" name="school_contact" id="school_contact" onkeypress="return isNumberKey(event)"
                                                       placeholder="School Contact No"/>
                                            </div>
                                            <div class="form-group">
                                                <label>School Email address</label>
                                                <input type="email" class="form-control" id="school_email" name="school_email"
                                                       placeholder="School Email"/>
                                            </div>
                                            <div class="form-group">
                                                <label>School Address</label>
                                                <textarea type="text" class="form-control" name="school_address" id="school_address" rows="4"
                                                          placeholder="School Address"></textarea>
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
