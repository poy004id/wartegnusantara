<form action="http://localhost:8888/KategoriBahanMakanan/store"  name="create">
  <div class="card">
    <div class="card-body">

 <h1>create2</h1>
      <div class="form-group">
          <label for="">Name</label>
          <input type="text" class="form-control" name="NamaKategori" placeholder=" category name" >

      </div>
      <div class="form-group">
          <label for="">Status</label>
          <select name="isActive" id="" class="form-control">
              <option value="">Pilih Kategori</option>
              <option value="1">Active</option>
              <option value="0">Inactive</option>
          </select>
      </div>
    </div>
    <div class="card-footer">
        <a href="<?php echo base_url('kategoribahanmakanan'); ?>" class="btn btn-outline-info">Back</a>
        <button type="submit" class="btn btn-primary float-right" name="submit" value="submit" >Simpan</button>
    </div>
  </div>
</form>
