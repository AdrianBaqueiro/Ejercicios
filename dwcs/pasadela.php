<?php
	//usuario admin
	//contraseña 1234
	session_start();

	$usuario = isset($_POST["usuario"]) ? $_POST["usuario"]:null;
	$contraseña = isset($_POST["password"]) ? $_POST["password"]:null;
	if(!isset($_COOKIE['user']))
	{
		if($usuario!="admin" || $contraseña!="1234")
		{
			$_SESSION['error'] = 1;
			header('location:'."loginPasadela.php?");
			die();
		} else
		{
			$_SESSION['error'] = 0;
			setcookie('user',$usuario,time()+30);
			setcookie('password',$contraseña,time()+30);

		}
	}else
	{
		setcookie('user',$_COOKIE['user'],time()+30);
		setcookie('password',$_COOKIE['password'],time()+30);
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

	if(isset($_COOKIE['aulas']))
		$aulas = unserialize($_COOKIE['aulas']);
	else
	{
		for($i=0;$i<20;$i++)
			$aulas[$i]="-";
	}

	$aula1 = $_SESSION['estadoA1'];
	$aula2 = $_SESSION['estadoA2'];
	$aula3 = $_SESSION['estadoA3'];
	$estado = $_SESSION['estadoA1'];
	$horai = $_SESSION['hora-iA1'];
	$horaf = $_SESSION['hora-fA1'];
	$dia = $_SESSION['diaA1'];
	$you = $_SESSION['youA1'];
	$face = $_SESSION['faceA1'];


	if(isset($_POST["estadoA1"]))
	{
		$aulas[0] =  $estado;
		$aulas[1] =  $horai;
		$aulas[2] =  $horaf;
		$aulas[3] =  $dia;
		$aulas[4] =  $you;
		$aulas[5] =  $face;

	}

	$estado = $_SESSION['estadoA2'];
	$horai = $_SESSION['hora-iA2'];
	$horaf = $_SESSION['hora-fA2'];
	$dia = $_SESSION['diaA2'];
	$you = $_SESSION['youA2'];
	$face = $_SESSION['faceA2'];

	if(isset($_POST["estadoA2"]))
	{
		$aulas[6] =  $estado;
		$aulas[7] =  $horai;
		$aulas[8] =  $horaf;
		$aulas[9] =  $dia;
		$aulas[10] =  $you;
		$aulas[11] =  $face;

	}
	$estado = $_SESSION['estadoA3'];
	$horai = $_SESSION['hora-iA3'];
	$horaf = $_SESSION['hora-fA3'];
	$dia = $_SESSION['diaA3'];
	$you = $_SESSION['youA3'];
	$face = $_SESSION['faceA3'];

	if(isset($_POST["estadoA3"]))
	{
		$aulas[12] =  $estado;
		$aulas[13] =  $horai;
		$aulas[14] =  $horaf;
		$aulas[15] =  $dia;
		$aulas[16] =  $you;
		$aulas[17] =  $face;
	}
	setcookie('aulas',serialize($aulas),time()+100);
	
?>

<html>
	<head>
		<link  rel="stylesheet" type="text/css"  href="..\bootstrap-3.3.7-dist\css\bootstrap.css">
	</head>
	<body>
		<h1 style="text-align: center">PASADELA</h1>
		<form method ="POST" action="pasadela.php">
			<table border="1px" class='table'>
			<th>Pasadela</th>
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
				for($i=1,$e=0;$i<4;$i++)
				{
					echo "<tr>";
					if($e==0 || $e==6 ||$e==12)
						echo "<th>Aula$i:</th>";

					for($r=0;$r<6;$e++,$r++)
					{
						if($e==0 || $e==6 ||$e==12)
						{
							if($aulas[$e]=="-" || $aulas[$e]=="cerrado")
								echo "<td>Cerrado</td>";
							else
								echo "<td>Abierto</td>";
						}
						else
							if($e==16 || $e==10 || $e==4)
							{
							if($aulas[$e]=="si")
								echo "<td>Si</td>";
							else
								echo "<td>No</td>";
							}
							else
								if($e==17 || $e==11 || $e==5)
								{
									if($aulas[$e]=="si")
										echo "<td>Si</td>";
									else
										echo "<td>No</td>";
								}else
									echo "<td>$aulas[$e]</td>";
					}
					echo "</tr>";
				}

			echo "</table>"
		?>
	</body>
</html>