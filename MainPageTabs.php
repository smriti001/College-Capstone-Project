<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title>DuBoard Homepage</title>
<style type="text/css">
body {
	background-color: #D9D7D7;
}
h1 {
	color: #FBF8F8;
}
</style>
    

</head>


<body bgcolor="#D7D3D3">
<a href="main_login.php" >
<img src="banner2.jpg" width="1340" height="90">
</a></img>
<div id="shHeader">
<center>
  <div class="div"> 
Welcome to duBoard!</div></center>
<table width ="1345" height="30" align="top" border=1"> 
<tr aligh= top>


   <tr> <td width="40">  <a href = "PicChart.php?id=<?php echo $_GET['id'];?>"> Category </a> </td><td width="40"> <a href = "HWGraph.php?id=<?php echo $_GET['id'];?>"> Homework Graph </a> </td> <td width="40"> <a href = "TestGraph.php?id=<?php echo $_GET['id'];?>"> Test Graph </a> </td><td width="40"> <a href = "MainPageTabs.php?id=<?php echo $_GET['id'];?> "> Overview Graph </a> </td><td width="40"> <a href = "MainPageTabs.php?id=<?php echo $_GET['id'];?>"> Progress Bar </a> </td><td width="40"><a href = "MainPageTabs.php?id=<?php echo $_GET['id'];?>"> Timeline </a> </td></tr>

	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
 	  google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);

      function drawChart() {
          var data = google.visualization.arrayToDataTable([
		  
          ['Year'],
	               ['Exam 1', 100],
		         ]);
 
         var options = {
        title:'Exams',
        hAxis: {title: 'Participants',  titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
<table width="1345" height="279" border="1">
  <tr>
  <td>
  <table width="284" height="650" border="1" align="top">
  <tr align= top>
    <th scope="col">My Courses &nbsp;</th> 
  </tr>
  <tr>
 <?php 
 // Connects to your Database
session_start();
 $x = $_SESSION['user']; 
 mysql_connect("mood01.loras.edu", "moodleuser", "MySQLuserPass") or die(mysql_error()); 
 mysql_select_db("test") or die(mysql_error()); 
 ?>  
  <?php $data = mysql_query("SELECT ClassTitle, Student_has_Class.User_idUser,Class_idClass FROM Class inner join Student_has_Class on Class.idClass = Student_has_Class.Class_idClass where Student_has_Class.User_idUser = $x;") ?> 
  <?php while($info = mysql_fetch_array( $data )){ ?>
    <td>
    <a href = "PicChart.php?id=<?php echo $info['Class_idClass'];?>"> <?php echo $info['ClassTitle'];?> </a>
   </tr>
   </td>
  <?php } ?> 
  
    </table>
    </td>
  <td>
    <table width="1055" height="279" border="1">
    <tr> 
    <td>

Grades:   
  <div  id="chart_div" style="width: 900px; height:  500px; max-width:100%"></div></p>
    </td>
    </tr>
    </table>
    </td>
	</tr>
  </table>
  
 

</body>
</html>