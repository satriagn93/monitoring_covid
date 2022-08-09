@extends('layout.template')
@section('title','Home')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Karyawan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Icons</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Description
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <dl>
                                    <dt>Name</dt>
                                    <dd>{{$employee->name}}</dd>
                                    <dt>Gender</dt>
                                    <dd>{{$employee->gender}}</dd>
                                    <dt>Profession</dt>
                                    <dd>{{$employee->profession}}</dd>
                                    <dt>Position</dt>
                                    <dd>{{$employee->position}}</dd>
                                    <dt>Handphone</dt>
                                    <dd>{{$employee->handphone}}</dd>
                                    <dt>Address</dt>
                                    <dd>{{$employee->address}}</dd>
                                </dl>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="{{url('employee')}}" id="back" type="button" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
                                <a href="{{url('employee/'.$employee->id.'/edit')}}" type="button" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('js')
    <script src="{{ asset('management/employee/employee.js') }}"></script>
@endpush

