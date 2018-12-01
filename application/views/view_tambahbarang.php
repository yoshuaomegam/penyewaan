<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PerkapOnlen</title>

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</head>
<body>
  <?php
  if (isset($_SESSION['group']) && ($_SESSION['group']) == '1') {
    $this->load->view('layout/top_menu_admin');
  }
  else if (isset($_SESSION['group']) && ($_SESSION['group']) == '2'){
    $this->load->view('layout/top_menu');
  }
  else {
    $this->load->view('layout/top_menu');
  }
  ?>

  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">


      <h1>Tambah Barang</h1>
      <div> <?= validation_errors() ?></div>
      <?= form_open_multipart('controller_barang/simpan_barang', ['class'=>'form-horizontal']) ?>
      <div class="form-group row">
        <label for="Nama" class="col-sm-2 col-form-label">Nama Barang :</label>
        <div class="col-sm-10">
          <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="<?=set_value('nama')?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Barang :</label>
        <div class="col-sm-10">
          <input type="text" name="deskripsi" class="form-control" id="barang" placeholder="Deskripsi" value="<?=set_value('deskripsi')?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="harga" class="col-sm-2 col-form-label">Harga Barang :</label>
        <div class="col-sm-10">
          <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga" value="<?=set_value('harga')?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="upload" class="col-sm-2 col-form-label">Upload Gambar :</label>
        <div class="col-sm-10">
          <input type="file" name="gambar" class="form-control" id="upload" placeholder="">
        </div>
      </div>
      <div class="form-group row">
        <label for="stok" class="col-sm-2 col-form-label"> Stok Barang</label>
        <div class="col-sm-10">
          <input type="text" name="stok" class="form-control" id="stok" placeholder="Stok" value="<?=set_value('stok')?>">
        </div>
      </div>
      <div class="col-sm-10-right ">
        <button type="submit" name="submit" class="btn btn-primary">Upload Barang</button>
      </div>
    </div>
    <?= form_close() ?> 
  </div>
  <div class="col-md-1"></div>
</div>

<script>    <script>$(document).ready(function(){
  $('#barang').DataTable();
});</script>
</body>

</html>
