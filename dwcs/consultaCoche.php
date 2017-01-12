<?php
	session_start();
	require 'clases/coche.php';

	$id = isset($_POST['id']) ? $_POST['id']: null;
	$marca = isset($_POST['marca']) ? $_POST['marca']: null;
	$cor = isset($_POST['cor']) ? $_POST['cor']: null;
	$portas = isset($_POST['portas']) ? $_POST['portas']: null;
	$idCoche = isset($_POST['idCoche']) ? $_POST['idCoche']: null;

	if(!isset($_SESSION['coches']))
	{	
		$_SESSION['coches'] = serialize(Array(''));
	}
	

	if($id != null)
	{
		$arrayCoches = unserialize($_SESSION['coches']);
		$_SESSION['idL'] = $id;
		$coche = new Coche($id,$marca,$cor,$portas);
		array_push($arrayCoches,serialize($coche));
		$_SESSION['coche'.$id] = serialize($coche);
		$_SESSION['coches'] = $arrayCoches;
	}


	/*foreach ($_SESSION as $key => $value) {
		echo $key." ".$value;
	}*/


	print("");


?>


<html>
	<head>
		<link  rel="stylesheet" type="text/css"  href="..\bootstrap-3.3.7-dist\css\bootstrap.css">

	</head>
	<body>

		<h1> Nuevo Coche </h1>
		<form method="POST" action="consultaCoche.php">
			<div class="input-group">
				<span class="input-group-addon">Id</span>
				<input class="form-control" type="text" name="id" id="id"/>
			</div>
			<div class="input-group">
				<span class="input-group-addon" >Marca</span>
				<input class="form-control" type="text" name="marca" id="marca"/>
			</div>
			<div class="input-group">
				<span class="input-group-addon" >Cor</span>
				<input class="form-control" type="text" name="cor" id="cor"/>
				
			</div>
			<div class="input-group">
				<span class="input-group-addon" >Portas</span>
				<input class="form-control" type="text" name="portas" id="portas"/>
				
			</div>
				<input class="btn btn-default type="submit" value="Alta"/>
			
		</form>
	
		<h1>Informacion Coche </h1>
		<form method="POST" action="consultaCoche.php">
			<input type="hidden" name="action" value="submit" />
			<div class="input-group">

				<span class="input-group-addon" >Id</span> 
				<input class="form-control" type="text" name="idCoche" id="idCoche"/>
				<span class="input-group-btn">
					<input  class="btn btn-default" type="submit" name="submit" value="visualizar" id="visualizar" />
				</span>
			</div>

			<div class="input-group">

				<input  class="form-control" type="text"  name="gasolina" placeholder="introduce gasolina" id="gasolina"/>

				<span class="input-group-btn">
					<input class="btn btn-default" type="submit" name="submit" value="Encher"/>
				</span>

			</div>
			<div class="input-group">
				<input  class="btn btn-default .dropdown-menu-right" type="submit" name="submit" value="Comprobar Gasolina" />
			</div>
			<div class="input-group">

				<input  class="form-control" type="text" name="km" id="km" placeholder="introduce Km" />

				<span class="input-group-btn">
					<input class="btn btn-default" type="submit" name="submit" value="Viaxar"/>
				</span>
			</div>
		</form>
		<?php

	
			if(isset($_POST['action']))
			{
				if($idCoche!=null)
					$_SESSION['idL'] = $idCoche;
				else
					$idCoche = $_SESSION['idL'];

				$coche = unserialize($_SESSION['coche'.$idCoche]);
				$funcion = $_POST['submit'];
				
				if($funcion == "visualizar")
				{
					$coche->visualizar();
				}

				if($funcion == "Encher")
				{
					$gasolina = isset($_POST['gasolina']) ? $_POST['gasolina']: '0';
					$coche->encherTanque($gasolina);
				}
				if($funcion == "Comprobar Gasolina")
				{
					echo $coche->comprobarGasolina()." litros de gasolina";
				}
				if($funcion == "Viaxar")
				{
					$km = isset($_POST['km']) ? $_POST['km']: '0';
					$coche->viaxar($km);
				}
				$_SESSION['coche'.$idCoche] = serialize($coche);
			}


		?>

	</body>
</html>

