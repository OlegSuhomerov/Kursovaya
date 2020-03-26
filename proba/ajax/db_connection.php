<?php

$myserver = 'localhost';
	$name = 'root';

  /*$user_login = '';*/

	$link = mysqli_connect($myserver, $name, "", "clinic");

    if (mysqli_connect_errno()) {
        echo "Ошибка подключение к базе данных (".mysqli_connect_errno()."): ".mysqli_connect_error();
        exit();}

?>