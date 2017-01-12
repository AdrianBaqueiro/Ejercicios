<?php
	session_start();

	include '../strings/string.php';
	include '../menuBar/menuBar.php';

	$_SESSION['cont'];
	//$_SESSION['user'];

	if(!isset($_SESSION['cont']))
		$_SESSION['cont'] = 0;
	$user = isset($_POST['user']) ? $_POST['user']: null;
	$pass = isset($_POST['pass']) ? $_POST['pass']: null;

	if(isset($_POST['user']))
	{
		if(isset($_COOKIE[$user]['user']))
		{
			$_SESSION['user'] = $user;
			$fechas = explode(";", $_COOKIE[$user]['historial']);
			array_push($fechas, date('d/m H:i'));
			$fechas = implode(";", $fechas);
			
			setcookie($user.'[historial]',$fechas,time()+3600,"/");
			header('location:'."../index.php?");
			die();
		}

	}else
	{
		if($_SESSION['cont'] == 3)
		{
			$_SESSION['cont'] = 0;
			header('location:'."alta.php?");
			die();
		}
		$_SESSION['cont'] = $_SESSION['cont'] + 1;
	}

	


	print("

		<html>
			<head>
				<link rel=stylesheet type=text/css href=../../style.css></link>
				<link rel='stylesheet' type='text/css' href='http://127.0.0.1/Ejercicios/dwcs/styles/style.php'>
			</head>
			<body >
				<div class='login'>
					<form method ='POST' action='login.php'>
						<h2>$tituloL</h2>
						<div id='usuario'>
							$usuario: <input type='text' id='usario' name='user' />
						</div>
						<div id='password'>
							$password: <input type='password' id='pass' name='pass' />
						</div>
						<input type='submit' value='$botton' /> 
					</form>
				</div>
			</body>
		</html>

	");
	
?>