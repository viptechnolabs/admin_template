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
                                        <td>{{ $university->name }}</td>
                                        <td>{{ $university->code }}</td>
                                        <td>{{ $university->contact_no }}</td>
                                        <td>{{ $university->address }}</td>
                                        <td>{{ $university->user->email }}</td>
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
