<?php
	include 'clases/aula.php';
	//usuario admin
	//contraseña 1234
	session_start();

	$usuario = isset($_POST["usuario"]) ? $_POST["usuario"]:null;
	$contraseña = isset($_POST["password"]) ? $_POST["password"]:null;

	if(isset($_POST["usuario"]))
		$_SESSION['usuario'] = $usuario;
	if(isset($_POST["password"]))
		$_SESSION['password'] = $contraseña;

	if($_SESSION['usuario']!="admin" || $_SESSION['password']!="1234")
	{

		$_SESSION['error'] = 1;
		header('location:'."loginPasadela.php?");
		die();
	} 



	$_SESSION['estadoA1'] = isset($_POST["estadoA1"]) ? $_POST["estadoA1"]: "cerrado";
	$_SESSION['hora-iA1'] = isset($_POST["hora-iA1"]) ? $_POST["hora-iA1"]: "-";
	$_SESSION['hora-fA1'] = isset($_POST["hora-fA1"]) ? $_POST["hora-fA1"]: "-";
	$_SESSION['diaA1'] = isset($_POST["diaA1"]) ? $_POST["diaA1"]: "-";
	$_SESSION['youA1'] = isset($_POST["youA1"]) ? $_POST["youA1"]: "no";
	$_SESSION['faceA1'] = isset($_POST["faceA1"]) ? $_POST["faceA1"]: "no";

	$_SESSION['estadoA1'] = isset($_POST["estadoA1"]) ? $_POST["estadoA1"]: "cerrado";
	$_SESSION['hora-iA1'] = isset($_POST["hora-iA1"]) ? $_POST["hora-iA1"]: "-";
	$_SESSION['hora-fA1'] = isset($_POST["hora-fA1"]) ? $_POST["hora-fA1"]: "-";
	$_SESSION['diaA1'] = isset($_POST["diaA1"]) ? $_POST["diaA1"]: "-";
	$_SESSION['youA1'] = isset($_POST["youA1"]) ? $_POST["youA1"]: "no";
	$_SESSION['faceA1'] = isset($_POST["faceA1"]) ? $_POST["faceA1"]: "no";

	$_SESSION['estadoA2'] = isset($_POST["estadoA2"]) ? $_POST["estadoA2"]: "cerrado";
	$_SESSION['hora-iA2'] = isset($_POST["hora-iA2"]) ? $_POST["hora-iA2"]: "-";
	$_SESSION['hora-fA2'] = isset($_POST["hora-fA2"]) ? $_POST["hora-fA2"]: "-";
	$_SESSION['diaA2'] = isset($_POST["diaA2"]) ? $_POST["diaA2"]: "-";
	$_SESSION['youA2'] = isset($_POST["youA2"]) ? $_POST["youA2"]: "no";
	$_SESSION['faceA2'] = isset($_POST["faceA2"]) ? $_POST["faceA2"]: "no";


	$_SESSION['estadoA3'] = isset($_POST["estadoA3"]) ? $_POST["estadoA3"]: "cerrado";
	$_SESSION['hora-iA3'] = isset($_POST["hora-iA3"]) ? $_POST["hora-iA3"]: "-";
	$_SESSION['hora-fA3'] = isset($_POST["hora-fA3"]) ? $_POST["hora-fA3"]: "-";
	$_SESSION['diaA3'] = isset($_POST["diaA3"]) ? $_POST["diaA3"]: "-";
	$_SESSION['youA3'] = isset($_POST["youA3"]) ? $_POST["youA3"]: "no";
	$_SESSION['faceA3'] = isset($_POST["faceA3"]) ? $_POST["faceA3"]: "no";
	

	$aula1 = $_SESSION['aula1'];
	$aula2 = $_SESSION['aula2'];
	$aula3 = $_SESSION['aula3'];
	$estado = $_SESSION['estadoA1'];
	$horai = $_SESSION['hora-iA1'];
	$horaf = $_SESSION['hora-fA1'];
	$dia = $_SESSION['diaA1'];
	$you = $_SESSION['youA1'];
	$face = $_SESSION['faceA1'];

	
	if(isset($_POST["estadoA1"]))
	{
		if($_SESSION['aula1'])
			$aula1 = new AULA("aula1",$estado,$dia,$horai,$horaf,$you,$face);

		$aula1->setEstado($estado);
		$aula1->setHorai($horai);
		$aula1->setHoraf($horaf);
		$aula1->setDia($dia);
		$aula1->setyou($you);
		$aula1->setFace($face);
		$_SESSION['aula1'] = $aula1;

		/* old code
		$aulas[0] =  $estado;
		$aulas[1] =  $horai;
		$aulas[2] =  $horaf;
		$aulas[3] =  $dia;
		$aulas[4] =  $you;
		$aulas[5] =  $face;
		*/
	}

	$estado = $_SESSION['estadoA2'];
	$horai = $_SESSION['hora-iA2'];
	$horaf = $_SESSION['hora-fA2'];
	$dia = $_SESSION['diaA2'];
	$you = $_SESSION['youA2'];
	$face = $_SESSION['faceA2'];

	if(isset($_POST["estadoA2"]))
	{
		if(!$_SESSION['aula2'])
			$aula2 = new AULA("aula2",$estado,$dia,$horai,$horaf,$you,$face);


		$aula2->setEstado($estado);
		$aula2->setHorai($horai);
		$aula2->setHoraf($horaf);
		$aula2->setDia($dia);
		$aula2->setyou($you);
		$aula2->setFace($face);

		$_SESSION['aula2'] = $aula2;

		/*old code
		$aulas[6] =  $estado;
		$aulas[7] =  $horai;
		$aulas[8] =  $horaf;
		$aulas[9] =  $dia;
		$aulas[10] =  $you;
		$aulas[11] =  $face;
		*/
	}

	$estado = $_SESSION['estadoA3'];
	$horai = $_SESSION['hora-iA3'];
	$horaf = $_SESSION['hora-fA3'];
	$dia = $_SESSION['diaA3'];
	$you = $_SESSION['youA3'];
	$face = $_SESSION['faceA3'];

	if(isset($_POST["estadoA3"]))
	{
		if(!$_SESSION['aula3'])
			$aula3 = new AULA("aula3",$estado,$dia,$horai,$horaf,$you,$face);

		$aula3->setEstado($estado);
		$aula3->setHorai($horai);
		$aula3->setHoraf($horaf);
		$aula3->setDia($dia);
		$aula3->setyou($you);
		$aula3->setFace($face);
		$_SESSION['aula3'] = $aula3;

		/* old code
		$aulas[12] =  $estado;
		$aulas[13] =  $horai;
		$aulas[14] =  $horaf;
		$aulas[15] =  $dia;
		$aulas[16] =  $you;
		$aulas[17] =  $face;
		*/
	}
?>

<html>
	<head>
		<link  rel="stylesheet" type="text/css"  href="..\bootstrap-3.3.7-dist\css\bootstrap.css">
	</head>
	<body>
		<h1  style="text-align: center">PASADELA</h1>
		<form method ="POST" action="pasadelaV2.php">
		<!-- OLD CODE
			<div id="aulas">
				<input type="checkbox" name="aula1" value="1">Aula1</input>
				<input type="checkbox" name="aula2" value="2">Aula2</input>
				<input type="checkbox" name="aula3" value="3">Aula3</input>
			</div>
			<div id="operacion">
				<input type="radio" name="estado" value="abierto">abrir</input>
				<input type="radio" name="estado" value="cerrado">cerrar</input>
			</div>
			<div id="hora">
				<select name="hora-i" class="selectpicker"> 
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
				</select>
				<select name="hora-f" class="selectpicker"> 
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
				</select>
			</div>
			<div id="dias">
				<select name="dia" class="selectpicker"> 
						<option value="Lunes">Lunes</option>
						<option value="Martes">Martes</option>
						<option value="Miercoles">Miercoles</option>
						<option value="Jueves">Jueves</option>
						<option value="Viernes">Viernes</option>
				</select>
				<h3>Extras</h3>
				<input type="checkbox" name="you" value="si">Youtube</input>
				<input type="checkbox" name="face" value="si">Facebook</input>
				
			</div>
			-->
			<table border="1px" class='table'>
			<th>PasadelaV2</th>
			<th>Aula1</th>
			<th>Aula2</th>
			<th>Aula3</th>
			<tr>
				<th>Estado</th>
				<td>
					<input type="radio" name="estadoA1" value="abierto">abrir</input>
					<input type="radio" name="estadoA1" value="cerrado">cerrar</input></input>
				</td>
				<td>
					<input type="radio" name="estadoA2" value="abierto">abrir</input>
					<input type="radio" name="estadoA2" value="cerrado">cerrar</input></input>
				</td>
				<td>
					<input type="radio" name="estadoA3" value="abierto">abrir</input>
					<input type="radio" name="estadoA3" value="cerrado">cerrar</input></input>
				</td>

			</tr>
			<tr>
				<th>Hora Inicio</th>
				<td>
					<select name="hora-iA1" class="selectpicker"> 
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
					</select>
				</td>
				<td>
					<select name="hora-iA2" class="selectpicker"> 
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
					</select>
				</td>
				<td>
					<select name="hora-iA3" class="selectpicker"> 
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>Hora fin</th>
				<td>
					<select name="hora-fA1" class="selectpicker"> 
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
					</select>
				</td>
				<td>
					<select name="hora-fA2" class="selectpicker"> 
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
					</select>
				</td>
				<td>
					<select name="hora-fA3" class="selectpicker"> 
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>Dia</th>
				<td>
					<select name="diaA1" class="selectpicker"> 
							<option value="Lunes">Lunes</option>
							<option value="Martes">Martes</option>
							<option value="Miercoles">Miercoles</option>
							<option value="Jueves">Jueves</option>
							<option value="Viernes">Viernes</option>
					</select>
				</td>
				<td>
					<select name="diaA2" class="selectpicker"> 
							<option value="Lunes">Lunes</option>
							<option value="Martes">Martes</option>
							<option value="Miercoles">Miercoles</option>
							<option value="Jueves">Jueves</option>
							<option value="Viernes">Viernes</option>
					</select>
				</td>
				<td>
					<select name="diaA3" class="selectpicker"> 
							<option value="Lunes">Lunes</option>
							<option value="Martes">Martes</option>
							<option value="Miercoles">Miercoles</option>
							<option value="Jueves">Jueves</option>
							<option value="Viernes">Viernes</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>Youtube</th>
				<td>
					<input type="checkbox" name="youA1" value="si"></input>
				</td>
				<td>
					<input type="checkbox" name="youA2" value="si"></input>
				</td>
				<td>
					<input type="checkbox" name="youA3" value="si"></input>
				</td>
			</tr>
			<tr>
				<th>Facebook</th>
				<td>
					<input type="checkbox" name="faceA1" value="si"></input>
				</td>
				<td>
					<input type="checkbox" name="faceA2" value="si"></input>
				</td>
				<td>
					<input type="checkbox" name="faceA3" value="si"></input>
				</td>
			</tr>
			</table>
			<input class="btn btn-sm btn-info" type="submit" value="enviar"></input>
		</form>

		<?php
			echo "<h3>Estado Pasadela</h3>";
			echo "<table class='table'>";
				echo "<th>Pasadela</th>";
				echo "<td>Estado</td>";
				echo "<td>Hora inicio</td>";
				echo "<td>Hora fin</td>";
				echo "<td>Dia</td>";
				echo "<td>Youtube</td>";
				echo "<td>Facebook</td>";
				echo "<tr>";
					echo "<th>".$aula1->getNombre()."</td>";
					echo "<td>".$aula1->getEstado()."</td>";
					echo "<td>".$aula1->getHorai()."</td>";
					echo "<td>".$aula1->getHoraf()."</td>";
					echo "<td>".$aula1->getDia()."</td>";
					echo "<td>".$aula1->getYou()."</td>";
					echo "<td>".$aula1->getFace()."</td>";
				echo "</tr><tr>";
					echo "<th>".$aula2->getNombre()."</td>";
					echo "<td>".$aula2->getEstado()."</td>";
					echo "<td>".$aula2->getHorai()."</td>";
					echo "<td>".$aula2->getHoraf()."</td>";
					echo "<td>".$aula2->getDia()."</td>";
					echo "<td>".$aula2->getYou()."</td>";
					echo "<td>".$aula2->getFace()."</td>";
				echo "</tr><tr>";
					echo "<th>".$aula3->getNombre()."</td>";
					echo "<td>".$aula3->getEstado()."</td>";
					echo "<td>".$aula3->getHorai()."</td>";
					echo "<td>".$aula3->getHoraf()."</td>";
					echo "<td>".$aula3->getDia()."</td>";
					echo "<td>".$aula3->getYou()."</td>";
					echo "<td>".$aula3->getFace()."</td>";
				echo "</tr>";
				echo "<table>";
				/* OLD CODE
				for($i=1,$e=0;$i<4;$i++)
				{
					echo "<tr>";
					if($e==0 || $e==6 ||$e==12)
						echo "<th>Aula$i:</th>";

					for($r=0;$r<6;$e++,$r++)
					{
						if($e==0 || $e==6 ||$e==12)
						{
							if($aulas[$e]=="-" || $aulas[$e]==0)
								echo "<td>Cerrado</td>";
							else
								echo "<td>Abierto</td>";
						}
						else
							if($e==16 || $e==10 || $e==4)
							{
							if($aulas[$e]==2)
								echo "<td>Si</td>";
							else
								echo "<td>No</td>";
							}
							else
								if($e==17 || $e==11 || $e==5)
								{
									if($aulas[$e]==3)
										echo "<td>Si</td>";
									else
										echo "<td>No</td>";
								}else
									echo "<td>$aulas[$e]</td>";
					}
					echo "</tr>";
				}
			
			echo "</table>"
			*/
		?>
	</body>
</html>