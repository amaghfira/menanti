
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url('dist/img/AdminLTELogo.png'); ?>" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <?php if ($_SESSION['role'] == '92600' || $_SESSION['role'] == '92610' || $_SESSION['role'] == '92620' || $_SESSION['role'] == '92630') {   ?>
        <a href="<?= base_url(); ?>/admin/home" class="nav-link">Home</a>
      <?php } else { ?>
        <a href="<?= base_url(); ?>/user/home" class="nav-link">Home</a>
      <?php } ?>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url(); ?>/contact" class="nav-link">Contact</a>
      </li> -->
    </ul>


  </nav>
  <!-- /.navbar -->