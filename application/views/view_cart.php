
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

  <div class="container">
<?php echo form_open('controller_barang/update'); ?>
<?php  echo anchor('controller_barang/katalog', 'Lanjut belanja');?>
<table cellpadding="6" cellspacing="1" style="width:50%" border="1" class="table-striped table-bordered table-hover" id="cart">
<thead>
<tr>
        <th>Opsi</th>
        <th>Kuantitas</th>
        <th>Nama</th>
        <th style="text-align:right">Harga</th>
        <th style="text-align:right">Total 1 Item</th>
</tr>
</thead>
<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

        <tr>
            <td><?php  echo anchor('controller_barang/hapus_barang_cart/'.$items['rowid'],'X' );?></td>
                <td><?php echo form_input(array('name' =>'qty'.$i, 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                <td>
                        <?php echo $items['name']; ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                        <?php endforeach; ?>
                                </p>

                        <?php endif; ?>

                </td>

                <td style="text-align:right">Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                <td style="text-align:right">Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
        </tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
  <td>Waktu/hari</td>

        <td colspan="2"> <?php echo form_input(); ?></td>
        <td class="right"><strong>Total</strong></td>
        <td class="right">Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>

</table>
<div>

<p><?php echo form_submit('', 'Update your Cart'); ?></p>

<div class="col-sm-10-right ">
       <?= anchor('Controller_Pemesanan/konfirmasi','Konfirmasi',['class'=>'btn btn-success']) ?>
      </div>
</body>
<script>$(document).ready(function(){
    $('#cart').DataTable();
});</script>
</html>
