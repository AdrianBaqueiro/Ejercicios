<?php

	$idioma;
	//texto para alta usuario;
	$tituloA;
	$usuario;
	$password;
	$repetir;
	$botton;
	$error;
	$propioI;

	//texto para login
	$tituloL;

	//texto menuBar
	$tituloMenu;
	$loginMenu;
	$altaMenu;
	$preferenciasMenu;

	$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
	
	if(isset($_COOKIE[$user]['idioma']))
		$idioma = $_COOKIE[$user]['idioma'];
	else
		$idioma = 0;

	if($idioma == 0)
	{
		$tituloL = "Introduce o teu usuario";
		$tituloA = "Alta usuario";
		$usuario = "Usuario";
		$password = "Contrasinal";
		$repetir = "Repita o contrasinal";
		$botton = "Login";
		$error = "As contrasinais non coinciden";
		$tituloMenu = "Exercicios DWCS";
		$loginMenu = "inicio sesión";
		$altaMenu = "darse de alta";
		$preferenciasMenu = "preferencias";

	}

	if($idioma == 1)
	{
		$tituloL = "Introduce tu usuario";
		$tituloA = "Alta usuario";
		$usuario = "Usuario";
		$password = "Contraseña";
		$repetir = "Repita la contraseña";
		$botton = "Login";
		$error = "Las contraseñas no coinciden";
		$tituloMenu = "Ejercicios DWCS";
		$loginMenu = "inicio sesión";
		$altaMenu = "darse de alta";
		$preferenciasMenu = "preferencias";
	}

	if($idioma == 2)
	{
		$tituloL = "Join to user";
		$tituloA = "New user";
		$usuario = "User";
		$password = "Password";
		$repetir = "Retry password";
		$botton = "Login";
		$error = "Password missmatch";
		$tituloMenu = "Exercises DWCS";
		$loginMenu = "login in";
		$altaMenu = "sign in";
		$preferenciasMenu = "preferences";
	}

?>