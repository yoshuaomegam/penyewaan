<html>
<head>
  <meta charset="utf-8">
  <title>PerkapOnlen</title>

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

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
<h4>Daftar Barang yang Dibeli	</h4>
            <?php
            foreach($daftar_barang as $barang){
            ?>
		<div class="row">
            <td>Nama Barang : <?php echo $barang->nama; ?></td>
            <br>
            <td>Harga Barang : Rp. <?php echo $barang->harga; ?></td>
            <br>
            <td>Gambar Barang : <?php echo $barang->qty; ?></td>
            <br>
            <br>
		</div>
<?php } ?>
<h1>Total yang Harus dibayar : <?php echo $barang->total; ?></h1>
	</div>
      <?= anchor('Controller_Pemesanan/form_pembayaran/'.$barang->id_pemesanan,'Upload Bukti Pembayaran',['class'=>'btn btn-success']) ?>
    </table>

</div>
</div>
</body>
<script>$(document).ready(function(){
    $('#barang').DataTable();
});</script>
</html>
