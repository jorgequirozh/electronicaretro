<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
$this->load->helper('form');


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

        <div class="span12">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url('home');?>">Inicio</a> <span class="divider">/</span></li>
        <li class="active"> Eliminar producto </li>
    </ul>
      <a href="<?php echo base_url('add');?>" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Añadir producto </a> </br>
  <a href="<?php echo base_url('home');?>" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Volver al catálogo </a> 

  <h3>  Eliminar Producto </h3>
  <hr class="soft"/>
        <ol>
                        <?php foreach ($products as $product): ?>
                            <li><a href="<?php echo base_url() . "delete/show_product_id/" . $product->id; ?>"><?php echo $product->name; ?></a></li>
                        <?php endforeach; ?>
                    </ol>
                </div>
                <div id="detail">
                   
                   <!--------Displaying Fetched Details from database ---------->   
                    <?php foreach ($single_product as $producto): ?>
                        <p>Detalles del producto</p>
                        Producto: <?php echo $producto->name; ?><br/>
                        ID: <?php echo $producto->id; ?><br/>
                        <?php $id=$producto->id; ?>
                        Código: <?php echo $producto->code; ?><br/>
                        Descripción: <?php echo $producto->description; ?><br/>
                        Precio: CLP$ <?php echo $producto->price; ?><br/>
                    
                    <!--------Delete button ---------->     
                    <a href="<?php echo base_url() . "delete/delete_product_id/" . $id; ?>"><span class="btn btn-small btn-success">Eliminar artículo</span></a>
                    <br/>
                    <br/>
                    <?php endforeach; ?>


                </div> 
            </div> 

        </div>
            </div> 

        </div> 
    </div> 
</body> 
 
</html>