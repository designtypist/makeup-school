<?php 
	require_once('inc/connectvars.php');

	//Prepare the connection vars
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	$currentProd = $_POST['prod_id'];
	$inCartUpdate = $_POST['inCart'];
	
	//Update the current products data from makeup_useCart
	$query = "UPDATE makeup_userCart userCart
				JOIN makeup_prods prods
				ON userCart.prod_id = prods.prod_id
				SET userCart.in_cart='$inCartUpdate'
				WHERE userCart.prod_id='$currentProd' && prods.in_stock >= $inCartUpdate";
	
	//Run and store the results from the mysql commands
	if(mysqli_query($dbc, $query)){
		echo("The query was successfully executed!<br/>");
	}
	else{
		echo("The query could not be executed!" . mysqli_error($dbc));
	}

	//Close database connection
	mysqli_close($dbc);
	
	header('Location: http://scweb.ca/~w0650451/makeupWebsite/displayCart.php');
	exit;
?>