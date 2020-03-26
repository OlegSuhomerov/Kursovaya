<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("db_connection.php");

    // get user id
    $user_id = $_POST['id'];

    // delete User
    $query = "DELETE FROM users WHERE id_user = '$user_id'";
    if (!$result = mysqli_query($link, $query)) {
        exit(mysql_error());
    }
}
?>