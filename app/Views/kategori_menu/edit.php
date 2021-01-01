<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tambah Kategori Bahan Makanan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Create Category</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
            <form action="<?php echo base_url('kategori_menu/update'); ?>" method="post">
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
                <?php foreach ($kategori as $key => $row): ?>


                   <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
                  <div class="form-group">
                      <label for="">Nama Kategori</label>
                      <input type="text" class="form-control" name="nama_kategori" placeholder=" category name" value="<?php echo $row['nama_kategori']; ?>">
                  </div>

                  <div class="form-group">
                      <label for="">Status</label>
                      <select name="status" id="status" class="form-control">
                          <option value="">Pilih Kategori</option>
                          <option value="active" <?php echo $row['status'] == "active" ? 'selected' : '' ?>>Active</option>
                          <option value="inactive" <?php echo $row['status'] == "inactive" ? 'selected' : '' ?>>Inactive</option>
                      </select>
                  </div>
                    <?php endforeach; ?>
                </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('bahanmakanan'); ?>" class="btn btn-outline-info">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
