<?php
function renderForm($id,$item,$quantity,$error)
{
?>

<html>
<head>
<title>Edit Record</title>
</head>
<body>
<?php
	
if($error !='')
{
	echo '<div style="padding:4x; border:1px solid red; color:red;">'.$error.'</div'
}
?>
<form action=""method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>
<div>
	<p><strong>ID:</strong><?php echo $id; ?></p>
<strong>Item: *</strong><input type="text" name="item" value="<?php echo $item; ?>" /><br/>
<strong>Quantity: *</strong><input type="text" name="quantity" value="<?php echo $quantity; ?>" />"<br/>
<p>* Required</p>
<input type="submit" name="submit" value="submit">
</div>
	</form>
	</body>
</html>
<?php
}

include('connect.php');
if(isset($_POST['submit']))
{
	if(is_numeric($_POST['id']))
$id=$_POST['id'];
$item=mysql_real_escape_string (htmlspecialchars ($_POST['item']));
$quantity=mysql_real_escape_string (htmlspecialchars ($_POST['quantity']));
if($item==''|| $quantity=='')
{
	$error='ERROR: Please fill in all required fields!';
	
	renderForm($id,$item,$quantity,$error);
}
else
{
	mysql_query("UPDATE whishlist SET item='$item',quantity='$quantity' WHERE id='$id'") or die(mysql_error());
header ("Location: view.php");
}
}
else
{
	echo 'Error!';
}
}
else
{
	if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id']>0)
	{
		$id=$_GET['id'];
		$result=mysql_query("SELECT *FROM whishlist WHERE id=$id")
		or die (mysql_error());
		$row=mysql_fetch_array($result);
		
if($row)
{
	$item=$row['item'];
	$quantity=$row['quantity'];
renderForm($id,$item,$quantity,'');
}
else
{
	echo "No results!";
}
	}
	
else
{
	echo 'Error!';
}
}
?>