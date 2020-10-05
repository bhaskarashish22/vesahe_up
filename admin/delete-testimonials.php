<?php include("include/lock.php");?>
<?php include("include/connection1.php");
$id=$_GET['id'];

$ses_sql=mysql_query("select * from testimonialpages where id='$id'");

$row1=mysql_fetch_array($ses_sql);

$id1=$row1['id'];
$del=$row1['photo'];
$myfile="uploads/testimonials/$del";
//$myfile2="uploads/news-small/$del";
unlink($myfile);
//unlink($myfile2);

$query = mysql_query("DELETE FROM `testimonialpages` WHERE `id` = '$id1'");

if($query)
{
		echo '<script>alert("Deleted Testimonial");</script>';
		echo  "<script>"; 
	echo "location.href='view-testimonial.php'";  
	echo  "</script>"; 
	}
	 
	else
	{
		echo '<script>alert("No Deleted Testimonial - This Server Problem");</script>';
		echo  "<script>"; 
	echo "location.href='view-testimonial.php'";  
	echo  "</script>"; 
	}		
		
		/*if(!$query) { die(mysql_error()); }
	
	header("Location: view-testimonial.php"); // redirent after deleting */

?>