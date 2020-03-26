<?php
	require('C:/KypcoBaya/htdocs/kyrsovaya/ajax/db_connection.php');

	if(true)
	{
		// include Database connection file 
		

		// get values 
		$date_record = $_POST['date_record'];
		$time_record = $_POST['time_record'];
		$iid_doctor = $_SESSION['id_doctor'];


		$query = mysqli_query($link, "INSERT INTO record (id_doctor, date_record, time_record) VALUES('$iid_doctor', '$date_record', '$time_record');");
		     };  
?>