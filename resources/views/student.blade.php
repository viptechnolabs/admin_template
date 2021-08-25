@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>College List</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="breadcrumb-item active">College list</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
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
                            <table id="table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th> #</th>
                                    <th> Name</th>
                                    <th> Enrollment No</th>
                                    <th> Stream</th>
                                    <th> Collage Name</th>
                                    <th> Contact No</th>
                                    <th> Email</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @if(Session::get('userType') === 'admin')--}}
                                    @foreach($students as $student)
                                        <tr>
                                            <td> {{ $student->id }} </td>
                                            <td> {{ $student->name }} </td>
                                            <td> {{ $student->enrollment_no }} </td>
                                            <td> {{ $student->stream }} </td>
                                            <td> {{ $student->college->name }} </td>
                                            <td> {{ $student->contact_no }} </td>
                                            <td> {{ $student->email }} </td>
                                        </tr>
                                    @endforeach
{{--                                @endif--}}
{{--                                @if(Session::get('userType') === 'university')--}}
{{--                                    @foreach($students as $collages)--}}
{{--                                        @foreach($collages as $student)--}}
{{--                                            <tr>--}}
{{--                                                <td> {{ $student->id }} </td>--}}
{{--                                                <td> {{ $student->name }} </td>--}}
{{--                                                <td> {{ $student->enrollment_no }} </td>--}}
{{--                                                <td> {{ $student->stream }} </td>--}}
{{--                                                <td> {{ $student->college->name }} </td>--}}
{{--                                                <td> {{ $student->contact_no }} </td>--}}
{{--                                                <td> {{ $student->email }} </td>--}}
{{--                                            </tr>--}}
{{--                                        @endforeach--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
