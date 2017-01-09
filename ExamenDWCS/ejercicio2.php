<?php
	
	$numero = isset($_POST['numero']) ? $_POST['numero']: null;
	$sNumero = isset($_POST['sNumero']) ? $_POST['sNumero']: null;
	$array;


	print ("

	<html>
		<head>

		</head>
		<body>
			<form method='POST' action='ejercicio2.php'>
				<div>
					Numero <input type='text' name='numero' />
						<select name='sNumero'> 
								<option value='5'>5</option>
								<option value='7'>7</option>
								<option value='9'>9</option>
						</select>
					<input type='submit' value='enviar'/>
				</div>
			</form>
		</body>
	</html>

	");

	if($numero!=null && isset($_POST['numero']))
	{

		$resto =$numero % $sNumero;
		if($resto == 0)
		{
			echo "resto 0, no hay array";

		}
		else
		{
			$array = array();
			for($i=0;$i<$resto;$i++)
			{
				if($i%2 == 0)
					array_push($array, 'x');
				else
					array_push($array, 'y');
			}
			echo "Resto: ".$resto."</br>";
			print_r( $array);
		}
	}

	
?>