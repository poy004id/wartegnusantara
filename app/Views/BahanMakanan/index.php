<div class="content-wrapper">
  <div class="content-header">



  <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                              List Kategori Bahan Makanan
                              <a href="<?php echo base_url('bahanmakanan/create'); ?>" class="btn btn-primary float-right">Tambah</a>
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
                                              <th>Nama Bahan Baku</th>
                                              <th>Kuantitas</th>
                                              <th>Kategori</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php foreach($BahanMakanan as $key => $row){ ?>
                                          <tr>
                                              <td><?php echo $key + 1; ?></td>
                                              <td><?php echo $row['NamaBahanBaku']; ?></td>
                                              <td><?php echo $row['Qty']; ?></td>
                                                <td><?php echo $row['NamaKategori']; ?></td>
                                              <td>
                                                  <div class="btn-group">
                                                      <a href="<?php echo base_url('BahanMakanan/edit/'.$row['ID']); ?>" class="btn btn-sm btn-success">
                                                          <i class="fa fa-edit"></i>
                                                      </a>
                                                      <a href="<?php echo base_url('BahanMakanan/delete/'.$row['ID']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                                          <i class="fa fa-trash-alt"></i>
                                                      </a>
                                                  </div>
                                              </td>
                                          </tr>
                                          <?php } ?>
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
