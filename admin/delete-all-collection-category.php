<?php include("include/lock.php");?>
<?php 
if(isset($_POST['submit'])) {
	$id_array = $_POST['data']; // return array
	$id_count = count($_POST['data']); // count array

	for($i=0; $i < $id_count; $i++) {
		$id = $id_array[$i];
		
$ses_sql4=mysql_query("select * from collcategory where id='$id'");
$row4=mysql_fetch_array($ses_sql4);		

$del4=$row4['photo'];
$myfile4="uploads/collcategory/$del4";
unlink($myfile4);
		

$query = mysql_query("DELETE FROM `collcategory` WHERE `id` = '$id'");
		if(!$query) { die(mysql_error()); }
	}
	header("Location: view-collectioncategory.php"); // redirent after deleting
}
?>