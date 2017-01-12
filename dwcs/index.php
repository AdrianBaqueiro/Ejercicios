<?php
session_start();
include 'funciones.php';
include "menuBar/menuBar.php";
include "menuBar/userBar.php";
	//listar ficheros
	$lista;
	if ($handle = opendir('.')) 
	{

	    while (false !== ($entry = readdir($handle))) 
	    {
	        if ($entry != "." && $entry != "..") 
	        {
	        	$lista[] = $entry;
	            //echo "$entry\n";
	        }
   		}
    closedir($handle);
	}

	//Mostrar($lista);
	$user = $_SESSION['user'];
	//echo "</br></br></br></br></br></br>";
	if(isset($_COOKIE[$user]['historial']))
		$fecha = $_COOKIE[$user]['historial'];
	//echo "</br></br></br></br></br></br>".$fecha;
?>


<html>
	<head>
		<title>Ejercicios DWCS</title>
		<link rel="stylesheet" type="text/css" href="../style.css"></link>
		<link rel="stylesheet" type="text/css" href="http://127.0.0.1/Ejercicios/dwcs/styles/style.php">
	</head>
	<body>
		<div class="ejercicios">
			<?php QuitarPHP($lista) ?>
		</div>
	</body>
</html>