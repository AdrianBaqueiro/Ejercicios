
<!DOCTYPE html>
<html>
	<head>
		<title>Ejercicio Flores</title>
		<link  rel="stylesheet" type="text/css"  href="..\bootstrap-3.3.7-dist\css\bootstrap.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<form method="POST" action="ejercicioFlores.php">
				<input type="hidden" name="action"/>
				<ul  class="nav navbar-nav">
					<li>
						<input class="btn-link" type="submit" name="submit" value="CrearFlor" />
					</li>
					<li>
						<input class="btn-link" type="submit" name="submit" value="BuscarFlor" />
					</li>
					<li>
						<input class="btn-link" type="submit" name="submit" value="OrdenarFlor" />
					</li>
					<li>
						<input class="btn-link" type="submit" name="submit" value="TiposFlor" />
					</li>
					<li>
						<input class="btn-link" type="submit" name="submit" value="IntercambioPetalos" />
					</li>
					<li>
						<input class="btn-link" type="submit" name="submit" value="CrearXardins" />
					</li>
					<li>
						<input class="btn-link" type="submit" name="submit" value="AsignarXardins" />
					</li>
				</ul>
			</form>
		  </div>
		</nav>
	</body>
</html>


<?php
	session_start();
	require("clases/flor.php");
		
	$flores;
	$xardins;
	$n_flores;

	$tipo = isset($_POST['tipo']) ? $_POST['tipo']: null;
	$cor = isset($_POST['cor']) ? $_POST['cor']: null;
	$numPetalos = isset($_POST['numPetalos']) ? $_POST['numPetalos']: null;
	$submit = isset($_POST['submit']) ? $_POST['submit']: null;
	
	if(isset($_SESSION['flores']))
	{
		$flores = unserialize($_SESSION['flores']);
	}else
		$flores = array();

	if(isset($_SESSION['xardins']))
	{
		$xardins = unserialize($_SESSION['xardins']);
	}else
		$xardins = array();

	if(isset($_SESSION['n_flores']))
	{
		$n_flores = $_SESSION['n_flores'];
		Flor::$n_flores = $n_flores;
	}else
		$n_flores = Flor::$n_flores;
	//If para mantener la ultima opción pulsada del menu
	if($submit == null)
	{
		if(isset($_SESSION['submit']))
			$submit = $_SESSION['submit'];
		else
			$submit = "default";
	}




	//function plantar_flor($tipo,$n_petalos,$cor)
	if($tipo!= null)
	{
		$flor = new FLor();
		$flor->plantar_flor($tipo,$numPetalos,$cor);
		array_push($flores, $flor);
		$_SESSION['flores'] = serialize($flores);
		$_SESSION['n_flores'] = Flor::$n_flores;
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

		usort($flores, "shortObject");
		$_SESSION['flores'] = serialize($flores);
		
	}
	if(isset($_POST['selectMostrar']))
	{
		$i = $_POST['selectMostrar'];
		$flores[$i]->contemplar_flor();
	}
	if(isset($_POST['selectI1']) &&  isset($_POST['selectI2']) )
	{
		$i = $_POST['selectI1'];
		$e = $_POST['selectI2'];
		$aux = $flores[$i]->getN_petalos();
		$flores[$i]->setN_petalos($flores[$e]->getN_petalos());
		$flores[$e]->setN_petalos($aux);
		$_SESSION['flores'] = serialize($flores);
	}
	//function alta_xardin($nome,$ubicacion,$capacidade)
	if(isset($_POST["crearXardin"]))
	{
		$xardin = new Xardin();
		$xardin->alta_xardin($_POST['nome'],$_POST['ubicacion'],$_POST['capacidade']);
		array_push($xardins, $xardin);
		$_SESSION['xardins'] = serialize($xardins);
	}
	if(isset($_POST['asignarXardin']))
	{
		$flor = $_POST['flor'];
		$xardin = $_POST['xardin'];
		$flores[$flor]->asignar_Xardin($xardins[$xardin]);
		$_SESSION['flores'] = serialize($flores);
	}

	switch ($submit) {
		case 'CrearFlor':
			crearFlor();
			break;
		case 'BuscarFlor':
			buscarFlor();
			break;
		case 'OrdenarFlor':
			ordenarFlor();
			break;
		case 'TiposFlor':
			tiposFlor($flores);
			break;
		case 'IntercambioPetalos':
			intercambiarPetalos($flores);
			break;
		case 'CrearXardins':
			crearXardins();
			break;
		case 'AsignarXardins':
			asignarXardins($flores,$xardins);
			break;

		default:
			# code...
			break;
	}


$_SESSION['submit'] = $submit;




	function shortObject($a, $b)
	{
	    return strcmp($a->getTipo(), $b->getTipo());
	}

	function crearFlor()
	{

		print('<form method="POST"  class="well"  action="ejercicioFlores.php"> 
				<h2>Crear Flor</h2>
				<div  class="input-group">
					<span class="input-group-addon">Tipo</span>
					<input type="text" name="tipo" class="form-control"  />
				</div>
				<div  class="input-group">
					<span class="input-group-addon">numero de petalos</span>
					<input type="text" name="numPetalos"  class="form-control" />
				</div>
				<div  class="input-group">
					<span class="input-group-addon">color petalos</span>
					<input type="text" name="cor"  class="form-control" />
				</div>
				<input class="btn btn-default navbar-btn" type="submit" value="CrearFlor" class="btn-group" />
			</form>');

	}

	function buscarFlor()
	{

		print('<form method="POST"  class="well"  action="ejercicioFlores.php"> 
				<h2>Buscar Flor</h2>
				<div  class="input-group">
					<input type="text" name="tipoBuscar" class="form-control"  />
				</div>
				<input  class="btn btn-default navbar-btn" type="submit" value="Buscar Flor" />
			</form>');

	}


	function ordenarFlor()
	{

		print('<form method="POST" class="well"  action="ejercicioFlores.php"> 
				<h2>Ordenar Flor</h2>
				<div  class="input-group">
					<input type="hidden" name="ordenar" class="form-control"  />
				</div>
				<input  class="btn btn-default navbar-btn" type="submit" value="Ordenar Flores" />
			</form>');

	}


	function tiposFlor($flores)
	{

		print('<form method="POST" class="well"  action="ejercicioFlores.php"> 
				<h2>Tipos Flor</h2>
				<div  class="input-group">
					<select name="selectMostrar" class="form-control">
		');
							for($i=0;$i<count($flores);$i++)
							{
								echo "<option value=".$i.">".$flores[$i]->getTipo()."</option>";
							}
		print('
					</select>
				</div>
				<input   class="btn btn-default navbar-btn" type="submit" value="mostrar" />
			</form>
		');

	}


	function intercambiarPetalos($flores)
	{

		print('<form method="POST" class="well"  action="ejercicioFlores.php"> 
				<h2>Intercambio Petalos</h2>
				<div  class="input-group">
					<select name="selectI1" class="form-control">
		');
							for($i=0;$i<count($flores);$i++)
							{
								echo "<option value=".$i.">".$flores[$i]->getTipo()."</option>";
							}
						
		print('
					</select>
				</div>
				<div  class="input-group">
					<select name="selectI2" class="form-control">
		');
							for($i=0;$i<count($flores);$i++)
							{
								echo "<option value=".$i.">".$flores[$i]->getTipo()."</option>";
							}
		print('
					</select>
				</div>
				<input  class="btn btn-default navbar-btn" type="submit" value="Intercambio" />
			</form>
		');

	}
	function crearXardins()
	{

		print('<form method="POST" class="well"  action="ejercicioFlores.php"> 
				<h2>Crear Xardin</h2>
				<input type="hidden" name="crearXardin" />
				<div  class="input-group">
					<span class="input-group-addon">Nome Xardin</span>
					<input type="text" name="nome" class="form-control"  />
				</div>
				<div  class="input-group">
					<span class="input-group-addon">Ubicacion</span>
					<input type="text" name="ubicacion" class="form-control"  />
				</div>
				<div  class="input-group">
					<span class="input-group-addon">Capacidade</span>
					<input type="text" name="capacidade" class="form-control"  />
				</div>
				<input  class="btn btn-default navbar-btn" type="submit" value="CrearXardin" />
			</form>');

	}
	function asignarXardins($flores,$xardins)
	{

		print('<form method="POST" class="well"  action="ejercicioFlores.php"> 
				<h2>Asignar Xardin</h2>
				<input type="hidden" name="asignarXardin" />
				<div  class="input-group">
					<span class="input-group-addon">Flores</span>
					<select name="flor" class="form-control">
		');
							for($i=0;$i<count($flores);$i++)
							{
								echo "<option value=".$i.">".$flores[$i]->getTipo()."</option>";
							}
		print('
					</select>
				</div>
				<div  class="input-group">
					<span class="input-group-addon">Xardins</span>
					<select name="xardin" class="form-control">
		');
		
							for($i=0;$i<count($xardins);$i++)
							{
								echo "<option value=".$i.">".$xardins[$i]->getNome()."</option>";
							}
		print('
					</select>
				</div>
				<input  class="btn btn-default navbar-btn" type="submit" value="Asignar" />
			</form>
		');

	}




















?>