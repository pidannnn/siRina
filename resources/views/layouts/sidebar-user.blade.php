<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{ route('user.dashboard') }}" class="brand-link">
    <span class="brand-text font-weight-light">SiRina User</span>
  </a>

  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column">
        <li class="nav-item">
          <a href="{{ route('user.dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('user.peminjaman.ruangan') }}" class="nav-link">
            <i class="nav-icon fas fa-door-open"></i>
            <p>Peminjaman Ruangan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('user.peminjaman.inventaris') }}" class="nav-link">
            <i class="nav-icon fas fa-box"></i>
            <p>Peminjaman Inventaris</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
