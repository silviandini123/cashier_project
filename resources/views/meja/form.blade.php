<div class="modal fade" id="modalFormMeja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">  
          <h5 class="modal-title" id="exampleModalLabel">Edit Meja</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="meja">
              @csrf
              <div id="method"></div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">No Meja</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="no_meja" value="" name="no_meja">
                </div>
              </div>

              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">kapasita</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="kapasitas" value="" name="kapasitas">
                </div>
              </div>

              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
                  <select class="form-control" name="status" id="status">
                    <option value="Terbooking">Terbooking</option>
                    <option value="Free">Free</option>
                  </select>
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
