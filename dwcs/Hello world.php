<?php
	// Conectando, seleccionando la base de datos
	$conn = mysqli_connect("localhost","","","test")
	    or die('No se pudo conectar: ' . mysqli_error());
	//mysql_select_db('test') or die('No se pudo seleccionar la base de datos');
	// Realizar una consulta MySQL
	$result = $conn->query ('Select * from persona');

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css"> 
		<tittle> HELLLO WORLD </tittle>
	</head>
	<body>
		<div id="cuerpo">
			<div id="prueba">
				<p>Esto es una prueba de php</p>
				<?php
					print "<p> este texto esta en php </p>";
					$contador = 1;
					while ($contador <= 5) {
						print $contador."</br>";
						$contador=$contador+1;
					}
				?>
			</div>
			<div id="tabla">
				<?php
					// Imprimir los resultados en HTML
					echo "<table>\n";
					echo "<th>Nombre</th><th>Apellido</th><th>Edad</th><th>Telefono</th>";
					while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
					    echo "\t<tr>\n";
					    foreach ($line as $col_value) {
					        echo "\t\t<td>$col_value</td>\n";
					    }
					    echo "\t</tr>\n";
					}
					echo "</table>\n";
				?>
			</div>
		</div>
		<div>
			<table>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Edad</th>
				<th>Telefono</th>
				<tr>
					<td>Adrian</td>
					<td>Baqueiro</td>
					<td>25</td>
					<td>62688065</td>
				</tr>
			</table>
		</div>
		<div>
			<form method="POST" action="bd.php">
				<a>Escribe tu nombre</a></br>
				<input type="text" name="nombre"></iput></br>
				<a>Escribe tu apellido</a></br>
				<input type="text" name="apellido"></iput></br>
				<a>Escribe tu edad</a></br>
				<input type="text" name="edad"></iput></br>
				<a>Escribe tu telefono</a></br>
				<input type="text" name="telefono"></iput></br>
				<button name="submit" type="submit">Enviar</button>
			</form>
		</div>
	</body>
</html>