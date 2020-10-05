<?php include("include/lock.php");?>
<?php //include("include/connection1.php");
$id=$_GET['id'];

$ses_sql=mysql_query("select * from productspages where id='$id'");

$row1=mysql_fetch_array($ses_sql);

$id1=$row1['id'];
$pages=$row1['pages'];
$name=$row1['name'];
$pcode=$row1['pcode'];
$del=$row1['photo'];
$myfile="uploads/products/$del";
$myfile2="uploads/products-thums/$del";
unlink($myfile);
unlink($myfile2);

//listing Gallery
$ses_sql3=mysql_query("select * from packagegallery where pcode='$pcode'");
$row3=mysql_fetch_array($ses_sql3);

$del2=$row3['photo'];
$myfile3="uploads/package-gallery/$del2";
$myfile4="uploads/package-gallery-thum/$del2";
unlink($myfile3);
unlink($myfile4);

$listquery = mysql_query("DELETE FROM `packagegallery` WHERE `pcode` = '$pcode'");
$query = mysql_query("DELETE FROM `productspages` WHERE `id` = '$id1'");

if($query)
{
		echo '<script>alert("Deleted Products");</script>';
		echo  "<script>"; 
	echo "location.href='view-products.php'";  
	echo  "</script>"; 
	}
	 
	else
	{
		echo '<script>alert("No Deleted Products - This Server Problem");</script>';
		echo  "<script>"; 
	echo "location.href='view-products.php'";  
	echo  "</script>"; 
	}



/*
		if(!$query) { die(mysql_error()); }
	
	header("Location: view-products.php"); // redirent after deleting */

?>