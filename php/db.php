<?php 
	require 'libs/rb.php';
	
	R::setup('mysql:host=localhost; dbname=database', 'root', 'u48bUmnytXPOgz7G');
	
	session_start();
	
	try {
        $db = new PDO('mysql:host=localhost;dbname=database','root','u48bUmnytXPOgz7G');
    } catch(PDOException $e){
        echo $e->getmessage();
    }
?>