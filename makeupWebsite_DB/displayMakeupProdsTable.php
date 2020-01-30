<!DOCTYPE html>
<html>
<head>
	<title>Makeup.com Display Table</title>
</head>
<body>
	<h2>Makeup.com Display Table</h2>
	<hr/>
	
<?php
	require_once('../inc/connectvars.php');
	
	//Connect to the database
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	//Retrieve the score data from MySQL
	$query = "SELECT * from makeup_prods";
	$result = mysqli_query ($dbc, $query);
	
	//Create a table
	print("<h2 style=\"text-align: center\">Makeup.com Table</h2>");
	print("<table border=\"1\" width\"75%\" cellspacing\"2\" cellpadding\"2\" align=\"center\">");
	print("<tr align=\"center\" valign=\"top\">");
	print("<td align=\"center\" valign=\"top\"><b>prod_id</b></td>");
	print("<td align=\"center\" valign=\"top\"><b>prod_name</b></td>");
	print("<td align=\"center\" valign=\"top\"><b>categories</b></td>");
	print("<td align=\"center\" valign=\"top\"><b>description</b></td>");
	print("<td align=\"center\" valign=\"top\"><b>price</b></td>");
	print("<td align=\"center\" valign=\"top\"><b>rating</b></td>");
	print("<td align=\"center\" valign=\"top\"><b>img_link</b></td>");
	print("<td align=\"center\" valign=\"top\"><b>in_stock</b></td>");
	print("<td align=\"center\" valign=\"top\"><b>in_cart</b></td>");
	print("</tr>");
	
	
	
	//Loop through the array of score data, formatting it as HTML
	
	while($Row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		//Display the score data
		print("<tr align=\"center\" valign=\"top\">");
		print("<td align=\"center\" valign=\"top\">$Row[prod_id]</td>");
		print("<td align=\"center\" valign=\"top\">$Row[prod_name]</td>");
		print("<td align=\"center\" valign=\"top\">$Row[categories]</td>");
		print("<td align=\"center\" valign=\"top\">$Row[description]</td>");
		print("<td align=\"center\" valign=\"top\">$Row[price]</td>");
		print("<td align=\"center\" valign=\"top\">$Row[rating]</td>");
		print("<td align=\"center\" valign=\"top\">$Row[img_link]</td>");
		print("<td align=\"center\" valign=\"top\">$Row[in_stock]</td>");
		print("<td align=\"center\" valign=\"top\">$Row[in_cart]</td>");
		print("</tr>");
		}
		
	echo'</table>';
		
	mysqli_close($dbc);
	
	$currentDate = date("l F j,Y");
	print("<br /><p style=\"text-align: center\"><em>James Chung
	&nbsp;&nbsp;&nbsp;Date: $currentDate </em></p>");
?>

</body>
</html> 
