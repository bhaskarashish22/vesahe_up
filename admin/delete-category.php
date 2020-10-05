<?php include("include/lock.php");?>
<?php include("include/connection1.php");
$id=$_GET['id'];

$ses_sql=mysql_query("select * from addcategory where id='$id'");
$row1=mysql_fetch_array($ses_sql);

$id1=$row1['id'];
$name=$row1['name'];

$ses_sql2=mysql_query("select * from subcategory where fname='$name'");
$row2=mysql_fetch_array($ses_sql2);


$del=$row1['photo'];
$myfile="uploads/category/$del";

$del2=$row2['photo'];
$myfile2="uploads/sub-category/$del2";
unlink($myfile);
unlink($myfile2);

$query2 = mysql_query("DELETE FROM `subcategory` WHERE `fname` = '$name'");

$query = mysql_query("DELETE FROM `addcategory` WHERE `id` = '$id1'");
		if(!$query) { die(mysql_error()); }
	
	header("Location: view-category.php"); // redirent after deleting

?>