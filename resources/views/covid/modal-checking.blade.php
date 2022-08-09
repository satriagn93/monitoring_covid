<div class="modal fade" id="edit-Items">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Monitoring/Checking</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('covid.store_monitoring') }}" enctype="multipart/form-data" id="form-create">
                @csrf
                <div class="modal-body">
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="form-group">
                                <input hidden type="text" class="form-control form-control-sm" id="covid_id" name="covid_id" value="{{ $covid->id }}">
                                <label>Tanggal:</label>
                                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                      <input value="{{ date('d-m-Y') }}" name="date" type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Dokter</label>
                                <input type="text" class="form-control form-control-sm" id="dokter" name="dokter">
                            </div>
                            <div class="form-group">
                                <label>Pemeriksaan</label>
                                <input type="text" class="form-control form-control-sm" id="checking" name="checking">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control form-control-sm">
                                    <option value="Positif">Positif</option>
                                    <option value="Sembuh">Sembuh</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer justify-content-between">
                <a data-dismiss="modal" class="btn btn-default btn-sm" onclick="Closechecking()" href="javascript:void(0);"> Close</a>
                <button type="submit" class="btn bg-gradient-primary btn-sm">Save</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
