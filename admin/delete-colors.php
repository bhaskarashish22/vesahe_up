<?php include("include/lock.php");?>
<?php include("include/connection1.php");
$id=$_GET['id'];

$query = mysql_query("DELETE FROM `colorscategory` WHERE `id` = '$id'");

		if(!$query) { die(mysql_error()); }
	
	header("Location: view-colors.php"); // redirent after deleting

?>