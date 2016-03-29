<?php


session_start();

//echo $_SESSION['valid'];
//$exit;

//if(!session_is_registered(myusername)){
if($_SESSION['valid'] != '1'){
header("Location: /Hannah/main_login.php");
}
?>

<html>
<body>
Login Successful, <?php echo $_SESSION['user']; ?>
</body>
</html>