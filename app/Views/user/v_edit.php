<div class="content">
  <div class="container">
    <div class="row">
    <div class="col-md-3">
    </div>
      <div class="col-md-6">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit User</h3>

            
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">

          <?php 
          if(session()->getFlashdata('pesanSukses')){
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesanSukses');
            echo '</div>';
          }
        ?>

          <?php echo form_open_multipart('user/save_edit/'.$user['id_user']); ?>
            <div class="form-group">
              <label>Nama User</label>
              <input value="<?= $user['username'] ?>"  class="form-control <?= ($errors->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" placeholder="Nama User" >
              <div class="invalid-feedback">
                <?= $errors->getError('username'); ?>
              </div>
            </div>
            <div class="form-group">
              <label>E-Mail</label>
              <input value="<?= $user['email'] ?>"  class="form-control <?= ($errors->hasError('email')) ? 'is-invalid' : ''; ?>"  name="email" placeholder="E-Mail" readonly>
              <div class="invalid-feedback">
                <?= $errors->getError('email'); ?>
              </div>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" value="<?= $user['password'] ?>"  class="form-control <?= ($errors->hasError('password')) ? 'is-invalid' : ''; ?>"  name="password" placeholder="E-Mail" readonly>
              <div class="invalid-feedback">
                <?= $errors->getError('password'); ?>
              </div>
            </div>
            <div class="form-group">
              <label>Level</label>
              <select  class="form-control <?= ($errors->hasError('level')) ? 'is-invalid' : ''; ?>" name="level">
                <option value="<?= $user['email'] ?>">
                  <?php if($user['level']==1) {
                    echo 'Admin';
                  }else{
                    echo 'User';
                  }
                  ?> </option>
                <option value="1">Admin</option>
                <option value="2">User</option>
              </select>
              <div class="invalid-feedback">
                <?= $errors->getError('level'); ?>
              </div>
            </div>
            <div class="form-group">
              <label>Departemen</label>
              <select  class="form-control <?= ($errors->hasError('id_dep')) ? 'is-invalid' : ''; ?>" name="id_dep">
                <option value="<?= $user['id_dep'] ?>"><?= $user['nama_dep'] ?></option>
                <?php foreach($dep as $key => $value) { ?>
                  <option value="<?= $value['id_dep']; ?>"><?= $value['nama_dep']; ?></option>
                <?php } ?>
                <
              </select>
              <div class="invalid-feedback">
                <?= $errors->getError('id_dep'); ?>
              </div>
            </div>
            <div class="form-group">
              <button  type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('user')?>" class="btn btn-success" >Kembali</a>
            </div>
          <?php echo form_close(); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="row">
    <div class="col-md-3">
</div>




        
          