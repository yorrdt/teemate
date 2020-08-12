<?php 
	require 'libs/rb.php';
	
	R::setup('mysql:host=localhost; dbname=database', 'root', 'u48bUmnytXPOgz7G');
	
	/* try {
        $db = new PDO('mysql:host=localhost;dbname=database','root','u48bUmnytXPOgz7G');
    } catch(PDOException $e){
        echo $e->getmessage();
    } */
	
	if (!R::testConnection()) {
        echo 'Нет соединения с БД!';
        exit();
    }
	
	
	session_start();
    
?>