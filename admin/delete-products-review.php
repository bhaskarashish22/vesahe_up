<?php include("include/lock.php");?>
<?php 
$id=$_GET['id'];

$query = mysql_query("DELETE FROM `listrating` WHERE `id` = '$id'");
		if(!$query) { die(mysql_error()); }
	
	header("Location: product-review.php"); // redirent after deleting

?>