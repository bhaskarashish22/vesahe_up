<?php include("include/lock.php");?>
<?php include("include/connection1.php");
$id=$_GET['id'];

$ses_sql=mysql_query("select * from subcategory where id='$id'");
$row1=mysql_fetch_array($ses_sql);

$id1=$row1['id'];
$del=$row1['photo'];
$myfile="uploads/sub-category/$del";
//$myfile2="uploads/gallery-thum/$del";
unlink($myfile);
//unlink($myfile2);

$query = mysql_query("DELETE FROM `subcategory` WHERE `id` = '$id1'");
		if(!$query) { die(mysql_error()); }
	
	header("Location: view-sub-category.php"); // redirent after deleting

?>