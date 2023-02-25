 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="" class="navbar-brand">
        <img src="<?= base_url()?>/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">E-Arsip</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav ">
          <li class="nav-item">
            <a href="<?= base_url('home/index')?>" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('kategori')?>" class="nav-link" >Kategori</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('departemen')?>" class="nav-link" >Departemen</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('arsip')?>" class="nav-link" >Arsip</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('User')?>" class="nav-link" >User</a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="" href="<?= base_url('auth/logout')?>">
            Logout
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> <?= $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">E-Arsip</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->