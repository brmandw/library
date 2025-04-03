
  <div class="modal fade" id="pinjamBuku{{ $buku->id }}" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi Peminjaman Buku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         Pinjam buku "{{ $buku->judul }} oleh {{ $buku->penulis }}" ini?
        </div>
            <form action="{{ route('peminjam.perpustakaan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_buku" value="{{ $buku->id }}">   
                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">                
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Ya</button>
            </form>
        </div>
      </div>
    </div>
  </div><!-- End Basic Modal--> 


