<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">Data User</h3>

            <div class="card-tools">
              <a href="<?= base_url('user/add') ?>" class="btn btn-primary btn-sm btn-flat" >
                <i class="fas fa-plus">Add</i>
              </a>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <?php 
          if(session()->getFlashdata('pesanSukses')){
              echo '<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Success! - ';
              echo session()->getFlashdata('pesanSukses');
              echo '</h5></div>';
          }
          ?>
            <table id="example1" class="table table-bordered table-striped text-center">
              <thead class="">
                <tr>
                  <th width="80px">No</th>
                  <th>Nama User</th>
                  <th>E-Mail</th>
                  <th>Level</th>
                  <th>Departemen</th>
                  <th width="100px">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no =1;
                  foreach($user as $key => $value){ ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['username']; ?></td>
                    <td><?= $value['email']; ?></td>
                    <td>
                      <?php 
                        if($value['level']==1){
                          echo 'Admin';
                        }else{
                          echo 'User';
                      }?>
                    </td>
                    <td><?= $value['nama_dep']; ?></td>
                    <td>
                      <a href="<?= base_url('user/edit/'.$value['id_user']) ?>" class="btn btn-sm btn-warning" >Edit</a>
                      <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?=  $value['id_user']; ?>"  >Delete</button>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</div>

<!-- Modal EDIT.Hapus -->
<?php foreach ($user as $key => $value){?>
<div class="modal fade" id="delete<?=  $value['id_user']; ?>">
  <div class="modal-dialog modal-danger">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin ingin menghapus?
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        <a href="<?= base_url('user/delete/'.$value['id_user']) ?>" type="submit" class="btn btn-primary">Iya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.AKHIR modal-Hapus -->
<?php } ?>