@extends('layout.template')
@section('title','Home')
@section('content')
<div id="list-employee" class="content-wrapper myData">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Member</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Member</li>
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
                            <a href="javascript:void(0);" onclick="" type="button" class="btn btn-success float-right"><i class="fas fa-user"></i> Create new</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tb_member" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px; text-align: center">No</th>
                                        <th>Name</th>
                                        <th>No hp</th>
                                        <th style="width: 170px;text-align: center">Action</th>
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
@endsection
@push('js')
<script src="{{ asset('management/member/member.js') }}"></script>
@endpush