<div class="content-wrapper">
  <div class="content-header">



  <div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                            <div class="form-group col-md-6 float-left hidden">
                            <h5> <?php echo $ket ; ?></h5>
                            </div>
                            <!-- <button type="print" class="btn btn-primary" href="<?php echo $url_cetak; ?>">Cetak</button> -->
                            <div class="form-group col-md-2 float-right hidden">
                              <a href="<?php echo $url_cetak; ?>" target="_blank" class="btn btn-sm btn-outline-info float-right">CETAK PDF</a>
                            </div>
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
                              <div class="card-header">
                                  <!-- <h5 class="">Filter Laporan</h5> <br/> -->
                                  <!-- <div class="form-group">
                                      <label for="">Periode</label>
                                      <select name="periode" id="periode" class="form-control">
                                          <option value="">Pilih Periode</option>
                                          <option value="">Active</option>
                                          <option value="">Inactive</option>
                                      </select>
                                  </div> -->
<!-- ################################################################### FIlter -->
                                  <form method="get" action="">
                                    <div class="row">
                                      <div class="form-group col-md-2">
                                      <label>Periode</label>
                                        <select name="filter" id="filter" class="form-control" onchange="myFunction()">
                                            <option value="">Pilih Periode</option>
                                            <option value="1">Harian</option>
                                            <option value="2">Bulanan</option>
                                            <option value="3">Tahunan</option>
                                        </select>
                                      </div>

                                      <div class="form-group col-md-3" id="form-tanggal" style="display: none;">
                                          <label>Tanggal</label><br>
                                          <input type="date" name="tanggal" class="input-tanggal form-control" />
                                      </div>

                                      <div class="form-group col-md-2" id="form-bulan" style="display: none;">
                                          <label>Bulan</label><br>
                                          <select name="bulan" class="form-control">
                                            <?php foreach ($option_bulan as  $key => $row) : ?>
                                              <option value=" <?php echo $row['bulan'] ; ?> "> <?php echo date("F", mktime(0, 0, 0, $row['bulan'], 10)); ?> </option>
                                            <?php endforeach; ?>

                                          </select>
                                      </div>

                                      <div class="form-group col-md-2" id="form-tahun" style="display: none;">
                                          <label>Tahun</label><br>
                                          <select name="tahun" class="form-control">
                                              <!-- <option value="">Pilih</option> -->
                                              <?php foreach ($option_tahun as $key => $row) : ?>
                                                <option value=" <?php echo $row['tahun'] ; ?> "> <?php echo $row['tahun'] ; ?> </option>
                                              <?php endforeach; ?>
                                          </select>
                                      </div>


                                    </div>
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-primary ">Tampilkan</button>
                                    &nbsp;
                                    <a href="<?php echo base_url('laporan_transaksi'); ?>" class="">Reset Filter</a>
                                    </div>
                               </form>
<!-- ###################################################################  END of FIlter -->

                              </div>

                              <table class="table table-bordered table-hovered">
                                  <thead>
                                      <tr>
                                          <th rowspan="2" style="text-align:center; vertical-align:middle;">No</th>
                                          <th rowspan="2" style="text-align:center; vertical-align:middle;">ID</th>
                                          <th rowspan="2" style="text-align:center; vertical-align:middle;">Tanggal</th>
                                          <th rowspan="2" style="text-align:center; vertical-align:middle;">Total Bayar </th>
                                          <th rowspan="2" style="text-align:center; vertical-align:middle;">Kasir </th>
                                          <th colspan="4" style="text-align:center; vertical-align:middle;"> Detail Transaksi </th>


                                      </tr>
                                      <tr>
                                        <th style="text-align:center; vertical-align:middle;">Menu</th>
                                        <th style="text-align:center; vertical-align:middle;">Jumlah</th>
                                        <th style="text-align:center; vertical-align:middle;">Harga</th>
                                        <th style="text-align:center; vertical-align:middle;">Total Harga</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach($transaksi as $key => $row){ ?>
                                      <tr >

                                          <td rowspan="<?php echo $row['count'] ?>"><?php echo $key +1; ?></td>
                                          <td rowspan="<?php echo $row['count'] ?>"><?php echo $row['id_transaksi']; ?></td>
                                          <td rowspan="<?php echo $row['count'] ?>"><?php echo $row['tanggal']; ?></td>
                                          <td rowspan="<?php echo $row['count'] ?>" style="text-align:right;"><?php echo  number_format($row['total_harga'],0,",",".");  ?></td>
                                          <td rowspan="<?php echo $row['count'] ?>"><?php echo $row['id_user']; ?></td>

                                          <?php foreach ($detail_transaksi as $key2 => $value): ?>
                                            <?php if ($row['id_transaksi'] == $value['id_transaksi']) { ?>
                                            <td style=""><?php echo $value['nama_menu']; ?></td>
                                              <td style=""><?php echo $value['jumlah']; ?></td>
                                              <td  style=" text-align:right;"><?php echo number_format($value['harga'],0,",",".");  ?></td>
                                              <td style="text-align:right;"><?php echo number_format($value['jumlah']*$value['harga'],0,",",".");  ?></td>
                                              </tr>
                                            <?php } ?>

                                          <?php endforeach; ?>
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

  <script>
  function myFunction(){
    var x = document.getElementById("filter").value;
    if(x == '1'){
      $('#form-tanggal').show();
      $('#form-bulan, #form-tahun').hide();
    }else if(x == '2'){
      $('#form-tanggal').hide();
      $('#form-bulan, #form-tahun').show();
    }else{
      $('#form-tanggal, #form-bulan').hide();
      $('#form-tahun').show();
    }
    $('#form-tanggal input, #form-bulan select, #form-tahun select').val('');
  }
  $(document).ready(function(){ // Ketika halaman selesai di load
      $('.input-tanggal').datepicker({
          dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
      });
  })
  </script>
