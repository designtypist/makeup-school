<?php 
	//Start the session
	require_once('startsession.php');
	
	//header - containing nav, cart, login, sign up, and main logo links
	$titleName = "Cart - Makeup.com";	//Stores the title of the webpage
	include('inc/header.php');
?>

	<!-- Main content -->
	<div id="mainContent">	
		<div class="contentWrapper">
			<div class="cartDisplay">
				<h2>Shopping Cart</h2>
				
				<?php
				
					if(isset($_SESSION['user_id'])){
						require_once('inc/connectvars.php');
						
						//Connect to the database
						$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
						
						//Retrieve the score data from MySQL
						/*$query = "SELECT users.prod_id AS prod_id, prods.prod_name, prods.categories, prods.price, prods.in_stock, users.in_cart AS in_cart
									FROM makeup_users AS users
									INNER JOIN makeup_prods AS prods ON users.prod_id = prods.prod_id
									WHERE users.in_cart >0 && users.user_id = '" . $_SESSION['user_id'] . "'";
						*/
						
						$query = "SELECT userCart.user_id, userCart.prod_id AS userCart, prods.prod_name, prods.categories, prods.price AS price, prods.in_stock, userCart.in_cart AS in_cart
									FROM makeup_userCart AS userCart
									INNER JOIN makeup_users AS user ON userCart.user_id = user.user_id
									INNER JOIN makeup_prods AS prods ON userCart.prod_id = prods.prod_id
									WHERE userCart.in_cart > 0 && userCart.user_id = '" . $_SESSION['user_id'] . "'";
						
						$result = mysqli_query ($dbc, $query);
						
						//Setting the running total for items in cart as 0
						$total = 0;
						
						//Create a table
						print("<table>");
							print("<tr>");
								print("<th>Product Name</th>");
								print("<th>Categories</th>");
								print("<th>In Stock</th>");
								print("<th>In Cart</th>");
								print("<th>Price</th>");
							print("</tr>");
						
						//Loop through the array of score data, formatting it as HTML
						
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
							//Stores the total cost of everything in the cart
							$total = $total + ($row['price']*$row['in_cart']);
							//Display the shopping cart
							print("<tr>");
								print("<td>$row[prod_name]</td>");
								print("<td>$row[categories]</td>");
								print("<td>$row[in_stock]</td>");
								echo('<td>
										<form action="updateCart.php" method="POST" id="buyButt" class="productButt">
											<input type="text" name="inCart" value="' . $row['in_cart'] . '" size="1" maxlength="3" />
											<input type="text" name="prod_id" value="' . $row['userCart'] . '" hidden/>
											<input type="submit" name="addToCart" value="Update Cart" />
										</form>
									</td>');
								print("<td>$$row[price]</td>");
							print("</tr>");
						}
						echo '<tr class="totalCart">
									<td colspan="4">Order Total:</td>
									<td>$' .  $total  . '</td>
								</tr>
								<tr class="checkout">
									<td colspan="5"><button id="checkout">Check out Cart</button></td>
								</tr>
						</table>';
						
						//Close the DB connection
						mysqli_close($dbc);
					} 
					else {
						echo '<p>Sorry you are not logged in. Please <a href="login.php">login</a> to add items to your cart.</p>';
						
					}
				?>
			</div>
		</div>
		<div class="push"></div><!-- For footer to stay at the bottom -->
	</div><!-- End of Main Content -->

	<!-- Shopping cart window - hidden -->
	<div id="shoppingCart" title="Shopping Cart">
		<p>Are you sure you want to confirm your order?</p>
		<h4>Your total adds up to <span>$<?php echo $total; ?></span>.</h4>
	</div>
		
			
<?php 
	//Footer ending tags, containing social media links, sub menu links, and copyright info
	include("inc/footer.php");
?>
