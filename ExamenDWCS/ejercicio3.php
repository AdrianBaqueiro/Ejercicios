<?php
	session_start();
	$numero = isset($_POST['numero']) ? $_POST['numero']: null;
	$sNumero = isset($_POST['sNumero']) ? $_POST['sNumero']: null;
	$array = isset($_SESSION['array']) ? $_SESSION['array']: null;
	if(isset($_POST['cargar']))
	{
		if($numero!= null)
		{
			$array = cargar($numero,$sNumero);
			$_SESSION['array'] =$array;
			echo "cargado";
		}
	}

	if(isset($_POST['visualizar']))
	{
		
			visualizar($numero,$sNumero,$array);

	}

	print ("

	<html>
		<head>

		</head>
		<body>
			<form method='POST' action='ejercicio3.php'>
				<div>
					Numero <input type='text' name='numero' />
						<select name='sNumero'> 
								<option value='5'>5</option>
								<option value='7'>7</option>
								<option value='9'>9</option>
						</select>
					<input type='submit' value='Cargar' name='cargar'/>
					<input type='submit' value='Visualizar' name='visualizar'/>
				</div>
			</form>
		</body>
	</html>

	");


	function cargar($numero,$sNumero){
		$resto =$numero % $sNumero;
		$array = array();
		for($i=0;$i<$resto;$i++)
		{
			if($i%2 == 0)
				array_push($array, 'x');
			else
				array_push($array, 'y');
		}
		return $array;

	}
	function visualizar($numero,$sNumero,$array){

		{	

			//echo "Resto: ".$resto."</br>";
			print_r($array);
		}
	}
	
?>