<?php
	session_start();
	$host = "localhost";
	$user = "root";
	$pwd = "";
	$db = "behuman";
	$ligax=mysqli_connect($host, $user, $pwd) or die ('N�o conseguiu fazer a conex�o � Base de Dados');
	mysqli_select_db($ligax,$db);
	
?>