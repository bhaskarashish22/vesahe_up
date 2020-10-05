<?php include("include/lock.php");?>
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
	$fname = stripslashes($_POST['fname']);
	$metatoptitle = stripslashes($_POST['metatoptitle']);
	$metakeywords = stripslashes($_POST['metakeywords']);
	$metadescription = stripslashes($_POST['metadescription']);
	$cbrief = stripslashes($_POST['cbrief']);
	
	
}
else {
    $titlename = $_POST['name'];
	$fname = $_POST['fname'];
	$metatoptitle = $_POST['metatoptitle'];
	$metakeywords = $_POST['metakeywords'];
	$metadescription = $_POST['metadescription'];
	$cbrief = $_POST['cbrief'];
		
}


$sqlchk = "select name from servicepages where name = '$titlename'";
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

$sqlchks = "select pages from servicepages where pages = '".$_POST['pages']."'";
$exechks = mysql_query($sqlchks);
$numchks = mysql_num_rows($exechks);
if ($numchks>0)
{
$i=$numchks; 
$i++;
$del_ids = $i;
$newname2 = $_POST['pages']; 
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
$cbrief = mysql_real_escape_string($cbrief);
$metatoptitle = mysql_real_escape_string($metatoptitle);
$metakeywords = mysql_real_escape_string($metakeywords);
$metadescription = mysql_real_escape_string($metadescription);

$fname = mysql_real_escape_string($fname);
$link = strtolower(create_slug($fname));


$pageorder = $_POST['pageorder'];
$brief = $_POST['brief'];
$imgstatus = $_POST['imgstatus'];

$fservice = $_POST['fservice'];

$date = date("j F, Y");

$id = $_GET['id'];

$ext = explode('.', basename($_FILES['uploadphoto']['name']));   // Explode file name from dot(.)

$file_extension = end($ext); // Store extensions in the variable.

//echo "$file_extension";

$photo_name = $_FILES['uploadphoto']['name'];

$photo_namenew = $randval.$photo_name;

$phot_tmp_name = $_FILES['uploadphoto']['tmp_name'];

if($photo_name == "")
{
$p = $_POST['ph'];
$photo_namenew = $p;

$sql = "update servicepages set fname = '$fname', link = '$link', name = '$titlename', pages = '$newname', photo = '$photo_namenew', pageorder = '$pageorder', brief = '$brief', cbrief = '$cbrief', metatoptitle = '$metatoptitle', metakeywords = '$metakeywords', metadescription = '$metadescription', fservice = '$fservice', imgstatus = '$imgstatus', date=Now() where id='$id'";
	$exe = mysql_query($sql);


if($exe)
{
$msg="<br><b>Congratulation!! Your $titlename - Works Page Successfully Submitted</b><br><br>";
include('edit-service.php');
}
else
{
$msg="<br><b>Sorry!! Your $titlename - Works Page Not Submitted</b><br><br>";
include('edit-service.php');	
}

 } 



else if ($file_extension == 'png' or  $file_extension == 'PNG' or  $file_extension == 'jpeg' or  $file_extension == 'JPEG' or  $file_extension == 'JPG' or  $file_extension == 'jpg' or $file_extension == 'gif' or $file_extension == 'GIF' )
	{
		
		$p = $_POST['ph'];
 $del="$p";

$myfile="uploads/service/$del";
$myfile2="uploads/service-thum/$del";

unlink($myfile);
unlink($myfile2);

$photo_namenew = $randval.$photo_name;

$phot_tmp_name = $_FILES['uploadphoto']['tmp_name'];
		
   move_uploaded_file($phot_tmp_name,$path.$photo_namenew);
	$url3 ="uploads/";

				 $name3 = $photo_namenew;

				 $new_w = "368";

				 $new_h = "300";

				 $thumburl = "uploads/service-thum/";

				 createthumbnail($name3, $url3,$new_w,$new_h,$thumburl);
				 
				 
				 $name3 = $photo_namenew;
				 $big_w = "1920";
				 $big_h = "1080";
				 $thumburl_big = "uploads/service/";
				 
				 createthumbnail($name3, $url3,$big_w,$big_h,$thumburl_big);
				
				 
				

unlink("uploads/".$photo_namenew);



	$sql = "update servicepages set fname = '$fname', link = '$link', name = '$titlename', pages = '$newname', photo = '$photo_namenew', pageorder = '$pageorder', brief = '$brief', cbrief = '$cbrief', metatoptitle = '$metatoptitle', metakeywords = '$metakeywords', metadescription = '$metadescription', fservice = '$fservice', imgstatus = '$imgstatus', date=Now() where id='$id'";
	$exe = mysql_query($sql);
	
 if($exe)
{
$msg="<br><b>Congratulation!! Your $titlename - Works Page Successfully Submitted</b><br><br>";
include('edit-service.php');
}
else
{
$msg="<br><b>Sorry!! Your $titlename - Works Page Not Submitted</b><br><br>";
include('edit-service.php');	
}

	} 
	
else 
{


$msg="<b>Sorry $file_extension is invalid, allowed extentions are:  jpeg, JPEG, JPG, PNG, gif, GIF, jpg, png</b><br><br>";
include('edit-service.php');


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

