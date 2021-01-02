<div class="content-wrapper">
  <div class="content-header">



  <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                              Daftar Resep Makanan
                              <a href="<?php echo base_url('resep/create'); ?>" class="btn btn-primary float-right">Tambah</a>
                          </div>
                          <div class="card-body">

                              <?php
                              if(!empty(session()->getFlashdata('success'))){ ?>
                              <div class="alert alert-success">
                                  <?php echo session()->getFlashdata('success');?>
                              </div>
                              <?php } ?>

                              <?php if(!empty(session()->getFlashdata('info'))){ ?>
                              <div class="alert alert-info">
                                  <?php echo session()->getFlashdata('info');?>
                              </div>
                              <?php } ?>

                              <?php if(!empty(session()->getFlashdata('warning'))){ ?>
                              <div class="alert alert-warning">
                                  <?php echo session()->getFlashdata('warning');?>
                              </div>
                              <?php } ?>

                              <div class="table-responsive">
                                  <table class="table table-bordered table-hovered">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Nama Menu </th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php foreach($resep as $key => $row){ ?>
                                          <tr>
                                              <td><?php echo $key +1; ?></td>
                                              <td><?php echo $row['nama_menu']; ?></td>
                                              <td>
                                                  <div class="btn-group">
                                                    <a href="<?php echo base_url('resep/detail/'.$row['id']); ?>" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-list-alt"></i> Detail
                                                    </a>
                                                  </div><div class="btn-group"> &nbsp;</div>
                                                  <div class="btn-group">
                                                    <a href="<?php echo base_url('resep/edit/'.$row['id']); ?>" class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('resep/delete/'.$row['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                  </div>
                                              </td>
                                          </tr>
                                        <?php } ?>
                                         <!-- end foreach -->
                                      </tbody>
                                  </table>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </div>
  </div>
