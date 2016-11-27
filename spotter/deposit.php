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
			padding:50px;
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

	<a href="index.php">
		<div class="jumbotron">
			
		</div>
	</a>
	<form action="compute.php" method="post">

		<div class="form-group">
			<label class="control-label" for="amount">Deposit Amount</label>
			<input type="text" class="form-control" id="amount" name="amount">
		</div>						
		
		<div class="form-group">
			<input type="submit" name="upload" name= "submit" value="Submit" class="btn btn-inverse "></input>
		</div>
	</form>
   <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/vendor/video.js"></script>
    <script src="js/flat-ui.min.js"></script>
</body>
</html>