<?php include("include/lock.php");?>
<?php 
if(isset($_POST['submit'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array

	for($i=0; $i < $id_count; $i++) {
		$id = $id_array[$i];
		

$ses_sql=mysql_query("select * from productcategory where id='$id'");

$row1=mysql_fetch_array($ses_sql);

$id1=$row1['id'];
$fname=$row1['name'];


$query2 = mysql_query("DELETE FROM `productspages` WHERE `pcname` = '$fname'");
$row2=mysql_fetch_array($query2);

$pcode=$row2['pcode'];
$del=$row2['photo'];
$myfile="uploads/products/$del";
$myfile2="uploads/products-thums/$del";
unlink($myfile);
unlink($myfile2);


//product sub category
$query21 = mysql_query("select * from productsubcategory where pid='$id1'");
$row21=mysql_fetch_array($query21);

$del21=$row21['photo'];
$myfile21="uploads/products-category/$del21";
unlink($myfile21);


//package gallery
$queryg = mysql_query("select * from packagegallery where pcode='$pcode'");
$rowg=mysql_fetch_array($queryg);

$delg=$rowg['photo'];
$myfileg1="uploads/package-gallery/$delg";
$myfileg2="uploads/package-gallery-thum/$delg";
unlink($myfilegl);
unlink($myfileg2);

$query5 = mysql_query("DELETE FROM `packagegallery` WHERE `pcode` = '$pcode'");

$query3 = mysql_query("DELETE FROM `productspages` WHERE `pcname` = '$fname'");

$query2 = mysql_query("DELETE FROM `productsubcategory` WHERE `pid` = '$id1'");

$query = mysql_query("DELETE FROM `productcategory` WHERE `id` = '$id1'");

		if(!$query) { die(mysql_error()); }
	}
	header("Location: view-productcategory.php"); // redirent after deleting
}
?>