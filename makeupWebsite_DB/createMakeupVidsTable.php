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
	$query = "CREATE TABLE makeup_vids (
			video_id INT(11) PRIMARY KEY AUTO_INCREMENT,
			video_name VARCHAR(64),
			description VARCHAR(255),
			con_creator VARCHAR(64),
			video_link VARCHAR(255),
			img_link VARCHAR(255),
			featured_vids TINYINT(1) DEFAULT 0
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
