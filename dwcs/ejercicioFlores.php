<?php
	session_start();
	require("clases/flor.php");
		
	$flores;

	$tipo = isset($_POST['tipo']) ? $_POST['tipo']: null;
	$altura = isset($_POST['altura']) ? $_POST['altura']: null;
	$cor = isset($_POST['cor']) ? $_POST['cor']: null;
	$numFlores = isset($_POST['numFlores']) ? $_POST['numFlores']: null;
	$numPetalos = isset($_POST['numPetalos']) ? $_POST['numPetalos']: null;
	

	if(isset($_SESSION['flores']))
	{
		$flores = unserialize($_SESSION['flores']);
	}else
		$flores = array();

	//function plantar_flor($tipo,$n_petalos,$cor,$altura,$n_flores)
	if($tipo!= null)
	{
		$flor = new FLor();
		$flor->plantar_flor($tipo,$numPetalos,$cor,$altura,$numFlores);
		array_push($flores, $flor);
		$_SESSION['flores'] = serialize($flores);
	}

	if(isset($_POST['tipoBuscar']))
	{
		$buscarFlor = $_POST['tipoBuscar'];
		for($i=0;$i<count($flores);$i++)
		{
			if($buscarFlor == $flores[$i]->getTipo())
			{
				$flores[$i]->contemplar_flor();
			}
		}
	}
	if(isset($_POST['ordenar']))
	{
		
	}

?>


<!DOCTYPE html>
<html>
	<head>

		<title>Ejercicio Flores</title>
		<link  rel="stylesheet" type="text/css"  href="..\bootstrap-3.3.7-dist\css\bootstrap.css">

	</head>
	<body>
		<form method="POST" action="ejercicioFlores.php"> 
			<h2>Crear Flor</h2>
			<div  class="input-group">
				<span class="input-group-addon">Tipo</span>
				<input type="text" name="tipo" class="form-control"  />
			</div>
			<div  class="input-group">
				<span class="input-group-addon">altura</span>
				<input type="text" name="altura" class="form-control"  />
			</div>
			<div  class="input-group">
				<span class="input-group-addon">numero de flores</span>
				<input type="text" name="numFlores" class="form-control"  />
			</div>
			<div  class="input-group">
				<span class="input-group-addon">numero de petalos</span>
				<input type="text" name="numPetalos"  class="form-control" />
			</div>
			<div  class="input-group">
				<span class="input-group-addon">color petalos</span>
				<input type="text" name="cor"  class="form-control" />
			</div>
			<input type="submit" value="crearFlor" />
		</form>

		<form method="POST" action="ejercicioFlores.php"> 
			<h2>Buscar Flor</h2>
			<div  class="input-group">
				<input type="text" name="tipoBuscar" class="form-control"  />
			</div>
			<input type="submit" value="Buscar Flor" />
		</form>
		<form method="POST" action="ejercicioFlores.php"> 
			<h2>Ordenar Flor</h2>
			<div  class="input-group">
				<input type="hidden" name="ordenar" class="form-control"  />
			</div>
			<input type="submit" value="Ordenar Flores" />
		</form>



	</body>
</html>