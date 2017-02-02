
<!DOCTYPE html>
<html>
	<head>
		<title>Ejercicio Flores</title>
		<link  rel="stylesheet" type="text/css"  href="..\bootstrap-3.3.7-dist\css\bootstrap.css">
		<script src="..\bootstrap-3.3.7-dist\jq\jquery-3.1.1.js"></script>
 		<script src="..\bootstrap-3.3.7-dist\js\bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
			      <a class="navbar-brand" href ="ejercicioFlores.php">Ejercicio Flores</a>
		    </div>
			<form method="POST" action="ejercicioFlores.php">
				<input type="hidden" name="action"/>
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown">Flor<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>
								<input  class="btn-link" type="submit" name="submit" value="CrearFlor" />
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
						</ul>
					</li>
					
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown">Petalo<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>
								<input class="btn-link" type="submit" name="submit" value="IntercambioPetalos" />
							</li>
							<li>
								<input class="btn-link" type="submit" name="submit" value="CambiarColor" />
							</li>
							<li>
								<input class="btn-link" type="submit" name="submit" value="ArrancarPetalo" />
							</li>
							<li>
								<input class="btn-link" type="submit" name="submit" value="verPetalosFlor" />
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown">Xardins<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>
								<input class="btn-link" type="submit" name="submit" value="CrearXardins" />
							</li>
							<li> 
								<input class="btn-link" type="submit" name="submit" value="AsignarXardins" />
							</li>
						</ul>
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
	$florSel;

	$tipo = isset($_POST['tipo']) ? $_POST['tipo']: null;
	$cor = isset($_POST['cor']) ? $_POST['cor']: null;
	$numPetalos = isset($_POST['numPetalos']) ? $_POST['numPetalos']: null;
	$submit = isset($_POST['submit']) ? $_POST['submit']: null;
	$flor = isset($_POST['flor']) ? $_POST['flor'] : null;
	$color = isset($_POST['color']) ? $_POST['color'] : null;
	$petalo = isset($_POST['petalo']) ? $_POST['petalo'] : null;
	$petaloA = isset($_POST['petalosA']) ? $_POST['petalosA'] : null;

	
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
	if($flor == null)
	{
		if(isset($_SESSION['florSel']))
		{
			$florSel = unserialize($_SESSION['florSel']);
		}else
			$florSel = null;
	}else
		$florSel = $flores[$flor];

	

	

	//function plantar_flor($tipo,$n_petalos,$cor)
	if($tipo!= null)
	{
		$flor = new FLor();
		$flor->plantar_flor($tipo,$numPetalos,$cor);
		$florSel = $flor;
		array_push($flores, $flor);
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
		
		
	}
	if(isset($_POST['selectMostrar']))
	{
		$i = $_POST['selectMostrar'];
		$flores[$i]->contemplar_flor();
		$florSel = $flores[$i];
	}
	if(isset($_POST['selectI1']) &&  isset($_POST['selectI2']) )
	{
		$i = $_POST['selectI1'];
		$e = $_POST['selectI2'];
		$aux = $flores[$i]->getN_petalos();
		$flores[$i]->setN_petalos($flores[$e]->getN_petalos());
		$flores[$e]->setN_petalos($aux);
		
	}
	//function alta_xardin($nome,$ubicacion,$capacidade)
	if(isset($_POST["crearXardin"]))
	{
		$xardin = new Xardin();
		$xardin->alta_xardin($_POST['nome'],$_POST['ubicacion'],$_POST['capacidade']);
		array_push($xardins, $xardin);
		
	}
	if(isset($_POST['asignarXardin']))
	{
		$flor = $_POST['flor'];
		$xardin = $_POST['xardin'];
		$flores[$flor]->asignar_Xardin($xardins[$xardin]);
		
	}
	if(isset($_POST['CambiarColor']) && $color != null)
	{
		$nPetalos = $florSel -> getN_petalos();
		$nPetalos[$petalo] -> setCor($color);
		
	}

	if(isset($_POST['arrancarPetalo']))
	{
		$florSel ->  arranca_petalos($petaloA);
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
			tiposFlor($flores,$florSel);
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
		case 'CambiarColor':
			
			cambiarColor($flores,$florSel);
		break;
		case 'ArrancarPetalo':
			arrancarPetalo($flores,$florSel);
		break;
		case 'verPetalosFlor':
			verPetalosFlor($flores,$florSel);
		break;

		default:
			# code...
			break;
	}


$_SESSION['submit'] = $submit;
$_SESSION['florSel'] = serialize($florSel);
$_SESSION['flores'] = serialize($flores);
$_SESSION['xardins'] = serialize($xardins);


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


	function tiposFlor($flores,$florSel)
	{

		print('<form method="POST" class="well"  action="ejercicioFlores.php"> 
				<h2>Tipos Flor</h2>
				<div  class="input-group">
					<select name="selectMostrar" class="form-control">
		');
							for($i=0;$i<count($flores);$i++)
							{
								if($flores[$i]->getTipo() == $florSel->getTipo())
								{
									echo "<option value=".$i." selected >".$flores[$i]->getTipo()."</option>";
								}else
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

	function cambiarColor($flores,$florSel)
	{

		print('<form method="POST" class="well"  action="ejercicioFlores.php"> 
				<h2>CambiarColor</h2>
				<input type="hidden" name="CambiarColor" />
				<div  class="input-group">
					<span class="input-group-addon">Flores</span>
					<select name="flor" class="form-control" onChange="this.form.submit()">
					');
						for($i=0;$i<count($flores);$i++)
						{
							if($flores[$i]->getTipo() == $florSel->getTipo())
							{
								echo "<option value=".$i." selected >".$flores[$i]->getTipo()."</option>";

							}else
								echo "<option value=".$i.">".$flores[$i]->getTipo()."</option>";
						}
					print('
					</select>
				</div>
				<div  class="input-group">
					<span class="input-group-addon">Petalo</span>
					<select name="petalo" class="form-control">
					');
						
						$n_petalos = $florSel->getN_petalos();

						for($i=0;$i<count($n_petalos);$i++)
						{
							echo "<option value=".$i.">".$n_petalos[$i]->getNum()."</option>";
						}

					print('
					</select>
				</div>
				<div  class="input-group">
					<span class="input-group-addon">Color</span>
					<input type="text" name="color" class="form-control"  />
				</div>
				<input  class="btn btn-default navbar-btn" type="submit" value="CambiarColor" />
			</form>');

	}
	function verPetalosFlor($flores,$florSel)
	{

		print('<form method="POST" class="well"  action="ejercicioFlores.php"> 
				<h2>VerPetalos</h2>
				<input type="hidden" name="verPetalosFlor" />
				<div  class="input-group">
					<span class="input-group-addon">Flores</span>
					<select name="flor" class="form-control" onChange="this.form.submit()">
					');
						for($i=0;$i<count($flores);$i++)
						{
							if($flores[$i]->getTipo() == $florSel->getTipo()){

									echo "<option value=".$i." selected>".$flores[$i]->getTipo()."</option>";

								}else
								echo "<option value=".$i.">".$flores[$i]->getTipo()."</option>";
						}
					print('
					</select>
				</div>
				
					<div class="well" class="list-group">
		       			<ul>
					
					');
						
						$n_petalos = $florSel->getN_petalos();

						for($i=0;$i<count($n_petalos);$i++)
						{
							echo "<li class='list-group-item'>
								<p>".$n_petalos[$i]->getNum()."</p>
								</li>
								<li class='list-group-item'>
									<p>".$n_petalos[$i]->getCor()."</p>
								</li>
								";
						}

					print('
						</ul>
					</div>
				
			</form>');

	}
	function arrancarPetalo($flores,$florSel)
	{

		print('<form method="POST" class="well"  action="ejercicioFlores.php"> 
				<h2>ArrancarPetalos</h2>
				<input type="hidden" name="arrancarPetalo" />
				<div  class="input-group">
					<span class="input-group-addon">Flores</span>
					<select name="flor" class="form-control" onChange="this.form.submit()">
					');
						for($i=0;$i<count($flores);$i++)
						{
							if($flores[$i]->getTipo() == $florSel->getTipo()){

									echo "<option value=".$i." selected>".$flores[$i]->getTipo()."</option>";

								}else
								echo "<option value=".$i.">".$flores[$i]->getTipo()."</option>";
						}
					print('
					</select>
				</div>
				<div  class="input-group">
					<span class="input-group-addon">Petalos</span>
					<input type="text" name="petalosA" class="form-control"  />
				</div>
				<input  class="btn btn-default navbar-btn" type="submit" value="arrancarPetalo" />
			</form>');

	}


?>