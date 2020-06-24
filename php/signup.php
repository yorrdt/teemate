<?php
	require "db.php";
	
	$data = $_POST;
	if(isset($data['do_signup'])) {
		$errors = array();
 		if(trim($data['login']) == '') {
			$errors[] = 'Введите логин!';
		}
		
		if(trim($data['email']) == '') {
			$errors[] = 'Введите Email!';
		}
		
		if($data['password'] == '') {
			$errors[] = 'Введите пароль!';
		}
		
		if($data['password'] != $data['password_repeat']) {
			$errors[] = 'Повторный пароль введен неверно!';
		}
		
		if(R::count('users', "login = ?", array($data['login'])) > 0) {
			$errors[] = 'Пользователь с таким логином уже существует!';
		}
		
		if(R::count('users', "email = ?", array($data['email'])) > 0) {
			$errors[] = 'Пользователь с таким Email уже существует!';
		}
		
		if(empty($errors)) {
			$user = R::dispense('users');
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			R::store($user);
			echo '<div style="color: green;">Вы успешно зарегистрированы!</div><hr>';
			header('Location: profile.php');
		} else {
			echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../style/signup-style.css"/>
		<title>TeeMate</title>
	</head>
	<body>
		<div class="main-wrapper">
			<main class="main-container">
				<div class="main">
					<div class="main-form">
						<a class="form-header-teemate" href="/">TeeMate</a>
						<div class="form-header">Регистрация</div>
						<form action="signup.php" method="POST">
							<div class="user-form">
								<label class="form-label">Username</label>
								<input class="form-control" type="text" name="login" value="<?php echo @$data['login']; ?>">
								<label class="form-label">E-mail</label>
								<input class="form-control" type="email" name="email" value="<?php echo @$data['email']; ?>">
								<label class="form-label">Пароль</label>
								<input class="form-control" type="password" name="password">
								<label class="form-label">Пароль еще раз</label>
								<input class="form-control" type="password" name="password_repeat">
								<button class="submit-button" type="submit" name="do_signup">Зарегистрироваться</button>
							</div>
						</form>
						<div class="form-additionals">
							<span class="form-additional">Уже зарегистрированы? <a class="form-additional-link" href="signin.php">Войдите</a></span>
						</div>
					</div>
				</div>
			</main>
		</div>
	</body>
</html>