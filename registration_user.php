<?php require "ajax/db_connection.php"; 

	$exa = $_POST;


	if (isset($exa['do_register'])) {
		//регистрация
		$eror = array();

		if (trim($exa['r_login_user']) == ''){	 
			$eror[] = 'Введите логин!';
		}
		if (trim($exa['r_password_user']) == ''){	 
			$eror[] = 'Введите пароль!';
		}
		if (trim($exa['surname_user']) == ''){	 
			$eror[] = 'Введите фамилию!';
		}
		if (trim($exa['name_user']) == ''){	 
			$eror[] = 'Введите имя!';
		}
		if (trim($exa['middlename_user']) == ''){	 
			$eror[] = 'Введите Отчество!';
		}
		if (trim($exa['adress_user']) == ''){	 
			$eror[] = 'Введите адресс!';
		}
		if (trim($exa['birthday_user']) == ''){	 
			$eror[] = 'Введите день рождения!';
		}
		if (trim($exa['phone_user']) == ''){	 
			$eror[] = 'Введите телефон!';
		}
		if (empty($eror)) {
			$r_login_user = $_POST['r_login_user'];
			$r_password_user = $_POST['r_password_user'];
			$surname_user = $_POST['surname_user'];
			$name_user = $_POST['name_user'];
			$middlename_user = $_POST['middlename_user'];
			$adress_user = $_POST['adress_user'];
			$birthday_user = $_POST['birthday_user'];
			$phone_user = $_POST['phone_user'];

			$reg = mysqli_query($link, "INSERT INTO users (user_login, user_password, id_role) VALUES ('$r_login_user', '$r_password_user', 1)");
			$reg_data = mysqli_query($link, "INSERT INTO patients (surname, name, middlename, adress, birthday, phone, id_user) VALUES ('$surname_user', '$name_user', '$middlename_user','$adress_user','$birthday_user','$phone_user',(SELECT id_user FROM users WHERE user_login='$r_login_user' AND user_password='$r_password_user'))");};
		};		 	
		


?>

<form action="registration_user.php" method="POST">

	<p>
		<p><strong>Фамилия:</strong></p>
		<input type="text" name="surname_user">
	</p>
		
		<p>
		<p><strong>Имя:</strong></p>
		<input type="text" name="name_user">
	</p>
	<p>
		<p><strong>Отчество:</strong></p>
		<input type="text" name="middlename_user">
	</p>
	<p>
		<p><strong>Адрес:</strong></p>
		<input type="text" name="adress_user">
	</p>
	<p>
		<p><strong>День рождения:</strong></p>
		<input type="date" name="birthday_user">
	</p>
	<p>
		<p><strong>Телефон:</strong></p>
		<input type="text" name="phone_user">
	</p>
	<p>
		<p><strong>Ваш логин:</strong></p>
		<input type="text" name="r_login_user">
	</p>
	<p>
		<p><strong>Ваш пароль:</strong></p>
		<input type="password" name="r_password_user">
	</p>

	<p>
		<button type="submit" name="do_register">Отослать</button>
	</p>
</form>
<a href="gl.php">На главную!</a>