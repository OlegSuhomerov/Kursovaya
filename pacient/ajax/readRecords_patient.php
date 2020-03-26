<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>Login</th>
							<th>Password</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>';

	$query = mysqli_query($link, "SELECT * FROM users");



    // if query results contains rows then featch those rows 

    if(mysqli_num_rows($query) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($query))
    	{
    		$data .= '<tr>
				<td>'.$number.'</td>
				<td>'.$row['user_login'].'</td>
				<td>'.$row['user_password'].'</td>
				<td>
					<button onclick="GetUserDetails('.$row['id_user'].')" class="btn btn-warning">Update</button>
				</td>
				<td>
					<button onclick="DeleteUser('.$row['id_user'].')" class="btn btn-danger">Delete</button>
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