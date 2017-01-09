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
			<form method='POST' action='ejercicio6.php'>
				<div>
					Nome <input type='text' name='nome' />
					Ape1 <input type='text' name='ape1' />
					Ape2 <input type='text' name='ape2' />
					idade <input type='text' name='idade' />
					salario <input type='text' name='salario' />
					<input type='submit' value='enviar' />
					<input type='submit' value='VER' name='ver'/>
				</div>
			</form>
			<form method='POST' action='ejercicio6p2.php'>
				<div>
					<input type='submit' value='pagina2'/>
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
	else
	{
		if(!is_numeric($salario))
		{
			echo "el salario tiene que ser un numero </br>";
		}
		
		else
			if($nome!=null && $ape1!=null && $ape2!=null && $idade!=null && $salario!=null )
			{
				setcookie('empregado[nome]',$nome);
				setcookie('empregado[ape1]',$ape1);
				setcookie('empregado[ape2]',$ape2);
				setcookie('empregado[idade]',$idade);
				setcookie('empregado[salario]',$salario);
			}else
				echo "datos erroneos </br>";

	}

?>