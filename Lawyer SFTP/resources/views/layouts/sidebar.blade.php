<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">{{session()->get('user')->role}}</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item {{request()->is('home')?'active':''}}">
  <a class="nav-link" href="{{route('home')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Users
</div>
@if(session()->get('user')->role != 'ADMIN')
<!-- Admin -->
<li class="nav-item {{request()->is('admin*')?'active':''}}">
  <a class="nav-link" href="{{url('admin')}}">
    <i class="fas fa-fw fa-user"></i>
    <span>Admin</span></a>
</li>
@endif

<!-- Lawyer -->
<li class="nav-item has-treeview {{request()->is('user-lawyer*', 'pengajuan-lawyer*')?'active':''}}">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLawyers" aria-expanded="true" aria-controls="collapseLawyers">
    <i class="fas fa-fw fa-balance-scale"></i>
    <span>Advokat</span>
  </a>
  <div id="collapseLawyers" class="collapse {{request()->is('user-lawyer*', 'pengajuan-lawyer*', 'user-kantor-hukum*')?'show':''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded ">
      <a class="collapse-item bg-{{request()->is('user-lawyer*')?'primary':''}} text-{{request()->is('user-lawyer*')?'light':''}}" href="{{url('user-lawyer')}}">Daftar Advokat</a>
      <a class="collapse-item bg-{{request()->is('user-kantor-hukum*')?'primary':''}} text-{{request()->is('user-kantor-hukum*')?'light':''}}" href="{{url('user-kantor-hukum')}}">Daftar Kantor Hukum</a>
      <a class="collapse-item bg-{{request()->is('pengajuan-lawyer*')?'primary':''}} text-{{request()->is('pengajuan-lawyer*')?'light':''}}" href="{{url('pengajuan-lawyer')}}">Konfirmasi Membership</a>
    </div>
  </div>
</li>

<!-- Client -->
<li class="nav-item has-treeview {{request()->is('user-client*', 'client-konfirmasi*')?'active':''}}">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
    <i class="fas fa-fw fa-users"></i>
    <span>Client</span>
  </a>
  <div id="collapseUsers" class="collapse {{request()->is('user-client*', 'client-konfirmasi*', 'user-perusahaan*')?'show':''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item bg-{{request()->is('user-client*')?'primary':''}} text-{{request()->is('user-client*')?'light':''}}" href="{{url('user-client')}}">Daftar Client</a>
      <a class="collapse-item bg-{{request()->is('user-perusahaan*')?'primary':''}} text-{{request()->is('user-perusahaan*')?'light':''}}" href="{{url('user-perusahaan')}}">Daftar Perusahaan</a>
      <a class="collapse-item bg-{{request()->is('client-konfirmasi*')?'primary':''}} text-{{request()->is('client-konfirmasi*')?'light':''}}" href="{{url('client-konfirmasi')}}">Verifikasi Client</a>
    </div>
  </div>
</li>

<!-- Notaris -->
<li class="nav-item has-treeview {{request()->is('user-notaris*')?'active':''}}">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNotaris" aria-expanded="true" aria-controls="collapseNotaris">
    <i class="fas fa-fw fa-pen-square"></i>
    <span>Notaris</span>
  </a>
  <div id="collapseNotaris" class="collapse {{request()->is('user-notaris*')?'show':''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item bg-{{request()->is('user-notaris*')?'primary':''}} text-{{request()->is('user-notaris*')?'light':''}}" href="{{url('user-notaris')}}">Daftar Notaris</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Heading -->
<div class="sidebar-heading">
  Main Menu
</div>

<!-- Slider -->
<li class="nav-item {{request()->is('slider*')?'active':''}}">
  <a class="nav-link collapseSlider" href="#" data-toggle="collapse" data-target="#collapseSlider" aria-expanded="true" aria-controls="collapseSlider">
    <i class="fas fa-fw fa-sliders-h"></i>
    <span>Slider</span>
  </a>
  <div id="collapseSlider" class="collapse {{request()->is('slider*')?'show':''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Slider</h6>
      <a class="collapse-item bg-{{request()->is('slider-lawyer*')?'primary':''}} text-{{request()->is('slider-lawyer*')?'light':''}}" href="{{url('slider-lawyer')}}">Daftar Slider Advokat</a>
      <a class="collapse-item bg-{{request()->is('slider-client*')?'primary':''}} text-{{request()->is('slider-client*')?'light':''}}" href="{{url('slider-client')}}">Daftar Slider Client</a>
      <a class="collapse-item bg-{{request()->is('slider-iklan*')?'primary':''}} text-{{request()->is('slider-iklan*')?'light':''}}" href="{{url('slider-iklan')}}">Daftar Slider Iklan</a>
    </div>
  </div>
</li>
<!-- Service -->
<li class="nav-item has-treeview {{request()->is('service*')?'active':''}}">
  <a class="nav-link collapsedService" href="#" data-toggle="collapse" data-target="#collapseService" aria-expanded="true" aria-controls="collapseService">
    <i class="fas fa-fw fa-tools"></i>
    <span>Bidang Hukum</span>
  </a>
  <div id="collapseService" class="collapse {{request()->is('service*')?'show':''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Bidang Hukum</h6>
      <a class="collapse-item bg-{{request()->is('service*')?'primary':''}} text-{{request()->is('service*')?'light':''}}" href="{{url('service')}}">Daftar Bidang Hukum</a>
    </div>
  </div>
</li>

<!-- Layanan -->
<li class="nav-item has-treeview {{request()->is('kategori-lawyer*', 'kategori-client*')?'active':''}}">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKategori" aria-expanded="true" aria-controls="collapseKategori">
    <i class="fas fa-fw fa-hand-holding"></i>
    <span>Layanan Favorite</span>
  </a>
  <div id="collapseKategori" class="collapse {{request()->is('kategori-lawyer*', 'kategori-client*')?'show':''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item bg-{{request()->is('kategori-lawyer*')?'primary':''}} text-{{request()->is('kategori-lawyer*')?'light':''}}" href="{{url('kategori-lawyer')}}">Layanan Advokat</a>
      <a class="collapse-item bg-{{request()->is('kategori-client*')?'primary':''}} text-{{request()->is('kategori-client*')?'light':''}}" href="{{url('kategori-client')}}">Layanan Client</a>
    </div>
  </div>
</li>

<!-- Legalitas -->
<li class="nav-item has-treeview {{request()->is('legalitas*')?'active':''}}">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLegalitas" aria-expanded="true" aria-controls="collapseLegalitas">
    <i class="fas fa-fw fa-list"></i>
    <span>Legalitas</span>
  </a>
  <div id="collapseLegalitas" class="collapse {{request()->is('legalitas*')?'show':''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item bg-{{request()->is('legalitas*')?'primary':''}} text-{{request()->is('legalitas*')?'light':''}}" href="{{url('legalitas')}}">Legalitas</a>
    </div>
  </div>
</li>
<li class="nav-item {{request()->is('events*')?'active':''}}">
  <a class="nav-link collapsed" href="{{url('events')}}">
    <i class="fas fa-fw fa-calendar-week"></i>
    <span>Event</span>
  </a>
</li>
<li class="nav-item {{request()->is('artikel*')?'active':''}}">
  <a class="nav-link collapsed" href="{{url('artikel')}}">
    <i class="fas fa-fw fa-edit"></i>
    <span>Artikel</span>
  </a>
</li>


<li class="nav-item {{request()->is('peraturan*')?'active':''}}">
  <a class="nav-link collapsed" href="{{url('peraturan')}}">
    <i class="fas fa-fw fa-sticky-note"></i>
    <span>Peraturan</span>
  </a>
</li>

<li class="nav-item {{request()->is('mahkamahagung*')?'active':''}}">
  <a class="nav-link collapsed" href="{{url('mahkamahagung')}}">
    <i class="fas fa-fw fa-home"></i>
    <span>Mahkamah Agung</span>
  </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Pelayanan
</div>

<!-- Ruang Penawaran -->
<li class="nav-item has-treeview {{request()->is('penawaran-lawyer*', 'penawaran-kantor*')?'active':''}}">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePenawaran" aria-expanded="true" aria-controls="collapsePenawaran">
    <i class="fas fa-fw fa-hand-holding"></i>
    <span>Ruang Penawaran</span>
  </a>
  <div id="collapsePenawaran" class="collapse {{request()->is('penawaran-lawyer*', 'penawaran-kantor*')?'show':''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item bg-{{request()->is('penawaran-lawyer*')?'primary':''}} text-{{request()->is('penawaran-lawyer*')?'light':''}}" href="{{url('penawaran-lawyer')}}">Advokat</a>
      <a class="collapse-item bg-{{request()->is('penawaran-kantor*')?'primary':''}} text-{{request()->is('penawaran-kantor*')?'light':''}}" href="{{url('penawaran-kantor')}}">Kantor Hukum</a>
    </div>
  </div>
</li>

<li class="nav-item {{request()->is('vicon*')?'active':''}}">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConsult" aria-expanded="true" aria-controls="collapseConsult">
    <i class="fas fa-fw fa-gavel"></i>
    <span>Konsultasi</span>
  </a>
  <div id="collapseConsult" class="collapse {{request()->is('konsultasi*')?'show':''}}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Daftar Konsultasi:</h6>
      <a class="collapse-item bg-{{request()->is('konsultasi-ongoing*')?'primary':''}} text-{{request()->is('konsultasi-ongoing*')?'light':''}}" href="{{url('konsultasi-ongoing')}}">Konsultasi Berlangsung</a>
      <a class="collapse-item bg-{{request()->is('konsultasi-finish*')?'primary':''}} text-{{request()->is('konsultasi-finish*')?'light':''}}" href="{{url('konsultasi-finish')}}">Konsultasi Selesai</a>
      <a class="collapse-item bg-{{request()->is('konsultasi-history*')?'primary':''}} text-{{request()->is('konsultasi-history*')?'light':''}}" href="{{url('konsultasi-history')}}">History Konsultasi</a>
    </div>
  </div>
</li>
<!-- Pembayaran -->
<li class="nav-item {{request()->is('pembayaran*')?'active':''}}">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayment" aria-expanded="true" aria-controls="collapsePayment">
    <i class="fas fa-fw fa-money-bill-alt"></i>
    <span>Pembayaran</span>
  </a>
  <div id="collapsePayment" class="collapse {{request()->is('pembayaran*')?'show':''}}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Daftar Pembayaran:</h6>
      <a class="collapse-item bg-{{request()->is('pembayaran-berhasil*')?'primary':''}} text-{{request()->is('pembayaran-berhasil*')?'light':''}}" href="{{url('pembayaran-berhasil')}}">Pembayaran Berhasil</a>
      <a class="collapse-item bg-{{request()->is('pembayaran-pending*')?'primary':''}} text-{{request()->is('pembayaran-pending*')?'light':''}}" href="{{url('pembayaran-pending')}}">Pembayaran Pending</a>
      <a class="collapse-item bg-{{request()->is('pembayaran-expired*')?'primary':''}} text-{{request()->is('pembayaran-expired*')?'light':''}}" href="{{url('pembayaran-expired')}}">Pembayaran Expired</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  LIVE CHAT
</div>

<li class="nav-item {{request()->is('report*')?'active':''}}">
  <a class="nav-link collapsed" href="{{url('report')}}">
    <i class="fas fa-fw fa-download"></i>
    <span>Report</span>
  </a>
</li>

<li class="nav-item {{request()->is('vidcon*')?'active':''}}">
  <a class="nav-link collapsed" href="{{url('vidcon')}}">
    <i class="fas fa-fw fa-file-video"></i>
    <span>Video Conference</span>
  </a>
</li>

<li class="nav-item {{request()->is('pertemuan*')?'active':''}}">
  <a class="nav-link collapsed" href="{{url('pertemuan')}}">
    <i class="fas fa-fw fa-calendar-alt"></i>
    <span>Pertemuan</span>
  </a>
</li> 

<li class="nav-item {{request()->is('pendampingan*')?'active':''}}">
  <a class="nav-link collapsed" href="{{url('pendampingan')}}">
    <i class="fas fa-fw fa-share-square"></i>
    <span>Pendampingan</span>
  </a>
</li>

<li class="nav-item {{request()->is('tertulis*')?'active':''}}">
  <a class="nav-link collapsed" href="{{url('tertulis')}}">
    <i class="fas fa-fw fa-pen-square"></i>
    <span>Tertulis</span>
  </a>
</li>


<!-- Pengaturan -->
<li class="nav-item {{request()->is('privacy*', 'faq*', 'help*', 'settings*')?'active':''}}">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengaturan" aria-expanded="true" aria-controls="collapsePengaturan">
    <i class="fas fa-fw fa-wrench"></i>
    <span>Pengaturan</span>
  </a>
  <div id="collapsePengaturan" class="collapse {{request()->is('privacy*', 'faq*', 'help*', 'settings*')?'show':''}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item bg-{{request()->is('privacy*')?'primary':''}} text-{{request()->is('privacy*')?'light':''}}" href="{{url('privacy')}}">Privacy Police</a>
      <a class="collapse-item bg-{{request()->is('faq*')?'primary':''}} text-{{request()->is('faq*')?'light':''}}" href="{{url('faq')}}">FAQ</a>
      <a class="collapse-item bg-{{request()->is('help*')?'primary':''}} text-{{request()->is('help*')?'light':''}}" href="{{url('help')}}">Bantuan</a>
      <a class="collapse-item bg-{{request()->is('settings*')?'primary':''}} text-{{request()->is('settings*')?'light':''}}" href="{{url('settings')}}">Pengaturan</a>
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
<!-- End of Sidebar -->