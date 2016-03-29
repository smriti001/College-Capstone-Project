<?php


//ob_start();
$host="mood01.loras.edu"; // Host name 
$username="moodleuser"; // Mysql username 
$password="MySQLuserPass"; // Mysql password 
$db_name="test"; // Database name 
$tbl_name="User"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['UserName']; 
$mypassword=$_POST['UserPassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT idUser FROM $tbl_name WHERE UserName='$myusername' and UserPassword='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row


if($count==1){
$ary = mysql_fetch_array($result);

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_start();
$_SESSION['valid'] = 1;
$_SESSION['user'] = $ary['idUser'];
header("Location: /Hannah/login_success.php");

//session_register("$myusername");
//session_register("$mypassword"); 
//header("Location: /Hannah/login_success.php");
//$exit
//echo "You are successfully logged in.";
}
else {
echo "Wrong Username or Password";
$_SESSION['valid'] = 0;
$_SESSION['user'] = -1;
}
//ob_end_flush();
?>