<?if !(isset($_SESSION['username'])){
    redirect(base_url."/login")
} 
?>

<!doctype html>
<html lang="en">
  <head>
    <title>PerkapOnlen</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style>
.thumbnail{        
    width: 300px; 
    // or you could use percentage values for responsive layout
    height: 300px;
    overflow: auto;
}

.thumbnail img{
    // your styles for the image
    width: 300px;
    height: 100px;
    display: block;
}
</style>
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

<section class="content">
	<div class="container">
		<h1>Produk</h1>

		<div class="row">
					<?php
            foreach($daftar_barang as $barang){
            ?>
			<div class="col-md-3">
				<div class="thumbnail">
					                    <img src="<?php echo base_url();?>assets/upload/<?=$barang->gambar?>"/>
					<div class="caption">
						<h3><?php echo $barang->nama; ?></h3>
						<h5>Harga Rp. <?php echo $barang->harga; ?></h5>
						<?php echo'<a href="'.base_url().'/controller_barang/cart/'.$barang->id_barang.'" class="btn btn-primary">Beli</a>'?>
						<?php echo'<a href="'.base_url().'/controller_barang/deskripsi_barang/'.$barang->id_barang.'" class="btn btn-primary">Lihat Deskripsi</a>'?>
					</div>

				</div>

			</div>
<?php } ?>
		</div>

	</div>
</section>

  </body>
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</html>
