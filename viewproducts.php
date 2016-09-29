<?php
include("sql_connect.php");
if (isset($_GET['pid'])) {
	$res = mysqli_query($mysqli, "SELECT * FROM pizza WHERE productId = ".$_GET['pid']);

	$product = mysqli_fetch_row($res);
}else{
	header("location:index.php");
}
?>
<html>
<head>
	<title>Samsung Phones</title>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
</head>
<body>
<?php include("navbar.php"); ?>
<h2 class='text-center'>View Products</h2>
<div class='row'>
	<div class='col-sm-10 col-sm-offset-1'>
		<h3 class='text-center'>
			<?php echo $product[0];?>
		</h3>
		<p class='text-center'>Name: <?php echo $product[1];?></p>
		<p class='text-center'>Price: <?php echo $product[2];?></p>
		<p class='text-center'>Description: <?php echo $product[3]?></p>
		<p class='text-center'>Quantity: <?php echo $product[5];?></p>
		<p class='text-center'>
			<img src="images/<?php echo $product[4]; ?>" class='img-tumbnail'>
		</p>
	</div>
</div>

</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>