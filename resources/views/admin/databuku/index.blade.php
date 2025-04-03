<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin - Data Buku</title>
    @include('admin.head')

</head>
<body id="page-top">
    @include('admin.sidebar')
    @include('admin.navbar')

    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Data Buku</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Data Buku</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
    
        <section class="section">
            <div class="row">
              <div class="col-lg-12">
      
                @include('admin.databuku.create',  ['kategoribuku' => $kategoribuku])
                <div class="card">
                  <div class="card-body">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Data Buku</h5>
                        <a href="#" class="btn btn-primary btn-icon-split" data-bs-toggle="modal" data-bs-target="#tambahBuku">
                          <i class="bi bi-plus-lg"></i>
                        </a>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                      <thead>
                        <tr>
                          <th class="text-center align-middle" style="width: 40px">No</th>
                          <th class="text-center align-middle" style="width: 150px">Cover</th>
                          <th class="text-center align-middle" style="width: 150px">Kode Buku</th>
                          <th class="text-center align-middle" style="width: 150px">Judul</th>
                          <th class="text-center align-middle" style="width: 150px">Penulis</th>
                          <th class="text-center align-middle" style="width: 150px">Kategori</th>
                          <th class="text-center align-middle" style="width: 200px">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data_buku as $key => $buku )  
                        <tr>
                          <td class="text-center align-middle" style="width: 40px">{{$key + 1}}</td>
                          <td class="text-center align-middle" style="width: 150px"> <img src="{{ asset('storage/' . $buku->cover) }}" class="img-thumbnail" style="width: 100px; height: 150px; object-fit: cover;" alt="Cover Buku"></td>
                          <td class="text-center align-middle" style="width: 150px">{{$buku->kode_buku}} </td>
                          <td class="text-center align-middle" style="width: 150px">{{$buku->judul}} </td>
                          <td class="text-center align-middle" style="width: 150px">{{$buku->penulis}}</td>
                          <td class="text-center align-middle" style="width: 150px">{{$buku->kategoribuku ? $buku->kategoribuku->nama_kategori : '' }}</td>
                          <td class="text-center align-middle" style="width: 200px">
                              <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#detailBuku{{ $buku->id }}">
                                  <i class="bi bi-info"></i>
                              </button>
                            <a href="#" class="btn btn-warning mb-" data-bs-toggle="modal" data-bs-target="#editBuku{{ $buku->id }}">
                                <i class="bi bi-pen"></i>
                            </a>
                            <br>
                              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBuku{{ $buku->id }}">
                                  <i class="bi bi-trash"></i>
                              </button>
                          </td>
                        @include('admin.databuku.detail')
                        @include('admin.databuku.edit')
                        @include('admin.databuku.delete')
                         
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
