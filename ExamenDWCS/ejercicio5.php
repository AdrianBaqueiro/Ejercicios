<?php	
		
	session_start();
	$array = isset($_SESSION['array']) ? $_SESSION['array']: array();
	$usuario = isset($_POST['usuario']) ? $_POST['usuario']: null;
	$password = isset($_POST['password']) ? $_POST['password']: null;
	
	if($usuario!=null && $password!=null)
	{
		array_push($array, $usuario);
		$_SESSION["array"] = $array;
		setcookie($usuario.'[user]',$usuario,time()+10);
		setcookie($usuario.'[pass]',$password,time()+10);

	}


	




	print ("

	<html>
		<head>

		</head>
		<body>
			<form method='POST' action='ejercicio5.php'>
				<div>
					Usuario <input type='text' name='usuario' />
					Contraseña <input type='password' name='password' />
					<input type='submit' value='enviar' />
				</div>
			</form>
		</body>
	</html>

	");


	foreach ($_COOKIE as $key => $value) {
		if(is_array($value))
			foreach ($value as $key2 => $value2) {
				echo $key2." ".$value2."<br>";
			}
	}
	for($i=0;$i<count($array);$i++)
		{
			if(!isset($_COOKIE[$array[$i]]))
			{
				echo "sen nome <br>";
			}
		}

?>