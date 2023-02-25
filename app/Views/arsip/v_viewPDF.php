<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">Info Arsip</h3>
        <div class="card-tools">
          <a href="<?= base_url('arsip') ?>" class="btn btn-primary btn-sm btn-flat" >
            <i class=" fas fa-caret-left  nav-icon"> Kembali </i>
          </a>
        </div>
      </div>
        <div  class="card-body">
          <table  class="col-md-12">
            <tr>
              <th width="100px">No Arsip</th>
              <th width="30px">:</th>
              <th><?= $arsip['no_arsip'] ?></th>
              <th width="120px">Tanggal Upload</th>
              <th width="30px">:</th>
              <th><?= $arsip['tgl_upload'] ?></th>
          
            </tr>
            <tr>
              <th>Nama Arsip</th>
              <th width="30px">:</th>
              <th><?= $arsip['nama_file'] ?></th>
              <th>Tanggal Update</th>
              <th width="30px">:</th>
              <th><?= $arsip['tgl_update'] ?></th>
            </tr>
            <tr>
              <th>Deskripsi</th>
              <th width="30px">:</th>
              <th><?= $arsip['deskripsi'] ?></th>
              <th>Ukuran File</th>
              <th width="30px">:</th>
              <th><?= number_format($arsip['ukuranFile']/1000); ?> kb</th>
            </tr>
            <tr>
              <th>Departemen</th>
              <th width="30px">:</th>
              <th><?= $arsip['nama_dep'] ?></th>
              <th>User</th>
              <th width="30px">:</th>
              <th><?= $arsip['username']; ?></th>
            </tr>
          </table>

        </div>
        
        <div>
          <div class="col-sm-12">
            <embed type="application/pdf" src="<?= base_url('uploads/berkas/'.$arsip['berkas']) ?>" frameborder="0" height="1000px;" width="100%"></embed>
          </div>
        </div>
      </div>
       </div>
    </div>
  </div>
</div>
  