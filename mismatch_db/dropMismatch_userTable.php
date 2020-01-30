<!DOCTYPE html>
<html>
<head>
  <title>DROP mismarch_user TABLE</title>
</head>
<body>
<?php
// Set the variables for the database access:
  require_once('connectvars.php');
  
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$query = "DROP TABLE $TableName";
 
if (mysqli_query($dbc, $query)) {
 	echo "The query was successfully executed. Table dropped!<br />";
} else {
 	echo "The query could not be executed!" . mysqli_error($dbc);
} 
mysqli_close($dbc);
?>
</body>
</html>