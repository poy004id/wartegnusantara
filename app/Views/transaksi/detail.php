<div class="content-wrapper">
  <div class="content-header">
  	<div class="content">
        <div class="container-fluid">
          	<div class="row">
                  <div class="col-md-10">
                      <div class="card">
                          <div class="card-header">
                              List detail transaksi Makanan
                          </div>
                          <div class="card-body">
                          	<?php 
                                foreach($item as $row) {
                                  ?>
		                          	<table width="400px">
		                          		<tr>
		                          			<td>Id Transaksi</td>
		                          			<td>: <?= $row->transaksi_id?></td>
		                          		</tr>
		                          		<tr>
		                          			<td>Tanggal</td>
		                          			<td>: <?= $row->tanggal?></td>
		                          		</tr>
		                          		<tr>
		                          			<td>Kasir</td>
		                          			<td>: <?= $row->kasir?></td>
		                          		</tr>
		                          		<tr>
		                          			<td>Total Pembelian</td>
		                          			<td>: <?php echo 'Rp '.number_format($row->total_harga);?></td>
		                          		</tr>
		                          	</table>
		                    <?php }?>
		                    <br>
                              <div class="table-responsive">
                                  <table class="table table-bordered table-hovered">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Kode Menu</th>
                                              <th>Nama Menu </th>
                                              <th>Harga </th>
                                              <th>Jumlah</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php foreach($item as $key => $row){ ?>
                                          <tr>
                                              <td><?php echo $key +1; ?></td>
                                              <td><?php echo $row->id_menu; ?></td>
                                              <td><?php echo $row->nama_menu; ?></td>
                                              <td><?php echo $row->price; ?></td>
                                              <td><?php echo $row->qty; ?></td>
                                          </tr>
                                        <?php } ?>
                                         <!-- end foreach -->
                                      </tbody>
                                  </table>
                              </div>

                          </div>
                          <div class="card-footer">
                          	<a href="<?php echo base_url('transaksi'); ?>" class="btn btn-outline-info">Back</a>
                          </div>
                      </div>
                  </div>
              </div>
        </div>
    </div>
  </div>
</div>