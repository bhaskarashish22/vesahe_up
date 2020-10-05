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
    $price1 = stripslashes($_POST['price1']);
	$price2 = stripslashes($_POST['price2']);
}
else {
    $price1 = $_POST['price1'];
	$price2 = $_POST['price2'];
		
}


// If using MySQL
$price1 = mysql_real_escape_string($price1);
$price2 = mysql_real_escape_string($price2);
$pageorder = $_POST['pageorder'];
$status = $_POST['status'];
$id = $_GET['id'];

$sql = "update pricelist set price1 = '$price1', price2 = '$price2', pageorder = '$pageorder', status = '$status', date=Now() where id='$id'";
$exe = mysql_query($sql);

if($exe)
{
$msg="<br><b>Congratulation!! Your $price1 To $price2 - Price Successfully Submitted</b><br><br>";
include('edit-price.php');
 } 
 else
 {
	$msg="<br><b>Sorry!! Your Your $price1 To $price2 - Price Not Submitted</b><br><br>"; 
	include('edit-price.php');

 }

}

?>