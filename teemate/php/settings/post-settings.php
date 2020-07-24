<?php

	require "../db.php";
	
	$data = $_GET;
	
	$userID = 'articles' . $_SESSION['logged_user']->id;
	$article = R::load($userID, $data['id'])
	R::trash($article);
	
?>