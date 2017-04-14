<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Purchase List</title>
</head>
<body>

<div id="container">
	<h1>Purchase List</h1>
	<?php echo anchor(base_url('index.php/test'), 'Make Purchase', array('class'=>'purchase')); ?><br><br>
	<table>
		<tr>
			<td>No.</td>
			<td>Customer Name</td>
			<td>Quantity</td>
		</tr>
		<?php $i = 1;
		foreach($purchases as $purchase){ ?>
			<tr>
				<td><?= $i; ?></td>
				<td><?= $purchase->customerName; ?></td>
				<td><?= $purchase->quantity; ?></td>
			</tr>		
		<?php
		$i++;
		} ?>
	</table>
</div>

</body>
</html>