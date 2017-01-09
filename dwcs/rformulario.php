<?php
	$nombre = isset($_POST["nombre"]) ? $_POST["nombre"]:null;
	$contraseña = isset($_POST["contraseña"]) ? $_POST["contraseña"]:null;
	$estado = isset($_POST["estado"]) ? $_POST["estado"]:null;
	
	$aficion1 = isset($_POST["aficion1"]) ? $_POST["aficion1"]: null;
	$aficion2 = isset($_POST["aficion2"]) ? $_POST["aficion2"]: null;
	$aficion3 = isset($_POST["aficion3"]) ? $_POST["aficion3"]: null;
	$aficiones ="";
	//echo "$nombre$contraseña$estado$aficion3$aficion2$aficion1"; 
?>
<html>
	<head></head>
	<body>
		<p> el usuario es <?php echo $nombre; ?></p>
		<p> la contraseña es <?php echo $contraseña; ?></p>
		<p> su estado es <?php echo $estado; ?></p>
		<?php
			
			if (!empty($aficion1))
				$aficiones = $aficiones ." " .$aficion1.",";
			if (!empty($aficion2))
				$aficiones = $aficiones ." " .$aficion2.",";
			if (!empty($aficion3))
				$aficiones = $aficiones ."" .$aficion3.",";			
			$aficiones[strlen($aficiones)-1] = "";
			echo "<p>Sus aficiones son ".$aficiones." </p>";

		?>
	</body>
</html>