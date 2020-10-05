<?php
error_reporting(0);
$dbhost = "localhost";
$dbuser = "vesahe_user";
$dbpassword = "vesahe@123$";
$dbname = "vesahe_db";

//connect to mysql server
mysql_connect($dbhost, $dbuser, $dbpassword);

//select database
mysql_select_db($dbname) or die(mysql_error());

//website url path
$urlroot = "https://www.vesahe.com/beta/";


//image uploading path
$imgroot  = "/var/www/vhosts/vesahe.com/httpdocs/beta/admin/";  // live path settings
//$imgroot  = "D:/xampp/htdocs/vesa/admin/";        // local path settings

//session secuirty check
ini_set('session.cookie_httponly', true);
session_start();
if(isset($_SESSION['last_ip']) === false) {
$_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
}

if($_SESSION['last_ip'] !== $_SERVER['REMOTE_ADDR']) {
session_unset();
session_destroy();
}