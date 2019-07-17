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
    <title>Electrónica Retro.cl: Carrito de compras</title>
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
		<li class="active"> Carrito </li>
    </ul>
	<h3>  Carrito <br/> [ <small><span class="count"><?= $this->cart->total_items() ?></span> Producto(s) </small>]<br/><a href="<?php echo base_url('home');?>" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Volver al catálogo </a></h3>	
	<hr class="soft"/>
	
			
	<table class="table table-bordered "border: 3px solid gray !important; id="mytable">
              <thead> 
                <tr>
                  <th>Producto</th>
                  <th colspan="2">Detalle</th>
                  <th>Cantidad</th>
				  <th colspan="2">Precio</th>                  
                  <th>Subtotal</th>
				</tr>
              </thead>
              <tbody>
			  
			<?php
            $grand_total = 0;
			if(!empty($cart_data)){
				foreach ($cart_data as $data) {
			$total = ($data['price']*$data['qty']);		
			$grand_total += $total;		
					?>  
                <tr>
                  <td> <img width="60" src="<?= $data['image'] ?>" alt=""/></td>
                  <td colspan="2"><?= $data['name'] ?><br/><?= $data['description'] ?></td>
				  <td>
					<div class="input-append">
					<input class="span1" style="max-width:30px;text-align: center" readonly="true" placeholder="1" id="appendedInputButtons<?= $data['id'] ?>" size="25" type="text" value="<?= $data['qty'] ?>">&nbsp;&nbsp;
          <a href="javascript:void(0)" class="btn btn-danger" onclick="remove_cart_product('<?= $data['rowid'] ?>')"><i class="icon-remove icon-white"></i></a>
          <a class="btn" href="javascript:void(0)" onclick="addtocart(<?= $data['id'] ?>)"><i class="icon-plus"></i></a>
          <a class="btn" href="javascript:void(0)" onclick="reducecart('<?= $data['rowid']?>',<?= $data['qty'] ?>)"><i class="icon-minus"></i></a>

									</div>
				  </td>
                  <td colspan="2">$<?= number_format($data['price']) ?></td>                 
                  <td>$<?= number_format($total) ?></td>
                </tr>

			<?php  } 
			       } ?>
	
				 <tr>
                  <td colspan="6" style="text-align:right"><strong>TOTAL CLP$ =</strong></td>
                  <td class="label label-important" style="display:block"> <strong> <?= number_format($grand_total) ?> </strong></td>
                </tr>
				</tbody>
            </table>
		
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
location.reload();
          }
        });
      } else {
        return false;
      }
      return false;
  }
  
function reducecart(row,qty){ 
     
      if(qty != ""){
        $.ajax({
          url:'<?php echo base_url(); ?>home/reducecart',
          type:'POST',
          dataType:'json',
         data:{ 
                  'row' : row, 
                  'qty' : qty, 
               },

          success: function(data) {
location.reload();
          }
        });
      } else {
        return false;
      }
      return false;
  }  
    
  
function remove_cart_product(row){        
      if(row != ""){
        $.ajax({
          url:'<?php echo base_url(); ?>home/remove_cart_product',
          type:'POST',
          dataType:'json',
         data:{ 
                  'row' : row 
               },

          success: function(data) {
location.reload();
          }
        });
      } else {
        return false;
      }
      return false;
  }  
  
</script>		

	
	
</div>
</div></div>
</div>

</body>
</html>