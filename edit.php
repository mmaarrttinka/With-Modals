<?php 
	if(!isset($_GET['pid'])){
		header("location:index.php");
		exit();
	}

	require("sql_connect.php");
	$res = mysqli_query($mysqli, "SELECT * FROM pizza WHERE productId =".$_GET['pid']);

	$data = mysqli_fetch_row($res);
?>

<html>
<head>
	<title>Edit Product</title>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
</head>
<body>
<?php include("navbar.php"); ?>
<h2 class='text-center'>Update Product</h2>
<div class='row'>
	<div class='col-sm-6 col-sm-offset-3'>
		<div class='panel panel-primary'>
			<div class='panel-heading'>
				<h3 class='panel-title'>Change <?php echo $data[1]; ?> Product</h3>
			</div>
		</div>
		<div class='panel-body'>
			<form method='POST' action='updateProduct.php' enctype='multipart/form-data'>
				<input type='text' value='<?php echo $data[0];?>' name='pid' class='form-control hide' >
				<input type='text' value='<?php echo $data[1]; ?>' name='pname' class='form-control' placeholder='Product Name'>
				<input type='text' value='<?php echo $data[3]; ?>' name='pdesc' class='form-control' placeholder='Description'>
				<input type='text' value='<?php echo $data[5]; ?>' name='pqty' class='form-control' placeholder='Quantity'>
				<input type='text' value='<?php echo $data[2]; ?>' name='pprice' class='form-control' placeholder='Price'>
				<p class='text-center'>
					<img src="images/<?php echo $data[4] ?>" style='width:40%' >
				</p>
				<input type='file' name='photo' class='form-control'>
				<button class='btn btn-success pull-right'>Submit</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>