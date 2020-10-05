<?php include("include/lock.php");?>
<?php

//function Code link url

function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
}

if (isset($_POST['submit'])) {

// Usage across all PHP versions

if (get_magic_quotes_gpc()) {
    $name = stripslashes($_POST['name']);
	
}
else {
    $name = $_POST['name'];
	
}



$j = 0;     // Variable for indexing uploaded image.

$target_path = "$imgroot/uploads/";     // Declaring Path for uploaded images.

for ($i = 0; $i < count($_FILES['file']['name']); $i++) {

// Loop to get individual element from the array

$validextensions = array("jpeg", "JPEG", "JPG", "PNG", "gif", "GIF", "jpg", "png");      // Extensions which are allowed.



$randval = mt_rand(1,9999);

$name = mysql_real_escape_string($name);
$fnameurl = strtolower(create_slug($name));


$photo_name = $_FILES['file']['name'][$i];

$photo_namenew = $randval.$photo_name;





$ext = explode('.', basename($_FILES['file']['name'][$i]));   // Explode file name from dot(.)

$file_extension = end($ext); // Store extensions in the variable.



$j = $j + 1;      // Increment the number of uploaded images according to the files in array.



$date = date('d-m-Y');



if (($_FILES["file"]["size"][$i] < 9999999999999999999999999999900000)     // Approx. 800kb files can be uploaded.

&& in_array($file_extension, $validextensions)) {

if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path.$photo_namenew)) {

// If file moved to uploads folder.



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
				 
				 $sql = "insert gallery set photo = '$photo_namenew', name = '$name', pages = '$fnameurl', date = '$date'";
				 $exe = mysql_query($sql);
				
				unlink("uploads/".$photo_namenew);




echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';

} else {     //  If File Was Not Moved.

echo $j. ').<span id="error">please try again!.</span><br/><br/>';

}

} else {     //   If File Size And File Type Was Incorrect.

echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';

}

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