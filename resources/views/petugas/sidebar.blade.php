
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item {{ request()->routeIs('petugas.index') ? 'active' : '' }}">
        <a class="nav-link " href="{{ route('petugas.index') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item {{ request()->routeIs('petugas.databuku.index') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('petugas.databuku.index') }}">
          <i class="bi bi-person"></i>
          <span>Data Buku</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item {{ request()->routeIs('petugas.kategoribuku.index') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('petugas.kategoribuku.index') }}">
          <i class="bi bi-person"></i>
          <span>Kategori Buku</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item {{ request()->routeIs('petugas.datapeminjaman.index') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('petugas.datapeminjaman.index') }}">
          <i class="bi bi-question-circle"></i>
          <span>Data Peminjaman</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->
