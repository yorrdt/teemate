<?php
	require "db.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../style/user-settings-style.css"/>
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
					<a class="header-title" href="">TeeMate</a>
				</div>
				<div class="header-item center-item"></div>
				<div class="header-item">
					<a href="">🔔</a>
				</div>
				<div class="header-item relative">
					<details class="details-overlay details-reset">
						<summary class="details-header">
							<img class="user-avatar" alt="" src="../img/Flying-Penguin.jpg" width="20px" height="20px">
							<span class="dropdown-caret"></span>
						</summary>
						<div class="dropdown-menu" style="width: 180px;">
							<div class="header-nav-current-user">
								<div class="current-user">Signed in as <?php echo "<strong>" . $_SESSION['logged_user']->login . "</strong>"; ?></div>
							</div>
							<hr></hr>
							<a class="dropdown-item" href="profile.php"><span class="menu-item-ico" style="width: 21px">🏠</span>Profile</a>
							<hr></hr>
							<a class="dropdown-item" href="user-settings.php"><span class="menu-item-ico" style="width: 21px">⚙️</span>Settings</a>
							<a class="dropdown-item" href=""><span class="menu-item-ico" style="width: 21px">❓</span>Help</a>
							<hr></hr>
							<a class="dropdown-item" href="signout.php"><span class="menu-item-ico" style="width: 21px">🚪</span>Sign out</a>
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
								<img class="user-avatar" alt="" src="../img/Flying-Penguin.jpg" width="32px" height="32px">
								<div class="user-names">
									<div class="current-user"><?php echo $_SESSION['logged_user']->login; ?></div>
									<div class="normal-text">Personal settings</div>
								</div>
							</div>
							<a class="menu-item" href="">Profile</a>
							<a class="menu-item" href="">Account</a>
							<a class="menu-item" href="">Security</a>
							<a class="menu-item" href="">Emails</a>
						</nav>
					</div>
					<div class="user-settings">
						<div class="user-settings-header">
							<h2 class="settings-subhead">Profile</h2>
						</div>
						<div class="settings-inside">
							<div class="settings-content">
								<form action="#" method="POST">
									<div>
										<dl class="form-group">
											<dt>
												<label for="user_profile_name">Name</label>
											</dt>
											<dd>
												<input class="form-control" type="text" name="user-name" value="">
												<div class="note">note</div>
											</dd>
										</dl>
										<dl class="form-group">
											<dt>
												<label for="user_profile_bio">Bio</label>
											</dt>
											<dd class="user-profile-bio-container">
												<div class="textarea-wrapper">
													<textarea class="form-control" name="" maxlength="160"></textarea>
												<div>
												<div class="note">note</div>
											</dd>
										</dl>
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