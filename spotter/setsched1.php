<?php
	$server = 'localhost';
	$username = 'root1';
	$password = '';
	$db = 'db_graph1';
	
	$conn = new mysqli($server,$username,$password,$db);
	if($conn->connect_error){
		die ('Failed'.$conn->connect_error);
	}
		
	$sql = "DELETE FROM my_chart_data";
	$conn->query($sql);
	
	$query = "select * from my_chart_data2";
		$result = $conn->query($query);
		if($result->num_rows>0){
			while($rows = $result->fetch_assoc()){
				$sql = "INSERT INTO my_chart_data (category, value1, value2) VALUES ('".$rows['category']."','".$rows['value1']."','".$rows['value2']."')";
				$conn->query($sql);
			}
				
		}
	
	header("Location:index.php");
?>