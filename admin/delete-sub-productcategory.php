<?php include("include/lock.php");?>
<?php include("include/connection1.php");
$id=$_GET['id'];

$ses_sql=mysql_query("select * from productsubcategory where id='$id'");

$row1=mysql_fetch_array($ses_sql);

$id1=$row1['id'];
$fname=$row1['fname'];

$delp=$row1['photo'];
$myfilep="uploads/products-category/$delp";
unlink($myfilep);


$query2 = mysql_query("select * from productspages where fname='$fname'");
$row2=mysql_fetch_array($query2);

$pcode=$row2['pcode'];
$del=$row2['photo'];
$myfile="uploads/products/$del";
$myfile2="uploads/products-thums/$del";
unlink($myfile);
unlink($myfile2);


//product child category
$query22 = mysql_query("select * from productchildcategory where pcid='$id1'");
$row22=mysql_fetch_array($query22);

$del22=$row212['photo'];
$myfile22="uploads/products-childcategory/$del22";
unlink($myfile22);



//package gallery
$queryg = mysql_query("select * from packagegallery where pcode='$pcode'");
$rowg=mysql_fetch_array($queryg);

$delg=$rowg['photo'];
$myfileg1="uploads/package-gallery/$delg";
$myfileg2="uploads/package-gallery-thum/$delg";
unlink($myfilegl);
unlink($myfileg2);

$query5 = mysql_query("DELETE FROM `packagegallery` WHERE `pcode` = '$pcode'");

$query3 = mysql_query("DELETE FROM `productspages` WHERE `fname` = '$fname'");

$query2 = mysql_query("DELETE FROM `productchildcategory` WHERE `pcid` = '$id1'");

$query = mysql_query("DELETE FROM `productsubcategory` WHERE `id` = '$id1'");


if($query)
{
		echo '<script>alert("Deleted Sub Category");</script>';
		echo  "<script>"; 
	echo "location.href='view-product-sub-category.php'";  
	echo  "</script>"; 
	}
	 
	else
	{
		echo '<script>alert("No Deleted Sub Category - This Server Problem");</script>';
		echo  "<script>"; 
	echo "location.href='view-product-sub-category.php'";  
	echo  "</script>"; 
	}



?>