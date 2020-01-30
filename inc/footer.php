		</div><!-- End of sticky - for footer to stay at the bottom -->	
			
		<footer>
			<!-- Footer links -->
			<div class="mainFooterCon">
				<!-- Social Media links -->
				<section class="socMedia">
					<h5>Follow Us:</h5>
					<a href="#"><img src="img/logos/fbLogo.png" alt="" /></a>
					<a href="#"><img src="img/logos/twitterLogo.png" alt="" /></a>
					<a href="#"><img src="img/logos/youtubeLogo.png" alt="" /></a>
				</section>
				<!-- Sub menu links -->
				<section class="footerLinks">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="products.php">Makeup Products</a></li>
						<li><a href="videos.php">Makeup Videos</a></li>
						<li><a href="aboutUs.php">About Us</a></li>
						<li><a href="contactUs.php">Contact Us</a></li>
					</ul>
				</section>
			</div>
			<!-- Copyright information -->
			<p>&copy; Copyright April 2015 by James Chung with images and content from <a href="http://www.maybelline.ca" target="_blank">http://www.maybelline.ca/</a></p>
		</footer>

		<!-- Scripts -->
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script>
			$( "#checkout" ).click(function() {
				$( "#shoppingCart" ).dialog({
				  modal: true,
				  minWidth: 450,
				  buttons: {
					"Confirm" : function() {
					  $( this ).dialog( "close" );
					},
					"Cancel" : function() {
					  $( this ).dialog( "close" );
					}
				  }
				})
			});
		</script>
	</body>
</html>