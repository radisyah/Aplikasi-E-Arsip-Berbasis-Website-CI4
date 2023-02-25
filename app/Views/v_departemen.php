<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Departemen</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#add">
                <i class="fas fa-plus">Add</i>
              </button>
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
                  <th>Nama Departemen</th>
                  <th width="100px">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no =1;
                  foreach($departemen as $key => $value){ ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['nama_dep']; ?></td>
                    <td>
                      <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#update<?=  $value['id_dep']; ?>">Edit</button>
                      <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?=  $value['id_dep']; ?>">Delete</button>
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

<!-- Modal Add.Departemen -->
<div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Departemen</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('departemen/add')?>
          <div class="form-group">
            <label>Departemen</label>
            <input class="form-control" name="nama_dep" placeholder="Nama Departemen" required>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?php echo form_close() ?>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.AKHIR modal-ADD -->

<!-- Modal EDIT.Departemen -->
<?php foreach ($departemen as $key => $value){?>
<div class="modal fade" id="update<?=  $value['id_dep']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Departemen</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('departemen/update/'.$value['id_dep']) ?>
          <div class="form-group">
            <label>Departemen</label>
            <input class="form-control" value="<?=  $value['nama_dep']; ?>" name="nama_dep" placeholder="Nama Departemen" required>
          </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
        <?php echo form_close() ?>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.AKHIR modal-EDIT -->
<?php } ?>

<!-- Modal Hapus -->
<?php foreach ($departemen as $key => $value){?>
<div class="modal fade" id="delete<?=  $value['id_dep']; ?>">
  <div class="modal-dialog modal-danger">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin ingin menghapus <?=  $value['nama_dep']; ?> ?
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        <a href="<?= base_url('departemen/delete/'.$value['id_dep']) ?>" type="submit" class="btn btn-primary">Iya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.AKHIR Hapus -->
<?php } ?>