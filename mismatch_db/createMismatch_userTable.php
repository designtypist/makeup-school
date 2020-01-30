<!DOCTYPE html>
<html>
<head>
  <title>Create mismatch_user TABLE</title>
</head>
<body>
<?php
// Set the variables for the database access:
  require_once('connectvars.php');
  
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$TableName = "mismatch_user";
$query = "CREATE TABLE $TableName (
  user_id INT AUTO_INCREMENT,
  username VARCHAR(32),
  password VARCHAR(40),
  join_date DATETIME,
  first_name VARCHAR(32),
  last_name VARCHAR(32),
  gender VARCHAR(1),
  birthdate DATE,
  city VARCHAR(32),
  state VARCHAR(2),
  picture VARCHAR(32),
  PRIMARY KEY (user_id)
)";
 
if (mysqli_query ($dbc, $query)) {
 	echo "The query was successfully executed!<br />";
} else {
 	echo "The query could not be executed!" . mysqli_error($dbc);
} 
mysqli_close($dbc);
?>
</body>
</html>