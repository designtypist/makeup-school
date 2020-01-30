<?php 
	//Start the session
	require_once('startsession.php');
	
	//header - containing nav, cart, login, sign up, and main logo links
	$titleName = "Home - Makeup.com";	//Stores the title of the webpage
	include('inc/header.php');
?>
			
	<!-- Main content -->
	<div id="mainContent">
		<!-- Home Banner Section -->
		<section id="homeBanner">
			<div class="homeBannerInfo">
				<h2>Welcome to Makeup.com</h2>
				<p>An e-commerce site where you can buy all your affordable makeup products at a price you will be happy with.</p>
			</div>
		</section>
		<!-- Makeup Product Section -->
		<section class="productRows">
			<div class="contentWrapper">
				<h3>Featured Products</h3>
								
				<?php 
				/*************** Displays all the make-up products one by one ***************/
					
					require_once('inc/connectvars.php');

					//Prepare the connection vars
					$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
					
					//Retrieve the featured products data from makeup_prods
					$query = 'SELECT prod_id, prod_name, categories, description, price, rating, screenshot, in_stock
								FROM makeup_prods 
								WHERE catalog="Featured Product"
								LIMIT 4';
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
		</section><!-- End of Makeup Products rows section -->
		<!-- Makeup video section -->
		<div class="videoRows">
			<div class="contentWrapper">
				<h3>Featured Videos</h3>
				
				<?php 
					/*************** Displays all the videos one by one ***************/
							
					require_once('inc/connectvars.php');

					//Prepare the connection vars
					$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
					
					//Retrieve the featured products data from makeup_prods
					$query = 'SELECT video_name, description, con_creator, video_link, img_link
								FROM makeup_vids 
								WHERE featured_vids = 1
								LIMIT 3;';
					//Run and store the results from the mysql commands
					$result = mysqli_query ($dbc, $query);
					
					//Display the products info
					while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
						
						echo '<a href="' . $row['video_link'] . '" target="_blank" class="videoCon">
								<div class="vidContainer">
									<img src="' . $row['img_link'] . '" alt="Video: ' .  $row['video_name'] . '" />
								</div>
								<h4>' . $row['video_name'] . '</h4>
								<p>' . $row['description'] . '</p>
								<p>By: ' . $row['con_creator'] . '</p>
							</a>';
					}
					
					//Close database connection
					mysqli_close($dbc);	
				?>
			</div>
		</div>
		<div class="push"></div><!-- For footer to stay at the bottom -->
	</div><!-- End of Main Content -->
		
<?php 
	//Footer ending tags, containing social media links, sub menu links, and copyright info
	include("inc/footer.php");
?>
