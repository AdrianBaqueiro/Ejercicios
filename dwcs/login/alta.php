<?php
session_start();
	include '../strings/string.php';
	include '../menuBar/menuBar.php';

	$user = isset($_POST['user']) ? $_POST['user']: null;
	$pass = isset($_POST['pass']) ? $_POST['pass']: null;
	$pass2 = isset($_POST['pass2']) ? $_POST['pass2']: null;


	if(isset($_POST['pass']))
	{
		if($pass == $pass2)
		{
			$fecha =  Array(date("d/m H:i"));
			$fecha = implode(";", $fecha);
			setcookie($user.'[user]',$user);
			setcookie($user.'[pass]',$pass);
			setcookie($user.'[idioma]',0,time()+3600,"/");
			setcookie($user.'[color]',"white",time()+3600,"/");
			setcookie($user.'[historial]',$fecha,time()+3600,"/");
			header('location:'."login.php?");
			die();
		}else
			echo "$error";
	}


	print("
		<html>
			<head>
				<link rel=stylesheet type=text/css href=../../style.css></link>
				<link rel='stylesheet' type='text/css' href='http://127.0.0.1/Ejercicios/dwcs/styles/style.php'>
			</head>
			<body>
			<div class='login'>
				<form method='POST' action='alta.php'>
						<h2>$tituloA</h2>
						<div id='usuario'>
							$usuario: <input type='text' id='user' name='user' />
						</div>
						<div>
							$password: <input type='password' id='pass' name='pass' />
							</br>
							$repetir: <input type='password' id='pass2'  name = 'pass2' />
						</div>
						<input type='submit' value =$botton />
					</form>
			</div>
			</body>
		</html>
	");

?>