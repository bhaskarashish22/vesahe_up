<?php include("include/lock.php");?>
<?php include("include/connection1.php");
$id=$_GET['id'];

$ses_sql=mysql_query("select * from addcategory where id='$id'");
$row1=mysql_fetch_array($ses_sql);

$id1=$row1['id'];
$name=$row1['name'];


$del=$row1['photo'];
$myfile="uploads/collcategory/$del";
unlink($myfile);


$query = mysql_query("DELETE FROM `collcategory` WHERE `id` = '$id1'");
		if(!$query) { die(mysql_error()); }
	
	header("Location: view-collectioncategory.php"); // redirent after deleting

?>