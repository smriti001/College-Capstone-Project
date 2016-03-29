<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<style type="text/css">
body {
	background-image: url(img/pg3.png);
}
img
{
position:absolute;
left:383px;
top:150px;
}
</style>
</head>

<body>
<div>
  <img src="img/duBlogo.png" alt="Logo" width="232" height="67" margin-top="10" /></div>

<table width="300" border="0" align="center" margin-top="100" cellpadding="220" cellspacing="1" bgcolor=transparent>
<tr>
<form name="form1" method="post" action="CorrectLogin.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor=transparent>
<tr>
<td colspan="3"><font face="helvetica" size="4.5"color="white" ><strong> Login </strong></font></td>
</tr>
<tr>
<td width="78" ><font face="helvetica" size="3.5"color="white" >Username</font></td>
<td width="6">:</td>
<td width="294"><input name="UserName" type="text" id="UserName"></td>
</tr>
<tr>
<td><font face="helvetica" size="3.5"color="white" >Password</font></td>
<td>:</td>
<td><input name="UserPassword" type="password" id="UserPassword"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

</body>
</html>