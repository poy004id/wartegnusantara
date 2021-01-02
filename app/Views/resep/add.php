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
            <form action="<?php echo base_url('resep/create'); ?>" method="post">
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
                  <div class="form-group row">
                    <div class="col-md-8">
                      <label for="">Kategori</label>
                      <select name="id" id="id" class="form-control">
                          <option value="">Pilih Menu Makanan</option>
                          <?php foreach ($menu as $key => $row): ?>
                            <option value="<?php echo $row['id']?>"><?php echo $row['nama_menu']?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-md-4">

                      <label for="">Jumlah</label>
                      <input type="text" class="form-control" name="jumlah" placeholder=" Jumlah name" value="">
                    </div>
                  </div>
              </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('menu'); ?>" class="btn btn-outline-info">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Buat Resep</button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
