<?php 
	require("db_connection.php");
	unset($_SESSION['role']);
	header('Location: /kyrsovaya/index_gl.php');
	session_destroy();
 ?>