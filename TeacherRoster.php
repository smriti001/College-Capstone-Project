
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Duboard </title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <!-- BEGIN: load jquery -->
 <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>

    <!-- END: load jquery -->
    <!-- BEGIN: load jqplot -->
     <link rel="stylesheet" type="text/css" href="css/jquery.jqplot.min.css" />
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
    <script language="javascript" type="text/javascript" src="js/jqPlot/jquery.jqplot.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>

    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
    
    <!-- END: load jqplot -->
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupDashboardChart('chart1');
            setupLeftMenu();
			setSidebarHeight();


        });
		

    </script>

    
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
          <div id="branding">
                <div class="floatleft">
                    <img src="img/duBlogo.png" alt="Logo" width="232" height="67" margin-top="10" /></div>
                <div class="floatright">
                    <div class="floatleft">
                  </div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello </li>
                            
                            <li><a href="#">Logout</a></li>
                        </ul>
                        <br />
                       
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
	  <div class="grid_12">
            <ul class="nav main">
                <li class="ic-courses"><a href="Overview.php?id=<?php echo $_GET['id'];?>"><span>Courses</span></a></li>
                <li class="ic-categories"><a href="AddCategory.php?id=<?php echo $_GET['id'];?>"><span>Categories</span></a></li>
                <li class="ic-assignments"><a href="AddAssignment.php?id=<?php echo $_GET['id'];?>"><span>Assignments</span></a></li>
				<li class="ic-scores"><a href="MaxMinAvg.php?id=<?php echo $_GET['id'];?>"><span>Scores</span></a></li>
                <li class="ic-students"><a href="TeacherRoster.php?id=<?php echo $_GET['id'];?>"><span>Students</span></a></li>
             
            </ul>
        </div>
        <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                        <li><a class="menuitem">Courses</a>
                            <ul class="submenu">
<?php 
 // Connects to your Database
session_start();
 $x = $_SESSION['user']; 
 $y = $_GET['id']; 
 mysql_connect("mood01.loras.edu", "moodleuser", "MySQLuserPass") or die(mysql_error()); 
 mysql_select_db("test") or die(mysql_error()); 
 ?>  
  <?php $data = mysql_query("SELECT idClass ,CONCAT(Class.ClassSubject, '-', Class.ClassNumber, '-', Class.ClassSection) AS FullClassCode, ClassTitle FROM Class INNER JOIN User ON Class.User_idUser = User.idUser WHERE Class.User_idUser = $x;") ?> 
  <?php while($info = mysql_fetch_array( $data )){ ?>
                                <li><a href = "MaxMinAvg.php?id=<?php echo $info['idClass'];?>"> <?php echo $info['FullClassCode'];?> </a>
        <?php } ?>          
              
                            </ul>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid_10">
<?php
 
// Connects to your Database
session_start();
$x = $_SESSION['user'];
$y = $_GET['id'];
 
/* ESTABLISH CONNECTION */
 
$connect=mysqli_connect("mood01.loras.edu", "moodleuser", "MySQLuserPass", "test");
 
if(mysqli_connect_errno()){
 
echo "Error".mysqli_connect_error();
}
 
if (isset($_POST['delete'])){ /* IF DELETE IS SET/CLICKED */
 
   $counter=mysqli_real_escape_string($connect,$_POST['hiddencounter']);
   $checkbox=$_POST['checkbox'];
 
   for($x=0;$x<=$counter;$x++){
 
	if(empty($checkbox[$x])){ /* IF SELECTED ITEM */
	/* DO NOTHING */
	}
 
	else {

	$checked=mysqli_real_escape_string($connect,$checkbox[$x]);
 	
	mysqli_query($connect,"DELETE FROM Student_has_Class WHERE User_idUser='$checked'");

	mysqli_query($connect,"DELETE FROM Student_has_Assignment
					WHERE User_idUser = '$checked' 
					AND Assignment_idAssignment = ANY(
						SELECT Assignment.idAssignment
						FROM Assignment
						INNER JOIN Class ON Class.idClass = Assignment.Class_idClass
						WHERE Assignment.Class_idClass = $y)");
 
	} /* END OF IF NOT EMPTY CHECKBOX SELECTED */
 
   } /* END OF FOR LOOP */
 
} /* END OF ISSET DELETE */
 
?>

<form name="form1" method="POST" action="">

<?php
 
$sql = "SELECT User.idUser, User.UserFirstName, User.UserLastName
FROM Student_has_Class
INNER JOIN User ON User.idUser = Student_has_Class.User_idUser AND User.Role = 'Student'
INNER JOIN Class ON Class.idClass = Student_has_Class.Class_idClass
WHERE Student_has_Class.Class_idClass = $y AND Class.User_idUser = $x
ORDER BY User.UserLastName";
 
$result = mysqli_query($connect,$sql);
 
$count = mysqli_num_rows($result);
 
?>
 
<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<td>
<table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td align ="left" colspan="4" bgcolor="#FFFFFF"><strong>Class Roster</strong> </td>
</tr>
<tr>
<td align="center" bgcolor="#FF">Drop</td>
<td align="center" bgcolor="#FF"><strong>ID</strong></td>
<td align="center" bgcolor="#FFFFF"><strong>Last Name</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>First Name</strong></td>
</tr>
 
<?php

$counter=0; /* FOR COUNTING PURPOSES */
while ($rows = mysqli_fetch_array($result))
{
/* START OF WHILE LOOP */

?>
 
<tr>
<td align="center" bgcolor="#FFFFFF">
<?php
 
$iduser=mysqli_real_escape_string($connect,$rows['idUser']);
 
echo "<input name='checkbox[$counter]' type='checkbox' id='checkbox' value='$iduser'></td>";
/* I HAVE ASSIGNED THE COUNTER INSIDE THE CHECKBOX ARRAY ABOVE. AND DO YOU REALLY NEED [] IN YOUR ID? */ ?>
 
<td bgcolor="#FFFFFF"><?php echo $rows['idUser'];?></td>
 
<td bgcolor="#FFFFFF"><?php echo $rows['UserLastName'];?></td>
 
<td bgcolor="#FFFFFF"><?php echo $rows['UserFirstName'];?></td>
</tr>
 
<?php

$counter=$counter+1; /* INCREMENT COUNTER EVERY LOOP */

} /* END OF WHILE LOOP */
 
echo "<input type='hidden' name='hiddencounter' value='$counter'>"; /* SUBMIT A HIDDEN INPUT CONTAINING THE OVERALL COUNTER */
 
/* print_r($_POST); */
 
?>
 
<tr>
<td colspan="5" align="center" bgcolor="#FFFFFF">
<input name="delete" type="submit" id="delete" value="Delete"></td>
</tr>
 
 
</table>
</td>
</tr>
</table>
</form>
 
<?php

if (isset($_POST['add'])){ /* IF add IS SET/CLICKED */
 
   $counter=mysqli_real_escape_string($connect,$_POST['hiddencounter']);
   $checkbox=$_POST['checkbox'];
 
   for($x=0;$x<=$counter;$x++){
 
	if(empty($checkbox[$x])){ /* IF SELECTED ITEM */
	/* DO NOTHING */
	}
 
	else {

	$checked=mysqli_real_escape_string($connect,$checkbox[$x]);
 
	mysqli_query($connect,"INSERT INTO Student_has_Class (Class_idClass, User_idUser) 
					VALUES (2, '$checked')");
 
	} /* END OF IF NOT EMPTY CHECKBOX SELECTED */
 
   } /* END OF FOR LOOP */
 
} 
 
?>

<form name="form1" method="POST" action="">

<?php
 
$sql = "SELECT idUser, UserFirstName, UserLastName
FROM User
WHERE User.Role = 'Student'
AND idUser NOT IN (SELECT User_idUser FROM Student_has_Class WHERE Class_idClass = $y);
";
 
$result = mysqli_query($connect,$sql);
 
$count = mysqli_num_rows($result);
 
?>
 
<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<td>
<table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td colspan="4" bgcolor="#FFFFFF"><strong>Class Roster</strong> </td>
</tr>
<tr>
<td align="center" bgcolor="#FFFFFF">Add</td>
<td align="center" bgcolor="#FFFFFF"><strong>ID</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Last Name</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>First Name</strong></td>
</tr>
 
<?php

$counter=0; /* FOR COUNTING PURPOSES */
while ($rows = mysqli_fetch_array($result))
{
/* START OF WHILE LOOP */

?>
 
<tr>
<td align="center" bgcolor="#FFFFFF">
<?php
 
$iduser=mysqli_real_escape_string($connect,$rows['idUser']);
 
echo "<input name='checkbox[$counter]' type='checkbox' id='checkbox' value='$iduser'></td>";
 ?>
 
<td bgcolor="#FFFFFF"><?php echo $rows['idUser'];?></td>
 
<td bgcolor="#FFFFFF"><?php echo $rows['UserLastName'];?></td>
 
<td bgcolor="#FFFFFF"><?php echo $rows['UserFirstName'];?></td>
</tr>
 
<?php

$counter=$counter+1; /* INCREMENT COUNTER EVERY LOOP */

} /* END OF WHILE LOOP */
 
echo "<input type='hidden' name='hiddencounter' value='$counter'>"; /* SUBMIT A HIDDEN INPUT CONTAINING THE OVERALL COUNTER */
 
/* print_r($_POST); */
 
?>
 
<tr>
<td colspan="5" align="center" bgcolor="#FFFFFF">
<input name="add" type="submit" id="add" value="Add"></td>
</tr>
 
 
</table>
</td>
</tr>
</table>
</form>
           
        </div>
     
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
        <p>
            You are logged in <a href="#"></a> 
        </p>
    </div>
</body>
</html>
