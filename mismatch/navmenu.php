<?php
//Generate the navigation menu
echo '<hr />';
if(isset($_SESSION['username'])){
	echo '<a href="mismatch_index.php">Home</a> &#10084; ';
	echo '<a href="viewprofile.php">View Profile</a> &#10084; ';
	echo '<a href="editprofile.php">Edit Profile</a> &#10084; ';
	echo '<a href="logout">Log Out<span style="color:red;">('.$_SESSION['username'].')</span></a>';
}
else{
	echo '<a href="login.php">Log In</a> &#10084; ';
	echo '<a href="signup.php">Sign Up</a>';
}
echo '<hr />';
?>