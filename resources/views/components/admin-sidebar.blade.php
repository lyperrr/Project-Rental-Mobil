<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/admin/dashboard" class="brand-link">
    <span class="brand-text font-weight-light ml-2">RentalMobil Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
        <li class="nav-item">
          <a href="/admin/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/mobil" class="nav-link">
            <i class="nav-icon fas fa-car"></i>
            <p>Data Mobil</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/pelanggan" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Data Pelanggan</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/penyewaan" class="nav-link">
            <i class="nav-icon fas fa-file-invoice"></i>
            <p>Penyewaan</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/blog" class="nav-link">
            <i class="nav-icon fas fa-blog"></i>
            <p>Blog</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/laporan" class="nav-link">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>Laporan</p>
          </a>
        </li>

        <li class="nav-item">
          <!-- Logout Form -->
          <form action="{{ route('logout') }}" method="POST" id="logoutForm" class="">
              @csrf
              <button type="submit"
                  class="btn-danger display-flex width-100 nav-link text-white"
                  onclick="return confirmLogout(event)">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Logout</p>
              </button>
            </form>
        </li>
      </ul>
    </nav>
  </div>
</aside>
