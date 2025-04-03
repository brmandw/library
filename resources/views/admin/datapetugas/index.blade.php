<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Petugas</title>
    @include('petugas.head')

</head>
<body id="page-top">
    @include('admin.sidebar')
    @include('admin.navbar')

    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Data Petugas</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Data Petugas</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
    
        <section class="section">
            <div class="row">
              <div class="col-lg-12">
      
                @include('admin.datapetugas.create')
                <div class="card">
                  <div class="card-body">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Data Petugas</h5>
                        <a href="#" class="btn btn-primary btn-icon-split" data-bs-toggle="modal" data-bs-target="#tambahPetugas">
                                <i class="bi bi-plus-lg"></i>
                        </a>
                    </div> 

                    <!-- Table with stripped rows -->
                    <table class="table datatable table-hover">
                      <thead>
                        <tr>
                          <th class="text-center align-middle" style="width: 40px">No</th>
                          <th class="text-center align-middle" style="width: 200px">Nama Lengkap</th>
                          <th class="text-center align-middle" style="width: 200px">Username</th>
                          <th class="text-center align-middle" style="width: 200px">Email</th>
                          <th class="text-center align-middle" style="width: 100px">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($user as $key => $users) 
                        <tr>
                            <td class="text-center align-middle" style="width: 40px"> {{$key + 1}} </td>
                            <td class="text-center align-middle" style="width: 200px"> {{$users->name }} </td>
                            <td class="text-center align-middle" style="width: 200px"> {{$users->username }} </td>
                            <td class="text-center align-middle" style="width: 200px"> {{$users->email }} </td>
                            <td class="text-center align-middle" style="width: 100px" class="text-center" style="vertical-align: middle; height: 100px;">
                                <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editPetugas{{ $users->id }}">
                                    <i class="bi bi-pen"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deletePetugas{{ $users->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                                
                            </td>
                            @include('admin.datapetugas.edit')
                            @include('admin.datapetugas.delete')
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
