<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tambah menu Makanan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Create menu Makanan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
            <form action="<?php echo base_url('menu/store'); ?>" method="post">
              <div class="card">
                <div class="card-body">
                  <?php
                  $inputs = session()->getFlashdata('inputs');
                  $errors = session()->getFlashdata('errors');
                  if(!empty($errors)){ ?>
                  <div class="alert alert-danger" role="alert">
                    Whoops! Ada kesalahan saat input data, yaitu:
                    <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                    </ul>
                  </div>
                  <?php } ?>
                   <input type="hidden" id="id" name="id" value="">
                  <div class="form-group">
                      <label for="">Nama Menu Makanan</label>
                      <input type="text" class="form-control" name="nama_menu" placeholder="Nama Menu Makanan" value="">
                  </div>
                  <div class="form-group">
                      <label for="">Jumlah</label>
                      <input type="text" class="form-control" name="jumlah" placeholder=" Jumlah name" value="">
                  </div>
                  <div class="form-group">
                      <label for="">harga</label>
                      <input type="text" class="form-control" name="harga" placeholder="1.000" value="">
                  </div>

                  <div class="form-group">
                      <label for="">Kategori</label>
                      <select name="id_kategori_menu" id="id_kategori_menu" class="form-control">
                          <option value="">Pilih Kategori</option>
                          <?php foreach ($menu as $key => $row): ?>
                            <option value="<?php echo $row['id']?>"><?php echo $row['nama_kategori']?></option>

                          <?php endforeach; ?>

                      </select>
                  </div>
                  <div class="form-group">
                      <label for="">Keterangan</label>
                      <textarea name="keterangan" rows="8" class="form-control"></textarea>
                  </div>

                </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('menu'); ?>" class="btn btn-outline-info">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
