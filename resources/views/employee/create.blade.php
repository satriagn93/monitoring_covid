<div class="content-wrapper AddEmployee" style="margin-bottom:50px; display:none;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Employee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Employee</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <form method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data" id="form-create">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Nama karyawan" required>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" class="form-control form-control-sm">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Profession</label>
                                <input type="text" class="form-control form-control-sm" id="profession" name="profession" placeholder="Ex.IT Programmer" required>
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control form-control-sm" id="position" name="position" placeholder="Ex.Supervisor" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Handphone</label>
                                <input type="text" class="form-control form-control-sm" id="handphone" name="handphone" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control form-control-sm" id="address" name="address" required>
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
