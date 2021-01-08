<div class="content-wrapper">
  <div class="content-header">
  	<div class="content">
      <div class="container-fluid">
      	<div class="row">
          <div class="col-md-10">
            <div class="card">
            	<div class="card-header">
            		Laporan Transaksi Penjualan
            	</div>
            	<div class="card-body">
            		<div class="row">
                  <div class="col-md-4">
                      <form method="get" action="">
                      <label>Filter Berdasarkan</label><br>
                        <select name="filter" id="filter" onchange="myFunction()">
                            <option value="">Pilih</option>
                            <option value="1">Per Tanggal</option>
                            <option value="2">Per Bulan</option>
                            <option value="3">Per Tahun</option>
                        </select>
                        <br /><br />
                        <div id="form-tanggal" style="display: none;">
                            <label>Tanggal</label><br>
                            <input type="date" name="tanggal" class="input-tanggal" />
                            <br /><br />
                        </div>
                        <div id="form-bulan" style="display: none;">
                            <label>Bulan</label><br>
                            <select name="bulan">
                                <option value="">Pilih</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <br /><br />
                        </div>

                        <div id="form-tahun" style="display: none;">
                            <label>Tahun</label><br>
                            <select name="tahun">
                                <option value="">Pilih</option>
                                <?php
                                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                                }
                                ?>
                            </select>
                            <br /><br />
                        </div>

                        <button type="submit">Tampilkan</button>
                        <a href="<?php echo base_url('laporan_transaksi'); ?>">Reset Filter</a>

                   </form>
                  </div>
                  <div class="col-md-8">
                      <b><?php echo $ket; ?></b><br /><br />
                      <a href="<?php echo $url_cetak; ?>" target="_blank">CETAK PDF</a><br /><br />
                      <table border="1" cellpadding="8">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kode Transaksi</th>
                        <th>Total Harga</th>
                    </tr>
                    <?php
                      if( ! empty($transaksi)){
                        $no = 1;
                        foreach($transaksi as $key => $data){
                              $tgl = date('d-m-Y', strtotime($data['tanggal']));

                          echo "<tr>";
                          echo "<td>".$no++."</td>";
                          echo "<td>".$tgl."</td>";
                          echo "<td>".$data['id']."</td>";
                          echo "<td>".$data['total_harga']."</td>";
                          echo "</tr>";
                          $no++;
                        }
                      }
                      ?>
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
