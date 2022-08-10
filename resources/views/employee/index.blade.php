@extends('layout.template')
@section('title','Home')
@section('content')
<div id="list-employee" class="content-wrapper myData">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Karyawan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div style="display:none" align="left" class="card-header">
                            <a type="button" class="btn btn-outline-dark btn-sm">Close</a>
                        </div>
                        <div align="right" class="card-header">
                            <a href="javascript:void(0);" onclick="createNew()" type="button" class="btn btn-success float-right"><i class="fas fa-user"></i> Create new</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tb_employee" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px; text-align: center">No</th>
                                        <th>Arti</th>
                                        <th>Asma</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@include('employee.create')
@include('employee.modal-delete')
@endsection
@push('js')
<script src="{{ asset('management/employee/employee.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#tb_employee").DataTable({
            processing: true,
            serverSide: true,
            ajax: true,
            columns: [{
                    data: 'DT_RowIndex',
                    'searchable': false,
                    class: 'text-center'
                },
                {
                    data: 'arti',
                    name: 'arti',
                    class: 'text-left'
                },
                {
                    data: 'asma',
                    name: 'asma',
                    class: 'text-center'
                },
                {
                    data: 'nama',
                    name: 'nama',
                    class: 'text-center'
                },
            ]
        });
    });
</script>
@endpush