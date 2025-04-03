<div class="modal fade" id="detailBuku{{$buku->id}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
             <label class="form-label"><b>{{ $buku->judul  }}</b>  </label>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $buku->cover) }}" class="card-img-top align-items-center"  alt="...">
                        </div>
                        <div class="col-md-5">
                            <div class="card-body">

                                <div class="mb-1">
                                    <label class="form-label"><b>No Buku:</b> 
                                    <br> </label>
                                </div>

                                <div class="mb-1">
                                    <label class="form-label"><b>Kategori:</b> 
                                    <br> {{$buku->kategoribuku->nama_kategori ?? 'Tidak ada kategori' }}</label>
                                </div>

                                <div class="mb-1">
                                    <label class="form-label"><b>Penulis:</b> 
                                    <br>{{$buku->penulis}}</label>
                                </div>

                                <div class="mb-1">
                                    <label class="form-label"><b>Penerbit:</b> 
                                    <br>{{$buku->penerbit}}</label>
                                </div>

                                <div class="mb-1">
                                    <label class="form-label"><b>Tahun Terbit:</b> 
                                    <br>{{$buku->tahun_terbit}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->