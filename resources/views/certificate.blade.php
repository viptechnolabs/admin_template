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
                                    <th> # </th>
                                    <th> Student Name </th>
                                    <th> Certificate No </th>
                                    <th> Certificate Name </th>
                                    <th> Issue Date </th>
                                    <th> stream </th>
                                    <th> Passing Year </th>
                                    <th> Grade </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($certificates as $no => $certificate)
                                    <tr>
                                        <td> {{ $no + 1 }} </td>
                                        <td> {{ $certificate->student->name  }} </td>
                                        <td> {{ $certificate->certificate_no  }} </td>
                                        <td> {{ $certificate->name }} </td>
                                        <td> {{ $certificate->issue_dob }} </td>
                                        <td> {{ ucfirst($certificate->stream) }} </td>
                                        <td> {{ $certificate->passing_year }} </td>
                                        <td> {{ strtoupper($certificate->grade) }} </td>
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
