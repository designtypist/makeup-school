<?php 
	//Start the session
	require_once('startsession.php');
	
	//Connecti on DB variables
	require_once('inc/connectvars.php');

	//Prepare the connection vars
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	//Stores the current clicked item
	$currentProd = $_POST['prod_id'];
	//$_SESSION['user_id'];
	
	//Query to select the current clicked item to check the amount 
	$querySelect = "SELECT DISTINCT in_cart 
					FROM makeup_userCart
					WHERE user_id = '" . $_SESSION['user_id'] . "' && prod_id = '" . $currentProd . "'
					LIMIT 1";
	$queryCartItems = mysqli_query($dbc, $querySelect);
	
	
	//Stores the total amount of items of this type in the cart (ie. How much eye liner are in the cart?)
	$cartItem = mysqli_fetch_row($queryCartItems);
	
	echo 'cartitem ' . $cartItem[0] . ' ';
	
	//if the current product that is added to the cart hasn't been added then 
	if(!isset($cartItem[0])){
		//Insert into the makeup_userCart into the database
		$queryInsert = "INSERT INTO makeup_userCart (user_id, prod_id, in_cart) 
			VALUES ('" . $_SESSION['user_id'] . "', '" . $currentProd . "', 1)";
		
		//Run and store the results from the mysql commands
		if(mysqli_query($dbc, $queryInsert)){
			echo("The query was successfully executed! 2<br/>");
		}
		else{
			echo("The query could not be executed!" . mysqli_error($dbc));
		}
	}
	//if the current product is already in the system just add 1 
	else {
		//Update the current item by adding 1
		
		$queryUpdate = "UPDATE makeup_userCart userCart
						JOIN makeup_prods prods ON userCart.prod_id = prods.prod_id
						SET userCart.in_cart = userCart.in_cart + 1
						WHERE userCart.user_id = '" . $_SESSION['user_id'] . "' AND userCart.prod_id = '" . $currentProd . "' AND prods.in_stock > userCart.in_cart"; 			
		
				
		if(mysqli_query($dbc, $queryUpdate)){
			echo("The query was successfully executed! 2<br/>");
		}
		else{
			echo("The query could not be executed!" . mysqli_error($dbc));
		}
	}	
		
	//Close database connection
	mysqli_close($dbc);
	
	header('Location: http://scweb.ca/~w0650451/makeupWebsite/displayCart.php');
	exit;
?>