<?php
	session_start();
	$host = 'fdb26.awardspace.net';
	$user = '3082614_behuman';
	$pwd = 'escola.2015';
	$db = '3082614_behuman';
	$ligax=mysqli_connect($host, $user, $pwd) or die ('N�o conseguiu fazer a conex�o � Base de Dados');
	mysqli_select_db($ligax,$db);
	//185.176.43.96
?>
