<?php include("include/lock.php");?>
<?php 
if(isset($_POST['submit'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array

	for($i=0; $i < $id_count; $i++) {
		$id = $id_array[$i];
		
$ses_sql4=mysql_query("select * from productspages where id='$id'");
$row4=mysql_fetch_array($ses_sql4);		

$del4=$row4['photo'];
$pcode=$row4['pcode'];
$myfile4="uploads/products/$del4";
$myfile5="uploads/products-thums/$del4";
unlink($myfile4);
unlink($myfile5);


//listing Gallery
$ses_sql3=mysql_query("select * from packagegallery where pcode='$pcode'");
$row3=mysql_fetch_array($ses_sql3);

$del2=$row3['photo'];
$myfile3="uploads/package-gallery/$del2";
$myfile4="uploads/package-gallery-thum/$del2";
unlink($myfile3);
unlink($myfile4);

$listquery = mysql_query("DELETE FROM `packagegallery` WHERE `pcode` = '$pcode'");		

$query = mysql_query("DELETE FROM `productspages` WHERE `id` = '$id'");
		if(!$query) { die(mysql_error()); }
	}
	header("Location: view-products.php"); // redirent after deleting
}
?>