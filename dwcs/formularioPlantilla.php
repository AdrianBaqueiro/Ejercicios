
<?php
	session_start();
	$usuario = isset($_POST["usuario"]) ? $_POST["usuario"]:null;
	$contraseña = isset($_POST["password"]) ? $_POST["password"]:null;
	$_SESSION['usuario'] = $usuario;
	$_SESSION['password'] = $contraseña;

	if($usuario!="admin" || $contraseña!="1234")
	{
		$_SESSION['error'] = 1;
		header('location:'."login.php?");
		die();
	}
?>


<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="styleF.css">
	</head>
	<body>
		<form method ="POST" action="validarForm.php">
			<div id="nombre">
				<span>Nombre: <input type="text" name="nombre"/></span></br>
				<span>Email: <input type="text" name="email"/></span></br>
				<span>Fecha de la visita <input type="date" id="fecha" name="visita"/>(DD/MM/AAA)</span>
				<span>Numero de personas <input type="text" id="numero" name="numero"/></span>
			</div>
			<div class="grupo">
				<a>edad del grupo: </a>
				<input type="radio" name="edad" value="8">de 5 a 8</input>
				<input type="radio" name="edad" value="14">de 9 a 14</input>
				<input type="radio" name="edad" value="18">de 15 a 18</input>
				<input type="radio" name="edad" value="19">Adultos</input> 
			</div>
			<input type="checkbox" name="asistir" value="1">Deseanis Asisitr al aula educativa(solo niños)</input>
			
			</br>
			<p> Observaciones </p>
			<textarea rows="4" cols="50" name="Observaciones" value="1"></textarea>
			</br>
			<input type="submit" value="Enviar">
		</form> 
	</body>
</html>
