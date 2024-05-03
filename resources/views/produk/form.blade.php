<div class="modal fade" id="modalFormMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">  
          <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="produk" enctype="multipart/form-data">
              @csrf

              <div id="method"></div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-4 col-form-label">Nama Produk</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_prduk" value="" name="nama_produk">
                </div>
              </div>

              <div id="method"></div>
                <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Nama Supplier</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="nama_supplier" value="" name="nama_supplier"></textarea>
                </div>
              </div>

              
              <div id="method"></div>
                <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Harga Beli</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="harga_beli" value="" name="harga_beli"></textarea>
                </div>
              </div>

              
              <div id="method"></div>
                <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Harga Jual</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="harga_jual" value="" name="harga_jual"></textarea>
                </div>
              </div>
              
              <div id="method"></div>
                <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Stok</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="stok" value="" name="stok"></textarea>
                </div>
              </div>

              
              <div id="method"></div>
                <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Keterangan</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="keterangan" value="" name="keterangan"></textarea>
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
