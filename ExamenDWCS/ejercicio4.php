<?php 
	session_start();



	print ("

	<html>
		<head>

		</head>
		<body>
			<form method='POST' action='ejercicio4.php'>
				<div>
					<input type='submit' value='Cargar' name='cargar'/>
					<input type='submit' value='Visualizar' name='visualizar'/>
				</div>
			</form>
		</body>
	</html>

	");

	$array = isset($_SESSION['array']) ? $_SESSION['array']: null;
	if(isset($_POST['cargar']))
	{

			$array = cargar();
			$_SESSION['array'] =$array;
			echo "cargado";
		
	}

	if(isset($_POST['visualizar']))
	{
		
		visualizar($array);

	}


	function cargar(){
		$arrayH[0] = 'DWCS';
		$arrayH[1] = 'DWCC';
		$arrayH[2] = 'DIW';
		$arrayH[3] = 'DAW';
		$arrayD[0] = 'Lunes';
		$arrayD[1] = 'Martes';
		$arrayD[2] = 'Miercoles';
		$arrayD[3] = 'Jueves';
		$arrayD[4] = 'Viernes';

		for ($i=0; $i < 5 ; $i++) 
		{ 

			for ($e=16; $e < 20; $e++) 
			{ 
				$array[$arrayD[$i]][$e]=$arrayH[rand(0, 3)];
			}
		}
		return $array;

	}
	function visualizar($array){

		{	
			echo "<table>";
			foreach ($array as $key => $value) {
				echo "<tr><td>$key";
				foreach ($value as $key2 => $value2) {
					echo "<td>".$key2." ".$value2."</td>";
				}
				echo "</td></tr>";
			}
			echo "</table>";
			
			//print_r($array);
		}
	}
	
?>