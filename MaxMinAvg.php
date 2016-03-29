
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
<?php 
 // Connects to your Database
session_start();
 $x = $_SESSION['user']; 
 mysql_connect("mood01.loras.edu", "moodleuser", "MySQLuserPass") or die(mysql_error()); 
 mysql_select_db("test") or die(mysql_error()); 
 ?>  
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
                    Mininum Average Maximum</h2>
	<?php 
 // Connects to your Database
session_start();
 $x = $_SESSION['user']; 
 $y = $_GET['id']; 
 mysql_connect("mood01.loras.edu", "moodleuser", "MySQLuserPass") or die(mysql_error()); 
 mysql_select_db("test") or die(mysql_error()); 
 ?>
 <?php $data = mysql_query("Select Assignment.Class_idClass,CategoryTitle,Category_idCategory from Student_has_Assignment inner join Assignment on idAssignment = Assignment_idAssignment inner join Category on idCategory = Assignment.Category_idCategory
Where Assignment.Class_idClass = $y
group by CategoryTitle") ?> 
 
<div align="left">
<?php $dat = mysql_query("SELECT idClass FROM Class INNER JOIN User ON Class.User_idUser = User.idUser WHERE Class.User_idUser = $x;") ?> 
  <?php while($info = mysql_fetch_array( $dat )){ ?>
<form name = "thisForm" action = "MaxMinAvg.php?id=<?php echo $info['idClass'];?>" method="post">
<?php } ?>
<select  name="mydropdown" id = 'mydropdown'>
  <?php while($info = mysql_fetch_array( $data )){ ?>
       <option value= <?php echo $info['Category_idCategory'];
	   
	   if ($info['Category_idCategory']== $_POST[mydropdown])
	   echo " selected";
	   ?> > <?php echo $info['CategoryTitle']?> </option>;
     <?php } ?>

</select>

<input type="submit" value= "Go!">


</form>


<span id ="tag" > </span>


</div>
                       
  <div  id="chart_div" style="width: 900px; height:  500px;">
  
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

    <script type="text/javascript" src="https://www.google.com/jsapi">
	y = $("#mydropdown").val(); console.log(y); 
	
	</script>
	    <script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
 

  <?php $data = mysql_query("Select Assignment.Class_idClass,AssignmentTitle,Floor(Min(Score)) As Min,floor(avg(Score)) as Avg,Max(Score) as Max from Student_has_Assignment inner join Assignment on idAssignment = Assignment_idAssignment 
Where Assignment.Category_idCategory= $_POST[mydropdown] and  Assignment.Class_idClass = $y
group by AssignmentTitle
") ?> 

		
      var data = google.visualization.arrayToDataTable([
        ['Classes', 'Minimum', 'Average', 'Maximum', { role: 'annotation' } ],
	  <?php while($info = mysql_fetch_array( $data )){ ?>
        ['<?php echo $info['AssignmentTitle']?>', <?php echo $info['Min'] ?>, <?php echo $info['Avg']?>, <?php echo $info['Max']?>, ''],
		       <?php } ?> 
	    [' ',0,0,0,''],
      ]);

        var options = {
          title: 'Scores',
          hAxis: {title: '', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
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
