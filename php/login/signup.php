<?php
	require "../db.php";
	
	if(isset($_SESSION['logged_user'])) {
		header('Location: ../profile.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../style/signup-style.css"/>
		<meta name="viewport" content="width=device-width">
		<title>TeeMate</title>
	</head>
	<body>
		<div class="main-wrapper">
			<main class="main-container">
				<div class="main">
					<div class="main-form">
						<a class="form-header-teemate" href="../index.php">TeeMate</a>
						<div class="form-header">Регистрация</div>
						<?php
							$data = $_POST;
							if(isset($data['do_signup'])) {
								$errors = array();
								if(trim($data['login']) == '') {
									$errors[] = 'Введите логин';
								}
								
								if(trim($data['email']) == '') {
									$errors[] = 'Введите Email';
								}
								
								if($data['password'] == '') {
									$errors[] = 'Введите пароль';
								}
								
								if($data['password'] != $data['password_repeat']) {
									$errors[] = 'Пароли не совпадают';
								}
								
								if(R::count('users', "login = ?", array($data['login'])) > 0) {
									$errors[] = 'Пользователь с таким логином уже существует';
								}
								
								if(R::count('users', "email = ?", array($data['email'])) > 0) {
									$errors[] = 'Пользователь с таким Email уже существует';
								}
								
								if(empty($errors)) {
									$user = R::dispense('users');
									$user->login = $data['login'];
									$user->email = $data['email'];
									$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
									R::store($user);
									header('Location: signin.php');
								} else {
									echo '<div class="form-incorrect"><div class="form-incorrect-message">' . array_shift($errors) . '</div></div>';
								}
							}
						?>
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