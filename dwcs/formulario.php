<?php


?>

<html>
	<head>
		
	</head>
	<body>
		<form method ="POST" action="rformulario.php">
			<span>Usuario: <input type="text" name="nombre"/></span></br>
			<span>contraseña: <input type="text" name="contraseña"/></span></br>
			<input type="radio" name="estado" value="soltero">soltero</input>
			<input type="radio" name="estado" value="casado">casado</input>
			<input type="radio" name="estado" value="divorciado">divorciado</input>
			<input type="radio" name="estado" value="viudo">viudo</input> 
			</br>
			<input type="checkbox" name="aficion1" value="Cine">Cine</input>
			</br>
			<input type="checkbox" name="aficion2" value="Musica">Musica</input>
			</br>
			<input type="checkbox" name="aficion3" value="Deportes">Deportes</input>
			</br>
			<input type="submit" value="Enviar">

		</form> 
	</body>
</html>
