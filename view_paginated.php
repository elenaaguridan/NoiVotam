<html>
<head>
	<title>View Records</title>
</head>
<body>
	
<?php
include ('connect.php');
$per_page=3;
$result = mysql_query ("SELECT * FROM whishlist");
$total_results = mysql_num_rows ($result);
$total_pages = ceil ($total_results / $per_page);
	

if (isset ($_GET['page'])&& is_numeric ($_GET['page']))
{
	$show_page= $_GET['page'];
	if($show_page > 0 && $show_page <=$total_pages)
	{
		$start=($show_page-1)* $per_page;
		$end=$start+$per_page;
	}
	else
	{
		$start=0;
		$end=$per_page;
	}

echo "<p><a href='view.php'>View All</a> | <b><View Page:</b>";
for ($i=1; $i<=$total_pages; $i++)
{
	echo "<a href='view_paginated.php?page=$i'>$i</a>";
}
echo "</p>";
	
echo "<table border = '1' cellpadding = '10'>";
echo "<tr> <th><ID</th> <th>Item</th> <th>Quantity</th> <th></th> </tr>";
	
for ($i=$start; $i<$end; $i++)
{
	if($i==$total_results) {break;}
	
	echo "<tr>";
	echo '<td>'.mysql_result($result,$i,'id').'</td>';
	echo '<td>'.mysql_result($result,$i,'item').'</td>';
	echo '<td>'.mysql_result($result,$i,'quantity').'</td>';
	echo '<td><a href="edit.php?id='.mysql_result($result,$i,'id').'">Edit</a></td>';
	echo '<td><a href="delete.php?id='.mysql_result($result,$i,'id').'">Delete</a></td>';
	echo "</tr>";
}

echo "</table>";
}

?>
<p><a href="add.php">Add a new record</a></p>

	</body>
</html>

}


