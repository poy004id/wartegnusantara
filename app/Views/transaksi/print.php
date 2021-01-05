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
          echo "<td>".'Rp '.number_format($data['total_harga'])."</td>";
          echo "</tr>";
          $no++;
        }
      }
      ?>
  </table>
</body>
</html>