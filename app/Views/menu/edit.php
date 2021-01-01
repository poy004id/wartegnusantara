<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tambah Kategori Menu Makanan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Menu</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
            <form action="<?php echo base_url('menu/update'); ?>" method="post">
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



                   <input type="hidden" id="id" name="id" value="<?php echo $menu['id']; ?>">
                  <div class="form-group">
                      <label for="">Nama Menu</label>
                      <input type="text" class="form-control" name="nama_menu" placeholder=" category name" value="<?php echo $menu['nama_menu']; ?>">
                  </div>


                  <div class="form-group">
                      <label for="">Kategori</label>
                      <select name="id_kategori_menu" id="id_kategori_menu" class="form-control">

                        <?php foreach($kategoriData as $row):?>
                          <?php if($menu['id_kategori_menu'] == $row['id']):?>
                            <option value="<?php echo $row['id']?>" selected><?php echo $row['nama_kategori']?></option>
                          <?php else:?>
                            <option value="<?php echo $row['id']?>"><?php echo $row['nama_kategori']?></option>
                          <?php endif;?>
                        <?php endforeach;?>




                      </select>
                  </div>

                  <div class="form-group">
                      <label for="">Jumlah</label>
                      <input type="text" class="form-control" name="jumlah" placeholder=" Jumlah" value="<?php echo $menu['jumlah']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Harga</label>
                      <input type="text" class="form-control" name="harga" placeholder=" harga" value="<?php echo $menu['harga']; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Keteragan</label>
                      <textarea name="keterangan" rows="8" class="form-control"><?php echo $menu['keterangan']; ?></textarea>
                      <!-- <input type="textarea" class="form-control" name="keterangan" placeholder=" harga" value="<?php echo $menu['keterangan']; ?>"> -->
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
