<?php
	function Potencia($x,$y)
	{
		$sum=$x;
		for($aux=1;$aux<$y;$aux++)
		{
			$sum=$sum*$x;
		}
		return $sum;
	}
	function Intercambio(&$x,&$y)
	{
		$aux = $x;
		$x = $y;
		$y = $aux;
	}
?>

<html>
	<head>
	</head>
	<body>
		<h1> Tabla Potencias </h1>
		<table border="1 solid black">
			<?php 
				for($i=1,$e=2;$i<17;$i++,$e++){
					echo "<td>" .Potencia($i,$e)."</td>" ;
					if($i%4==0)
						echo "<tr></tr>";
				}				
			?>
		</table>
		<h1>Tabla Intercambio</h1>
		<table border="1 solid black">
			<?php 
				for($i=1,$e=2;$i<17;$i++,$e++){
					$x=$i;
					$y=$e;
					Intercambio($x,$y);
					echo "<td> (".$x.",".$y.")</td>" ;
					if($i%4==0)
						echo "<tr></tr>";
				}				
			?>
	</body>
</html>