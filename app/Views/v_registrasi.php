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

<div class="container">
    <div class="row justify-content-center">
        <div class="card o-hidden border-0 shadow-lg my-5" style="margin-top:10% !important;">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                        <div class="login-logo"> 
                            <a href=""><b>E-Arsip</b>Kantor</a>
                        </div>
                            <?php 
                                if(session()->getFlashdata('pesanSukses')){
                                    echo '<div class="alert alert-success" role="alert">';
                                    echo session()->getFlashdata('pesanSukses');
                                    echo '</div>';
                                }
                            ?>
                            <?php echo form_open('auth/save_register'); ?>  
                                <div class="form-group">
                                    <input type="text" role="alert" name="username" class="form-control <?= ($errors->hasError('username')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail"
                                        placeholder="Username">
                                    <div class="invalid-feedback">
                                        <?= $errors->getError('username'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user <?= ($errors->hasError('email')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail" placeholder="Alamat email" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= $errors->getError('email'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user <?= ($errors->hasError('password')) ? 'is-invalid' : ''; ?>"
                                            id="exampleInputPassword" placeholder="Kata sandi">
                                    <div class="invalid-feedback">
                                        <?= $errors->getError('password'); ?>
                                    </div>
                                </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="repassword" class="form-control form-control-user <?= ($errors->hasError('repassword')) ? 'is-invalid' : ''; ?>"
                                            id="exampleRepeatPassword" placeholder="Konfirmasi kata sandi">
                                        <div class="invalid-feedback">
                                        <?= $errors->getError('repassword'); ?>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Buat akun
                                </button>
                            <?php echo form_close(); ?>
                            <hr>
                            <div class="text-center">
                                Sudah mempunyai akun? <a class="small" style="font-size:16px;" href="<?= base_url('auth/login') ?>">Masuk di sini!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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