<?php 
if (!isset($_POST['pid'])) {
	header('location:index.php');
	exit();
}

	$name=$_POST['pname'];
	$desc=$_POST['pdesc'];
	$qty=$_POST['pqty'];
	$price=$_POST['pprice'];

if ($_FILES['photo']['tmp_name']=="") {
	

	require("sql_connect.php");

	$sql = mysqli_query($mysqli, "UPDATE pizza SET productPrice = ".$price.", productName = '".$name."', productDescription = '".$desc."', Quantity = ".$qty." WHERE productId =".$_POST['pid']);

	if($sql){
		header("location:index.php");
	}else{
		exit();
	}

}else{

	move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$_FILES['photo']['name']);

	require("sql_connect.php");

	$sql = mysqli_query($mysqli, "UPDATE pizza SET productPrice = ".$price.", productName = '".$name."', productDescription = '".$desc."', Quantity = ".$qty.", productImage = '".$_FILES['photo']['name']."' WHERE productId =".$_POST['pid']);

	if($sql){
		header("location:index.php");
	}else{
		exit();
	}
}

?>