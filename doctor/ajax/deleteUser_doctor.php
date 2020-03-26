<?php
	require "C:/KypcoBaya/htdocs/kyrsovaya/ajax/db_connection.php"; 
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
   

    // get user id
    $user_id = $_POST['id'];

    // delete User
    $query = "DELETE FROM record WHERE id_record = '$user_id'";
    if (!$result = mysqli_query($link, $query)) {
        exit(mysql_error());
    }
}
?>