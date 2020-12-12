<html>
<head>
	<title>View Records</title>
</head>
<body>
	
<?php
include ('connect.php');
	
$result = mysql_query ("SELECT * FROM products")
or die(mysql_error());

echo "<p><b>View All</b> | <a href=''view_paginated.php?page-1>View Paginated</a></p>";
echo "<table border = '1' cellpadding = '10'>";
echo "<tr> <th><ID</th> <th>Item</th> <th>Quantity</th> <th></th> </tr>";
	
while($row=mysql_fetch_array($result)) {
	echo "<tr>";
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["name"].'</td>';
	echo '<td>'.$row["picture"].'</td>';
	echo '<td><a href="edit.php?id='.$row["id"].'">Edit</a></td>';
	echo '<td><a href="delete.php?id='.$row["id"].'">Delete</a></td>';
	echo "</tr>";
}

echo "</table>";
?>
	<p><a href= "add.php">Add a new record</a></p>
	
	</body>
</html>