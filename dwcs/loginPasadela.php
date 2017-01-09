<?php
	session_start();
	//usuario admin
	//contraseña 1234
?>


<html>
	<head>
		<link  rel="stylesheet" type="text/css"  href="..\bootstrap-3.3.7-dist\css\bootstrap.css">
	</head>
	<body>
		<?php 
			if(isset($_SESSION['error']) && $_SESSION['error']==1)
				echo "<h2 style='color:red'> Usuario o contraseña erroneo </h2>";
		?>
		<form method ="POST" action="pasadela.php">

			<h1>PASADELA</h1>
			<div>Usuario:<input type="text" name="usuario"></input></div>
			<div>contraseña:<input type="password" name="password"></input></div>
			<input type="submit" value="Login"></input>
		</form>
	</body>
</html>