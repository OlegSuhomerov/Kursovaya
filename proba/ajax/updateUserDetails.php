<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    // Updaste User details
    $query = "UPDATE users SET user_login = '$first_name', user_password = '$last_name' WHERE id_user = '$id'";
    if (!$result = mysqli_query($link, $query)) {
        exit(mysql_error());
    }
}
?>