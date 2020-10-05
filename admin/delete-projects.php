<?php include("include/lock.php");?>
<?php 
$id=$_GET['id'];

$ses_sql=mysql_query("select * from projectpages where id='$id'");

$row1=mysql_fetch_array($ses_sql);

$id1=$row1['id'];
$del=$row1['photo'];
$myfile="uploads/projects/$del";
$myfile2="uploads/projects-thum/$del";
unlink($myfile);
unlink($myfile2);

$query = mysql_query("DELETE FROM `projectpages` WHERE `id` = '$id1'");
		if(!$query) { die(mysql_error()); }
	
	header("Location: view-projects.php"); // redirent after deleting

?>