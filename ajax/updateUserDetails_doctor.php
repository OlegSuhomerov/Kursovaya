<?php
// include Database connection file
require "C:/KypcoBaya/htdocs/kyrsovaya/ajax/db_connection.php"; 

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $update_data = $_POST['date_record'];
    $update_time = $_POST['time_record'];

    // Updaste User details
    $query = "UPDATE record SET date_record = '$date_record', time_record = '$time_record' WHERE id_record = '$id'";
    if (!$result = mysqli_query($link, $query)) {
        exit(mysql_error());
    }
}
?>