
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <?=anchor('Controller_Barang/tampil_barang', 'PerkapOnlen', ['class'=>'navbar-brand'])?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
		<li><?php echo anchor(base_url(), 'Home');?></li>
        <li>
			<?=anchor('Controller_Barang/tampil_barang', 'Tampil Barang')?>
		</li>

		<?php if($this->session->userdata('username')) { ?>
			<li><div style="line-height:50px;">You Are : <?=$this->session->userdata('username')?></div></li>
			<li><?php echo anchor('Controller_Member/logout', 'Logout');?>
      </li>
		<?php } else { ?>
			<li><?php echo anchor('Controller_Member', 'Login');?></li>
		<?php } ?>
      </ul>

    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->

</nav>
