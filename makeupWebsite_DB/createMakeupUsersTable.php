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
	$query = "CREATE TABLE makeup_users (
			user_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
			email varchar(60) NOT NULL,
			password varchar(40) NOT NULL,
			first_name varchar(32) DEFAULT NULL,
			last_name varchar(32) DEFAULT NULL,
			join_date datetime DEFAULT NULL,
			city varchar(32) DEFAULT NULL,
			province varchar(2) DEFAULT NULL,
			postal_code varchar(6) DEFAULT NULL,
			country varchar(32) DEFAULT NULL,
			phone varchar(12) DEFAULT NULL
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
