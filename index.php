<?php
include("sql_connect.php");
?>
<html>
<head>
	<title>Samsung Phones</title>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
</head>
<body>
<?php include("navbar.php"); ?>
<h2 class='text-center'>Hardware List</h2>
<div class='row'>
	<div class='col-sm-10 col-sm-offset-1'>
		<table class='table table-bordered'>
			<th>ID</th>
			<th>Hardware Item</th>
			<th>Option</th>
			<?php 

			$result = mysqli_query($mysqli, "SELECT * FROM pizza");

			$names=array();
			if($result){
				$index = 0;
				while($row = mysqli_fetch_array($result)){
					$names[] = $row[1];
					$desc[] = $row[3];
					$price[] = $row[2];
					$Quantity[] = $row[5];
					$images[] = $row[4];
					echo "<tr>";
					echo "<td>".$row[0]."</td>";
					echo "<td>".$row[1]."</td>";
					echo "<td>";
					echo "<button class='btn btn-sm btn-primary' alt='".$index++."'>
							<span class='glyphicon glyphicon-eye-open'></span>
						 </button>";
					echo "<a href='edit.php?pid=".$row[0]."'><button class='btn btn-sm btn-warning'>
							<span class='glyphicon glyphicon-pencil'></span>
						 </button></a>";
					echo "<a href='delete.php?pid=".$row[0]."' class='check'><button class='btn btn-sm btn-danger'>
							<span class='glyphicon glyphicon-remove'></span>
						 </button></a>";	 	 
					echo "</td>";
					echo "</tr>";
				}
			}

			?>
		</table>
	</div>
</div>

	<div class='modal fade myModal' tab-index='-1' role='dialog' aria-labelledby='myModal'>
		<div class='modal-dialog modal-md' role='document'>
			<div class='modal-content'>
				<p><strong>Name: </strong><span class='mod_name'></span></p>
				<p><strong>Quantity: </strong><span class='mod_name1'></span></p>
				<p><strong>Price: </strong><span class='mod_name2'></span></p>
				<p><strong>Description: </strong><span class='mod_name3'></span></p>
				<p><strong>Image: </strong><span class='mod_name4'><img src="images/" id='img'></span></p>
			</div>
		</div>
	</div>
</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>
<script>
	var names = [<?php echo "'".join("','",$names)."'";?>];
	var Quantity = [<?php echo join(",",$Quantity);?>];
	var desc = [<?php echo "'".join("','", $desc)."'";?>];
	var price = [<?php echo join(",",$price);?>];
	var images = [<?php echo "'".join("','", $images)."'";?>];
	$(document).ready(function(){
		$(".check").on("click", function(){
			return confirm("Are you sure?");
		});

		$(".btn-primary").on("click", function(){
			var i = $(this).attr("alt");
			var productName = names[i];
			var productQty = Quantity[i];
			var productPrice = price[i];
			var productDesc = desc[i];
			var image = images[i];
			$(".mod_name").text(productName);
			$(".mod_name1").text(productQty);
			$(".mod_name2").text(productPrice);
			$(".mod_name3").text(productDesc);
			$("#img").attr("src", "images/"+image);
			$(".modal").modal("show");
		})
	});
	//alert(names[2]);
</script>