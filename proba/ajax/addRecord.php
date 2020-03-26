<?php
	if(isset($_POST['first_name']) && isset($_POST['last_name']))
	{
		// include Database connection file 
		include("db_connection.php");

		// get values 
		$user_login = $_POST['first_name'];
		$user_password = $_POST['last_name'];

		$result = mysqli_query($link, "SELECT user_login, user_password FROM users WHERE user_login ='$user_login' AND user_password ='$user_password'");
			if (mysqli_num_rows($result) <= 0)
			{

			$query = "INSERT INTO users(user_login, user_password, id_role) VALUES('$user_login', '$user_password', 2)";
				if (!$result = mysqli_query($link, $query)) {
		         exit(mysqli_error($link));
		        }
			}
			else
			{
			echo 'Уже есть такая запись';
			}
		
	    
	}
?>