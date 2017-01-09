<?php
	session_start();
	if($_SESSION['usuario']!="admin" || $_SESSION['password']!="1234")
	{
		$_SESSION['error'] = 1;
		header('location:'."login.php?");
		die();
	}

	$nombre = isset($_POST["nombre"]) ? $_POST["nombre"]:null;
	$email = isset($_POST["email"]) ? $_POST["email"]:null;
	$fecha = isset($_POST["visita"]) ? $_POST["visita"]:null;
	$numero = isset($_POST["numero"]) ? $_POST["numero"]: null;
	$edad = isset($_POST["edad"]) ? $_POST["edad"]: null;
	$asistir = isset($_POST["asistir"]) ? $_POST["asistir"]: null;
	$observacion = isset($_POST["Observaciones"]) ? $_POST["Observaciones"]: null;
	
	$vNombre=true;
	$vEmail=true;
	$vNumero=true;
	$vEdad=true;
	$vFecha = true;


	//bucle comprobar si el nombre no tiene numeros
	for($i=0;$i<strlen($nombre);$i++)
	{
		if(is_numeric($nombre[$i]))
		{
			$vNombre=false;
			break;
		}
	}
	//bucle comprobar que la edad sea un numero
	for($i=0;$i<strlen($edad);$i++)
	{
		if(!is_numeric($edad[$i]))
		{
			$vEdad=false;
			break;
		}
	}
	//bucle para comprobar que el email este bien formateado etc@etc.com
	for($i=0,$e=0,$u=0;$i<strlen($email);$i++)
	{
		if($email[$i]=='@')
		{
			$e++;
		}else
		    if($email[$i]=='.')
			{
				$u++;
			}
		if(($e>=2 || $u>=2) || ($e==0 || $u==0))
		{
			$vEmail=false;

		}else
			$vEmail=true;
	}
	//bucle para comprobar el formato de la fecha
	for($i=0,$e=0,$u=0;$i<strlen($fecha);$i++)
	{
		if($i<2 || ($i<5 && $i>2) || ($i>5))
		{
			if(is_numeric($fecha[$i])==null || $i > 9)
			{
				$u = 1;
			}

		}
		if($fecha[$i]=='/')
		{
			$e++;
		}	
		if($e>2 || $u == 1)
		{
			$vFecha=false;
			
		}else
			$vFecha=true;
	}

?>
<html>
	<head></head>
	<body>
	<!--
		<?php
		
			if(preg_match("/.*[@].*[.].*/",$email))
 				echo "<p>el email: ".$email." Es correcto </p>";
		 	else
		 		echo "<p>el email: ".$email." Es incorrecto </p>";
		 	if(preg_match("/.*[0-9].*/",$nombre))	
				echo "<p>el nombre: ".$nombre." Es incorrecto </p>";
			else
		 		echo "<p>el nombre: ".$nombre." Es correcto </p>";
			if(preg_match("/[0-9][0-9]\/[0-9][0-9]\/[0-9][0-9][0-9][0-9]/",$fecha))
				echo "<p>la fecha: ".$fecha." fecha correcta </p>";
		 	else
		 		echo "<p>la fecha: ".$fecha." fecha incorrecta </p>";
		 	if(preg_match("/[0-9]+/",$numero))	
				echo "<p> numero de personas :".$numero." Es correcto </p>";
			else
		 		echo "<p>numero de personas :".$numero." Es incorrecta </p>";
		 	if($edad>14 && $asistir==1)
				echo "no hay niños en el grupo";
			else if($asistir==1)
				echo "hay niños en el grupo, pueden asistir";
			if($observacion!=null)
				echo "<p>".htmlspecialchars($observacion)."<p>";
		?>
		-->
		<?php
			if($vNombre)
				echo "<p>el nombre: ".$nombre." Es correcto </p>";
			else
				echo "<p>el nombre: ".$nombre." Es incorrecto </p>";
			if($vEmail)
				echo "<p>el email: ".$email." Es correcto </p>";
			else
				echo "<p>el email: ".$email." Es incorrecto </p>";
			if($vFecha)
				echo "<p>la fecha: ".$fecha." Es correcto </p>";
			else
				echo "<p>la fecha: ".$fecha." Es incorrecto </p>";
			if($vEdad)
				echo "<p>la edad: ".$edad." Es correcto </p>";
			else
				echo "<p>la edad: ".$edad." Es incorrecto </p>";
			if($edad>14 && $asistir==1)
				echo "no hay niños en el grupo, los adultos no pueden asistir";
			else if($asistir==1)
				echo "hay niños en el grupo, pueden asistir";
		?>
	</body>
</html>