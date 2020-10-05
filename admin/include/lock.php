<?php
session_start();
if(isset($_SESSION['login_user']) && $_SESSION['login_user'] <> '')
{
?>

<?php
include('include/connection1.php');
session_start();
$user_check=$_SESSION['login_user'];

$ses_loginsql=mysql_query("select * from admin where username='$user_check'");

$row=mysql_fetch_array($ses_loginsql);

$login_session=$row['username'];
$passcode=$row['passcode'];

/*
if(!isset($login_session))
{
header("Location: index.php");
} */

?>

<?php } else { ?>
 <?php 
 error_reporting(0);
 $randval = mt_rand(1,109999);
 header("Location: index.php?error=$randval"); 
 ?>
  <?php } ?>


