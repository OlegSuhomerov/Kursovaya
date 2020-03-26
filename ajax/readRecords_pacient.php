<?php
	// include Database connection file 
require "db_connection.php";



	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>Дата</th>
							<th>Время</th>
							<th>Врач</th>
							<th>Записаться</th>
						</tr>';

	$query = mysqli_query($link, "SELECT * FROM record WHERE id_patients IS NULL ");

	/*$doc = mysqli_query($link, "SELECT id_specialization FROM doctors WHERE id_doctor = (SELECT id_doctor record WHERE id_patients IS NULL)");
		
	while($dac = mysqli_fetch_assoc($doc)){
    	$dac['id_doctor'] = $id_doc;};
	*/
    	

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
				<td>'.$row['id_doctor'].'</td>
				<td>
					<button onclick="GetUserDetails('.$row['id_record'].')" class="btn btn-warning">Записаться</button>
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