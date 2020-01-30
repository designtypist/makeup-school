<!DOCTYPE html>
<html>
<head>
	<title>Makeup.com Drop Table</title>
</head>
<body>
	<h2>Makeup.com Drop Table</h2>
	<hr/>
	
<?php
	require_once('../inc/connectvars.php');
	
	//Connect to the database
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	//Retrieve the score data from MySQL
	$query = "DROP TABLE makeup_prods";
	
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
