<?php

	$nome = isset($_POST['nome']) ? $_POST['nome']: null;
	$ape1 = isset($_POST['ape1']) ? $_POST['ape1']: null;
	$ape2 = isset($_POST['ape2']) ? $_POST['ape2']: null;
	$idade = isset($_POST['idade']) ? $_POST['idade']: null;
	$salario = isset($_POST['salario']) ? $_POST['salario']: 0;
	

	if(isset($_COOKIE['empregado']))
		setcookie('empregado[salario]',$_COOKIE['empregado']['salario'] +10);



	print ("

	<html>
		<head>

		</head>
		<body>
			<form method='POST' action='ejercicio6p2.php'>
				<div>
					<input type='submit' value='VER' name='ver'/>
				</div>
			</form>
			<form method='POST' action='ejercicio6.php'>
				<div>
					<input type='submit' value='pagina1'/>
				</div>
			</form>
		</body>
	</html>

	");

	if(isset($_POST['ver']))
	{
		foreach ($_COOKIE['empregado'] as $key => $value) {
			echo $key." ".$value."</br>";
		}
	}

?>