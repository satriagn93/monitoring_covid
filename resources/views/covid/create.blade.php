<div class="content-wrapper AddCovid" style="margin-bottom:50px; display:none;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Karyawan terkena Covid-19</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Karyawan terkena Covid-19</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <form method="POST" action="{{ route('covid.store') }}" enctype="multipart/form-data" id="form-create">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Varian covid:</label>
                                <select name="covid_name" class="form-control form-control-sm">
                                    <option value="COVID-19 Varian Alpha">COVID-19 Varian Alpha</option>
                                    <option value="COVID-19 Varian Beta">COVID-19 Varian Beta</option>
                                    <option value="COVID-19 Varian Delta">COVID-19 Varian Delta</option>
                                    <option value="COVID-19 Varian Omicron">COVID-19 Varian Omicron</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal terkena:</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input value="{{ date('d-m-Y') }}" name="date" type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Nama karyawan</label>
                                <select name="employee_id" class="form-control select2" style="width: 100%;">
                                    <option value="">Select Employee</option>
                                    @foreach ($employee as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <select name="description" class="form-control form-control-sm">
                                    <option value="Positif">Positif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a onclick="closeCreate()" href="javascript:void(0);" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
                    <button type="submit" class="btn bg-gradient-primary btn-sm"><i class="fas fa-save"></i> Save</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>