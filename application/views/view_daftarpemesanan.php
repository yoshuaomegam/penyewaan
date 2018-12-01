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
              <?php 
        $this->load->view('layout/dashboard') ?>
      <div class="col-md-1">

      </div>
      <div class="col-md-10">
<h1 >Products Table</h1>
    <table  id="barang" class="table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>username pemesan</th>
            <th>nama penerima</th>
            <th>alamat</th>
            <th>No Telp</th>
            <th>bukti pembayaran</th>
            <th>Kurir</th>
            <th>Status</th>
            <th>Aksi</th>
            

        </tr>
    </thead>
    <tbody>
            <?php
            foreach($daftar_barang as $barang){
            ?>
        <tr>
            <td><?php echo $barang->username;?></td>
            <td> <?php echo $barang->Nama_Penerima;?></td>
            <td><?php echo $barang->Alamat;?></td>
             <td><?php echo $barang->notelp;?></td>
                    <td><img height="75" width="75"> src="<?php echo base_url();?>assets/pembayaran/<?=$barang->bukti?>"></img></td>
            <td><?php echo $barang->nama_kurir ?></td>
            <td><?php echo $barang->status ?></td>

            <td><?php echo '<a class="btn btn-primary btn-sm" href="'.base_url().'/controller_pemesanan/lihatbarang/'.$barang->username.'">Lihat Barang</a>'?>
              <?php echo '<a class="btn btn-primary btn-sm" href="'.base_url().'/controller_pemesanan/daftar_kurir/'.$barang->id_pemesanan.'">Pilih Kurir</a>'?>
              <?php echo '<a class="btn btn-primary btn-sm" href="'.base_url().'/controller_pemesanan/validasi_bukti/'.$barang->username.'">Validasi Pembayaran</a>'?>
            </td>

        </tr>
        <?php } ?>
    </tbody>
    <tfoot>

    </tfoot>
    </table>
</div>
</div>
</body>
<script>$(document).ready(function(){
    $('#barang').DataTable();
});</script>
</html>
