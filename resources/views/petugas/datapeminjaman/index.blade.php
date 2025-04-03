<!DOCTYPE html>
<html lang="en">
<head>
    <title>Petugas - Data Peminjaman</title>
    @include('petugas.head')

</head>
<body id="page-top">
    @include('petugas.sidebar')
    @include('petugas.navbar')

    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Data Peminjaman</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('petugas.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Data Peminjaman</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
    
        <section class="section">
            <div class="row">
              <div class="col-lg-12">
      
                <div class="card">
                  <div class="card-body">
                   
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Data Peminjaman</h5> 
                    </div> 
                    <!-- Table with stripped rows -->
                     
                    <table class="table datatable">
                      <thead>
                        <tr>
                          <th class="text-center align-middle" style="width: 40px">No</th>
                          <th class="text-center align-middle" style="width: 150px">Nama Peminjam</th>
                          <th class="text-center align-middle" style="width: 150px">Judul</th>
                          <th class="text-center align-middle" style="width: 150px">Tgl Peminjaman</th>
                          <th class="text-center align-middle" style="width: 150px">Tgl Pengembalian</th>
                          <th class="text-center align-middle" style="width: 150px">Status Peminjaman</th>
                          <th class="text-center align-middle" style="width: 100px">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach ($peminjaman as $key => $data)
                        <tr>
                          <td class="text-center align-middle" style="width: 40px">{{$key +1 }}</td>
                          <td class="text-center align-middle" style="width: 150px">{{ $data->user->name }}</td>
                          <td class="text-center align-middle" style="width: 150px">{{ $data->buku->judul }}</td>
                          <td class="text-center align-middle" style="width: 150px">{{ $data->tanggal_peminjaman }}</td>
                          <td class="text-center align-middle" style="width: 150px">{{ $data->tanggal_pengembalian }}</td>
                          <td class="text-center align-middle" style="width: 100px">
                          @if ($data->status == 'Diminta')
                            <span class="badge bg-warning">Diminta</span>
                            @elseif ($data->status == 'Dipinjam')
                                <span class="badge bg-primary">Dipinjam</span>
                            @elseif ($data->status == 'Dikembalikan')
                                <span class="badge bg-success">Dikembalikan</span>
                            @elseif ($data->status == 'Terlambat Dikembalikan')
                                <span class="badge bg-danger">Terlambat</span>
                            @endif
                          </td>
                          <td class="text-center align-middle" style="width: 100px">
                          @if ($data->status == 'Diminta')
                                <form action="{{ route('peminjaman.setuju', $data->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-primary">Setuju</button>
                                </form>
                            @elseif ($data->status == 'Dipinjam')
                            <form action="{{ route('peminjaman.selesai', parameters: $data->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-success">Selesai</button>
                                </form>
                            @elseif ($data->status == 'Dikembalikan')
                                    <button class="btn btn-secondary">Selesai</button>
                            @endif 
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                     
                    <!-- End Table with stripped rows -->
                  </div>
                </div>
      
              </div>
            </div>
          </section>
    
      </main><!-- End #main -->

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