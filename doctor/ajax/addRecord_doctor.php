<?php
	require('C:/KypcoBaya/htdocs/kyrsovaya/ajax/db_connection.php');

	if(isset($_POST['date_record']) && isset($_POST['time_record']))
	{
		// include Database connection file 
		require('db_connection.php');

		// get values 
		$date_record = $_POST['date_record'];
		$time_record = $_POST['time_record'];
		/*$id_doctor = $_SESSION['id_doctor'];*/


		$query = mysqli_query($link, "INSERT INTO record(date_record, time_record, id_doctor) VALUES('$date_record', '$time_record', 4);");
		     };  
?>