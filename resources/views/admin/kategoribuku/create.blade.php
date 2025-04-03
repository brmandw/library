<div class="modal fade" id="tambahKtgr" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content"> <!-- Gunakan modal-content langsung -->
          <div class="modal-header">
              <h5 class="modal-title">Tambah Kategori Buku</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Kategori Buku</h5>
                <form action="{{ route('admin.kategoribuku.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" id="nama_kategori" required>
                    </div>                    
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
              </div>
            </div>  
          </div>
      </div>
  </div>
</div>


