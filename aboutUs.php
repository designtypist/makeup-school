<?php 
	//Start the session
	require_once('startsession.php');
	
	//header - containing nav, cart, login, sign up, and main logo links
	$titleName = "About Us - Makeup.com";	//Stores the title of the webpage
	include('inc/header.php');
?>
	
	<!-- Main content -->
	<div id="mainContent">
		<section id="aboutBanner"></section>
		<section id="aboutSect">
			<div class="contentWrapper">
				<h2>About Us</h2>
				<p>Makeup.com is an e-commerce website that sells and advertises popular makeup products. We also showcase a list of makeup videos to help educate customers 
				like you on how to properly apply makeup and give expert advice on tips and tricks. The goal is to help our customers gain awareness and knowledge about the 
				products we are selling and give them all the tools they need to look beautiful. Makeup.com has a wide variety of makeup categories ranging from eye makeup to 
				brushes and accessories with affordable choices so you don't have to worry about the price rather looking beautiful everyday.</p>
			</div>
		</section>
	</div>
	<div class="push"></div>

<?php 
	//Footer ending tags, containing social media links, sub menu links, and copyright info
	include("inc/footer.php");
?>
