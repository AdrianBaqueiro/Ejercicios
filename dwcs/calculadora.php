

<html>
	<head></head>
	<body>
		<form method="POST" action="calculadora.php" >
			<h1>Calculadora</h1>
			<select name="operacion" onchange="this.form.submit()"> 
				<option value="0"></option>
				<option value="1">Suma</option>
				<option value="2">Resta</option>
				<option value="3">Producto</option>
				<option value="4">Division</option>
				<option value="5">Cambio de signo</option>
			</select>
			<!--<input type="text" name="num1"></input>
			<input type="text" name="num2"></input>
			</br>
			<input type="submit" name="sumar" value="sumar"></input>
			<input type="submit" name="restar" value="restar"></input>
			<input type="submit" name="producto" value="producto"></input>
			<input type="submit" name="division" value="division"></input>
			<input type="submit" name="cambio" value="cambio signo"></input>-->
		</form>
	</body>
</html>

<?php
	$num1 = isset($_POST["num1"]) ? $_POST["num1"]:0;
	$num2 = isset($_POST["num2"]) ? $_POST["num2"]:0;
	$resultado = "El resultado es: ";
	$operacion = isset($_POST["operacion"]) ? $_POST["operacion"]:0;


		if($operacion==1)
		{
			echo "
			<form method='POST' action='calculadora.php' >
				<input type='text' name='num1'></input>
				<input type='text' name='num2'></input>
				</br>
				<input type='submit' name='sumar' value='sumar'></input>
			</form>";
		}else

		if($operacion==2)
		{
			echo "
			<form method='POST' action='calculadora.php' >
				<input type='text' name='num1'></input>
				<input type='text' name='num2'></input>
				</br>
				<input type='submit' name='restar' value='restar'></input>
			</form>";
		}else

		if($operacion==3)
		{
			echo "
			<form method='POST' action='calculadora.php' >
				<input type='text' name='num1'></input>
				<input type='text' name='num2'></input>
				</br>
				<input type='submit' name='producto' value='producto'></input>
			</form>";
		}else

		if($operacion==4)
		{
			echo "
			<form method='POST' action='calculadora.php' >
				<input type='text' name='num1'></input>
				<input type='text' name='num2'></input>
				</br>
				<input type='submit' name='division' value='division'></input>
			</form>";
		}else

		if($operacion==5)
		{
			echo "
			<form method='POST' action='calculadora.php' >
				<input type='text' name='num1'></input>
				</br>
				<input type='submit' name='cambio' value='cambio signo'></input>
			</form>";
		}

	if(isset($_REQUEST["sumar"]))
		suma();
	if(isset($_REQUEST["restar"]))
		resta();
	if(isset($_REQUEST["producto"]))
		producto();
	if(isset($_REQUEST["division"]))
		division();
	if(isset($_REQUEST["cambio"]))
		cambio();
	

	function suma()
	{
		global $num1,$num2,$resultado;
		$suma=$num1+$num2;
		echo $resultado.$suma;
	}
	function resta()
	{
		global $num1,$num2,$resultado;
		$resta=$num1-$num2;
		echo $resultado.$resta;
	}
	function producto()
	{
		global $num1,$num2,$resultado;
		$producto = $num1*$num2;
		echo $resultado.$producto;
	}
	function division()
	{
		global $num1,$num2,$resultado;
		if($num2==0)
			$division = "division por 0";
		else
			$division = $num1/$num2;
			echo $resultado.$division;
	}
	function cambio()
	{
		global $num1,$resultado;
		$cambio = 0;
		$cambio -= $num1;
		echo $resultado.$cambio;

	}

?>
