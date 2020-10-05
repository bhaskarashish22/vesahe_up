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
	
	
	
}
else {
    $titlename = $_POST['name'];
	
	
	
}


$sqlchk = "select name from faqpages where name = '$titlename'";
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

$sqlchks = "select pages from faqpages where pages = '$newname'";
$exechks = mysql_query($sqlchks);
$numchks = mysql_num_rows($exechks);

if ($numchks>0)
{
$i=$numchks; 
$i++;
$del_ids = $i;
$newname2 = "$newname"."".$del_ids; 
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




$id = $_GET['id'];
// If using MySQL

$titlename = mysql_real_escape_string($titlename);

$pageorder = $_POST['pageorder'];
$brief = $_POST['brief'];
$date = date("j F, Y");



$sql = "update faqpages set name = '$titlename', pages = '$newname', pageorder = '$pageorder', brief = '$brief', date='$date' where id='$id'";
	$exe = mysql_query($sql);



if($exe)
{
$msg="<br><b>Congratulation!! Your $titlename - Faq Page Successfully Submitted</b><br><br>";
include('edit-faq.php');
 } 
 else
 {
	$msg="<br><b>Sorry!! Your $titlename - Faq Page Not Submitted</b><br><br>"; 
	include('edit-faq.php');
 }


 
}





  
?>