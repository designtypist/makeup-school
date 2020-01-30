<?php 
	//Start the session
	require_once('startsession.php');
	
	//header - containing nav, cart, login, sign up, and main logo links
	$titleName = "Contact Us - Makeup.com";	//Stores the title of the webpage
	include('inc/header.php');
?>
	
	<!-- Main content -->	
	<div id="mainContent">
		<div id="contactBanner"></div>
		<div class="contentWrapper">
			<div id="contactSect">
				<section class="contactForm">
					<h2>Contact Us</h2>
					<p>If you have any questions or concerns please feel free to use the form below to contact us.</p>
					
					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
						<fieldset>
							<legend></legend>
							<span>
								<label for="name">Name:</label>
								<input type="text" id="name" name="name" required />
							</span>
							<span>
								<label for="email">Email:</label>
								<input type="text" id="email" name="email" required />
							</span>
							<label for="message">Message:</label>
							<textarea id="message" name="message" rows="5" cols="50" maxlength="255" required></textarea>
						</fieldset>	
						<input type="submit" name="submit" value="Send"/>
					</form>
				</section>	
					
				<?php
					/* Email form */
					//Display no php error
					error_reporting(0);
					
					//Assign variable to be used for the mail()
					$from  = $_POST['email'];
					$name = $_POST['name'];
					$message = $_POST['message'];	//subject from form
					$to  = "jimjameschung@gmail.com";
					$subject = "Makeup.com - Message from " . $from;
					
					//Sanitizing the email
					$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
					if(!preg_match($email_exp,$from)) {
						$fail = 1;	//Counter to check for valid input
						$error_message .= 'The Email Address you entered does not appear to be valid. ';
					}
					
					//Sanitizing the name
					$string_exp = "/^[A-Za-z .'-]+$/";
					if(!preg_match($string_exp,$name)) {
						$fail = 1;	//Counter to check for valid input
						$error_message .= 'The name you entered does not appear to be valid. ';
					}
					
					//Sanitizing the message
					if(strlen($message) < 2) {
						$fail = 1;	//Counter to check for valid input
						$error_message .= 'The message you entered did not appear to be valid. ';
					}
					
					//Check if the mail() variables are set
					if(isset($_POST['submit']) && isset($from) && isset($name) && isset($message) && !$fail == 1){
						//If true send the mail and display a message
						mail($to, $subject, $message, 'From: ', $from);
						$successMsg = '<p class="successMsg">Message has been sent<span class="glyphicon glyphicon-ok"></span></p>';
						echo $successMsg;
					} else {
						//If not display a warning message
						if(isset($from) && isset($name) && isset($message)){
							echo '<p class="failMsg">' . $error_message . '<span class="glyphicon glyphicon-remove"></span></p>';
						} 
					}
					
				?>
				
				<section class="followUs">
					<p>Follow us and get the latest update on content from Makeup.com.</p>
					<a href="#"><img src="img/logos/fbLogo.png" alt="" /></a>
					<a href="#"><img src="img/logos/twitterLogo.png" alt="" /></a>
					<a href="#"><img src="img/logos/youtubeLogo.png" alt="" /></a>
				</section>
			</div>
		</div>
	</div>
	<div class="push"></div>
	

<?php 
	//Footer ending tags, containing social media links, sub menu links, and copyright info
	include("inc/footer.php");
?>
