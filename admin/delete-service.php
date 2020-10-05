<?php include("include/lock.php");?>
<?php include("include/connection1.php");
$id=$_GET['id'];

$ses_sql=mysql_query("select * from servicepages where id='$id'");

$row1=mysql_fetch_array($ses_sql);

$id1=$row1['id'];
$del=$row1['photo'];
$myfile="uploads/service/$del";
$myfile2="uploads/service-thum/$del";
unlink($myfile);
unlink($myfile2);

$query = mysql_query("DELETE FROM `servicepages` WHERE `id` = '$id1'");

if($query)
{
		echo '<script>alert("Deleted Service");</script>';
		echo  "<script>"; 
	echo "location.href='view-service.php'";  
	echo  "</script>"; 
	}
	 
	else
	{
		echo '<script>alert("No Deleted Service - This Server Problem");</script>';
		echo  "<script>"; 
	echo "location.href='view-service.php'";  
	echo  "</script>"; 
	}
		
		/*
		if(!$query) { die(mysql_error()); }
	
	header("Location: view-service.php"); // redirent after deleting */

?>