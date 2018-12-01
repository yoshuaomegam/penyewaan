<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PerkapOnlen - RPLJ-KELOMPOK 3</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<style>
			.register{
			margin-left: 17%;
			}
		</style>
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
		<div><?=validation_errors()?></div>
		<div><?=$this->session->flashdata('error')?></div>
		<?=form_open('controller_member', ['class'=>'form-horizontal'])?>
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Username</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" name="username">
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-8">
			  <input type="password" class="form-control" name="password">
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <div class="checkbox">
				<label>
				  <input type="checkbox"> Remember me
				</label>
			  </div>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-primary">Sign in</button>
			</div>
		  </div>
		</form>
		<div class="register">
			<a href="<?php echo base_url();?>index.php/Regis/member"><button class="btn btn-danger">Register</button></a>
		</div>
	</body>
</html>
