<div class="modal fade" id="modalFormUserManager" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">  
          <h5 class="modal-title" id="exampleModalLabel">Edit User Manager</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="user">
              @csrf
              <div id="method"></div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Nama User</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="name" value="" name="name">
                </div>
              </div>

              <div id="method"></div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="email" value="" name="email">
                </div>
              </div>

              <!-- <div id="method"></div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">No Telp</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="no_telp" value="" name="no_telp">
                </div>
              </div>

              <div id="method"></div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Alamat</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="alamat" value="" name="alamat">
                </div>
              </div> -->

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
          </form>
    </div>
</div>
