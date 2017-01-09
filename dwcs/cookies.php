<?php
	
	if(isset($_COOKIE['visitas']))
	{
		if($_COOKIE['visitas']>=10)
		{
			echo "numero maximo de visitas";
			setcookie('visitas',$_COOKIE['visitas']+1,time()-1);
		}
		else
		{
		echo "numero de visitas ".$_COOKIE['visitas'];
		setcookie('visitas',$_COOKIE['visitas']+1,time()+3);
		}
	}else
	{
		echo "Bienvenido a nuestra pagina";
		setcookie('visitas',1);
	}



?>




<!--

<html>
	<head></head>
	<body>
		<p>Numero de visitas</p>
	</body>
</html>
-->
