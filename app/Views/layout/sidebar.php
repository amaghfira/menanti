
<?php $sess = session(); ?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #202C59;">
<!-- Brand Logo -->
<a href="" class="brand-link">
    <img src="<?= base_url('dist/img/bpsputih.png'); ?>" alt="Logo BPS"  style="opacity: .8; width:230px">
    <span class="brand-text font-weight-light"></span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <!-- <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div> -->
    <div class="info">
        <a href="" class="d-block">Selamat Datang, <b style="color:lightskyblue"><?php echo $sess->nama; ?></b> </a>
    </div>
    </div>

    <!-- SidebarSearch Form -->
    <!-- <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
        <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
        </button>
        </div>
    </div>
    </div> -->

    <?php if ($_SESSION['role'] == '92600' || $_SESSION['role'] == '92610' || $_SESSION['role'] == '92620' || $_SESSION['role'] == '92630') {   ?>
    
    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <!-- <li class="nav-item menu-open"> -->
        <li class="nav-item">
        <a href="<?= base_url(); ?>/admin/home" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
            Dashboard
            <span class="right badge badge-danger">New</span>
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="<?= base_url() ?>/tiket/index" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
            Daftar Tiket
            <!-- <span class="badge badge-info right">2</span> -->
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="<?= base_url() ?>/tiket/add" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
            Form Pengajuan Tiket
            <!-- <span class="badge badge-info right">2</span> -->
            </p>
        </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url(); ?>/auth/logout" class="nav-link">
                <i class="nav-icon fas fa-fw fa-sign-out-alt">
                </i>
                Logout
            </a>
        </li>
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
<?php } else { ?>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <!-- <li class="nav-item menu-open"> -->
        <li class="nav-item">
        <a href="<?= base_url(); ?>/user/home" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
            Dashboard
            <span class="right badge badge-danger">New</span>
            </p>
        </a>
        </li>
        
        <li class="nav-item">
        <a href="<?= base_url() ?>/user/ticket" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
            Daftar Tiket
            <!-- <span class="badge badge-info right"></span> -->
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="<?= base_url() ?>/user/ticket/add" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
            Form Pengajuan Tiket
            <!-- <span class="badge badge-info right">2</span> -->
            </p>
        </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url(); ?>/auth/logout" class="nav-link">
                <i class="nav-icon fas fa-fw fa-sign-out-alt">
                </i>
                Logout
            </a>
        </li>
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
<?php } ?>

<!-- MAIN CONTENT  -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <!-- <h1 class="m-0">Dashboard</h1> -->
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
          
        
