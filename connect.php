<?php

$server='localhost';
$user='root';
$pass='';
$db='shop';

$db=new mysqli($server,$user,$pass,$db)
or die ("Could not connect to database...\n" .mysql_error());
?>
