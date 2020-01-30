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
	
	//Connect to the database
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	//isset - Determine if a variable is set and is not NULL
	if(isset($_POST['submit'])){
		//Grab the score data from the POST
		$video_name = mysqli_real_escape_string($dbc, trim($_POST['video_name']));
		$description = mysqli_real_escape_string($dbc, trim($_POST['description']));
		$con_creator = mysqli_real_escape_string($dbc, trim($_POST['con_creator']));
		$video_link = mysqli_real_escape_string($dbc, trim($_POST['video_link']));
		$img_link = mysqli_real_escape_string($dbc, trim($_POST['img_link']));
		
			echo $video_name . " " . $description . " " . $con_creator . " " . $video_link . " " . $img_link;
		//Check to see whether any of the fields have values
		if(!empty($video_name) && !empty($description) && !empty($con_creator) && !empty($video_link) && !empty($img_link)){

				//Write the data to the database 
				$query = "INSERT INTO makeup_vids (video_name, description, con_creator, video_link, img_link)
					VALUES('$video_name', '$description', '$con_creator', '$video_link', '$img_link')";
				
				mysqli_query($dbc, $query);
				
				//Confirm success with the user
				echo '<p>Thanks for adding your new video!</p>';
				echo '<p><strong>Video Name:</strong>' . $video_name . '<br/>';
				echo '<strong>Description:</strong>' . $description . '<br/>';
				echo '<strong>Name of Content Creator:</strong>'. $con_creator . '<br/>';
				echo '<strong>Video Link:</strong>'. $video_link . '<br/>';
				echo '<strong>Image Link:</strong>'. $img_link . '<br/>';
				echo '<p><a href="guitarindex.php">&lt;&lt; Back to high scores</a></p>';
				
				//Clear the score data to clear the form
				$video_name = "";
				$description = "";
				$con_creator = "";
				$video_link = "";
				$img_link = "";

			//Close the DB connection
			mysqli_close($dbc);
		}
		else {
			echo '<p class="error">Sorry, there was a problem uploading.</p>';
		}
	}
	
?>

		<hr/>
	<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="video_name">Video Name:</label>
			<input type="text" id="video_name" name="video_name" /><br />
		<label for="description">Description:</label>
			<textarea name="description" id="description" rows="4" cols="50"></textarea><br />
		<label for="con_creator">Name of Content Creator:</label>
			<input type="text" id="con_creator" name="con_creator" /><br />
		<label for="video_link">Video Link:</label>
			<input type="text" id="video_link" name="video_link" min="0" max="5"/><br />
		<label for="img_link">Image Link:</label>
			<input type="text" id="img_link" name="img_link" /><br />
		<hr/>
		<input type="submit" value="Add" name="submit" />
	</form>
</body>
</html> 
