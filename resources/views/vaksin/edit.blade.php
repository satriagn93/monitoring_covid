@extends('layout.template')
@section('title','Home')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit vaksin karyawan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit vaksin karyawan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
                <form  action="{{ route('vaksin.update', ['id' => $vaksin->id]) }}" method="POST" enctype="multipart/form-data"  >
                    @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Nama karyawan</label>
                                <select name="employee_id" class="form-control select2" style="width: 100%;">
                                    <option value="{{$vaksin->employee_id}}">{{$vaksin->karyawan}}</option>
                                    @foreach ($employee as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                              </div>
                            <div class="form-group">
                                <label>Vaksin 1</label>
                                <select name="vaksin1" class="form-control form-control-sm">
                                    @if ($vaksin->vaksin1 == 'Belum Vaksin')
                                    <option value="Belum Vaksin">Belum Vaksin</option>
                                    <option value="Sudah Vaksin">Sudah Vaksin</option>
                                    @elseif ($vaksin->vaksin1 == 'Sudah Vaksin')
                                    <option value="Sudah Vaksin">Sudah Vaksin</option>
                                    <option value="Belum Vaksin">Belum Vaksin</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Vaksin 2</label>
                                <select name="vaksin2" class="form-control form-control-sm">
                                    @if ($vaksin->vaksin2 == 'Belum Vaksin')
                                    <option value="Belum Vaksin">Belum Vaksin</option>
                                    <option value="Sudah Vaksin">Sudah Vaksin</option>
                                    @elseif ($vaksin->vaksin2 == 'Sudah Vaksin')
                                    <option value="Sudah Vaksin">Sudah Vaksin</option>
                                    <option value="Belum Vaksin">Belum Vaksin</option>
                                    @endif
                                </select>
                              </div>
                            <div class="form-group">
                                <label>Vaksin Booster</label>
                                <select name="vaksin_boosting" class="form-control form-control-sm">
                                    @if ($vaksin->vaksin_boosting == 'Belum Vaksin')
                                    <option value="Belum Vaksin">Belum Vaksin</option>
                                    <option value="Sudah Vaksin">Sudah Vaksin</option>
                                    @elseif ($vaksin->vaksin_boosting == 'Sudah Vaksin')
                                    <option value="Sudah Vaksin">Sudah Vaksin</option>
                                    <option value="Belum Vaksin">Belum Vaksin</option>
                                    @endif
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
                                        <td><a type="button" id="add_vaksin" class="btn btn-sm btn-primary mr-1"><i class="fa fa-plus color-white"></i></a></td>
                                    </tr>
                                    
                                    
                                </thead>
                                <tbody id="myTable" class="table vaksin">
                                    @foreach ($vaksin_kel as $vaksin_kels)
                                    <tr>
                                        
                                        <td width="15px" hidden >
                                            <input type="text" class="form-control " name="id[]" value="{{$id = $vaksin_kels->id}}"/>
                                        </td>
                                        <td ><input value="{{$vaksin_kels->fam_name}}" type="text" class="form-control" name="fam_name[]" required></td>
                                        <td ><input value="{{$vaksin_kels->relationship}}" type="text" class="form-control" name="relationship[]" required></td>
                                        <td >
                                            <select name="vaksin1_kel[]" class="form-control form-control-sm">
                                                @if ($vaksin_kels->vaksin1 == 'Belum Vaksin')
                                                <option value="Belum Vaksin">Belum Vaksin</option>
                                                <option value="Sudah Vaksin">Sudah Vaksin</option>
                                                @elseif ($vaksin_kels->vaksin1 == 'Sudah Vaksin')
                                                <option value="Sudah Vaksin">Sudah Vaksin</option>
                                                <option value="Belum Vaksin">Belum Vaksin</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td >
                                            <select name="vaksin2_kel[]" class="form-control form-control-sm">
                                                @if ($vaksin_kels->vaksin2 == 'Belum Vaksin')
                                                <option value="Belum Vaksin">Belum Vaksin</option>
                                                <option value="Sudah Vaksin">Sudah Vaksin</option>
                                                @elseif ($vaksin_kels->vaksin2 == 'Sudah Vaksin')
                                                <option value="Sudah Vaksin">Sudah Vaksin</option>
                                                <option value="Belum Vaksin">Belum Vaksin</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td >
                                            <select name="vaksin_boosting_kel[]" class="form-control form-control-sm">
                                                @if ($vaksin_kels->vaksin_boosting == 'Belum Vaksin')
                                                <option value="Belum Vaksin">Belum Vaksin</option>
                                                <option value="Sudah Vaksin">Sudah Vaksin</option>
                                                @elseif ($vaksin_kels->vaksin_boosting == 'Sudah Vaksin')
                                                <option value="Sudah Vaksin">Sudah Vaksin</option>
                                                <option value="Belum Vaksin">Belum Vaksin</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <a href="{{ url('vaksin/'.$vaksin_kels->id.'/delete_vaksin_kel') }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a class="btn btn-xs btn-warning" href="{{url('/vaksin')}}" type="button">
                        <i class="fa fa-arrow-left color-white"> Back</i>
                    </a>
                    <span style="margin-left: 20px"></span>
                    <button type="submit" class="btn btn-success btn-xs btn-save "><i class="fa fa-save"></i> Update</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection
@push('js')
<script src="{{ asset('management/vaksin/vaksin.js') }}"></script>
@endpush
