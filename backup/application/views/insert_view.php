<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');

$base_url = base_url();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <pre>
<link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">
</pre>
    <meta charset="utf-8">
    <title>Electrónica Retro: Modificar catálogo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
 
    <link id="callCss" rel="stylesheet" href="<?= $base_url?>themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="<?= $base_url?>themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="<?= $base_url?>themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="<?= $base_url?>themes/css/font-awesome.css" rel="stylesheet" type="text/css">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<style type="<?= $base_url?>text/css" id="enject"></style>
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	
	<div class="span6">

	</div>
</div>

<div id="mainBody">

	<div class="container">
	<div class="row">


	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="<?php echo base_url('home');?>">Inicio</a> <span class="divider">/</span></li>
		<li class="active"> Agregar Producto </li>
    </ul>
      <a href="<?php echo base_url('delete');?>" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Eliminar producto </a> </br>
  <a href="<?php echo base_url('home');?>" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Volver al catálogo </a> 
	<h3>  Agregar Producto </h3>
	<hr class="soft"/>

<div id="container">
<?php echo form_open_multipart('Add'); ?>
<?php if (isset($message)) { ?>
<CENTER><h3 style="color:green;">Producto agregado correctamente </h3><br>
<h4><a href="<?php echo base_url('home');?>">Volver al catálogo<br>
<a href="<?php echo base_url('add');?>">Agregar otro producto</CENTER><br></h4>

<?php } ?>
<?php echo form_label('Nombre:     '); ?> <?php echo form_error('Product_name'); ?><br />
<?php echo form_input(array('id' => 'Product_name', 'name' => 'Product_name')); ?><br />
<br />
<?php echo form_label('Codigo:     '); ?> <?php echo form_error('Product_code'); ?><br />
<?php echo form_input(array('id' => 'Product_code', 'name' => 'Product_code')); ?><br />
<br />
<?php echo form_label('Imagen: (Tipos admitidos: gif,jpg,png,jpeg)    '); ?> <br /><input type="file" name="foto" size="20" /><br />
<br />
<?php // echo form_input(array('id' => 'Image_URL', 'name' => 'Image_URL')); ?>

<?php echo form_label('Precio:     '); ?> <?php echo form_error('Product_price'); ?><br />
<?php echo form_input(array('id' => 'Product_price', 'name' => 'Product_price')); ?><br />
<br />
<?php echo form_label('Descripcion:'); ?> <?php echo form_error('Product_description'); ?><br />
<?php echo form_input(array('id' => 'Product_description', 'name' => 'Product_description')); ?><br />
<br />
<?php echo form_submit(array('id' => 'submit', 'value' => 'Agregar')); ?> <br />
<?php echo form_close(); ?><br/>

<div id="fugo">


    

</div>
</div>
</div>
</div>
</div>
</div>

</body>
</html>