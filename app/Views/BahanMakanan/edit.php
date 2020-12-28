
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Category</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
            <form action="<?php echo base_url('KategoriBahanMakanan/update'); ?>" method="">
              <div class="card">
                <div class="card-body">
                  <?php
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

                  <input type="text" name="ID" value="<?php echo $bahanmakanan['ID']; ?>">
                  <div class="form-group">
                      <label for="">Nama Bahan</label>
                      <input type="text" value="<?php echo $bahanmakanan['NamaBahanBaku']; ?>" class="form-control" name="NamaBahanBaku" placeholder="Enter category name">
                  </div>
                  <div class="form-group">
                      <label for="">Kuantitas</label>
                      <input type="text" value="<?php echo $bahanmakanan['Qty']; ?>" class="form-control" name="Qty" placeholder="Enter category name">
                  </div>



                </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('KategoriBahanMakanan'); ?>" class="btn btn-outline-info">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>

</div>
