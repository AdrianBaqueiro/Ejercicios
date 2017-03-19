<?php
// Programar aquí o listado de estancias.
/*
4.- Programar o arquivo listadoestancias.php.
Neste listado amosar os campos:
ID. Estancia | Nome Estancia | Acr�nimo | Num. Equipos. |
Num. Impresora, ordenado por ID.
Podedes ver como est� feito listadoencargados.php para ter un modelo.
*/


?>


<?php
require_once("conexion.php");
$sql="select * from estancias order by idestancia";
$registros=mysqli_query($conexion, $sql) or die(mysqli_error());

echo "<h2 style=\"display:inline\">ESTANCIAS</H2>";
echo "<table border=1 id=listado>";
echo "<tr><th>ID</th><th>Nome</th><th>Acronimo
</th><th>NumEquipos</th><th>NumImpresora</th></tr>";

while($fila=mysqli_fetch_assoc($registros))
{
    echo "<tr><td>".$fila['idestancia']."</td><td>"
    .$fila['estancia']."</td><td >".$fila['acronimo']
    ."</td><td>".$fila['numequipos']."</td><td>".$fila['numimpresoras']."</td>";


}

echo "</table>";
?>
