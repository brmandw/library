<div class="modal fade" id="editKtgr{{ $ktgr->id_kategori }}" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-3">kategori Buku</h5>

              <form class="row g-3" action="{{ route('admin.kategoribuku.update', ['id' => $ktgr->id_kategori]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="nama_kategori" class="form-label">Nama Kateggori</label>
                  <input type="text" name="nama_kategori" class="form-control" id="nama_kategori" value="{{ old('nama_kategori', $ktgr->nama_kategori) }}">
                </div>
               <div class="text-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Basic Modal-->