<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <!-- <i class="fas fa-laugh-wink"></i> -->
      <i class="fa-solid fa-code"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Espada</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Admin Menu Start -->
  <?php if (in_groups('admin')) : ?>
    <!-- Heading -->
    <div class="sidebar-heading">
      User Management
    </div>

    <!-- Nav Item - User List -->
    <li class="nav-item">
      <a class="nav-link" href="/admin">
        <!-- <i class="fas fa-fw fa-chart-area"></i> -->
        <i class="fa-solid fa-users"></i>
        <span>User List</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
  <?php endif; ?>
  <!-- Admin Menu End -->

  <!-- Heading -->
  <div class="sidebar-heading">
    User Profile
  </div>

  <!-- Nav Item - Profile -->
  <li class="nav-item">
    <a class="nav-link" href="/user">
      <!-- <i class="fas fa-fw fa-chart-area"></i> -->
      <i class="fa-solid fa-user"></i>
      <span>Profile</span></a>
  </li>

  <!-- Nav Item - Edit Profile -->
  <li class="nav-item">
    <a class="nav-link" href="/user/<?= user_id(); ?>/edit">
      <!-- <i class="fas fa-fw fa-table"></i> -->
      <i class="fa-solid fa-user-pen"></i>
      <span>Edit Profile</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Logout -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('logout'); ?>">
      <!-- <i class="fas fa-fw fa-chart-area"></i> -->
      <i class="fa-solid fa-right-from-bracket"></i>
      <span>Logout</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>