<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Arsip</h3>

            <div class="card-tools">
              <a href="<?= base_url('arsip/add') ?>" class="btn btn-primary btn-sm btn-flat" >
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
                  <th>No</th>
                  <th>No Arsip</th>
                  <th>Nama Arsip</th>
                  <th>Kategori</th>
                  <th>Upload</th>
                  <th>Update</th>
                  <th>User</th>
                  <th>Departemen</th>
                  <th>File</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no =1;
                  foreach($arsip as $key => $value){ ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['no_arsip']; ?></td>
                    <td><?= $value['nama_file']; ?></td>
                    <td><?= $value['nama_kategori']; ?></td>
                    <td><?= $value['tgl_upload']; ?></td>
                    <td><?= $value['tgl_update']; ?></td>
                    <td><?= $value['username']; ?></td>
                    <td><?= $value['nama_dep']; ?></td>
                    <td class="text-center"> 
                      <a href="<?= base_url('arsip/viewpdf/'.$value['id_arsip']) ?>"><i class="fas fa-file-pdf fa-2x"></i></a><br>
                      <?= number_format($value['ukuranFile']/1000); ?> kb
                    </td>
                    <td>
                      
                      <a href="<?= base_url('arsip/edit/'.$value['id_arsip']) ?>" class="btn btn-sm btn-warning" >Edit</a>
                      <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?=  $value['id_arsip']; ?>"  >Delete</button>
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
<?php foreach ($arsip as $key => $value){?>
<div class="modal fade" id="delete<?=  $value['id_arsip']; ?>">
  <div class="modal-dialog modal-danger">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Arsip</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin ingin menghapus?
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        <a href="<?= base_url('arsip/delete/'.$value['id_arsip']) ?>" type="submit" class="btn btn-primary">Iya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.AKHIR modal-Hapus -->
<?php } ?>