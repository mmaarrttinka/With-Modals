<?php
	if(!isset($_POST['pname']) || !isset($_POST['pdesc'])){
		echo "No data passed!";
		exit();
	}

	$name = $_POST['pname'];
	$desc = $_POST['pdesc'];
	$qty = $_POST['pqty'];
	$price = $_POST['pprice'];
	var_dump($_FILES['photo']);
	if ($_FILES['photo']['error'] == 0) {
		move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$_FILES['photo']['name']);
		require("sql_connect.php");
		$photo = $_FILES['photo']['name'];
		$sql = mysqli_query($mysqli, "INSERT INTO pizza (productId, productName, productPrice, productDescription, productImage, Quantity) VALUES (NULL, '".$name."', ".$price.", '".$desc."', '".$photo."', ".$qty.")");

	if($sql){
		header("location:index.php");
	}else{
		echo "Error Inserting Data!";
		exit();
	}

	}
	
	//var_dump($_FILES);
	//echo "<br>";
	//print_r($_FILES['photo']);
	//echo "<br>";
	//echo $_FILES['photo']['name'];
?>