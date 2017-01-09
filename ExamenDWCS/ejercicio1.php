<?php

	$numero = isset($_POST['numero']) ? $_POST['numero']: null;
	$nombre = isset($_POST['nombre']) ? $_POST['nombre']: null;

	if(!is_numeric($numero) && isset($_POST['numero']))
		echo "introduce un numero";

	if($numero == null)
	{

		print ("

			<html>
				<head>

				</head>
				<body>
					<form method='POST' action='ejercicio1.php'>
						<div>
							Numero <input type='text' name='numero' />
							Nombre <input type='text' name='nombre' />
							<input type='submit' value='enviar'/>
						</div>
					</form>
				</body>
			</html>

			");


	}else
	{
	
		print ("

		<html>

			<head></head>
			<body>
				<div>
		");

		$nCaracteres = strlen($nombre);
		echo $nombre." Tiene: ".$nCaracteres. " caracteres y el numero es ".$numero. "</br> ";
		for($i=0;$i<$nCaracteres;$i++)
			echo $numero. "</br>";

		print ("

				</div>
			</body>

		</html>

		");
	}
	
?>

