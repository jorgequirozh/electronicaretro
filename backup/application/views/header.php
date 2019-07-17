<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();

?>

<!DOCTYPE html>
<pre>
<link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">
</pre>
<html lang="en">
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	
	<div class="span6">

	</div>
</div>
    <div id="logoArea" class="navbar">

  <div class="navbar-inner">
    <a class="brand" href="index.html"></a>
    	<h3> Electrónica Retro.cl</h3>
	    <a href="<?php echo base_url('home');?>"><span class="btn btn-small btn-success">Catálogo</span></a>
	    <a href="<?php echo base_url('admin');?>"><span class="btn btn-small btn-success">Administración</span></a></br>
		<a href="<?php echo base_url('cart');?>"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> <span class="count"><?= $this->cart->total_items() ?></span> Artículos en carrito </span> </a> 
	</div>
  </div>
</div>
</div>
</div>
</body>
</html>