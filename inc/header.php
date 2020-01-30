<?php
	//Function to display active link if the current page is opened
	function activePage($filename){
		$uri = $_SERVER['REQUEST_URI'];
		
		if(strpos($uri, $filename) !== false) {
			echo 'id="activePage"';
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<!--
			Author: James Chung
			Copyright: April 2015
			Purpose: A class assignment for school. Does not have a real purpose of selling or distributing of products.
			Reference: Images and content from http://www.maybelline.ca/ 
		-->
		<title><?php echo $titleName; ?></title>
		<meta charset="UTF-8" />
		<link href="css/main.css" rel="stylesheet" type="text/css" />
		<link href="css/normalize.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
		<link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
	</head>
	<body>
		<?php
			//Stores the total number of items in the cart
			$cartTotal = 0;	
			
			if(isset($_SESSION['user_id'])){
				/* Display the total items in the cart */
				require_once('inc/connectvars.php');

				//Prepare the connection vars
				$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				
				//Retrieve all the makeup products in cart																																																																																														
				$query = 'SELECT SUM(in_cart)
							FROM makeup_prods
							;';
							
				$query = "SELECT SUM(makeup_userCart.in_cart) AS in_cart
							FROM makeup_userCart
							WHERE user_id = '" . $_SESSION['user_id'] . "'";			
							
							
				//Run and store the results from the mysql commands
				$result = mysqli_query($dbc, $query);
				
				//Get and display the total cart items
				$row = mysqli_fetch_row($result);
				$cartTotal = $row[0];
				
				//Close database connection
				mysqli_close($dbc);
			}
		?>	
		
		<!-- Opening sticky for footer to stay at the bottom -->
		<div class="sticky">
			<header>
				<section id="headerBanner">
					<!-- Main logo section -->
					<div class="floatLeft">
						<a href="index.php" class="mainTitle">
							<img src="img/logos/mainLogo.png" alt="Makeup.com Logo" />
							<div>
								<h1>Makeup.com</h1>
								<p>Affordable make-up for your daily beauty.</p>
							</div>
						</a>
					</div>
					<!-- Cart, login, sign up section -->
					<div class="floatRight">
						<div class="topControls">
							<div class="loginButt">
								<?php
									/* Login button */
									if(empty($_SESSION['user_id'])){
										echo '<a href="login.php">Login</a>';
									}
									else {
										echo '<a href="logout.php">Logout <span class="username">' . $_SESSION['username'] . '</span>.</a>'; 
									}
								?>
								<a href="signup.php">Sign up</a>
							</div>
							<div id="cart">
								<a href="displayCart.php">
									<span class="glyphicon glyphicon-shopping-cart"><?php echo $cartTotal; ?></span>
								</a>
							</div>
						</div>
					</div>
				</section>
				<!-- Main nav -->
				<nav class="mainNav">
					<ul>
						<li><a href="index.php" <?php activePage('index.php'); ?>><span class="glyphicon glyphicon-home"></span>Home</a></li>
						<li><a href="products.php" <?php activePage('products'); activePage('_makeup'); activePage('brushes'); ?>>Makeup Products<span class="arrow-down"></span></a>
							<ul>
								<li><a href="eye_makeup.php">Eyes</a></li>
								<li><a href="face_makeup.php">Face</a></li>
								<li><a href="lip_makeup.php">Lips</a></li>
								<li><a href="nailPolish_makeup.php">Nail Polish</a></li>
								<li><a href="brushAndAccessories.php">Brushes &amp; Accessories</a></li>
							</ul>
						</li>
						<li><a href="videos.php" <?php activePage('videos'); ?>>Makeup Videos</a></li>
						<li><a href="aboutUs.php" <?php activePage('aboutUs'); ?>>About Us</a></li>
						<li><a href="contactUs.php" <?php activePage('contactUs'); ?>><span class="glyphicon glyphicon-envelope"></span>Contact Us</a></li>
					</ul>
				</nav>
			</header>