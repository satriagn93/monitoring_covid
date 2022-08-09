@extends('layout.template')
@section('title','Home')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Monitoring pengecekan karyawan</h1>
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
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{asset('template')}}/dist/img/logo_melawai.png"
                                         alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center">{{ $covid->karyawan }}</h3>
                                <p class="text-muted text-center"></p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Varian</b> <p class="float-right">{{ $covid->covid_name }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        @if ($covid->description == "Sembuh")
                                        <b>Status</b> <p class="float-right bg-success color-palette">{{ $covid->description }}</p>
                                        @else
                                        <b>Status</b> <p class="float-right bg-danger color-palette">{{ $covid->description }}</p>
                                        @endif
                                    </li>
                                    <li class="list-group-item">
                                        <b>Tanggal</b> <p class="float-right">{{ $covid->date }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><button onclick="Modalchecking()" type="button" class="btn btn-success btn-block btn-sm"><i class="fas fa-plus mr-1"></i>
                                        Add Monitoring Check
                                    </button></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <div class="post">
                                            <div class="card-body">
                                                <table id="tb_checking" class="table table-bordered table-striped">
                                                    <thead style="background-color: cornflowerblue">
                                                    <tr>
                                                        <th style="width: 10px; text-align: center">No</th>
                                                        <th>Tanggal</th>
                                                        <th>Nama Dokter</th>
                                                        <th>Tahapan</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($checking as $checkings)
                                                        <tr>
                                                            <td class="text-center"> {{ $loop->iteration }} </td>
                                                            <td>{{$checkings->date}}</td>
                                                            <td>{{$checkings->dokter}}</td>
                                                            <td>{{$checkings->checking}}</td>
                                                            @if ($checkings->status == "Sembuh")
                                                            <td><a class="bg-success color-palette">{{$checkings->status}}</a></td>
                                                            @else
                                                            <td><a class="bg-danger color-palette">{{$checkings->status}}</a></td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- Post -->
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
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
    @include('covid.modal-checking')
@endsection
@push('js')
    <script src="{{ asset('management/covid/covid.js') }}"></script>
@endpush

