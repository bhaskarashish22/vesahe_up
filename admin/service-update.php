<?php
include('include/lock.php');
?>

<?php include("include/connection1.php");?>
<?php

//function Code link url

function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
}

if(isset($_POST['submit'])) {


// Usage across all PHP versions

if (get_magic_quotes_gpc()) {
    $titlename = stripslashes($_POST['name']);
	$oldname = stripslashes($_POST['oldname']);
	//$contactheading1 = stripslashes($_POST['contactheading1']);
	//$contactheading2 = stripslashes($_POST['contactheading2']);
	//$contactheading3 = stripslashes($_POST['contactheading3']);
}
else {
    $titlename = $_POST['name'];
	$oldname = $_POST['oldname'];
	//$contactheading1 = $_POST['contactheading1'];
	//$contactheading2 = $_POST['contactheading2'];
	//$contactheading3 = $_POST['contactheading3'];
}



$sqlchk = "select name from services where name = '$titlename'";
$exechk = mysql_query($sqlchk);
$numchk = mysql_num_rows($exechk);
if ($numchk>0)
{
$i=$numchk; 
$i++;
$del_id = $i;
$newname1 = "$titlename"."".$del_id; 
$newnamep = create_slug($newname1);
$newname = strtolower($newnamep);

$sqlchks = "select link from services where link = '".$_POST['link']."'";
$exechks = mysql_query($sqlchks);
$numchks = mysql_num_rows($exechks);
if ($numchks>0)
{
$i=$numchks; 
$i++;
$del_ids = $i;
$newname2 = $_POST['link']; 
$newnamep2 = create_slug($newname2);
$newname = strtolower($newnamep2);
}

}
 
else
{

$newname3 = $titlename;
$newnamep3 = create_slug($newname3);
$newname = strtolower($newnamep3);  
}


$path = "$imgroot/uploads/";
$randval = mt_rand(1,109999);

// If using MySQL

$titlename = mysql_real_escape_string($titlename);
$oldname = mysql_real_escape_string($oldname);
//$contactheading1 = mysql_real_escape_string($contactheading1);
//$contactheading2 = mysql_real_escape_string($contactheading2);
//$contactheading3 = mysql_real_escape_string($contactheading3);


$brief = $_POST['brief'];
$homebrief = $_POST['homebrief'];
$imgstatus = $_POST['imgstatus'];

$date = date("j F, Y");


$id = $_GET['id'];

$ext = explode('.', basename($_FILES['uploadphoto']['name']));   // Explode file name from dot(.)

$file_extension = end($ext); // Store extensions in the variable.


$photo_name = $_FILES['uploadphoto']['name'];


if($photo_name == "")
{
$p = $_POST['ph'];
$photo_namenew = $p;

	$sql = "update services set name = '$titlename', link = '$newname', brief = '$brief', photo = '$photo_namenew', imgstatus = '$imgstatus', date = '$date' where id='$id'";
	$exe = mysql_query($sql);
	
	/*
	$sql1 = "update subservices set fname = '$titlename', link = '$newname' where fname='$oldname'";
	$exe1 = mysql_query($sql1);
	
	$sql2 = "update downloadpages set fname = '$titlename', link = '$newname' where fname='$oldname'";
	$exe2 = mysql_query($sql2);
	
	$sql3 = "update articlepages set fname = '$titlename', link = '$newname' where fname='$oldname'";
	$exe3 = mysql_query($sql3);
	*/

  $msg="<br><b>Congratulation!! Your <b> $titlename </b> Pages Successfully Submitted</b><br><br>";
  include("manage-service.php");
 
  
}
  
  
  else if($file_extension == 'png' or  $file_extension == 'PNG' or  $file_extension == 'jpeg' or  $file_extension == 'JPEG' or  $file_extension == 'JPG' or  $file_extension == 'jpg' or $file_extension == 'gif' or $file_extension == 'GIF' )
  
 {
 $p = $_POST['ph'];
 $del="$p";

$myfile="uploads/aboutus/$del";
//$myfile2="uploads/gallery-thum/$del";

unlink($myfile);
//unlink($myfile2);


$photo_namenew = $randval.$photo_name;

$phot_tmp_name = $_FILES['uploadphoto']['tmp_name'];

move_uploaded_file($phot_tmp_name,$path.$photo_namenew);
	$url3 ="uploads/";

				 $name3 = $photo_namenew;

				 //$new_w = "300";

				 //$new_h = "300";

				 //$thumburl = "uploads/magazinesthum/";

				 //createthumbnail($name3, $url3,$new_w,$new_h,$thumburl);
				 
				 
				 
				 $big_w = "1920";

				 $big_h = "1080";

				 $thumburl_big = "uploads/aboutus/";

				 createthumbnail($name3, $url3,$big_w,$big_h,$thumburl_big);
				 
				 
				 unlink("uploads/".$photo_namenew);
				 
				 
				$sql = "update services set name = '$titlename', link = '$newname', brief = '$brief', photo = '$photo_namenew', imgstatus = '$imgstatus', date = '$date' where id='$id'";
	$exe = mysql_query($sql);
	
	

  $msg="<br><b>Congratulation!! Your <b> About Us </b> Pages Successfully Submitted</b><br><br>";
  include("manage-service.php");
 
 }
 
 else 
 
 {
 
 $msg="<b>Sorry $file_extension is invalid, allowed extentions are:  jpeg, JPEG, JPG, PNG, gif, GIF, jpg, png</b><br><br>";
include('manage-service.php');
 
 }
  

  }
  
  
  // funtion to crop image 			

function createthumbnail($name, $url,$new_w,$new_h,$thumburl)

{

	$system=explode(".", $name);

	$filep = end($system);
	
	 //echo "<pre>";
	//print_r($filep);
	//die("VED");
	
	//$src_img=imagecreatefromjpeg($url.$name);
	
	//Details image Croping Details
	
	if($filep == "png")
	{
		$src_img = imagecreatefrompng($url.$name);
	} 
	
	else if($filep == "PNG")
	{
		$src_img = imagecreatefrompng($url.$name);
	} 
	
	else if($filep == "jpeg")
	{
		$src_img = imagecreatefromjpeg($url.$name);
	} 
	
	else if($filep == "JPEG")
	{
		$src_img = imagecreatefromjpeg($url.$name);
	} 
	
	else if($filep == "JPG")
	{
		$src_img = imagecreatefromjpeg($url.$name);
	} 
	
	else if($filep == "jpg")
	{
		$src_img = imagecreatefromjpeg($url.$name);
	} 
	
	else if($filep == "gif")
	{
		$src_img = imagecreatefromgif($url.$name);
	} 
	
	else if($filep == "GIF")
	{
		$src_img = imagecreatefromgif($url.$name);
	} 

        else if($filep == "bmp")
	{
		$src_img = imagecreatefromwbmp($url.$name);
	} 

        else if($filep == "BMP")
	{
		$src_img = imagecreatefromwbmp($url.$name);
	} 
	
	//Details image Croping End Details




	# get dimensions of old image

	$old_x=imagesx($src_img);

	$old_y=imagesy($src_img);

	if ($old_x > $new_w)

	{

		$thumb_w = $new_w;

		$ratio = $new_w/$old_x;

		$thumb_h = intval($old_y*$ratio);

		if($thumb_h > $new_h)

		{

			$ratio = $new_h/$old_y;

			$thumb_w = intval($old_x*$ratio);

			$thumb_h = intval($new_h);

		}

	

	}

	elseif($old_x <= $new_w) // if old width is less then current width

	{

		if($old_y > $new_h)

		{

			$ratio = $new_h/$old_y;

			$thumb_w = intval($old_x*$ratio);

			$thumb_h = intval($new_h);

		}

		else

		{

			$thumb_w =$old_x;

			$thumb_h=$old_y;

		}

	}



	$dst_img=imagecreatetruecolor($thumb_w, $thumb_h);

	# resize source image and place the copy in the destination image

	imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 

	# get file name, add tn_ and create thumbnail according to $makeimg

	//$filename=$system[0].".".$system[1];
    $filename=$name;

	

	imagejpeg($dst_img,$thumburl.$filename); 

	# destroy both image objects (to save memory)

	imagedestroy($dst_img); 

	imagedestroy($src_img); 

	# initialise name

	$name="";

} 
 
?>