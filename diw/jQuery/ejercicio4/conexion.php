<?php
// Adapta estes par�metros da conexi�n � base de datos �s teus propios.
$hostname = "localhost";
$database = "incidencias";
$username = "root";
$password = ""; 

$conexion = mysqli_connect($hostname, $username, $password, $database) or die(mysqli_error());
?>
