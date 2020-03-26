<?php require "ajax/db_connection.php"; 

	
	$eha = $_POST;

	if (isset($eha['do_signup'])) {
		//регистрация
		$eror = array();

		if (trim($eha['login_user']) == ''){	 
			$eror[] = 'Введите логин!';
		}
		if (trim($eha['password_user']) == ''){	 
			$eror[] = 'Введите пароль!';
		}
		if (empty($eror)) {
			
			if(isset($_POST['login_user']) && isset($_POST['password_user'])){
				$login_user = $_POST['login_user'];
				$password_user = $_POST['password_user'];	
				
				$login = mysqli_query($link, "SELECT user_login, user_password FROM users WHERE user_login ='$login_user' AND user_password ='$password_user'");
					
				while ($raw = mysqli_fetch_assoc($login)) {
						$_SESSION['login'] = $raw['user_login'];};

				if (mysqli_num_rows($login) != null){
					
					$result_role = mysqli_query($link, "SELECT id_role FROM users WHERE user_login ='$login_user' AND user_password ='$password_user'");
							
					while ($row = mysqli_fetch_assoc($result_role)) {
						$_SESSION['role'] = $row['id_role'];}
							
					if ($_SESSION['role'] == 2) {

                		$id_doctor = mysqli_query($link, "SELECT id_doctor FROM doctors WHERE id_user = (SELECT id_user FROM users WHERE user_login ='$login_user' AND user_password ='$password_user')");
							
						while ($riw = mysqli_fetch_assoc($id_doctor)) {
							$_SESSION['id_doctor'] = $riw['id_doctor'];};

						$name_doctor = mysqli_query($link, "SELECT name FROM doctors WHERE id_user = (SELECT id_user FROM users WHERE user_login ='$login_user' AND user_password ='$password_user')");

						while ($ras = mysqli_fetch_assoc($name_doctor)) {
							$_SESSION['name_doctor'] = $ras['name'];};
						
						header('Location: index_doctor.php');
						
					}elseif($_SESSION['role'] == 1){

						$name_patient = mysqli_query($link, "SELECT name FROM patients WHERE id_user = (SELECT id_user FROM users WHERE user_login ='$login_user' AND user_password ='$password_user')");

						while ($ran = mysqli_fetch_assoc($name_patient)) {
							$_SESSION['name_patient'] = $ran['name'];};

							

						$id_log_user = mysqli_query($link, "SELECT id_patient FROM patients WHERE id_user = (SELECT id_user FROM users WHERE user_login ='$login_user' AND user_password ='$password_user')");

							while ($bar = mysqli_fetch_assoc($id_log_user)) {
							$_SESSION['id_patient'] = $bar['id_patient'];};
						
						header('Location: index_pacient.php');

					};

					echo "Ок";
				}
				else {
					echo "Нет";
				}		
			};
		}		 	
		else {
			echo '<div style="color: red;">'.array_shift($eror).'</div></hr>';	
		}       		
	}           			
?>

<form action="login_user.php" method="POST">

	<p>
		<p><strong>Ваш логин:</strong></p>
		<input type="text" name="login_user">
	</p>

	<p>
		<p><strong>Ваш пароль:</strong></p>
		<input type="password" name="password_user">
	</p>

	<p>
		<button type="submit" name="do_signup">Залогинеться</button>
	</p>
</form>
<a href="gl.php">На главную!</a>


