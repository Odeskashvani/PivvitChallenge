<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Offering</title>
</head>
<body>

<div id="container">
	<h1>Make Purchase</h1>
	<?php echo anchor(base_url('index.php/test/purchases'), 'View Purchases', array('class'=>'purchase_list')); ?><br><br><br>
		<div class="succes">
			<?php echo $this->session->flashdata('successmsg'); ?>
		</div>
		<div class="error">
			<?php echo $this->session->flashdata('errormsg'); ?>
			<?php echo validation_errors(); ?>
		</div>
	<div id="body">
	<?php echo form_open(base_url('index.php/test') , array(
				'method' => 'post'
			));
	?>
	<select id="offering" name="offering" required="">
		<option value="">Select Offer</option>
		<?php foreach($offering as $offer){ ?>
			<option data-price="<?= $offer->price; ?>" value="<?= $offer->id; ?>"><?= $offer->title; ?></option>
		<?php } ?>
	</select><br>
	<input type="text" name="customerName" placeholder="Customer Name" required="" /><br>
	<input type="text" name="quantity" placeholder="Quantity" required="" /><br>
	<div class="price"></div><br>
	<button type="submit">Submit</button>
	<?php echo form_close(); ?>
	</div>
</div>
<script src="<?= base_url('assist/js/jquery.min.js'); ?>"></script>  
<script>
jQuery(document).ready(function(){
	jQuery('#offering').on('change',function(){
		var dataval = jQuery(this).val();
		jQuery('.price').html("Price: "+jQuery(this).find(':selected').data('price'));
	});						
});
</script>
</body>
</html>