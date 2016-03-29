
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>duBoard </title>
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
                            
                            <li><a href="index.php">Logout</a></l
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
                  <li class="ic-form-style"><a href="Overview.php?id=<?php echo $_GET['id'];?>"><span>Overview</span></a></li>
                <li class="ic-dashboard"><a href="PicChart.php?id=<?php echo $_GET['id'];?>"><span>Category Chart</span></a></li>
                <li class="ic-typography"><a href="TestGraph.php?id=<?php echo $_GET['id'];?>"><span>Test Graph</span></a></li>
				<li class="ic-charts"><a href="HWGraph.php?id=<?php echo $_GET['id'];?>"><span>Homework graph</span></a></li>
                <li class="ic-gpa"><a href="GPA.php?id=<?php echo $_GET['id'];?>"><span>GPA Calculator</span></a></li>
             
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
  <?php $data = mysql_query("SELECT ClassTitle, Student_has_Class.User_idUser,Class_idClass FROM Class inner join Student_has_Class on Class.idClass = Student_has_Class.Class_idClass where Student_has_Class.User_idUser = $x;") ?> 
  <?php while($info = mysql_fetch_array( $data )){ ?>
                                <li><a href = "PicChart.php?id=<?php echo $info['Class_idClass'];?>"> <?php echo $info['ClassTitle'];?> </a>
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
                    Test Graph</h2>
                       
  <div  id="chart_div" style="width: 900px; height:  500px; max-width:100%;">
  
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
 	  google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);

 function drawChart() {
  <?php 
 // Connects to your Database
session_start();
 $x = $_SESSION['user']; 
 $y = $_GET['id'];
 mysql_connect("mood01.loras.edu", "moodleuser", "MySQLuserPass") or die(mysql_error()); 
 mysql_select_db("test") or die(mysql_error()); 
 ?>
        var data = google.visualization.arrayToDataTable([
		 <?php $data = mysql_query("
SELECT Assignment.AssignmentTitle, Student_has_Assignment.Score
FROM Student_has_Assignment
INNER JOIN Assignment ON Assignment.idAssignment = Student_has_Assignment.Assignment_idAssignment
INNER JOIN Category ON Category.idCategory = Assignment.Category_idCategory
WHERE Student_has_Assignment.User_idUser =$x AND Assignment.Class_idClass =$y
AND Category.CategoryType = 'T'") ?> 
          ['Year', 'Exams'],
	     <?php while($info = mysql_fetch_array( $data )){ ?>
          ['<?php Print $info['AssignmentTitle']; ?>', <?php Print $info['Score'];?>],
		 <?php } ?>
          ['',0]
        ]);
	
 <?php session_start();
 $x = $_SESSION['user'];
 $data = mysql_query("SELECT UserFirstName FROM User WHERE idUser =$x") 
 or die(mysql_error()); 
 if(is_resource($data) and mysql_num_rows($data)>0){ ?>
        var options = {
        title:'<?php  $row = mysql_fetch_array($data);echo $row["UserFirstName"]; }?>',
        vAxis: {title: 'Participants',  titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
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
