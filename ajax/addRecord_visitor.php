<?php
	require('C:/KypcoBaya/htdocs/kyrsovaya/ajax/db_connection.php');

	if(isset($_POST['date_visit']) && isset($_POST['time_visit']) && isset($_POST['compaints']) && isset($_POST['diagnosis']))
	{
		// include Database connection file 
	

		// get values 
		$date_visit = $_POST['date_visit'];
		$time_visit = $_POST['time_visit'];
		$compaints = $_POST['compaints'];
		$diagnosis = $_POST['diagnosis'];

		$id_doctor = $_SESSION['id_doctor'];

			

		$query = mysqli_query($link, "INSERT INTO visitor(id_doctor, id_record, compaints, diagnosis) VALUES('$id_doctor', (SELECT id_record FROM record WHERE date_record = '$date_visit' AND time_record =  '$time_visit'), '$compaints', '$diagnosis');");
		     };  
?>