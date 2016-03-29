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
 $userID = 3;
 mysql_connect("mood01.loras.edu", "moodleuser", "MySQLuserPass") or die(mysql_error()); 
 mysql_select_db("test") or die(mysql_error()); 
 ?>
        var data = google.visualization.arrayToDataTable([
		 <?php 
			$sql = "CALL usp_MainPage_1($userID)";
			$data = mysql_query($sql) ?> 
          ['Year', 'Name', 'Expenses'],
	     <?php while($info = mysql_fetch_array( $data )){ ?>
          ['<?php Print $info['AssignmentTitle']; ?>', 45,  <?php Print $info['Score'];?>],
		 <?php } ?>
        ]);
 
  
 
        var options = {
        title:'Neal'
        hAxis: {title: 'Participants',  titleTextStyle: {color: 'red'}
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
    <a href = "capstone.php?id=<?php echo $info['Class_idClass'];?>"> <?php echo $info['ClassTitle'];?> </a>
   </tr>
   </td>
  <?php } ?> 
  
    </table>
    </td>
  <td>
    <table width="1055" height="279" border="1">
    <tr> 
    <td>
  
<p> <?php
 session_start();
 $x = $_SESSION['user'];
mysql_connect("mood01.loras.edu", "moodleuser", "MySQLuserPass") or die(mysql_error()); 
 mysql_select_db("test") or die(mysql_error()); 
 $data = mysql_query("SELECT UserFirstName FROM User WHERE idUser =$x") 
 or die(mysql_error()); 
 if(is_resource($data) and mysql_num_rows($data)>0){
    $row = mysql_fetch_array($data);
    echo $row["UserFirstName"].PHP_EOL;
    }
$data = mysql_query("SELECT ClassTitle FROM Class WHERE User_idUser =$x") 
 or die(mysql_error()); 
 if(is_resource($data) and mysql_num_rows($data)>0){
    $row = mysql_fetch_array($data);
    echo $row["ClassTitle"].PHP_EOL;
    }	



 
 ?> </p>
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