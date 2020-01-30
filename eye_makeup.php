<?php 
	//Start the session
	require_once('startsession.php');
	
	//header - containing nav, cart, login, sign up, and main logo links
	$titleName = "Eye Makeup - Makeup.com";	//Stores the title of the webpage
	include('inc/header.php');
?>
	
	<!-- Main content -->
	<div id="mainContent">
		<section id="productBanner">
			<h3>Eye Makeup</h3>
		</section>
		<section class="categories">
			<ul>
				<li>Categories:</li>
				<li><a href="eye_makeup.php">Eye Makeup</a></li>
				<li><a href="face_makeup.php">Face Makeup</a></li>
				<li><a href="lip_makeup.php">Lip Makeup</a></li>
				<li><a href="nailPolish_makeup.php">Nail Polish</a></li>
				<li><a href="brushAndAccessories.php">Brushes &amp; Accessories</a></li>
				<li><a href="products.php">All</a></li>
			</ul>
		</section>
		<section class="productRows">
			<div class="contentWrapper">
				<?php 
					/*************** Displays all the make-up products one by one ***************/
						
					require_once('inc/connectvars.php');

					//Prepare the connection vars
					$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
					
					//Retrieve the featured products data from makeup_prods
					$query = 'SELECT prod_id, prod_name, categories, description, price, rating, screenshot, in_stock
								FROM makeup_prods 
								WHERE categories="Eye"';
					//Run and store the results from the mysql commands
					$result = mysqli_query ($dbc, $query);
					
					//Display the products info
					while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
						
						
						echo '<article>
									<form action="addToCart.php" method="POST" class="productButt">
										<input type="text" name="prod_id" value="' . $row['prod_id'] . '" hidden/>
										<input type="submit" name="addToCart" value="Add to Cart" class="productButt" />
									</form>
									<div class="prodImg">
										<img src="img/products/' . $row['screenshot'] . '" alt="' . $row['categories'] . '" />
									</div>
									<h4>' . $row['prod_name'] . '</h4>
									<p>' . $row['description'] . '</p>
									<div class="rating">';
										
										//Displays the rating
										$ratingCounter = $row['rating'];	//stores the rating for the product
										for($i=0; $i <5; $i++){
											if($ratingCounter > 0){
												echo('<span class="glyphicon glyphicon-star active"></span>');
												//Decrease the counter by 1 once it have been used
												$ratingCounter = $ratingCounter - 1;;
											} else {
												echo('<span class="glyphicon glyphicon-star"></span>');
											}
										}
							
							echo	'</div>
									<h2>$' . $row['price'] . '</h2>
								</article>';
						
						
						$rowItem = 0;
						$rowItem ++;
						if($rowItem/4 === 0){
							echo '<hr />';
						}
					}
						
					//Close database connection
					mysqli_close($dbc);	
				?>	
			</div>
		</section>
	</div>
	<div class="push"></div>


<?php 
	//Footer ending tags, containing social media links, sub menu links, and copyright info
	include("inc/footer.php");
?>
