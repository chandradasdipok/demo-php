<html>
	<head>
		<title>Product List</title>
	</head>
	<body>
<?php
	$server_name = "localhost";
	$user_name = "root";
	$user_pass = "";
	
	$database_name ="bagdoomdb";
	$conn = mysqli_connect($server_name, $user_name, $user_pass);
	
	if(mysqli_connect_errno()){
		echo mysqli_connect_error();
	}
	else{
		mysqli_select_db($conn, $database_name);
		$sql_query = "select * from Product";
		$result = mysqli_query($conn, $sql_query);
		if($result == false){
			echo mysqli_error($conn);
		}
		else{
			echo "<table border ='1'>";
			echo "<caption> Products Table </caption>";
			echo "<tr>";
				echo "<th>Product ID</th><th>PRODUCT PHOTO URL</th><th>CATEGORY ID</th><th>PRODUCT NAME</th><th>PRODUCT DESCRIPTION</th><th>PRICE</th><th>SPECIAL PRICE</th><th>QUANTITY</th><th>TIMESTAMP</th>";
			echo "</tr>";
			if (mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){
					echo "<tr><td>".$row["product_id"]."</td>"."<td>".$row["product_photo_url"]."</td>"."<td>".$row["category_id"]."</td>"."<td>".$row["product_name"]."</td>"."<td>".$row["product_description"]."</td>"."<td>".$row["price"]."</td>"."<td>".$row["special_price"]."</td>"."<td>".$row["quantity"]."</td>"."<td>".$row["entry_time"]."</td></tr>";
				}
			}
			else {
				echo "<tr><td colspan='9'>0 results</td></tr>";
			}
			echo "</table>";
		}
	}
?>
	</body>
</html>