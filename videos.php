<?php 
	//Start the session
	require_once('startsession.php');
	
	//header - containing nav, cart, login, sign up, and main logo links
	$titleName = "Videos - Makeup.com";	//Stores the title of the webpage
	include('inc/header.php');
?>
	
	<!-- Main content -->
	<div id="mainContent">
		<section id="videoBanner">
			<h3>Makeup Videos</h3>
		</section>
		<div class="contentWrapper">
			<div class="videoRows">
				<?php 
					/*************** Displays all the videos one by one ***************/
							
					require_once('inc/connectvars.php');

					//Prepare the connection vars
					$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
					
					//Retrieve the featured products data from makeup_prods
					$query = 'SELECT video_name, description, con_creator, video_link, img_link
								FROM makeup_vids';
					//Run and store the results from the mysql commands
					$result = mysqli_query($dbc, $query);
					
					//Display the products info
					while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
						
						echo '<a href="' . $row['video_link'] . '" target="_blank">
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
	</div><!-- End of main content -->
	<div class="push"></div>
			
<?php 
	//Footer ending tags, containing social media links, sub menu links, and copyright info
	include("inc/footer.php");
?>