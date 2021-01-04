<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Resep Makanan : </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create menu Makanan</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
              <form action="<?php echo base_url('resep/update'); ?>" method="post">
                <div class="card">
                  <div class="card-body padding-bottom80">
                    <?php
                    $inputs = session()->getFlashdata('inputs');
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
                    <div id="dynamic_field">
  <!-- ############################################################# Form input###################################################################################### -->
<?php foreach ($resep as $key => $row): ?>
                      <div class="form-group row">

                        <div class="col-md-6">
                          <label for="bahan">Bahan</label>
                          <select name="id_bahan[]" id="id_bahan" class="form-control">
                              <option value="">Pilih Bahan</option>
                              <?php foreach ($bahan as $key => $value): ?>
                                <?php if($row['id_bahan'] == $value['id']):?>
                                <option value="<?php echo $value['id']?>" selected><?php echo $value['nama_bahan']?></option>
                                <?php else:?>
                                <option value="<?php echo $value['id']?>"><?php echo $value['nama_bahan']?></option>
                              <?php endif; ?>
                              <?php endforeach; ?>
                          </select>
                        </div>

                        <div class="col-md-4">
                          <label for="jumlah">Jumlah</label>
                          <input type="text" class="form-control" id="jumlah" name="jumlah[]" placeholder="Takaran" value="<?php echo $row['jumlah']; ?>">
                        </div>
                        <div class="col-md-1"><button type="button" name="remove" id="" class="btn btn-danger btn_remove">X</button></div>

                      </div>
<?php endforeach; ?>
<!-- ############################################################# Form input###################################################################################### -->


                    <div class="form-group row button-group">
                      <div class="col-sm-offset-2" col-md-1>
                        <button type="button" name="add" id="add" class="btn btn-outline-success">Add Row</button>
                      </div>
                      <div class="col-sm-offset-2 col-md-1">
                       <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
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
</div>
<script type="text/javascript">
    $(document).ready(function(){
      var i=1;

     //  $('#add').click(function(){
     //       i++;
     //       $('#dynamic_field').append('<div id="row'+i+'"><div class="form-group"><label class="control-label col-sm-2" for="name">Name:</label><div class="col-sm-5"><input type="text" class="form-control"  placeholder="Enter Name" name="name[]" autocomplete="off"></div></div><div class="form-group"><label class="control-label col-sm-2" for="email">Email:</label><div class="col-sm-5"><input type="email" class="form-control" id="email" placeholder="Enter email" name="email[]" autocomplete="off"></div></div><div class="form-group"><label class="control-label col-sm-2" for="mobno">Mobile Number:</label><div class="col-sm-5"><input type="number" class="form-control" id="mobno" placeholder="Enter Mobile Number" name="mobno[]" autocomplete="off"></div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div></div>');
     // });

     $('#add').click(function(){
          i++;
          $('#dynamic_field').append('<div id="row'+i+'"><div class="form-group row"><div class="col-md-6"><label for="bahan">Kategori</label><select name="id_bahan[]" id="id_bahan" class="form-control"><option value="">Pilih Kategori</option><?php foreach ($bahan as $key => $row): ?><option value="<?php echo $row['id']?>"><?php echo $row['nama_bahan']?></option><?php endforeach; ?></select></div><div class="col-md-4"><label for="jumlah">Jumlah</label><input type="text" class="form-control" id="jumlah" name="jumlah[]" placeholder="Takaran" value=""></div><div class="col-md-1"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div></div>');
    });







     $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           var res = confirm('Are You Sure You Want To Delete This?');
           if(res==true){
           $('#row'+button_id+'').remove();
           $('#'+button_id+'').remove();
           }
      });

    });
</script>
<style>
.padding-bottom80{padding-bottom:80px}
.button-group{position: absolute;bottom:0;}
</style>
