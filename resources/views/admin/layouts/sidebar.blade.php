<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/images/logo/logo.png') }}" alt="AdminLTE Logo" class="brand-image">
      <span class="brand-text font-weight-light">K4Africa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('storage/' . Auth::user()->profile) }}" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.home') }}" class="nav-link" data-path="admin">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Tableau de bord</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link" data-path="admin/roles">
              <i class="nav-icon fas fa-lock"></i>
              <p>Roles</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link" data-path="admin/users">
              <i class="nav-icon fas fa-user"></i>
              <p>Utilisateurs</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link @if(in_array('page', array_keys(Route::current()->parameters))) active @endif" data-path="admin/pages/services">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pages
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @foreach ($pages as $page)
              <li class="nav-item">
                <a href="{{ route('page.index', $page->slug->name) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $page->name }}</p>
                </a>
              </li>
              @endforeach
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('partners.index') }}" class="nav-link" data-path="admin/partners">
              <i class="nav-icon fas fa-building"></i>
              <p>Les parténaires</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('manage_blog.index') }}" class="nav-link" data-path="admin/manage_blog">
              <i class="nav-icon fas fa-blog"></i>
              <p>Blog</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('manage_newsletter.index') }}" class="nav-link" data-path="admin/manage_newsletter">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Newsletters</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('manage_devis.index') }}" class="nav-link" data-path="admin/manage_devis">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Dévis</p>
            </a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="post" class="nav-link mt-4">
              @csrf
              <i class="nav-icon fas fa-quit"></i>
              <button type="submit" class="btn py-0 text-white">
                <i class="ion ion-log-out"></i>
                Se déconnecter
              </button>
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>