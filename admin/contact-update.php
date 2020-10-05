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
	$contactheading1 = stripslashes($_POST['contactheading1']);
	$contactheading2 = stripslashes($_POST['contactheading2']);
	$contactheading3 = stripslashes($_POST['contactheading3']);
}
else {
    $titlename = $_POST['name'];
	$contactheading1 = $_POST['contactheading1'];
	$contactheading2 = $_POST['contactheading2'];
	$contactheading3 = $_POST['contactheading3'];
}



$sqlchk = "select name from contactus where name = '$titlename'";
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

$sqlchks = "select link from contactus where link = '".$_POST['link']."'";
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
$contactheading1 = mysql_real_escape_string($contactheading1);
$contactheading2 = mysql_real_escape_string($contactheading2);
$contactheading3 = mysql_real_escape_string($contactheading3);


$brief1 = $_POST['brief1'];
$brief2 = $_POST['brief2'];
$brief3 = $_POST['brief3'];

$date = date("j F, Y");


$id = $_GET['id'];



	$sql = "update contactus set name = '$titlename', link = '$newname', brief1 = '$brief1', brief2 = '$brief2', brief3 = '$brief3', contactheading1 = '$contactheading1', contactheading2 = '$contactheading2', contactheading3 = '$contactheading3', date = '$date' where id='$id'";
	$exe = mysql_query($sql);
	

  $msg="<br><b>Congratulation!! Your <b> Contact Us </b> Pages Successfully Submitted</b><br><br>";
  include("manage-contact.php");
 
  
  
 

  }
  
  
 
?>