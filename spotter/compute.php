<?php
	$server = 'localhost';
	$username = 'root1';
	$password = '';
	$db = 'db_graph1';
	
	$conn = new mysqli($server,$username,$password,$db);
	if($conn->connect_error){
		die ('Failed'.$conn->connect_error);
	}
		
	$sql = "INSERT INTO my_chart_data (category, value1, value2) VALUES ('".date('Y-m-d')."','". $_POST['amount']."','".$_POST['amount']."')";
	
	if($conn->query($sql) == true){
		echo "Success";
		header('Location:index.php');
		}
	else{
		echo "failed";
		//header('Refresh: 1; URL=upload.php');
}
?>