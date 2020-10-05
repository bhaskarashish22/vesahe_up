<?php include("include/lock.php");?>
<?php include("include/connection1.php");
$id=$_GET['id'];
$query = mysql_query("DELETE FROM `invoicedetails` WHERE `id` = '$id'");
		if(!$query) { die(mysql_error()); }
	
	header("Location: user-payments.php"); // redirent after deleting

?>