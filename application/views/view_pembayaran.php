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


      <h1>Upload Bukti Pembayaran</h1>
      <div> <?= validation_errors() ?></div>
      <?= form_open_multipart('controller_pemesanan/pembayaran', ['class'=>'form-horizontal']) ?>
      <div class="form-group row">
        <label for="penerima" class="col-sm-2 col-form-label">Nama Penerima :</label>
        <div class="col-sm-10">
          <input type="text" name="penerima" class="form-control" id="penerima" placeholder="Nama Penerima" >
        </div>
      </div>
      <div class="form-group row">
        <label for="Alamat" class="col-sm-2 col-form-label">Alamat Penerima:</label>
        <div class="col-sm-10">
          <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" >
        </div>
      </div>
           <div class="form-group row">
        <label for="Alamat" class="col-sm-2 col-form-label">No Telp Penerima :</label>
        <div class="col-sm-10">
          <input type="text" name="notelp" class="form-control" id="notelp" placeholder="No. Telp" >
        </div>
      </div>
      <div class="form-group row">
        <label for="upload" class="col-sm-2 col-form-label">Upload Bukti Pembayaran :</label>
        <div class="col-sm-10">
          <input type="file" name="gambar" class="form-control" id="upload" placeholder="">
        </div>
      </div>
      <div class="col-sm-10-right ">
        <button type="submit" name="submit" class="btn btn-primary">Upload</button>
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
