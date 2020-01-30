<!DOCTYPE html>
<html>
<head>
	<title>Add Makeup Products to Database Table - Admin Access Only</title>
</head>
<body>
	<h2>Add Makeup Products to Database Table</h2>
	
<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL & ~ E_NOTICE); 

	//Set the variables for database access
	require_once('../inc/connectvars.php');
	//Define application constants
	require_once('../inc/appvars.php');
	
	//Connect to the database
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	//isset - Determine if a variable is set and is not NULL
	if(isset($_POST['submit'])){
		//Grab the score data from the POST
		$prod_name = mysqli_real_escape_string($dbc, trim($_POST['prod_name']));
		$categories = mysqli_real_escape_string($dbc, trim($_POST['categories']));
		$description = mysqli_real_escape_string($dbc, trim($_POST['description']));
		$price = mysqli_real_escape_string($dbc, trim($_POST['price']));
		$rating = mysqli_real_escape_string($dbc, trim($_POST['rating']));
		$screenshot = mysqli_real_escape_string($dbc, trim($_FILES['screenshot']['name']));
		$screenshot_type = $_FILES['screenshot']['type'];
		$screenshot_size = $_FILES['screenshot']['size'];
		$inStock = mysqli_real_escape_string($dbc, trim($_POST['in_stock']));
		$catalog = mysqli_real_escape_string($dbc, trim($_POST['catalog']));
		
			//Check to see whether any of the fields have values
			if(!empty($prod_name) && !empty($categories) && !empty($description) && !empty($price) && is_numeric($price) && !empty($rating) && !empty($catalog) && is_numeric($rating) && !empty($inStock) && is_numeric($inStock) && !empty($_FILES['screenshot'])){
				
				if((($screenshot_type == 'image/gif') || ($screenshot_type == 'image/jpeg') ||
					($screenshot_type == 'image/pjpeg') || ($screenshot_type == 'image/png'))
					&& ($screenshot_size > 0) && ($screenshot_size <= MU_MAXFILESIZE)){
					if($_FILES['screenshot']['error'] == 0){
						//Move the file to the target upload folder
							//$target contains the path to the uploaded screenshot
							$target = MU_UPLOADPATH . $screenshot;
						if(move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)){
						
						//Write the data to the database 
						$query = "INSERT INTO makeup_prods (prod_name, categories, description, price, rating, screenshot, in_stock, catalog)
							VALUES('$prod_name', '$categories', '$description', '$price', '$rating', '$screenshot', '$inStock', $catalog)";
						mysqli_query($dbc, $query);
						
						//Confirm success with the user
						echo '<p>Thanks for adding your new high score!</p>';
						echo '<p><strong>Name:</strong>' . $prod_name . '<br/>';
						echo '<strong>Score:</strong>' . $score . '<br/>';
						echo '<img src="' . MU_DISPLAYPATH . $screenshot . '" alt="Score Image" /></p>';
						echo '<p><a href="guitarindex.php">&lt;&lt; Back to high scores</a></p>';
						
						//Clear the score data to clear the form
						$prod_name = "";
						$categories = "";
						$description = "";
						$price = "";
						$rating = "";
						$score = "";
						$screenshot = "";
						$inStock = "";
						$catalog = "";
						
						//Close the DB connection
						mysqli_close($dbc);
						}
					}
				}
				else {
					echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
				}
			@unlink($_FILES['screenshot']['tmp_name']); //delete the temp file
			}
			else {
				echo '<p class="error">Please enter all of the information to add your high score.</p>';
			}
	}
	
?>

		<hr/>
	<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MU_MAXFILESIZE; ?>" />
			<label for="prod_name">Product Name:</label>
				<input type="text" id="prod_name" name="prod_name" /><br />
			<label for="categories">Categories:</label>
			<select name="categories" id="categories">
				<option value="eye">Eyes</option>
				<option value="face">Face</option>
				<option value="lip">Lips</option>
				<option value="nail">Nails</option>
				<option value="brushesAndAccessories">Brushes and Accessories</option>
			</select><br />
			<label for="catalog">Catalog:</label>
			<select name="catalog" id="catalog">
				<option value="none">None</option>
				<option value="What's New">WhatsNew</option>
				<option value="Featured Products">FeaturedProducts</option>
				<option value="Popular Products">PopularProducts</option>
				<option value="Best Seller">BestSeller</option>
			</select><br />
			<label for="description">Categories:</label>
			<textarea name="description" id="description" rows="4" cols="50">Enter a description here</textarea><br />
			<label for="price">Price:</label>
				<input type="text" id="price" name="price" /><br />
			<label for="rating">Rating:</label>
				<input type="number" id="rating" name="rating" min="0" max="5"/><br />
			<label for="screenshot">Screenshot:</label>
				<input type="file" id="screenshot" name="screenshot" /><br />
			<label for="in_stock">In Stock:</label>
				<input type="number" id="in_stock" name="in_stock" min="0" /><br />
			<hr/>
		<input type="submit" value="Add" name="submit" />
	</form>
</body>
</html> 
