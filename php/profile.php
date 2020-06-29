<?php
	require "db.php";
	
	if(isset($_SESSION['logged_user'])) {
		
	} else {
		header('Location: index.php'); 
	}
	
	$findUser = R::findOne('users', 'id = ?', array($_SESSION['logged_user']->id));
 ?>
<!-- За спрос не бьют в нос -->
<!-- Не бывает глупых вопросов, бывают глупые ответы -->
<!-- Грамотно составленный вопрос это уже половина ответа -->
<!DOCTYPE html>
<html class="height-full" lang="en">
	<head>
		<meta charset="utf-8">
		<title>TeeMate</title>
		<link rel="stylesheet" href="../style/profile-style.css">
		<meta name="viewport" content="width=device-width">
	</head>
	<body class="height-full">
		<div class="header-wrapper">
			<header class="header-container">
				<div class="header-item">
					<a class="hamburger-wrapper-ref" href="">
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
							<img class="user-avatar" alt="@<?php echo $_SESSION['logged_user']->login; ?>" src="../img/Flying-Penguin.jpg" width="20px" height="20px">
							<span class="dropdown-caret"></span>
						</summary>
						<div class="dropdown-menu" style="width: 180px;">
							<div class="header-nav-current-user">
								<div class="current-user">Signed in as <?php echo "<strong>" . $_SESSION['logged_user']->login . "</strong>"; ?></div>
							</div>
							<hr></hr>
							<a class="dropdown-item" href=""><span class="menu-item-ico" style="width: 21px">🏠</span>Profile</a>
							<hr></hr>
							<a class="dropdown-item" href="settings/user-profile-settings.php"><span class="menu-item-ico" style="width: 21px">⚙️</span>Settings</a>
							<a class="dropdown-item" href=""><span class="menu-item-ico" style="width: 21px">❓</span>Help</a>
							<hr></hr>
							<a class="dropdown-item" href="login/signout.php"><span class="menu-item-ico" style="width: 21px">🚪</span>Sign out</a>
						</div>
					</details>
				</div>
			</header>
		</div>
		<div class="main-wrapper">
			<main class="main-container height-full">
				<div class="main height-full">
					<div class="navbar-container">
						<nav class="navbar">
							<ul>
								<li>
									<div class="menu-heading">
										<a class="menu-heading-ref" href="">
											<img class="user-avatar avatar-sizing" alt="@<?php echo $_SESSION['logged_user']->login; ?>" src="../img/Flying-Penguin.jpg" width="32px" height="32px" title="@yorrdt">
											<div class="user-names">
												<div class="user-name"><?php echo @$findUser->user_name; ?></div>
												<div class="user-nickname"><?php echo $_SESSION['logged_user']->login; ?></div>
											</div>
										</a>
									</div>
								</li>
								<hr></hr>
								<!--div class="section">
									<span>section header 1</span>
								</div-->
								<li>
									<a class="menu-item" href="/">
										<div class="menu-item-ico" title="Projects">🚧</div>
										<span>Projects</span>
									</a>
								</li>
								<li>
									<a class="menu-item" href="/">
										<div class="menu-item-ico" title="Tasks">✔️</div>
										<span>Tasks</span>
									</a>
								</li>
								<hr></hr>
								<!--div class="section">
									<span>section header 1</span>
								</div-->
								<li>
									<a class="menu-item" href="/">
										<div class="menu-item-ico" title="Messages">💬</div>
										<span>Messages</span>
									</a>
								</li>
								<li>
									<a class="menu-item" href="/">
										<div class="menu-item-ico" title="Teammates">🤝</div>
										<span>Teammates</span>
									</a>
								</li>
								<hr></hr>
								<!--div class="section">
									<span>section header 3</span>
								</div-->
								<li>
									<a class="menu-item" href="/">
										<div class="menu-item-ico" title="Bookmarks">🔖</div>
										<span>Bookmarks</span>
									</a>
								</li>
								<li>
									<a class="menu-item" href="/">
										<div class="menu-item-ico" title="Documents">📄</div>
										<span>Documents</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>
					<div class="content-container-wrapper">
						<div class="content-container">
							<div class="content">
								<form action="#" method="POST">
									<div class="user-text">
										<textarea class="user-textarea" name="text" placeholder="Write about what your think"></textarea>
										<input class="submit-button" type="reset" value="Send" onclick="onButtonClick()"/>
									</div>
								</form>
								<ul class="post">
									<li class="row">
										<h4>Post header</h4>
										<ul>
											<li>eojfjoefjsjefjseofose</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<aside class="aside-container">
						<div class="aside">
							<h1>The Trooper</h1>
							<p>You'll take my life but I'll take yours too</p>
							<p>You'll fire your musket but I'll run you through</p>
							<p>So when you're waiting for the next attack</p>
							<p>You'd better stand there's no turning back</p>
						</div>
					</aside>
				</div>
			</main>
		</div>
	</body>
	<script src="/script/additionally/jquery-3.5.1.min.js" type="text/javascript"></script>
	<script src="/script/additionally/autosize.min.js"></script>
	<script src="/script/profile-script.js" type="text/javascript"></script>
</html>