<!DOCTYPE html>
<html>
<head>
	<title>Guitar Wars - High Scores Administration</title>
	<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>
	<h2>Guitar Wars - High Scores Administration</h2>
	<p>Below is a list of all Guitar Wars high scores. Use this page to remove scores as needed.</p>
	<hr/>
	
<?php
	// User name and password for authentication
	$username = 'rock';
	$password = 'roll';
	
		if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER']  !=  $username)  ||
			($_SERVER['PHP_AUTH_PW']  !=  $password)){
		   
			// The user name/password are incorrect so send the authentication headers
			header('HTTP/1.1 401 Unauthorized');
			header('WWW-Authenticate: Basic realm="Guitar Wars"');
			exit('<h2>Guitar Wars</h2>Sorry, you must enter a valid user name and password to access this page.');
			//exit() occurs when Cancel is pressed
		   }

?>

</body>
</html> 
