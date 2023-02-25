<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Arsip <?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box " >
  
  <!-- /.login-logo -->
  <div class="login-card-body">
  <div class="login-logo"> 
    <a href=""><b>E-Arsip</b>Kantor</a>
  </div>
    
    <?php 
      if(session()->getFlashdata('pesanSukses')){
          echo '<div class="alert alert-success" role="alert">';
          echo session()->getFlashdata('pesanSukses');
          echo '</div>';
      }else if(session()->getFlashdata('pesanGagal')){
        echo '<div class="alert alert-danger" role="alert">';
        echo session()->getFlashdata('pesanGagal');
        echo '</div>';
      }
    ?>
    
    <?php echo form_open('auth/cek_login')?>
    <div class="form-group">
    <input type="email" name="email" class="form-control <?= ($errors->hasError('email')) ? 'is-invalid' : ''; ?>"
        id="exampleInputEmail" aria-describedby="emailHelp"
        placeholder="Masukkan alamat email" autocomplete="off">
    <div class="invalid-feedback">
        <?= $errors->getError('email'); ?>
    </div>
    </div>
    <div class="form-group">
    <input type="password" name="password" class="form-control <?= ($errors->hasError('password')) ? 'is-invalid' : ''; ?>"
        id="exampleInputPassword" placeholder="Masukkan kata sandi">

    <div class="invalid-feedback">
        <?= $errors->getError('password'); ?>
    </div>
    </div>
    <div class="form-group">
      <!-- /.col -->
      <button type="submit"  style="font-size:16px;" class="btn btn-primary btn-block">Login</button>
      <!-- /.col -->
    </div>
    <?php echo form_close() ?>
    
    <div class="text-center" style=" margin-top: 5%;">
      Belum punya akun? <a class="small" href="<?= base_url('auth/register') ?>" style="font-size:16px;">Buat akun!</a>
    </div>
  </div>
    <!-- /.login-card-body -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>
<script>
  window.setTimeout(function(){
      $(".alert").fadeTo(500,0).slideUp(500,function(){
          $(this).remove();
      });
  },3000);
</script>

</body>
</html>