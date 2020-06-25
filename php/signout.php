<?php
	require "db.php";
	
	unset($_SESSION['logged_user']);
	unset($_SESSION['settings']);
	header('Location: ../index.php');
?>

