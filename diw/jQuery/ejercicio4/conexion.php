<?php
// Adapta estes par�metros da conexi�n � base de datos �s teus propios.
$hostname = "localhost";
$database = "incidencias";
$username = "root";
$password = "";

$conexion = mysqli_connect($hostname, $username, $password) or die(mysql_error());
mysqli_select_db($conexion,$database);
?>
