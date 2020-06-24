<?php
	require "db.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../style/signin-style.css"/>
		<title>Sign in to TeeMate</title>
	</head>
	<body>
		<div class="main-wrapper">
			<main class="main-container">
				<div class="main-form">
					<a class="form-header-teemate" href="/">TeeMate</a>
					<div class="form-header">Вход</div>
					<?php
						$data = $_POST;
						if(isset($data['do_login'])) { 
							$errors = array();
							$user = R::findOne('users', 'login = ?', array($data['login']));
							
							if($user) {
								if(password_verify($data['password'], $user->password)) {
									$_SESSION['logged_user'] = $user;
									header('Location: profile.php');
								} else {
									$errors[] = 'Неверно введен пароль'; 
								}
							} else {
								$errors[] = 'Пользователь с таким логином не найден'; 
							}
							
							if(!empty($errors)) {
								echo '<div class="form-incorrect"><div class="form-incorrect-message">' . array_shift($errors) . '</div></div>';
							}
						}
					?>
					<form action="signin.php" method="POST">
						<div class="user-form">
							<label class="form-label">Username</label>
							<input class="form-control" type="text" name="login" value="<?php echo @$data['login']; ?>">
							<label class="form-label">Пароль<a class="form-remind-password" href="/">Забыли пароль?</a></label>
							<input class="form-control" type="password" name="password">
							<button class="submit-button" type="submit" name="do_login">Войти</button>
						</div>
					</form>
					<div class="form-additionals">
						<span class="form-additional">Еще нет аккаунта? <a class="form-additional-link" href="signup.php">Зарегистрируйтесь</a></span>
					</div>
				</div>
			</main>
		</div>
	</body>
</html>