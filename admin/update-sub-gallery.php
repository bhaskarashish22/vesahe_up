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
    $name = stripslashes($_POST['name']);
	//$fname = stripslashes($_POST['fname']);
}
else {
    $name = $_POST['name'];
	//$fname = $_POST['fname'];
}



$id = $_GET['id'];

$date = date('d-m-Y');

$name = mysql_real_escape_string($name);
$newname = strtolower(create_slug($name));

$ext = explode('.', basename($_FILES['uploadphoto']['name']));   // Explode file name from dot(.)

$file_extension = end($ext); // Store extensions in the variable.

//echo "$file_extension";

$photo_name = $_FILES['uploadphoto']['name'];

if($photo_name == "")
{
$p = $_POST['ph'];

$path = "$imgroot/uploads/";

$newstar = create_slug(strtolower($fname));

$pcode = $newstar.$randval;

$photo_namenew = $p;




$sql = "update gallery set date = '$date', photo = '$photo_namenew', name = '$name', pages = '$newname' where id='$id'";

$exe = mysql_query($sql);



$msg="<b>Your $name Gallery Update Successfully<br><br>";



  include("edit-sub-gallery.php");



}


else if ($file_extension == 'png' or  $file_extension == 'PNG' or  $file_extension == 'jpeg' or  $file_extension == 'JPEG' or  $file_extension == 'JPG' or  $file_extension == 'jpg' or $file_extension == 'gif' or $file_extension == 'GIF' )
{
$p = $_POST['ph'];

$del="$p";

$myfile="uploads/gallery/$del";
$myfile2="uploads/gallery-thum/$del";

unlink($myfile);
unlink($myfile2);


$path = "$imgroot/uploads/";



$randval = mt_rand(1,9999);


$newstar = create_slug(strtolower($fname));

$pcode = $newstar.$randval;





$photo_namenew = $randval.$photo_name;



$phot_tmp_name = $_FILES['uploadphoto']['tmp_name'];


	move_uploaded_file($phot_tmp_name,$path.$photo_namenew);

	

	

	$url3 ="uploads/";
	
	

				 $name3 = $photo_namenew;

				 $new_w = "512";

				 $new_h = "450";

				 $thumburl = "uploads/gallery-thum/";

				 createthumbnail($name3, $url3,$new_w,$new_h,$thumburl);






				 $name3 = $photo_namenew;

				 $big_w = "800";

				 $big_h = "800";

				 $thumburl_big = "uploads/gallery/";

				 createthumbnail($name3, $url3,$big_w,$big_h,$thumburl_big);



				unlink("uploads/".$photo_namenew);

	


	$sql = "update gallery set date = '$date', photo = '$photo_namenew', name = '$name', pages = '$newname' where id='$id'";



	$exe = mysql_query($sql);



       
  $msg="<b>Your $name Gallery Update Successfully<br><br>";



  include("edit-sub-gallery.php");



} 

else 
{


$msg="<b>Sorry $file_extension is invalid, allowed extentions are:  jpeg, JPEG, JPG, PNG, gif, GIF, jpg, png</b><br><br>";
include('edit-sub-gallery.php');

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
	
	if($filep == "PNG")
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