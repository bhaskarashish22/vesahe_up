<?php
include('include/lock.php');
?>

<?php include("include/connection1.php");?>
<?php


$p = $_POST['ph'];
$del="$p";
$myfile="banner/$del";
unlink($myfile);


$path = "$imgroot/banner/";
$randval = mt_rand(1,9999);
$photo_name = $_FILES['uploadphoto']['name'];
$photo_namenew = $randval.$photo_name;
$phot_tmp_name = $_FILES['uploadphoto']['tmp_name'];

$date = date('d-m-Y');

if($photo_name != "")
{

	move_uploaded_file($phot_tmp_name,$path.$photo_namenew);

$id = $_GET['id'];
	
	$sql = "update bannerpage set date = '$date', photo = '$photo_namenew' where id='$id'";
	$exe = mysql_query($sql);
        if(!exe)
	$msg="Error in SQl";
else

  $msg="<b>Your Home Banner Page Change Successfully<br><br>";
  include("bannerpage_update.php");
  }
?>