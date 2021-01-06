<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php
            if (isset($_SESSION['inputs'])==TRUE ) {
              $user = session()->getFlashdata('inputs'); }

            ?>
          <h1 class="m-0 text-dark">Edit User : <b> <?php echo $user['username']; ?></b></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Create Kategori</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
            <form action="<?php echo base_url('auth/update'); ?>" method="post">
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


                     <input type="hidden" id="id" name="id" value="<?php echo $user['id']; ?>">
                     <input type="hidden" id="id" name="no_hp" value="<?php echo $user['no_hp']; ?>">
                     

                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $user['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $user['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="level" id="level" class="form-control">
                          <option value="">Pilih Role</option>
                            <option value="admin"   <?php if ($user['level'] == "admin" ){ echo "selected";}   ?> >Admin</option>
                            <option value="kasir"   <?php if ($user['level'] == "kasir" ){ echo "selected";}   ?> >Kasir</option>
                            <option value="koki"   <?php if ($user['level'] == "koki" ){ echo "selected";}   ?>   >Koki</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">Pilih Status</option>
                            <option value="active"    <?php if ($user['status'] == "active" ){ echo "selected";}   ?>>Active</option>
                            <option value="inactive"  <?php if ($user['status'] == "inactive" ){ echo "selected";}   ?>>Inactive</option>
                        </select>
                    </div>



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
