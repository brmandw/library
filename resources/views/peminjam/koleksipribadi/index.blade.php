<!DOCTYPE html>
<html lang="en">
<head>
    <title>user - Koleksi Buku</title>
    @include('peminjam.head')

</head>
<body id="page-top">
    @include('peminjam.sidebar')
    @include('peminjam.navbar')

    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Koleksi Pribadi</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('peminjam.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Koleksi Pribadi</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
    
        <section class="section">
            <div class="row">
              <div class="col-lg-12">
      
                <div class="card">
                  <div class="card-body">
                   
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Koleksi Pribadi</h5> 
                    </div> 
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                      <thead>
                        <tr>
                          <th class="text-center align-middle" style="width: 40px">No</th>
                          <th class="text-center align-middle" style="width: 150px">Buku</th>
                          <th class="text-center align-middle" style="width: 150px">Penulis</th>
                          <th class="text-center align-middle" style="width: 150px">Penerbit</th>
                          <th class="text-center align-middle" style="width: 150px">Tgl Peminjaman</th>
                          <th class="text-center align-middle" style="width: 150px">Tgl Pengembalian</th>
                          <th class="text-center align-middle" style="width: 150px">Status Peminjaman</th>
                          <th class="text-center align-middle" style="width: 100px">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($peminjaman as $key => $koleksi)
                        <tr>
                          <td class="text-center align-middle" style="width: 40px">{{$key +1 }}</td>
                          <td class="text-center align-middle" style="width: 150px">{{ $koleksi->buku->judul }}</td>
                          <td class="text-center align-middle" style="width: 150px">{{ $koleksi->buku->penulis }}</td>
                          <td class="text-center align-middle" style="width: 150px">{{ $koleksi->buku->penerbit }}</td>
                          <td class="text-center align-middle" style="width: 150px">{{ $koleksi->tanggal_peminjaman }}</td>
                          <td class="text-center align-middle" style="width: 150px">{{ $koleksi->tanggal_pengembalian }}</td>
                          <td class="text-center align-middle" style="width: 100px">
                          @if ($koleksi->status == 'Diminta')
                            <span class="badge bg-warning">Diminta</span>
                            @elseif ($koleksi->status == 'Dipinjam')
                                <span class="badge bg-primary">Dipinjam</span>
                            @elseif ($koleksi->status == 'Dikembalikan')
                                <span class="badge bg-success">Dikembalikan</span>
                            @else ($koleksi->status == 'Terlambat Dikembalikan')
                                <span class="badge bg-danger">Terlambat</span>
                            @endif
                          </td>
                          <td>
                          @if ($koleksi->status == 'Diminta')
                          <button type="button" class="btn btn-secondary">
                                  Ulasan
                              </button>
                              <a href="{{ route('peminjam.index')}}" class="btn btn-danger">
                                  Batalkan
                            </a>
                            @elseif ($koleksi->status == 'Dipinjam')
                            <button type="button" class="btn btn-secondary">
                                  Ulasan
                              </button>
                            @elseif ($koleksi->status == 'Dikembalikan')
                            <a href="{{ route('peminjam.index')}}" class="btn btn-primary">
                                  Ulasan
                            </a>
                            @else ($koleksi->status == 'Terlambat Dikembalikan')
                            <a href="{{ route('peminjam.index')}}" class="btn btn-primary">
                                  Ulasan
                            </a>
                            @endif
                    
                            </td>
                          </tr>
                          @endforeach
                      </tbody>
                     
                    </table>
                    <!-- End Table with stripped rows -->
      
                  </div>
                </div>
      
              </div>
            </div>
          </section>
    
      </main><!-- End #main -->
    
    
 
      @include('script')

      <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
 
</body>
</html>