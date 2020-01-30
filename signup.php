

<?php 
	//Start the session
	require_once('startsession.php');
	
	//header - containing nav, cart, login, sign up, and main logo links
	$titleName = "Sign up - Makeup.com";	//Stores the title of the webpage
	include('inc/header.php');
?>
	
	<!-- Main content -->
	<div id="mainContent">
		<section id="signup">
			
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<fieldset>
					<legend>Signup</legend>
					<p>Please enter your username and desired password to sign up.</p>
					<div class="userInput">
						<label for="username">Username:</label>
						<input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br/>
						<label for="password1">Password:</label>
						<input type="password" id="password1" name="password1" /><br/>
						<label for="password2">Password (retype):</label>
						<input type="password" id="password2" name="password2" /><br/>
					</div>
				</fieldset>
				<input type="submit" value="Sign Up" name="submit" />
			</form>
			
			<?php
			  require_once('inc/connectvars.php');

			  // Connect to the database
			  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			  if (isset($_POST['submit'])) {
				// Grab the profile data from the POST
				$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
				$password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
				$password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));

				if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
				  // Make sure someone isn't already registered using this username
				  $query = "SELECT * FROM makeup_users WHERE username = '$username'";
				  $data = mysqli_query($dbc, $query);
				  if (mysqli_num_rows($data) == 0) {
					// The username is unique, so insert the data into the database
					$query = "INSERT INTO makeup_users (username, password, join_date) VALUES ('$username', SHA('$password1'), NOW())";
					mysqli_query($dbc, $query);

					// Confirm success with the user
					echo '<p class="successMsg">Your new account has been successfully created. You\'re now ready to <a href="login.php">log in</a>.</p>';
				  }
				  else {
					// An account already exists for this username, so display an error message
					echo '<p class="failMsg">An account already exists for this username. Please use a different address.
							<span class="glyphicon glyphicon-remove"></span>
						</p>';
					$username = "";
				  }
				}
				else {
				  echo '<p class="failMsg">You must enter all of the sign-up data, including the desired password twice.
							<span class="glyphicon glyphicon-remove"></span>
						</p>';
				}
			  }

			  mysqli_close($dbc);
			?>
		</section>
	</div>

<?php 
	//Footer ending tags, containing social media links, sub menu links, and copyright info
	include("inc/footer.php");
?>
