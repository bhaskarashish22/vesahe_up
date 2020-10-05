<?php include("include/lock.php");?>
<?php include("include/connection1.php");
$id=$_GET['id'];

$ses_sql=mysql_query("select * from teampages where id='$id'");

$row1=mysql_fetch_array($ses_sql);

$id1=$row1['id'];
$del=$row1['photo'];
$myfile="uploads/team/$del";
//$myfile2="uploads/news-small/$del";
unlink($myfile);
//unlink($myfile2);

$query = mysql_query("DELETE FROM `teampages` WHERE `id` = '$id1'");
		if(!$query) { die(mysql_error()); }
	
	header("Location: view-team.php"); // redirent after deleting

?>