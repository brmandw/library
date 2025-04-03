<div class="modal fade" id="tambahPeminjam" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Peminjam</h5>

          
              <!-- No Labels Form -->
              <form class="row g-3" action="{{ route('admin.datapeminjam.store') }}" method="POST">
                @csrf <!-- CSRF Token -->
                <div class="col-md-12">
                <label for="name" class="form-label">Nama</label>
                  <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                </div>
                <div class="col-md-6">
                <label for="username" class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}" required>
                </div>
                <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="ema¡l" value="{{ old('email') }}" required>
                </div>
                <div class="col-md-12">
                <label for="alamat" class="form-label">Alamat</label>
                  <input type="text-area" name="alamat" class="form-control" id="alamat" value="{{ old(key: 'alamat') }}" required>
                </div>
                <div class="col-md-12">
                <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <div class="col-12">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                  <input type="password" name="password_confirmation" class="form-control form-control-user" id="password_confirmation" required>
                </div>
                <input type="hidden" name="role" value="peminjam">
                <div class="d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </form><!-- End No Labels Form -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Basic Modal-->