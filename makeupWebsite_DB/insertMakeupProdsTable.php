<!DOCTYPE html>
<html>
<head>
	<title>Makeup.com Insert Table</title>
</head>
<body>
	<h2>Makeup.com Insert Table</h2>
	<hr/>
	
<?php
	require_once('../inc/connectvars.php');
	
	//Connect to the database
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	//Retrieve the score data from MySQL
	$query = "INSERT INTO `makeup_prods` (`prod_name`, `categories`, `description`, `price`, `rating`, `screenshot`, `in_stock`, `in_cart`) VALUES
				('Fit Me Pressed Powder', 'Face', 'Pressed powder that goes beyond matching to a fresh, natural finish.', '25.00', 4, '../img/products/faceProduct1.png', 4, 0),
				('Fit Me Hydrate + Smooth Foundation', 'Face', 'Flawless. Lets the real you come through. Fresh, breathing, natural skin.', '15.00', 3, NULL, 2, 0);";
	
	//Check to see if the query ran
	if(mysqli_query($dbc, $query)){
		echo("The query was successfully executed!<br/>");
	}
	else{
		echo("The query could not be executed!" . mysqli_error($dbc));
	}
	
	mysqli_close($dbc);
?>

</body>
</html> 
