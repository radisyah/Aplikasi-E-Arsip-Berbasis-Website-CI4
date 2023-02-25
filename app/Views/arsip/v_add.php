<div class="content">
  <div class="container">
    <div class="row">
    <div class="col-md-3">
    </div>
      <div class="col-md-6">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">Add Arsip</h3>

            
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <?php if (!empty(session()->getFlashdata('errors'))) : ?>
            <div class="alert alert-danger" role="alert">
                <h4>Periksa Entrian Form</h4>
                </hr />
                <?php echo session()->getFlashdata('errors'); ?>
            </div>
          <?php endif; ?>

            <?php
            helper('text');
            $no_arsip = date('ymds').'-'.random_string('alnum',4);
            ?>
            <?php echo form_open_multipart('arsip/save_insert/'); ?>
              <div class="form-group">
                <label>No Arsip</label>
                <input  class="form-control" value="<?= $no_arsip ?>"  name="no_arsip" placeholder="No Arsip" readonly>
              </div>

              <div class="form-group">
                <label>Kategori</label>
                <select  class="form-control" name="id_kategori">
                  <option value="">--Pilih Kategori--</option>
                  <?php foreach($kategori as $key => $value) { ?>
                    <option value="<?= $value['id_kategori']; ?>">
                    <?= $value['nama_kategori']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
              
              <div class="form-group">
                <label>Nama Arsip</label>
                <input  class="form-control"   name="nama_file" placeholder="Nama Arsip">
              </div>

              <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" name="deskripsi" rows="5"></textarea>
              </div>

              <div class="mb-3">
                <label for="berkas" class="form-label">Berkas</label>
                <input type="file" class="form-control" id="berkas" name="berkas">
              </div>
              
          
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('arsip')?>" class="btn btn-success" >Kembali</a>
              </div>
            <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
    <div class="row">
    <div class="col-md-3">
</div>




        
          