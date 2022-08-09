<div class="content-wrapper AddVaksin" style="margin-bottom:50px; display:none;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create vaksin karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Vaksin karyawan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <form method="POST" action="{{ route('vaksin.store') }}" enctype="multipart/form-data" id="form-create">
                @csrf
                <div class="card-body">
                    <div class="row">
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
                                <label>Vaksin 1</label>
                                <select name="vaksin1" class="form-control form-control-sm">
                                    <option value="Belum Vaksin">Belum Vaksin</option>
                                    <option value="Sudah Vaksin">Sudah Vaksin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Vaksin 2</label>
                                <select name="vaksin2" class="form-control form-control-sm">
                                    <option value="Belum Vaksin">Belum Vaksin</option>
                                    <option value="Sudah Vaksin">Sudah Vaksin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Vaksin Booster</label>
                                <select name="vaksin_boosting" class="form-control form-control-sm">
                                    <option value="Belum Vaksin">Belum Vaksin</option>
                                    <option value="Sudah Vaksin">Sudah Vaksin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div style="background-color: #6c757d!important" class="card-header">
                            <h3 class="card-title">Vaksin keluarga karyawan</h3>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead style="background-color: #6c757d!important">
                                <tr class="text-center">
                                    <td>Nama<i class="field_required">*</i></td>
                                    <td>Hubungan<i class="field_required">*</i></td>
                                    <td>Vaksin 1<i class="field_required">*</i></td>
                                    <td>Vaksin 2<i class="field_required">*</i></td>
                                    <td>Vaksin Boosting<i class="field_required">*</i></td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody id="myTable" class="table vaksin">
                                <tr>
                                    <td><input type="text" class="form-control" name="fam_name[]" required></td>
                                    <td><input type="text" class="form-control" name="relationship[]" required></td>
                                    <td>
                                        <select name="vaksin1_kel[]" class="form-control form-control-sm">
                                            <option value="Belum Vaksin">Belum Vaksin</option>
                                            <option value="Sudah Vaksin">Sudah Vaksin</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="vaksin2_kel[]" class="form-control form-control-sm">
                                            <option value="Belum Vaksin">Belum Vaksin</option>
                                            <option value="Sudah Vaksin">Sudah Vaksin</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="vaksin_boosting_kel[]" class="form-control form-control-sm">
                                            <option value="Belum Vaksin">Belum Vaksin</option>
                                            <option value="Sudah Vaksin">Sudah Vaksin</option>
                                        </select>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <a type="button" id="add_vaksin" class="btn btn-sm btn-primary mr-1"><i class="fa fa-plus color-white"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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