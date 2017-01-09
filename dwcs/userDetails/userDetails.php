<?php
	echo "</br></br></br></br></br></br>";
	include '../strings/string.php';
	include '../menuBar/menuBar.php';
	include "../menuBar/userBar.php";

	$user = isset($_GET['user']) ? $_GET['user'] : null;
	$fechas = explode(";", $_COOKIE[$user]['historial']);
	end($fechas);

print("

	<html>
		<head>
		<link rel='stylesheet' type='text/css' href='http://127.0.0.1/Ejercicios/style.css'></link>
			<link rel='stylesheet' type='text/css' href='http://127.0.0.1/Ejercicios/dwcs/styles/style.php'>
		</head>
		<body>
			<div id='userDetails'>
	");
			echo "<div id='user'>Usuario: ".$user."</br></div>";
			echo "<div id='visitas'>Ultimas tres conexiones</br>";
			for($i = count($fechas)-1;$i>(count($fechas)-4 < 0 ? -1 :count($fechas)-4);$i--)
			{
				
				echo $fechas[$i]."<br>";
			}


print("
			</div></div>
		</body>


	</html>
	");
?>