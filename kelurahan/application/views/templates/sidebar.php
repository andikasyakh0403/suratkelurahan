        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:black;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-user"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

           

            <!-- Looping Menu-->
                <div class="sidebar-heading">
                    Home
                </div>
                
                    <li class="nav-item active">
                        <!-- Nav Item - Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link pb-0" href="<?= base_url('admin'); ?>">
                                <i class="fa fa-fw fa book"></i>
                                <span>Dashboard</span></a>
                        </li>
                    </li>
                  
                    <li class="nav-item active">
                        <!-- Nav Item - Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link pb-0" href="<?= base_url('admin/qanda'); ?>">
                                <i class="fa fa-fw fa question"></i>
                                <span> q&a</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pb-0" href="<?= base_url('admin/carousel'); ?>">
                                <i class="fa fa-fw fa question"></i>
                                <span>carousel</span></a>
                        </li>
                    </li>

                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Surat
                </div>
                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                        <!-- Nav Item - Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link pb-0" href="<?= base_url('adminsurat/suratramai'); ?>">
                                <i class="fa fa-fw fa book"></i>
                                <span>Surat keramaian</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pb-0" href="<?= base_url('adminsurat/kelahiran'); ?>">
                                <i class="fa fa-fw fa book"></i>
                                <span>pengajuan surat kelahiran </span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pb-0" href="<?= base_url('adminsurat/kematian'); ?>">
                                <i class="fa fa-fw fa book"></i>
                                <span>pengajuan surat Kematian</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pb-0"  href="<?= base_url('adminsurat/sktm'); ?>">
                                <i class="fa fa-fw fa letter"></i>
                                <span>pengajuan SKTM</span></a>
                        </li>
                    </li>
                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

<!-- Heading -->
<div class="sidebar-heading">
    Warga
</div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('admin/warga'); ?>">
                <i class="fa fa-fw fa book"></i>
                <span>Warga</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link pb-0" href="<?= base_url('admin/user'); ?>">
                <i class="fa fa-fw fa book"></i>
                <span>User</span></a>
        </li>
       
    </li>
<!-- Divider -->
                
                    <!-- Divider -->
                <hr class="sidebar-divider mt-3">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

  
            <!-- Heading -->
                
            <!-- Sidebar Toggler (Sidebar) -->
            
              </ul>
        