<?php
session_start();
$return_url = (isset($_SESSION['checkproductlist']))?urldecode($_SESSION['checkproductlist']):''; //return url 
header('Location:'.$return_url);
?>