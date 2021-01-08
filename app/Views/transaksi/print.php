<html>
<head>
  <title>Laporan Penjualan</title>
  <style>
    table {
      border-collapse:collapse;
      table-layout:fixed;width: 100%;
    }
    table td {
      word-wrap:break-word;
      width: 10%;
      text-align: center;
    }
  </style>
</head>
<body>
        <h2><center>WARTEG NUSANTARA</center></h2>

    <hr/>
    <b><center><?php echo $ket; ?></center></b><br /><br />

  

  <table class="table table-bordered table-hovered">
      <thead>
          <tr>
              <th rowspan="2" style="text-align:center; vertical-align:middle;">No</th>
              <th rowspan="2" style="text-align:center; vertical-align:middle;">ID</th>
              <!-- <th rowspan="2">Tanggal</th> -->
              <th rowspan="2" style="text-align:center; vertical-align:middle;">Total Bayar </th>
              <!-- <th rowspan="2">Kasir </th> -->
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

              <td rowspan="<?php echo $row['count'] ?>" style="text-align:right;"><?php echo  number_format($row['total_harga'],0,",",".");  ?></td>


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



</body>
</html>
