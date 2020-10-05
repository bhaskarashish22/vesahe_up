<?php include('include/lock.php');?>
<?php
include("include/connection1.php"); 
//function Code link url

function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
}


 
if(isset($_POST['submit'])) {
	
	if (get_magic_quotes_gpc()) {
    $titlename = stripslashes($_POST['name']);
	$cbrief = stripslashes($_POST['cbrief']);
	$brief = stripslashes($_POST['brief']);
	$urllink = stripslashes($_POST['urllink']);
	
}
else {
    $titlename = $_POST['name'];
	$cbrief = $_POST['cbrief'];
	$brief = $_POST['brief'];
	$urllink = $_POST['urllink'];
	
}


$path = "$imgroot/uploads/";

$randval = mt_rand(1,9999);
$titlename = mysql_real_escape_string($titlename);	
$cbrief = mysql_real_escape_string($cbrief);
$brief = mysql_real_escape_string($brief);
$urllink = mysql_real_escape_string($urllink);		

$newname3 = $titlename;
$newnamep3 = create_slug($newname3);
$newname = strtolower($newnamep3); 
//$brief = $_POST['brief'];

$newsp = $_POST['pageorder'];
$cname = $_POST['cname'];

$date = date('d-m-Y');

$id = $_GET['id'];


$ext = explode('.', basename($_FILES['uploadphoto']['name']));   // Explode file name from dot(.)

$file_extension = end($ext); // Store extensions in the variable.


$photo_name = $_FILES['uploadphoto']['name'];
$photo_name = preg_replace('/\s+/', '', $photo_name); // white space close
$photo_name = str_replace('(', '', $photo_name); // white space close
$photo_name = str_replace(')', '', $photo_name); // white space close
$photo_name = str_replace('%', '', $photo_name); // white space close
$photo_name = str_replace('?', '', $photo_name); // white space close

$photo_namenew = $randval.$photo_name;

$phot_tmp_name = $_FILES['uploadphoto']['tmp_name'];
$phot_tmp_name = preg_replace('/\s+/', '', $phot_tmp_name); // white space close
$phot_tmp_name = str_replace('(', '', $phot_tmp_name); // white space close
$phot_tmp_name = str_replace(')', '', $phot_tmp_name); // white space close
$phot_tmp_name = str_replace('%', '', $phot_tmp_name); // white space close
$phot_tmp_name = str_replace('?', '', $phot_tmp_name); // white space close


if($photo_name == "")
{
$p = $_POST['ph'];
$photo_namenew = $p;

$sql = "update homeslide set pageorder = '$newsp', cname = '$cname', name = '$titlename', cbrief = '$cbrief', brief = '$brief', urllink = '$urllink', pages = '$newname', date = '$date' where id='$id'";
$result = mysql_query($sql);


if($result)
{
$msg="<b>Congratulation!! Your Slide Successfully Submitted</b><br><br>";
include('edit-slide.php');
}

else
{
$msg="<b>Sorry!! Your Slide Not Submitted</b><br><br>";
include('edit-slide.php');	
}

}

else if($file_extension == 'png' or  $file_extension == 'PNG' or  $file_extension == 'jpeg' or  $file_extension == 'JPEG' or  $file_extension == 'JPG' or  $file_extension == 'jpg' or $file_extension == 'gif' or $file_extension == 'GIF' )
  
 {
 $p = $_POST['ph'];
 $del="$p";

$myfile="uploads/slide/$del";
$myfile2="uploads/slide-thums/$del";
unlink($myfile);
unlink($myfile2);

//$photo_namenew = $randval.$photo_name;

//$phot_tmp_name = $_FILES['uploadphoto']['tmp_name'];

move_uploaded_file($phot_tmp_name,$path.$photo_namenew);
	$url3 ="uploads/";

				$name3 = $photo_namenew;

				$new_w = "100";
				 $new_h = "54";
				 $thumburl = "uploads/slide-thums/";
				 createthumbnail($name3, $url3,$new_w,$new_h,$thumburl);
				 
				 
				 $big_w = "1600";
				 $big_h = "800";
				 $thumburl_big = "uploads/slide/";
				 createthumbnail($name3, $url3,$big_w,$big_h,$thumburl_big);
				
				 
				 unlink("uploads/".$photo_namenew);



$sql = "update homeslide set pageorder = '$newsp', cname = '$cname', name = '$titlename', cbrief = '$cbrief', brief = '$brief', urllink = '$urllink', pages = '$newname', photo = '$photo_namenew', date = '$date' where id='$id'";
$result = mysql_query($sql);


if($result)
{
$msg="<b>Congratulation!! Your Slide Successfully Submitted</b><br><br>";
include('edit-slide.php');
}

else
{
$msg="<b>Sorry!! Your Slide Not Submitted</b><br><br>";
include('edit-slide.php');	
}

}
 
 else 
 
 {
 
 $msg="<b>Sorry $file_extension is invalid, allowed extentions are:  jpeg, JPEG, JPG, PNG, gif, GIF, jpg, png</b><br><br>";
include('edit-slide.php');
 
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
