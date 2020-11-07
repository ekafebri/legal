<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3"><?php echo e(session()->get('user')->role); ?></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?php echo e(request()->is('home')?'active':''); ?>">
  <a class="nav-link" href="<?php echo e(route('home')); ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Users
</div>
<!-- Nav Item - Charts -->
<li class="nav-item <?php echo e(request()->is('admin*')?'active':''); ?>">
  <a class="nav-link" href="<?php echo e(url('admin')); ?>">
    <i class="fas fa-fw fa-user"></i>
    <span>Admin</span></a>
</li>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item has-treeview <?php echo e(request()->is('under*')?'active':''); ?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLawyers" aria-expanded="true" aria-controls="collapseLawyers">
    <i class="fas fa-fw fa-users"></i>
    <span>Lawyers</span>
  </a>
  <div id="collapseLawyers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded ">
      <h6 class="collapse-header">Lawyers</h6>
      <a class="collapse-item" href="<?php echo e(route('under')); ?>">Daftar Lawyer</a>
    </div>
  </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item has-treeview <?php echo e(Request::is('user*')?'active':''); ?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
    <i class="fas fa-fw fa-users"></i>
    <span>Client</span>
  </a>
  <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Client</h6>
      <a class="collapse-item " href="<?php echo e(url('user')); ?>">Daftar Client</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Heading -->
<div class="sidebar-heading">
  Main Menu
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?php echo e(request()->is('slider/client*')?'active':''); ?> <?php echo e(request()->is('slider/lawyer*')?'active':''); ?> <?php echo e(request()->is('slider/lawyer*')?'slider/iklan':''); ?>">
  <a class="nav-link collapseSlider" href="#" data-toggle="collapse" data-target="#collapseSlider" aria-expanded="true" aria-controls="collapseSlider">
    <i class="fas fa-fw fa-sliders-h"></i>
    <span>Slider</span>
  </a>
  <div id="collapseSlider" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Slider</h6>
      <a class="collapse-item" href="<?php echo e(url('slider/lawyer')); ?>">Daftar Slider Lawyer</a>
      <a class="collapse-item" href="<?php echo e(url('slider/client')); ?>">Daftar Slider Client</a>
      <a class="collapse-item" href="<?php echo e(url('slider/iklan')); ?>">Daftar Slider Iklan</a>
    </div>
  </div>
</li>
<li class="nav-item <?php echo e(request()->is('under*')?'active':''); ?> <?php echo e(request()->is('service*')?'active':''); ?>">
  <a class="nav-link collapsedService" href="#" data-toggle="collapse" data-target="#collapseService" aria-expanded="true" aria-controls="collapseService">
    <i class="fas fa-fw fa-tools"></i>
    <span>Servis</span>
  </a>
  <div id="collapseService" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Service</h6>
      <a class="collapse-item" href="<?php echo e(url('service')); ?>">Daftar Service</a>
      <a class="collapse-item" href="<?php echo e(route('under')); ?>">Konfirmasi Service</a>
    </div>
  </div>
</li>
<li class="nav-item <?php echo e(request()->is('kategori*')?'active':''); ?>">
  <a class="nav-link collapsed" href="<?php echo e(url('kategori')); ?>">
    <i class="fas fa-fw fa-list"></i>
    <span>Kategori Lawyer</span>
  </a>
</li>
<li class="nav-item <?php echo e(request()->is('events*')?'active':''); ?>">
  <a class="nav-link collapsed" href="<?php echo e(url('events')); ?>">
    <i class="fas fa-fw fa-calendar-week"></i>
    <span>Event</span>
  </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Pelayanan
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConsult" aria-expanded="true" aria-controls="collapseConsult">
    <i class="fas fa-fw fa-gavel"></i>
    <span>Konsultasi</span>
  </a>
  <div id="collapseConsult" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Daftar Konsultasi:</h6>
      <a class="collapse-item" href="under">Pengajuan Konsultasi</a>
      <a class="collapse-item" href="register.html">Konsultasi Berlangsung</a>
      <a class="collapse-item" href="forgot-password.html">Konsultasi Selesai</a>
      <a class="collapse-item" href="forgot-password.html">History Konsultasi</a>
    </div>
  </div>
</li>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment" aria-expanded="true" aria-controls="collapsePayment">
    <i class="fas fa-fw fa-money-bill-alt"></i>
    <span>Pembayaran</span>
  </a>
  <div id="collapsePayment" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Daftar Pembayaran:</h6>
      <a class="collapse-item" href="login.html">Pembayaran Berhasil</a>
      <a class="collapse-item" href="register.html">Konfirmasi Pembayaran</a>
    </div>
  </div>
</li>
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-wrench"></i>
    <span>Pengaturan</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Main Menu:</h6>
      <a class="collapse-item" href="<?php echo e(route('under')); ?>">Rekomendasi Lawyers</a>
      <a class="collapse-item" href="<?php echo e(route('under')); ?>">Rekomendasi Kategori</a>
      <a class="collapse-item" href="<?php echo e(route('under')); ?>">Artikel</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar --><?php /**PATH /home/idaman.org/public_html/lawyer/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>