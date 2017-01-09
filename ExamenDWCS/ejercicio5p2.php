<?php

session_start();
	$array = isset($_SESSION['array']) ? $_SESSION['array']: array();
	$usuario = isset($_POST['usuario']) ? $_POST['usuario']: null;
	$password = isset($_POST['password']) ? $_POST['password']: null;

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