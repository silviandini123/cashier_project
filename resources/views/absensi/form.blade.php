<div class="modal fade" id="modalFormAbsensi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">  
          <h5 class="modal-title" id="exampleModalLabel">Edit Absensi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="absensi">
              @csrf
              <div id="method"></div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Nama Karyawan</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="namaKaryawan" value="" name="namaKaryawan">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Masuk</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" id="tanggalMasuk" value="" name="tanggalMasuk">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Waktu Masuk</label>
                <div class="col-sm-8">
                  <input type="time" class="form-control" id="waktuMasuk" value="" name="waktuMasuk">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
                  <select class="form-control" name="status" id="status">
                    <option value="Masuk">Masuk</option>
                    <option value="Cuti">Cuti</option>
                    <option value="Sakit">Sakit</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Waktu Keluar</label>
                <div class="col-sm-8">
                  <input type="time" class="form-control" id="waktuKeluar" value="" name="waktuKeluar">
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
          </form>
    </div>
</div>
