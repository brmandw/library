<!DOCTYPE html>
<html lang="en">

<head>
  @include('peminjam.head')
</head>

<body class="bg-gradient-primary">

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">PERPUSNES</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                  <!-- Pesan sukses -->
          
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Welcome to PERPUSNES</h5>
                    <p class="text-center small">Login Ke Akun Anda</p>
                  </div>

                  <div class="btn-group mb-4" role="group" aria-label="Basic outlined example">
                    <a type="button" href="{{ route('login-admin') }}" class="btn btn-outline-primary">Admin</a>
                    <a type="button" href="{{ route('login-petugas') }}" class="btn btn-outline-primary">Petugas</a>
                    <a type="button" href="{{ route('login-peminjam') }}" class="btn btn-outline-primary">Peminjam</a>
                  </div>
                
                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
</body>

</html>