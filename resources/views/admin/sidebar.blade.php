
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}" href="{{ route('admin.index') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

     
      <li class="nav-item {{ request()->is('admin/dataadmin*', 'admin/datapetugas*', 'admin/datapeminjam*', 'admin/databuku*') ? 'active' : '' }}">
        <a class="nav-link collapsed {{ request()->is('admin*', 'petugas*', 'peminjam*', 'buku*') ? 'active' : '' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse {{ request()->is('admin/dataadmin*', 'admin/datapetugas*', 'admin/datapeminjam*', 'admin/databuku*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
            <a class="collapse-item {{ request()->routeIs('admin.dataadmin.index') ? 'active' : '' }}" href="{{ route('admin.dataadmin.index') }}">
              <i class="bi bi-circle"></i><span>Data Admin</span>
            </a>
          </li>
          <li>
            <a class="collapse-item {{ request()->routeIs('admin.datapetugas.index') ? 'active' : '' }}" href="{{ route('admin.datapetugas.index') }}">
              <i class="bi bi-circle"></i><span>Data Petugas</span>
            </a>
          </li>
          <li>
            <a class="collapse-item {{ request()->routeIs('admin.datapeminjam.index') ? 'active' : '' }}" href="{{ route('admin.datapeminjam.index') }}">
              <i class="bi bi-circle"></i><span>Data Peminjam</span>
            </a>
          </li>
          <li>
            <a class="collapse-item {{ request()->routeIs('admin.databuku.index') ? 'active' : '' }}" href="{{ route('admin.databuku.index') }}">
              <i class="bi bi-circle"></i><span>Data Buku</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item {{ request()->routeIs('admin.kategoribuku.index') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('admin.kategoribuku.index') }}">
          <i class="bi bi-person"></i>
          <span>Kategori Buku</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item {{ request()->routeIs('admin.datapeminjaman.index') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('admin.datapeminjaman.index') }}">
          <i class="bi bi-question-circle"></i>
          <span>Data Peminjaman</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  @include('script')

