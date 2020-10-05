<?php include("include/lock.php");?>
<?php include("include/connection1.php");
$id=$_GET['id'];

$ses_sql=mysql_query("select * from productchildcategory where id='$id'");

$row1=mysql_fetch_array($ses_sql);

$id1=$row1['id'];
$childname=$row1['childname'];

$delp=$row1['photo'];
$myfilep="uploads/products-childcategory/$delp";
unlink($myfilep);


$query2 = mysql_query("select * from productspages where childname='$childname'");
$row2=mysql_fetch_array($query2);

$pcode=$row2['pcode'];
$del=$row2['photo'];
$myfile="uploads/products/$del";
$myfile2="uploads/products-thums/$del";
unlink($myfile);
unlink($myfile2);


//gallery
$queryg = mysql_query("select * from gallery where pcode='$pcode'");
$rowg=mysql_fetch_array($queryg);

$delg=$rowg['photo'];
$myfileg1="uploads/gallery/$delg";
$myfileg2="uploads/gallery-thum/$delg";
unlink($myfilegl);
unlink($myfileg2);

$query5 = mysql_query("DELETE FROM `gallery` WHERE `pcode` = '$pcode'");


$query3 = mysql_query("DELETE FROM `productspages` WHERE `childname` = '$childname'");

$query = mysql_query("DELETE FROM `productchildcategory` WHERE `id` = '$id1'");

		//if(!$query) { die(mysql_error()); }
	
//	header("Location: view-product-child-category.php"); // redirent after deleting

if($query) 
{
echo  "<script>"; 
	echo "location.href='view-product-child-category.php'";  
	echo  "</script>";
	
}
else
{
    echo '<script>alert("Sorry Not Delete This Time Server Down");</script>';
 echo  "<script>"; 
	echo "location.href='view-product-child-category.php'";  
	echo  "</script>";
   
    
}



?>