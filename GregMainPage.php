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

	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
 	  google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);


      function drawChart() {
  <?php 
 // Connects to your Database
session_start();
 $x = $_SESSION['user']; 
 $connect = mysql_connect("mood01.loras.edu", "moodleuser", "MySQLuserPass") or die(mysql_error()); 
 mysql_select_db("test") or die(mysql_error()); 
 ?>
        var data = google.visualization.arrayToDataTable([
		 <?php $data = mysql_query("CALL usp_MainPage_1($x)") ?> 
          ['Year', 'Name', 'Expenses'],
	     <?php while($info = mysql_fetch_array( $data )){ ?>
          ['<?php Print $info['AssignmentTitle']; ?>', 55,  <?php Print $info['Score'];?>],
		 <?php } ?>
        ]);
	
        var options = {
        title:'Name',
        vAxis: {title: 'Participants',  titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
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
 
  
    </table>
    </td>
  <td>
    <table width="1055" height="279" border="1">
    <tr> 
    <td>
  
<p> </p>
 <br> <br>

Grades:   
  <div  id="chart_div" style="width: 900px; height:  500px;"></div></p>
    </td>
    </tr>
    </table>
    </td>
	</tr>
  </table>
  
 

</body>
</html>