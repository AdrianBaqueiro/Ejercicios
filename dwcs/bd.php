<?php
	//Obtencion de los valores enviados por el formulario mediante POST
	$nombre = isset($_POST["nombre"]) ? $_POST["nombre"]:"";
	$apellido = isset($_POST["apellido"]) ? $_POST["apellido"]:"";
	$edad = isset($_POST["edad"]) ? $_POST["edad"]:"";
	$telefono = isset($_POST["telefono"]) ? $_POST["telefono"]:"";
	// Conectando, seleccionando la base de datos
	$conn = new mysqli('localhost',"","","test")
	    or die('No se pudo conectar: ' . mysqli_error());
	echo 'Connected successfully';
	//mysql_select_db('test') or die('No se pudo seleccionar la base de datos');
	// Añadir datos a la tabla
	$insert = $conn->query ("INSERT INTO persona (nombre,apellido,edad,telefono) Values ('$nombre','$apellido','$edad','$telefono')");
	
	/*if(mysql_query($insert))
		echo "insertado";
	
	*/
	mysqli_close($conn);
	//http_redirect("//127.0.0.1/Ejercicios/dwcs/Hello world.php");
	header('location:'."Hello world.php");
	die();
?>