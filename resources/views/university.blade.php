@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>University List</h1>
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
                                    <th> # </th>
                                    <th> University Name </th>
                                    <th> University Code </th>
                                    <th> University Contact No </th>
                                    <th> University Email </th>
                                    <th> University Address </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($universities as $no => $university)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $university->university->name }}</td>
                                        <td>{{ $university->university->code }}</td>
                                        <td>{{ $university->university->contact_no }}</td>
                                        <td>{{ $university->university->address }}</td>
                                        <td>{{ $university->university->user->email }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
