<?php
session_start();

	if(isset($_POST['idioma']))
		setcookie($_SESSION['user'].'[idioma]',$_POST['idioma'],time()+3600,"/");

	if(isset($_POST['color']))
		setcookie($_SESSION['user'].'[color]',$_POST['color'],time()+3600,"/");

	echo $_POST['color'] . $_POST['idioma'];

	header('location:'.$_SERVER['HTTP_REFERER']);
	die();
	//configurar el color

?>