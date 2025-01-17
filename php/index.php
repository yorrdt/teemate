<?php
	require "db.php";
	
	if(isset($_SESSION['logged_user'])) {
		header('Location: profile.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../style/index-style.css"/>
		<meta name="viewport" content="width=device-width">
		<title>TeeMate</title>
	</head>
	<body>
		<div class="header-wrapper">
			<header class="header-container">
				<div class="header">
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
						<a class="header-title" href="index.php">TeeMate</a>
					</div>
					<div class="header-item center-item"></div>
					<div class="header-item">
						<a class="signin-item" href="login/signin.php">Sign in</a>
					</div>
					<div class="header-item">
						<a class="signup-item" href="login/signup.php">Sign up</a>
					</div>
				</div>
			</header>
		</div>
		<div class="main-wrapper">
			<main class="main-container">
				<div class="main">
					
				</div>
			</main>
		</div>
	</body>
</html>