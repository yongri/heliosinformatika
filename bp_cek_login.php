<?php 
ob_start();
session_start();
include "connection.php";
$username=$_POST['username'];
$password=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)

$username=stripslashes($username);
$password=stripslashes($password);

$username=mysql_real_escape_string($username);
$password=mysql_real_escape_string($password);
$sql="SELECT * FROM business_partner WHERE Username='$username' AND Password='$password'";
$query=mysql_query($sql); //echo $sql;
$data=mysql_fetch_array($query);
//echo $sql;
// Mysql_num_row is counting table row
$count=mysql_num_rows($query);

// If query matched $myusername and $mypassword, table row must be 1 row

if($count>0){
$_SESSION['Bp_id']		=$data['Bp_id'];
$_SESSION['Name']		=$data['Name'];
$_SESSION['Address']	=$data['Address'];
$_SESSION['City_name']	=$data['City_name'];
$_SESSION['Country_code']=$data['Country_code'];
$_SESSION['Country_code2']=$data['Country_code2'];
$_SESSION['Region_code']=$data['Region_code'];
$_SESSION['Phone']		=$data['Phone'];
$_SESSION['Phone_mobile']=$data['Phone_mobile'];
$_SESSION['Fax']		=$data['Fax'];
$_SESSION['Email']		=$data['Email'];
$_SESSION['Email2']		=$data['Email2'];
$_SESSION['Website']	=$data['Website'];
$_SESSION['Status']		=$data['Status'];
$_SESSION['Username']	=$data['Username'];
$_SESSION['Password']	=$data['Password'];
$_SESSION['Promo_id']	=$data['Promo_id'];

$status=$data['Status'];

	if($status=='Confirmed')
		{ header('Location: promo_bp.php') ; }

	else {
		echo"<script>alert('You are not confirmed by our admin yet!'); window.location = 'bp_login.php'</script>";
			}
}
else {
echo "<script>alert('Wrong Username or Password!'); window.location = 'bp_login.php'</script>";
} 

ob_end_flush();