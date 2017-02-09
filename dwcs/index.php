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
		<link rel="stylesheet" type="text/css" href="/styles/style.php">
		<link  rel="stylesheet" type="text/css"  href="..\bootstrap-3.3.7-dist\css\bootstrap.css">
		<script src="..\bootstrap-3.3.7-dist\jq\jquery-3.1.1.js"></script>
		<script src="..\bootstrap-3.3.7-dist\js\bootstrap.min.js"></script>
	</head>
	<body>
		<div class="ejercicios">
			<?php QuitarPHP($lista) ?>
		</div>
	</body>
</html>
