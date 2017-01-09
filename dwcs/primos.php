<?php
	//Primos
	function CalPrimos($num)
		{
			for($num2=2;$num2<$num;$num2++)
			{
				if($num%$num2==0)
					{
						return false;
					}
			}
			return true;
		}
	$num = 1;
	while($num<=20)
	{
		if(CalPrimos($num)==true)
			echo"$num es primo  </br>";
		$num++;
	}

	//Factorial
	echo"<table border='1 solid black'>";
	$numeros=0;
	
	$factorial =1;
	$fila=0;
	$limite=10;
	$contador=0;
	echo "<tr>";
	for ($num=0; $num <= 50 ; $num++)
	 { 
		if(($fila==5 or $fila==0) and $numeros<=49)
		{
			for ($i=0; $i < 10 ; $i++) 
			{
				echo "<th>$numeros</th>";
				$numeros++;
			}
			$fila=1;
			$contador=0;
		}
		echo "<tr>";
		for($num2=0;$num2<10;$num2++)
		{
			echo "<td>$num</td>";
		}

		echo "</tr>";
		$fila ++;
		
		/*echo "<td ";
		if($num%2==0) 
			echo "bgcolor = 'green'";
		else if($num%3==0)
			echo "bgcolor = 'red'";
			else if($num%5==0)
				echo "bgcolor = 'yellow'";
				else
					echo "bgcolor = 'blue'";
		echo">$factorial</td>";
		*/
	}
	echo " </tr>";
	echo "</table>";
?>