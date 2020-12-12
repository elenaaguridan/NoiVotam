<?php

function renderForm($item,$quantity,$error)
{
?>

<html>
<head>
<title><New Record</title>
</head>
<?php
if ($error !='')
{
echo '<div style="padding:4x; border:1px solid red; color:red;">'.$error.'</div'
}
?>

<form action=""method="post">
<div>
<strong>Item: *</strong><input type="text" name="item" value="<?php echo $item; ?>" /><br/>
<strong>Quantity: *</strong><input type="text" name="quantity" value="<?php echo $quantity; ?>" />"<br/>
<p>* required</p>
<input type="submit" name="submit" value="submit">
</div>
	</form>
	</body>
</html>
<?php
}

include ('connect.php');

if (isset($_POST('submit')))
{
	$item=mysql_real_escape_string (htmlspecialchars ($_POST['item']));
	$quantity=mysql_real_escape_string (htmlspecialchars ($_POST['quantity']));
	
	if ($item =='' || $quantity =='')
	{
		$error = 'Error: Please fill in all required fields!';
	renderForm ($item,$quantity,$error);
}
else
{
	mysql_query ("INSERT whishlist SET item='$item', quantity='$quantity'")
	or die (mysql_error());
	
	header ("Localtion view.php");
}
}
elese
{
	renderForm('','','');
}

