<?php
// include Database connection file
require "db_connection.php";

// check request
if(isset($_POST))
{
    // get values
    $_SESSION['id_patient'] = $iak;

    // Updaste User details
    $query = "INSERT INTO patients (id_patient) VALUES ('$iak')";
    if (!$result = mysqli_query($link, $query)) {
        exit(mysql_error());
    }
}
?>