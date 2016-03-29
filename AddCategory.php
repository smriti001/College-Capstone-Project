
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
            <div class="box round first">
                <h2>
                    Edit Categories</h2>


                       
  <div  id="chart_div" style="width: 900px; height:  500px;">
    <?php

session_start();

$con=mysqli_connect("mood01","moodleuser","MySQLuserPass","test");

if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }



if(isset($_POST['delete'])){ /* IF DELETE IS SET/CLICKED */

$counter=mysqli_real_escape_string($con,$_POST['hiddencounter']);
$checkbox=$_POST['checkbox'];

	for($x=0;$x<=$counter;$x++){

		if(empty($checkbox[$x])){ /* IF SELECTED ITEM */
		/* DO NOTHING */
		}

		else {

		$checked=mysqli_real_escape_string($con,$checkbox[$x]);
		
		$classID = mysqli_real_escape_string($con,$_SESSION['classID']);

		mysqli_query($con,"DELETE FROM Category WHERE idCategory = '$checked' AND Class_idClass = '$classID'");

		} /* END OF IF NOT EMPTY CHECKBOX SELECTED */

	} /* END OF FOR LOOP */

} /* END OF ISSET DELETE */


if(isset($_POST['Add'])){ /* IF ADD BUTTON IS CLICKED */

	if(!empty($_POST['CategoryTitle']) && !empty($_POST['CategoryWeight']) && !empty($_POST['CategoryType']) && !empty($_POST['CategoryAssignmentEstimates'])){

	$classID = mysqli_real_escape_string($con,$_SESSION['classID']);

	$categorytitle=mysqli_real_escape_string($con,$_POST['CategoryTitle']);
	$categoryweight=mysqli_real_escape_string($con,$_POST['CategoryWeight']);
	$categorytype=mysqli_real_escape_string($con,$_POST['CategoryType']);
	$categoryassignment=mysqli_real_escape_string($con,$_POST['CategoryAssignmentEstimates']);

	$sql="INSERT INTO Category (CategoryTitle, CategoryWeight, CategoryType, CategoryAssignmentEstimates, Class_idClass)
	VALUES ('$categorytitle', '$categoryweight', '$categorytype', '$categoryassignment', '$classID')";

	mysqli_query($con,$sql);

	echo "Insert New Data";

	} /* END OF IF NOT EMPTY ALL DATA */

	else {
	
	echo "Please fill-in data properly before inserting.";

	}

} /* END OF ISSET ADD */


if(isset($_POST['update'])){ /* IF UPDATE BUTTON IS CLICKED */

	if(!empty($_POST['CategoryTitle']) && !empty($_POST['CategoryWeight']) && !empty($_POST['CategoryType']) && !empty($_POST['CategoryAssignmentEstimates']) && !empty($_POST['hiddencounter'])){

	$classID = mysqli_real_escape_string($con,$_SESSION['classID']);

	$hidcoun=mysqli_real_escape_string($con,$_POST['hiddencounter']);
	$checkbox=$_POST['checkbox'];
	$categorytitle=mysqli_real_escape_string($con,$_POST['CategoryTitle']);
	$categoryweight=mysqli_real_escape_string($con,$_POST['CategoryWeight']);
	$categorytype=mysqli_real_escape_string($con,$_POST['CategoryType']);
	$categoryassignment=mysqli_real_escape_string($con,$_POST['CategoryAssignmentEstimates']);
	$idcategory=mysqli_real_escape_string($con,$_POST['idCategory']);

		for($x=0;$x<=$hidcoun;$x++){

			if(!empty($checkbox[$x])){

			$sql="UPDATE Category SET CategoryTitle='$categorytitle', CategoryWeight='$categoryweight', CategoryType='$categorytype', CategoryAssignmentEstimates='$categoryassignment' WHERE Class_idClass='$classID' AND idCategory='$checkbox[$x]'";

			mysqli_query($con,$sql);

			}

		}

	echo "Updated properly.";

	} /* END OF IF NOT EMPTY POST DATA */

	else {
	echo "Please fill-in data properly before updating.";
	}

} /* END OF IF ISSET UPDATE */



?>

<form method="post" action="">

<?php

$classID = mysqli_real_escape_string($con,$_SESSION['classID']);

$SQLquery = "SELECT * FROM Category WHERE Class_idClass = '$classID'";

$result = mysqli_query($con,$SQLquery);

$count = mysqli_num_rows($result);

?>




<?php

$counter=0; /* FOR COUNTING PURPOSES */
while($row = mysqli_fetch_array($result)){
/* START OF WHILE LOOP */

?>

<tr>
<td align="center" bgcolor="#FFFFFF">

<?php

$idCategory=mysqli_real_escape_string($con,$row['idCategory']);

echo "<input name='checkbox[$counter]' type='checkbox' id='checkbox' value='$idCategory'>";

?>

</td>
<td>
<input type="text" name="CategoryTitle" size="20" value="<?php echo $row['CategoryTitle']; ?>" readonly>
</td>
<td>
<input type="number" name="CategoryWeight" size="20" min="0" max="100" value="<?php echo $row['CategoryWeight']; ?>" onkeypress="return isNumber(event)" readonly>
</td>
<td>
<select id="CategoryType" name="CategoryType" readonly>
      	     <option value="<?php echo $row['CategoryType']; ?>" selected='selected'>Current: <?php echo $row['CategoryType']; ?></option>
            <option value="T">Test (T)</option>
            <option value="H">Homework (H)</option>
            <option value="Other">Other</option>
</select>
</td>
<td>
<input type="number" name="CategoryAssignmentEstimates" min="0" value="<?php echo $row['CategoryAssignmentEstimates']; ?>" onkeypress="return isNumber(event)" readonly>
</td>

</tr>

<?php

$counter=$counter+1; /* INCREMENT COUNTER EVERY LOOP */

} /* END OF WHILE LOOP */

echo "<input type='hidden' name='hiddencounter' value='$counter'>"; /* SUBMIT A HIDDEN INPUT CONTAINING THE OVERALL COUNTER */

?>

</table>

<table>

<tr>

<td>
<input type="submit" name="Add" value="Add New Category">
</td>

<td>
<input name="delete" type="submit" id="delete" value="Delete">
</td>
	
<td>
<input name="update" type="submit" id="update" value="Update">
</td>

</tr>

</table>

<table>
<tr><td>New Category Name: </td><td><input type="text" name="CategoryTitle" ></td></tr>
<tr><td>Weight Percentage: </td><td><input type="number" min="0" max="100" name="CategoryWeight" onkeypress="return isNumber(event)" ></td></tr>
<tr><td>Category Type: </td><td><select id="CategoryType" name="CategoryType">
		<option value="T">Exam/Test</option>
		<option value="H">Homework</option>
		<option value="Other">Other</option>   
		</select></td></tr>
<tr><td>Estimated Number of Assignments: </td><td><input type="number" name="CategoryAssignmentEstimates" min="0" onkeypress="return isNumber(event)" ></td></tr>

</table>

</form>

<script language="javascript">
function isNumber(evt) {
   evt = (evt) ? evt : window.event;
   var charCode = (evt.which) ? evt.which : evt.keyCode;
   if (charCode > 31 && (charCode < 48 || charCode > 57)) {
       return false;
   }
   return true;
}
</script>
	
  
  </div></p>
   
                <div class="block">
                    <div id="chart1">
                    </div>
                </div>
            </div>
           
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
