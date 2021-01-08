<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tambah Transaksi </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Create Transaksi Makanan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <center><?php echo session()->setFlashdata('msg');?></center>
      <div class="row">
          <div class="col-md-4">

            <form action="<?php echo base_url('transaksi/add_cart')?>" method="post">
              <div class="card">
                <div class="card-body">
                  <div class="form-group">
                      <label for="">Menu Makanan</label>
                      <select name="id_menu" id="id_menu" class="form-control">
                          <option value="">Pilih Menu</option>
                          <?php foreach ($menu as $key => $row):
                            ?>

                            <option value="<?php echo $row['id']?>"><?php echo $row['nama_menu']?></option>

                          <?php endforeach; ?>

                      </select>
                  </div>
                  <div class="form-group">
                      <label for="">Jumlah</label>
                      <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder=" Jumlah" value="">
                  </div>
                </div>
                <div class="card-footer">
                    <a href="<?php echo base_url('menu'); ?>" class="btn btn-outline-info">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Add</button>
                </div>
              </div>
            </form>
          </div>
          <form action="<?= base_url('transaksi/simpan')?>" method="post">

            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="form-group">
                          <label for="">No Faktur</label>
                          <input type="text" name="nofak" value="<?= $id?>" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                          <label for="">Tanggal</label>
                          <input type="text" name="tanggal" value="<?= date('Y-m-d')?>" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="">Kasir</label>
                          <input type="text" id="kasir" name="kasir" value="<?= $userdata['username']?>" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                      <?php foreach ($cart->contents() as $items): ?>
                      <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                      <tr>
                           <td><?=$i ?></td>
                           <td><?=$items['name'];?></td>
                           <td style="text-align:right;"><?php echo number_format($items['price']);?></td>
                           <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
                           <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>

                           <td style="text-align:center;"><a href="<?php echo base_url('transaksi/remove/'.$items['rowid']);?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                      </tr>

                      <?php $i++; ?>
                      <?php endforeach; ?>

                        </tbody>
                      </table>
                      <table>
                        <tr>
                            <td style="width:235px;" rowspan="2"><button type="submit" class="btn btn-info btn-lg"> Simpan</button></td>
                            <th style="width:140px;">Total Belanja(Rp)</th>
                            <th style="text-align:right;"><input type="text" name="total2" value="<?php echo number_format($cart->total());?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px; margin-top: 5px;" readonly></th>
                            <input type="hidden" id="total" name="total" value="<?php echo $cart->total();?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px; margin-top: 5px;" readonly>
                        </tr>
                        <tr>
                            <th>Tunai(Rp)</th>
                            <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                            <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                        </tr>
                        <tr>
                            <td></td>
                            <th>Kembalian(Rp)</th>
                            <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                        </tr>

                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>

      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(function(){
    $('#jml_uang').on("input",function(){
        var total=$('#total').val();
        var jumuang=$('#jml_uang').val();
        var hsl=jumuang.replace(/[^\d]/g,"");
        $('#jml_uang2').val(hsl);
        $('#kembalian').val(hsl-total);
    })

});
</script>
<script type="text/javascript">
$(function(){
    $('.jml_uang').priceFormat({
            prefix: '',
            //centsSeparator: '',
            centsLimit: 0,
            thousandsSeparator: ','
    });
    $('#jml_uang2').priceFormat({
            prefix: '',
            //centsSeparator: '',
            centsLimit: 0,
            thousandsSeparator: ''
    });
    $('#kembalian').priceFormat({
            prefix: '',
            //centsSeparator: '',
            centsLimit: 0,
            thousandsSeparator: ','
    });
    $('.harjul').priceFormat({
            prefix: '',
            //centsSeparator: '',
            centsLimit: 0,
            thousandsSeparator: ','
    });
});
</script>
