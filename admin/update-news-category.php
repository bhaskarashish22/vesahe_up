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

$sqlchk = "select name from newscategory where name = '$titlename'";
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

$sqlchks = "select pages from newscategory where pages = '".$_POST['pages']."'";
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

// If using MySQL
$titlename = mysql_real_escape_string($titlename);
$pageorder = $_POST['pageorder'];
$status = $_POST['status'];
$id = $_GET['id'];

$sql = "update newscategory set name = '$titlename', pages = '$newname', pageorder = '$pageorder', status = '$status', date=Now() where id='$id'";
$exe = mysql_query($sql);

$sql2 = "update newspages set fname = '$titlename', link = '$newname' where link='".$_POST['pages']."'";
$exe2 = mysql_query($sql2);

if($exe)
{
$msg="<br><b>Congratulation!! Your $titlename - News Category Successfully Submitted</b><br><br>";
include('edit-news-category.php');
 } 
 else
 {
	$msg="<br><b>Sorry!! Your $titlename - News Category Not Submitted</b><br><br>";
	include('edit-news-category.php'); 
 }

}

?>