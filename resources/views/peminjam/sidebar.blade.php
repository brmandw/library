
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item {{ request()->routeIs('peminjam.index') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('peminjam.index') ? 'active' : '' }}" href="{{ route('peminjam.index') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

     

      <li class="nav-heading">Pages</li>

      <li class="nav-item {{ request()->routeIs('peminjam.perpustakaan.index') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('peminjam.perpustakaan.index') }}">
          <i class="bi bi-person"></i>
          <span>Perpustakaan</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item {{ request()->routeIs('peminjam.koleksipribadi.index') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="{{ route('peminjam.koleksipribadi.index') }}">
          <i class="bi bi-question-circle"></i>
          <span>Koleksi Pribadi</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  @include('script')

