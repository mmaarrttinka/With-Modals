<?php 
if (!isset($_GET['pid']) || isset($_GET['pid']) == "") {
	header("location:viewproducts.php");}

include ("sql_connect.php");
$sql=mysqli_query($mysqli, "DELETE FROM pizza WHERE productId=".$_GET['pid']);

if($sql){
	header("location:viewproducts.php");
}else{
	echo "Oops! Error in deleting Data!";
	echo mysqli_error($sql);
}
?>