<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  	<pre>
<link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">
</pre>
    <meta charset="utf-8">
    <title>Electrónica Retro.cl</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
 
    <link id="callCss" rel="stylesheet" href="<?= $base_url ?>themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="<?= $base_url?>themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="<?= $base_url?>themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="<?= $base_url?>themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="<?= $base_url?>themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

	<style type="text/css" id="enject"></style>
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
		
		
				<h4>Todos los productos </h4>

			<div class="span12">
    <ul class="breadcrumb">
		<li><a href="<?php echo base_url('home');?>">Inicio</a> <span class="divider">/</span></li>
		<li class="active"> Catálogo </li>
			  <ul class="thumbnails">
			  
			  <?php 
			  if(!empty($cart_data)){
			  
			  foreach($cart_data as $row){
			  ?>
			  
				<li class="span3">
				  <div class="thumbnail">
				  	<?php
				  	/*<a  href="product_details.html" ><img width="160" src="<?= $row->image ?>" alt=""/></a>*/
				  	?>
					<a><img height="212" width="160" src="<?= $row->image ?>" alt=""/></a>
					<div class="caption">
					  <h5><?= $row->name ?></h5>
					  <p> 
						<?= $row->description ?> 
					  </p>
					 
					  <h4 style="text-align:center">
					  <a class="btn" href="javascript:void(0)" onclick="addtocart(<?= $row->id ?>)">Añadir al carrito <i class="icon-shopping-cart"></i></a> <p>CLP $ <?= number_format($row->price) ?></p></h4>
					</div>
				  </div>
				</li>
				
			  <?php 
			  }
			  } ?>
				
			  </ul>	

		</div>
		</div>
	</div>
</div>

<script>
function addtocart(id){        
      if(id != ""){
        $.ajax({
          url:'<?php echo base_url(); ?>home/addtocart',
          type:'POST',
          dataType:'json',
         data:{ 
                  'id' : id 
               },

          success: function(data) {
$('.count').html(data.count);
           //location.reload();
          }
        });
      } else {
        return false;
      }
      return false;
  }
</script>


</body>
</html>