<div class="content">
  <div class="container">
    <div class="row">
    <div class="col-md-3">
    </div>
      <div class="col-md-6">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">Add User</h3>

            
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
        

          <?php echo form_open('user/save_insert'); ?>
            <div class="form-group">
              <label>Nama User</label>
              <input  class="form-control <?= ($errors->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" placeholder="Nama User" >
              <div class="invalid-feedback">
                <?= $errors->getError('username'); ?>
              </div>
            </div>
            <div class="form-group">
              <label>E-Mail</label>
              <input  class="form-control <?= ($errors->hasError('email')) ? 'is-invalid' : ''; ?>"  name="email" placeholder="E-Mail">
              <div class="invalid-feedback">
                <?= $errors->getError('email'); ?>
              </div>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input  class="form-control <?= ($errors->hasError('password')) ? 'is-invalid' : ''; ?>" type="password"  name="password" placeholder="Password">
              <div class="invalid-feedback">
                <?= $errors->getError('password'); ?>
              </div>
            </div>
            <div class="form-group">
              <label>Konfirmasi Password</label>
              <input  class="form-control <?= ($errors->hasError('repassword')) ? 'is-invalid' : ''; ?>" type="password" name="repassword" placeholder="Password">
              <div class="invalid-feedback">
                <?= $errors->getError('repassword'); ?>
              </div>
            </div>
            <div class="form-group">
              <label>Level</label>
              <select  class="form-control <?= ($errors->hasError('level')) ? 'is-invalid' : ''; ?>" name="level">
                <option value="">--Pilih Level--</option>
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
                <option value="">--Pilih Departemen--</option>
                <?php foreach($dep as $key => $value) { ?>
                  <option value="<?= $value['id_dep']; ?>">
                  <?= $value['nama_dep']; ?>
                  </option>
                <?php } ?>
              </select>
              <div class="invalid-feedback">
                <?= $errors->getError('id_dep'); ?>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('user')?>" class="btn btn-success" >Kembali</a>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
    <div class="row">
    <div class="col-md-3">
</div>




        
          