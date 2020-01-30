<!DOCTYPE html>
<html>
<head>
	<title>Makeup.com Create Table</title>
</head>
<body>
	<h2>Makeup.com Create Table</h2>
	<hr/>
	
<?php
	require_once('../inc/connectvars.php');

	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	//Creating the query table
	$query = "CREATE TABLE makeup_prods (
			prod_id INT(11) PRIMARY KEY AUTO_INCREMENT,
			prod_name VARCHAR(80),
			categories VARCHAR(32),
			description VARCHAR(255),
			price DECIMAL(10,2),
			rating TINYINT(1),
			screenshot VARCHAR(255),
			in_stock INT(11) unsigned,
			in_cart INT(11) DEFAULT 0,
			catalog VARCHAR(24) DEFAULT NULL
		);";
	
	//Inform the user if the query connection and creating the table worked or not
	if(mysqli_query($dbc, $query)){
		echo("The query was successfully executed!<br/>");
	}
	else{
		echo("The query could not be executed!" . mysqli_error($dbc));
	}
	
	//close the query connection
	mysqli_close($dbc);
?>

</body>
</html> 
