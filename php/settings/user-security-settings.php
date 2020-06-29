<?php
	require "../db.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../../style/user-security-settings-style.css"/>
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
							<a class="dropdown-item" href="/login/signout.php"><span class="menu-item-ico" style="width: 21px">🚪</span>Sign out</a>
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
							<a class="menu-item selected" href="">Security</a>
							<a class="menu-item" href="user-emails-settings.php">Emails</a>
						</nav>
					</div>
					<div class="user-settings">
						<div class="security-settings">
							<div class="security-settings-header">
								<h2 class="security-settings-subhead">Change password</h2>
							</div>
							<div class="settings-security-content">
								<form action="#" method="POST">
									<div>
										<dl class="form-group">
											<dt>
												<label>Old password</label>
											</dt>
											<dd>
												<input class="form-control" type="text" name="old_password" value="<?php ?>">
											</dd>
										</dl>
										<dl class="form-group">
											<dt>
												<label>New password</label>
											</dt>
											<dd>
												<input class="form-control" type="text" name="new_password" value="<?php ?>">
											</dd>
										</dl>
										<dl class="form-group">
											<dt>
												<label>Confirm new password</label>
											</dt>
											<dd>
												<input class="form-control" type="text" name="confirm_password" value="<?php ?>">
											</dd>
										</dl>
										<div class="note">note</div>
										<p>
											<button class="submit-button-default mr-8px" type="submit" name="do_updating_password">Update password</button>
											<span>
												<a class="forget-password" href="">I forgot my password</a>
											</span>
										</p>
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