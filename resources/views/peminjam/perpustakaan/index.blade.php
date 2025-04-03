<!DOCTYPE html>
<html lang="en">
<head>
    <title>Perpustakaan</title>
    @include('peminjam.head')

</head>
<body id="page-top">
    @include('peminjam.sidebar')
    @include('peminjam.navbar')

    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Perpustakaan</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('peminjam.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Perpustakaan</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->

        <section class="section">
          <div class="row align-items-top">

          @foreach ($data_buku as $key => $buku )  
            <div class="col-lg-3">
                <!-- Card with an image on top -->
                <div class="card">
                    <img src="{{ asset('storage/' . $buku->cover) }}" data-bs-toggle="modal" data-bs-target="#detailBuku{{ $buku->id }}" class="card-img-top align-items-center"  alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$buku->judul}}</h5>
                      
                      <button type="button" 
                            class="btn btn-primary"
                                data-bs-toggle="modal" 
                                data-bs-target="#pinjamBuku{{$buku->id}}">
                        Pinjam Buku
                    </button>



                      <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailBuku{{$buku->id}}">
                        <i class="bi bi-info-circle"></i>
                        </button>
                        @include('peminjam.perpustakaan.detail')
                        @include('peminjam.perpustakaan.create')
                    </div>
                </div><!-- End Card with an image on top -->
            </div>
          @endforeach
            
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