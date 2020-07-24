<?php
	require "../db.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../../style/user-emails-settings-style.css"/>
		<title>Your Profile</title>
	</head>
	<body>
		<div class="header-wrapper">
			<header class="header-container">
				<div class="header-item">
					<a class="hamburger-wrapper-ref" href="/">
						<div class="hamburger">
							<div class="ham1"></div>
							<div class="ham2"></div>
							<div class="ham3"></div>
						</div>
					</a>
				</div>
				<div class="header-item">
					<a class="header-title" href="/profile.php">TeeMate</a>
				</div>
				<div class="header-item center-item"></div>
				<div class="header-item">
					<a href="">🔔</a>
				</div>
				<div class="header-item relative">
					<details class="details-overlay details-reset">
						<summary class="details-header">
							<img class="user-avatar" alt="@<?php echo $_SESSION['logged_user']->login; ?>" src="../../img/Flying-Penguin.jpg" width="20px" height="20px">
							<span class="dropdown-caret"></span>
						</summary>
						<div class="dropdown-menu" style="width: 180px;">
							<div class="header-nav-current-user">
								<div class="current-user">Signed in as <?php echo "<strong>" . $_SESSION['logged_user']->login . "</strong>"; ?></div>
							</div>
							<hr></hr>
							<a class="dropdown-item" href="../profile.php"><span class="menu-item-ico" style="width: 21px">🏠</span>Profile</a>
							<hr></hr>
							<a class="dropdown-item" href=""><span class="menu-item-ico" style="width: 21px">⚙️</span>Settings</a>
							<a class="dropdown-item" href=""><span class="menu-item-ico" style="width: 21px">❓</span>Help</a>
							<hr></hr>
							<a class="dropdown-item" href="../login/signout.php"><span class="menu-item-ico" style="width: 21px">🚪</span>Sign out</a>
						</div>
					</details>
				</div>
			</header>
		</div>
		<div class="main-wrapper">
			<main class="main-container">
				<div class="page-content">
					<div class="menu-container">
						<nav class="menu">
							<div class="menu-header">
								<img class="user-avatar" alt="@<?php echo $_SESSION['logged_user']->login; ?>" src="../../img/Flying-Penguin.jpg" width="32px" height="32px">
								<div class="user-names">
									<div class="user-name"><?php echo $_SESSION['logged_user']->login; ?></div>
									<div class="normal-text">Personal settings</div>
								</div>
							</div>
							<a class="menu-item" href="user-profile-settings.php">Profile</a>
							<a class="menu-item" href="user-account-settings.php">Account</a>
							<a class="menu-item" href="user-security-settings.php">Security</a>
							<a class="menu-item selected" href="">Emails</a>
						</nav>
					</div>
					<div class="user-settings">
						<div class="emails-settings">
							<div class="emails-settings-header">
								<h2 class="emails-settings-subhead">Emails</h2>
								<?php
									$data = $_POST;
									
									if(isset($data['do_changing_email'])) {
										$errors = array();
										$findUser = R::findOne('users', 'id = ?', array($_SESSION['logged_user']->id));
										$change_email = R::load('users', $findUser->id);
										
										if(trim($data['new_email']) == '') {
											$errors[] = 'Вы не ввели Email';
										}
										
										if(R::count('users', "email = ?", array($data['new_email'])) > 0) {
											$errors[] = 'Email ' . $data['new_email'] . ' занят другим пользователем';
										}
		
										if(empty($errors)) {
											$change_email->email = $data['new_email'];
											R::store($change_email);
											$_SESSION['logged_user']->email = $change_email->email;
											echo '<div class="form-save-message">Email успешно обновлен</div>'; 
										} else {
											echo '<div class="form-save-message red">' . array_shift($errors) . '</div>';
										}
									}
								?>
							</div>
							<div class="settings-emails-content">
								<ul class="this-email">
									<li class="row">
										<h4><?php echo $_SESSION['logged_user']->email; ?></h4>
									</li>
								</ul>
								<form action="user-emails-settings.php" method="POST">
									<div>
										<dl class="form-group">
											<dt>
												<label>Change email</label>
											</dt>
											<dd>
												<input class="form-control" type="email" name="new_email">
											</dd>
										</dl>
										<button class="submit-button-default" type="submit" name="do_changing_email">Change email</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
	</body>
</html>