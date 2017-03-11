<?php
if (isset($_POST['usuario']) && $_POST['usuario']!="")
{
	require_once("conexion.php");
	$sql=sprintf("select * from encargados where idencargado='%s' and password='%s'",$_POST['usuario'],md5($_POST['password']));
	$resultados=mysqli_query($conexion,$sql) or die(mysqli_error());
	if (mysqli_num_rows($resultados)==1)
	{
		@session_start();
		$_SESSION['usuario']="Admin";
		echo "concedido";
	}
	else
	echo "erroneo";
}
else
{
require("cabeceira.html");
// Na cabeceira xa está cargada a librería de jQuery para que esté dispoñible no resto de componentes da páxina.
?>

<!-- Programar aquí o código de jQuery -->
<!-- A librería de jQuery xa está cargada previamente no arquivo cabeceira.html -->

</head>
<body>
<div id="wrapper">
<?php require("menu.php"); ?>
<div id="splash"><img src="images/portada.jpg" alt="" /></div>
<div id="page">
<div id="central">
<form id="formulario" name="formulario" method="post" action="acceder.php">
<fieldset>
<legend>ACCESO DE ENCARGADOS</legend>
    <label for="email">Usuario: </label>
    <input type="text" name="usuario" id="usuario" /><br />
    <label for="password">Password: </label>
    <input type="password" name="password" id="password" /><br />
    <input type="reset" name="reset" id="reset" value="Reset" />
    <input type="button" name="acceder" id="acceder" value="Acceder" />
</fieldset>
</form>
</div>
</div>
   <div id="footer">
            <p>Platega Curso (Ajax+PHP)</p>
            <p><img src="images/CCBY-SA.png">Creative Commons Share Alike by Rafa Veiga - 2011</p>
        </div>
    </div>
</body>
</html>
<?php
}
?>
