<?php
	session_start();
	$host = "localhost";
	$user = "root";
	$pwd = "";
	$db = "behuman";
	$ligax=mysqli_connect($host, $user, $pwd) or die ('Não conseguiu fazer a conexão à Base de Dados');
	mysqli_select_db($ligax,$db);
	
?>