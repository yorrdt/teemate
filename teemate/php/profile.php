<?php
	require "db.php";
	
	if(isset($_SESSION['logged_user'])) {
		
	} else {
		header('Location: index.php'); 
	}
	
	$findUser = R::findOne('users');
	
	$data = $_POST;
	
 	if(isset($data['do_posting'])) {
 		$errors = array();
		
		if(trim($data['textarea']) == '') {
			$errors[] = 'Пустое поле';
		}
		
		if(empty($errors)) {
			$userID = 'articles' . $_SESSION['logged_user']->id;
			$post = R::dispense($userID);
			$post->author = $_SESSION['logged_user']->login;
			$post->text = $data['textarea'];
			$post->pubdate = date('d.m.Y H:i', strtotime('+3 hour'));
			$post->count_of_likes = 0;
			$post->count_of_comments = 0;
			$post->count_of_views = 0;
			R::store($post);
		} else {
			//echo array_shift($errors);
		}
	} 
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
					<img alt="" src="../img/teemate.png" width="32px" height="32px">
					<!--a class="header-title" href="">TeeMate</a-->
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
											<img class="user-avatar" alt="@<?php echo $_SESSION['logged_user']->login; ?>" src="../img/Flying-Penguin.jpg" width="36px" height="36px" title="@<?php echo $_SESSION['logged_user']->login; ?>">
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
								<div class="textarea-container">
									<form action="profile.php" method="POST">
										<div class="user-text">
											<textarea class="user-textarea" name="textarea" placeholder="О чем думаете?"></textarea>
										</div>
										<div class="textarea-submenu">
											<button class="submit-button-default" type="submit" name="do_posting" onclick="textareaHeightChecking()">Send</button>
										</div>
									</form>
								</div>
								<?php
										$userID = 'articles' . $_SESSION['logged_user']->id;
										$countOfPosts = R::count($userID);
										
										/*
										$limit = 15;
										if($countOfPosts > $limit) {
											$lower = $countOfPosts - $limit;
											$findPost = R::findAll($userID, 'id > ?', [$lower]);
										} else {
											$findPost = R::findAll($userID);
										}
										*/
										$findPost = R::findAll($userID);
										if($countOfPosts) {
											foreach(array_reverse($findPost) as $fp) {
												echo '<div class="post">
														<div class="post-header">
															<div class="post-avatar" href="">
																<img class="post-user-avatar" alt="' . $_SESSION['logged_user']->login . '" src="../img/Flying-Penguin.jpg" width="50px" height="50px">
															</div>
															<div class="post-data">
																<div class="post-user-name">' . $fp->author . '</div>
																<div class="post-pubtime">' . $fp->pubdate . '</div>
															</div>
															<div class="post-actions">
																<details class="post-details-overlay post-details-reset">
																	<summary class="details-post-header">
																		<span class="post-dropdown">
																			<div class="pt1"></div>
																			<div class="pt2"></div>
																			<div class="pt3"></div>
																		</span>
																	</summary>
																	<div class="post-dropdown-menu" style="width: 160px;">
																		<a class="post-dropdown-item" onclick="post.pinPost();">Pin post</a>
																		<a class="post-dropdown-item" onclick="post.addToBookmarks();">Add to bookmarks</a>
																		<a class="post-dropdown-item" onclick="post.deletePost(' . $fp->id . ');">Delete post</a>
																		<a class="post-dropdown-item" onclick="post.disableComments();">Disable comments</a>
																	</div>
																</details>
															</div>
														</div>
														<div class="row">
															<p>' . $fp->text . '</p>
														</div>
														<div class="post-footer">
															<div class="post-likes-comments">
																<a class="likes-counter border" href="">
																	<div class="post-likes">0 Likes</div>
																</a>
																<a class="comments-counter border" href="">
																	<div class="post-comments">0 Comments</div>
																</a>
															</div>
															<a class="views-counter border" href="">
																<div class="post-views">0 Views</div>
															</a>
														</div>
													</div>';
											}
										} else {
											echo '<div style="text-align: center;">No post yet</div>';
										}
								?>
							</div>
						</div>
					</div>
					<aside class="aside-container">
						<div class="aside">
							<!-- Something will be here -->
						</div>
					</aside>
				</div>
			</main>
		</div>
	</body>
	<script src="../script/additionally/jquery-3.5.1.min.js" type="text/javascript"></script>
	<script src="../script/additionally/autosize.min.js"></script>
	<script src="../script/profile-script.js" type="text/javascript"></script>
</html>