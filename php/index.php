<?php
	require "php/db.php";
 ?>

<?php if(isset($_SESSION['logged_user'])) : ?>
	Авторизован, как <?php echo $_SESSION['logged_user']->login; ?>
	<hr>
	<a href="/php/logout.php">Выйти</a>
<?php else : ?>
	<a href="/php/login.php">Войти</a><br>
	<a href="/php/signup.php">Зарегистрироваться</a>
<?php endif; ?>