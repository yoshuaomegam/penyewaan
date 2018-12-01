<? if !(isset($_SESSION['username'])){
redirect('login');
}
?>
<!DOCTYPE html>

<html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PerkapOnlen</title>

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

  </head>
      <?php
        $att = array('id_barang' => 'biodata-form');
        echo form_open('controller_barang/simpan_edit_barang', $att);
        echo form_hidden('id_barang',$edit->id_barang);
    ?>
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
<h1>Edit Barang</h1>
<form action="<?php echo base_url().'barang_controller/simpan_barang'; ?>" method="post">

  <div class="form-group row">
    <label for="Nama" class="col-sm-2 col-form-label">ID Barang :</label>
    <div class="col-sm-10">
      <input type="text" name="id_barang" class="form-control" id="id_barang" value="<?php echo $edit->id_barang; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="Nama" class="col-sm-2 col-form-label">Nama Barang :</label>
    <div class="col-sm-10">
      <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $edit->nama; ?>">
    </div>
  </div>
    <div class="form-group row">
    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Barang :</label>
    <div class="col-sm-10">
      <input type="text" name="deskripsi" class="form-control" id="barang" value="<?php echo $edit->deskripsi; ?>">
    </div>
  </div>
    <div class="form-group row">
    <label for="harga" class="col-sm-2 col-form-label">Harga Barang :</label>
    <div class="col-sm-10">
      <input type="text" name="harga" class="form-control" id="harga" value="<?php echo $edit->harga; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="upload" class="col-sm-2 col-form-label">Upload Gambar :</label>
    <div class="col-sm-10">
      <input type="file" name="foto" class="form-control" id="upload" placeholder="">
    </div>
  </div>
    <div class="form-group row">
    <label for="stok" class="col-sm-2 col-form-label"> Stok Barang</label>
    <div class="col-sm-10">
      <input type="text" name="stok" class="form-control" id="stok" value="<?php echo $edit->stok; ?>">
    </div>
  </div>
  <div class="col-sm-10-right ">
      <button type="submit" name="submit" class="btn btn-primary">Edit</button>
    </div>
  </div>
 </form>
    </body>
</html>
