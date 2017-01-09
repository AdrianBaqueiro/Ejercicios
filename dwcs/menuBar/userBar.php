<?php
	//define('ROOT_PATH', dirname(__DIR__) . '\\');
	include(ROOT_PATH.'strings/string.php');
	$fechas = Array();
	$users = Array();
		foreach ($_COOKIE as $key => $value) {
			if(is_array($value))
			{
				array_push($users, $key);
				foreach ($value as $key2 => $value2) {
					if($key2 == "historial")
					{
						array_push($fechas, end(explode(";", $value2)));
					}
				}
			}

		}


			
			echo "<div id='userMenu'>";

			for($i=0;$i<count($users);$i++)
			{
				echo "<div class='userMenu'>";
				echo "<div id='user'><a href='http://127.0.0.1/Ejercicios/dwcs/userDetails/userDetails.php?user=".$users[$i]."'>$users[$i]</a> </div>";
				echo "<div id='visita'> Ultima visita: <br> $fechas[$i] </div>";
				echo "</div>";
			}
				

			echo "</div>";


?>