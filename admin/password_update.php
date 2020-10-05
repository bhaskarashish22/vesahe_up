<?php
include('include/lock.php');
?>

<?php
include("include/connection1.php");

session_start();
$user_check=$_SESSION['login_user'];

$ses_sql=mysql_query("select * from admin where username='$user_check'");

$row=mysql_fetch_array($ses_sql);
$login_session=$row['username'];
$id=$row['id'];
$passcheck=$row['passcode'];

$oldpassword=addslashes($_POST['oldpassword']);
$oldpassword=md5($oldpassword); // Encrypted Password

// Check for a Old password and match against the old password. 
if ($oldpassword == $passcheck)
{


// Check for a password and match against the confirmed password. 
if (empty($_POST['passcode'])) { 
$npa = FALSE; 
$msg="<font color='#3C1006' face='verdana' size='2'>Please enter your password!<hr color='blue' size='4'></font>";
include("change_password.php");
  exit; 
} 


else { 
if ($_POST['passcode'] == $_POST['passcode1']) { 
$npa = ($_POST['passcode']); 
} else { 
$npa = FALSE; 
$msg="<font color='#3C1006' face='verdana' size='2'>Your password did not match the confirm password!<hr color='blue' size='4'></font>";
include("change_password.php");
  exit; 
} 
} 

}

// wrong old password message
else

{
$msg="<font color='#3C1006' face='verdana' size='2'>Wrong Old Password <hr color='blue' size='4'></font>";
include("change_password.php");
  exit;

}

$passcode = $_POST['passcode'];
$passcode=md5($passcode); // Encrypted Password
//$passcode1 = $_POST['passcode'];

$fpassword = $_POST['passcode']; // forgot mail password
$date = date('d-m-Y');



$sql = "update admin set passcode = '$passcode', passcode1 = '$passcode', fpassword = '$fpassword', date = '$date' where username='$user_check'";

$result = mysql_query($sql);
if($result)
{
$msg="Congratulations Your Password Change Successfully Submitted";
include('change_password.php');
}
else
{
$msg="Sorry Your Password Not Change ! This Time Server Down";
include('change_password.php');	
}
?>
