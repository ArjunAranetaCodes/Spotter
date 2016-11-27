<?php
	$server = 'localhost';
	$username = 'root1';
	$password = '';
	$db = 'db_graph1';
	
	$ave = 0;
	$sum = 0;
	$amount = $_POST['amount'];
	$interval = 0;
	
	$conn = new mysqli($server,$username,$password,$db);
	if($conn->connect_error){
		die ('Failed'.$conn->connect_error);
	}		
		
	$query = "SELECT AVG(CAST(value1 AS UNSIGNED)) AS ave,  SUM(CAST(value1 AS UNSIGNED)) AS sum FROM my_chart_data";
	
	$result = $conn->query($query);
	if($result->num_rows>0){
		while($rows = $result->fetch_assoc()){
			//round up to nearest hundreds
			$ave = ceil(intval($rows["ave"])/100)*100;
			$sum = intval($rows["sum"]);
		}
	}
	/*echo "<br />";
	echo $ave;
	echo "<br />";
	echo $amount;
	echo "<br />";
	echo $sum;
	echo "<br />";
	echo $amount - $sum;
	echo "<br />";
	echo ceil(($amount - $sum)/$ave);*/
	$interval = ceil(($amount - $sum)/$ave);
	
	//5 for the nonzero value fro the database
	for($i = 6; $i <= $interval + 5; $i++){
		//$sql = "UPDATE my_chart_data2 SET value2='0' WHERE id='".$i."'";
		$sql = "UPDATE my_chart_data2 SET value2='".$ave."' WHERE id='".$i."'";
		mysqli_query($conn, $sql);
	}
		
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>ipunin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="img/favicon.ico">
	
	<style type="text/css">
		body{
			background-color:#0dc9ff;
			color:white;
		}
		
		input[type="submit"], a{
			width:100%;
		}		
		
		form{
			padding-left:50px;
			padding-right:50px;
		}
		
		.jumbotron{
			background:url('img/spotter3.png');
			background-repeat:no-repeat;
			background-position:center;
			background-size:380px 120px;
			height:120px;
		}
	</style>
</head>
<body>

  <!-- prerequisites -->
  <link rel="stylesheet" href="http://www.amcharts.com/lib/style.css" type="text/css">
  <script src="amcharts.js" type="text/javascript"></script>
  <script src="http://www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>

  <!-- cutom functions -->
  <script>
AmCharts.loadJSON = function(url) {
  // create the request
  if (window.XMLHttpRequest) {
    // IE7+, Firefox, Chrome, Opera, Safari
    var request = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    var request = new ActiveXObject('Microsoft.XMLHTTP');
  }

  // load it
  // the last "false" parameter ensures that our code will wait before the
  // data is loaded
  request.open('GET', url, false);
  request.send();

  // parse adn return the output
  return eval(request.responseText);
};
  </script>
	<a href="index.php">
		<div class="jumbotron">
			
		</div>
	</a>
	
  <!-- chart container -->
  <div id="chartdiv" style="width: 600px; height: 300px; margin:0px auto;"></div>

  <!-- the chart code -->
  <script>
var chart;

// create chart
AmCharts.ready(function() {

  // load the data
  var chartData = AmCharts.loadJSON('data2.php');

  // SERIAL CHART
  chart = new AmCharts.AmSerialChart();
  chart.pathToImages = "http://www.amcharts.com/lib/images/";
  chart.dataProvider = chartData;
  chart.categoryField = "category";
  chart.dataDateFormat = "YYYY-MM-DD";

  // GRAPHS

  var graph1 = new AmCharts.AmGraph();
  graph1.valueField = "value1";
  graph1.bullet = "round";
  graph1.bulletBorderColor = "#FFFFFF";
  graph1.bulletBorderThickness = 2;
  graph1.lineThickness = 2;
  graph1.lineAlpha = 0.5;
  chart.addGraph(graph1);

  var graph2 = new AmCharts.AmGraph();
  graph2.valueField = "value2";
  graph2.bullet = "round";
  graph2.bulletBorderColor = "#FFFFFF";
  graph2.bulletBorderThickness = 2;
  graph2.lineThickness = 2;
  graph2.lineAlpha = 0.5;
  chart.addGraph(graph2);

  // CATEGORY AXIS
  chart.categoryAxis.parseDates = true;

  // WRITE
  chart.write("chartdiv");
});

  </script>
	<ul style="padding-left:100px;padding-right:50px; font-size:20px;">
		<li>Yellow line shows the schedule</li>
		<li>Red line shows your actual deposit</li>
	</ul>
	<div class="col-md-12 input-group" style="width:100%;padding-left:50px;padding-right:50px;">
		<a href="setsched1.php" class="btn btn-danger btn-lg"/>Set Schedule</a>
	</div>	
		
	<br />
	<br />
	<br />
	<form action="forecast.php" method="post">			
		<div class="form-group">
			<input type="submit" name="upload" name= "submit" value="Submit" class="btn btn-inverse "></input>
		</div>
	</form>
    <!-- /.container -->


    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/vendor/video.js"></script>
    <script src="js/flat-ui.min.js"></script>
</body>
</html>

