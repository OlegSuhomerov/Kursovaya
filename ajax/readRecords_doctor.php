<?php
	// include Database connection file 
	require "C:/KypcoBaya/htdocs/kyrsovaya/ajax/db_connection.php"; 

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>Date</th>
							<th>Time</th>
							<th>Patients</th>
							<th>Delete</th>
						</tr>';

	$idd_doctor = $_SESSION['id_doctor'];
	$query = mysqli_query($link, "SELECT * FROM record WHERE id_doctor = $idd_doctor");



    // if query results contains rows then featch those rows 

    if(mysqli_num_rows($query) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($query))
    	{
    		$data .= '<tr>
				<td>'.$number.'</td>
				<td>'.$row['date_record'].'</td>
				<td>'.$row['time_record'].'</td>
				<td>'.$row['id_patients'].'</td>
				<td>
					<button onclick="DeleteUser('.$row['id_record'].')" class="btn btn-danger">Delete</button>
				</td>
    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>