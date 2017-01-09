<?php
	$array;
	$indice;
	$arrayBi;
	$arrayBiA;
	function Iarray (&$array)
	{
		for ($i=0; $i < 10 ; $i++)
		{ 
			$array[$i]=$i;
		}
		return true;
	}
	function Ver ($array)
	{
		echo "<h3>Se muestra el array</h3>";
		foreach ($array as $key => $value) {
			echo "Posicion $key valor $value </br>";
		}
	}
	function Incremento (&$array)
	{
		for ($i=0; $i < 10 ; $i++)
		{ 
			$array[$i]+=1;
		}
		return true;
	}
	function LlenarArray(&$indice)
	{
		$indice['nombre'] = "pepe";
		$indice['apellido'] = "garcia";
		$indice['edad'] = "50";
		$indice['peso'] = "80";
		return true;
	}
	function LlenarArrayBi(&$arrayBi,$option)
	{
		if($option)
		{
			for ($i=0; $i < rand(1, 15) ; $i++) 
			{ 
				for ($e=0; $e < rand(1, 15); $e++) 
				{ 
					$arrayBi[$i][$e]=rand(0, 30);
				}
			}
		}else
		{
			
			$arrayBi[0][0] = 10;
			$arrayBi[0][1] = 20;
			$arrayBi[0][2] = 30;
			$arrayBi[1][0] = 'pepe';
			$arrayBi[1][1] = 'maria';
			$arrayBi[2][0] = '1';
			$arrayBi[2][1] = '2';
			$arrayBi[2][2] = '3';
			$arrayBi[2][3] = '4';
		}
	
		return true;
	}
	function RecorrerArrayBi(&$arrayBi)
	{
		echo "<table border=1px>";
		for ($i=0; $i < count($arrayBi); $i++) 
		{ 
			echo "<tr>";

			
				for ($e=0; $e < count($arrayBi[$i]); $e++)
			 	{ 
					echo "<td>".$arrayBi[$i][$e]."</td>";
				}
			
			echo "</tr>";
		}
		echo "</table>";

	}
	function RecorrerArrayBiFe(&$arrayBi)
	{
		echo "<table border=1px>";
		foreach ($arrayBi as $key => $value) 
		{ 
			echo "<tr>";
			foreach ($arrayBi[$key] as $key2 => $value2) 
			{
				echo "<td>".$value2."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}

	function LlenarArrayBiA(&$arrayBiA)
	{

		$arrayBiA =array('nomes'=>array('nome1'=>"maria",'nome2'=>"pepe"),'apelidos'=>array('apelido1'=>"lopez",'apelido2'=>"fernandez"));
		return true;
	}
	function RecorrerArrayBiFeA(&$arrayBiA)
	{
		echo "<table border=1px>";
		foreach ($arrayBiA as $key => $value) 
		{ 
			
			echo "<tr>";
			echo " <th>".$key."</th>";
			foreach ($arrayBiA[$key] as $key2 => $value2) 
			{

				echo "<td>".$key2.":".$value2."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	function RecorrerArrayFunciones(&$array)
	{
		echo "<h3>Array normal</h3>";
		echo "<table border=1px>";
			echo "<tr>";
			while($element=each($array))
			{
				echo "<td>" .current($element)."</td>";
				
			}
			
			echo "</tr>";
			echo "</table>";
			//array inverso
			echo "<h3>Array inverso</h3>";
			echo "<table border=1px>";
			end($array);
			echo "<tr>";
			while(current($array)!=null)
			{
				echo "<td>" .current($array)."</td>";
				prev($array);
			}
			
			echo "</tr>";
			echo "</table>";
	}
?>
<html>
	<head>
	</head>
	<body>
		<div >
			<h1> Ejercicios de Array </h1>
			<?php 
				if(Iarray($array))
					echo "se han introducido valores </br>";
				Ver($array);
				if(Incremento($array))
					echo "</br>se han sumado los valores </br>";
				Ver($array);
				if(LlenarArray($indice))
					echo "</br>se han añadido valores </br>";
				print_r($indice);
				echo " </br>";
				//var_dump($indice);
				function asd(){
					echo " asd";
				}
				//cambiar false por true para array con valores aleatorios
				if(LlenarArrayBi($arrayBi,false))
					echo "</br>se han añadido valores </br>";
				RecorrerArrayBi($arrayBi);
				echo "</br>array foreach </br>";
				RecorrerArrayBiFe($arrayBi);
				if(LlenarArrayBiA($arrayBiA))
					echo "</br>se han añadido valores </br>";
				RecorrerArrayBiFeA($arrayBiA);
				echo "<h2>Array mediante funciones </h2>";
				RecorrerArrayFunciones($array);
			?>
		</div>
	</body>
</html>