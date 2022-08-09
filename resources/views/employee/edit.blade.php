@extends('layout.template')
@section('title','Home')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit karyawan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit karyawan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content --><section class="content">

            <!-- Default box -->
            <div class="card">
                <form action="{{url('employee/'.$employee->id.'/update')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{$employee->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control form-control-sm">
                                        @if ($employee->gender == 'Laki-Laki')
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        @elseif($employee->gender == 'Perempuan')
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Profession</label>
                                    <input type="text" class="form-control form-control-sm" id="profession" name="profession" value="{{$employee->profession}}">
                                </div>
                                <div class="form-group">
                                    <label>Position</label>
                                    <input type="text" class="form-control form-control-sm" id="position" name="position" value="{{$employee->position}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Handphone</label>
                                    <input type="text" class="form-control form-control-sm" id="handphone" name="handphone" value="{{$employee->handphone}}">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control form-control-sm" id="address" name="address" value="{{$employee->address}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{url('employee')}}" id="back" type="button" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
                        <button type="submit" class="btn bg-gradient-primary btn-sm"><i class="fas fa-save"></i> Update</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
@push('js')
    <script src="{{ asset('management/employee/employee.js') }}"></script>
@endpush
