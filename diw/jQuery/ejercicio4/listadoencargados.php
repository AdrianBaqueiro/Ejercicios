<?php
require_once("conexion.php");
$sql="select * from encargados order by apellidos";
$registros=mysqli_query($conexion, $sql) or die(mysqli_error());

echo "<h2 style=\"display:inline\">ENCARGADOS MANTEMENTO AULAS INFORMATICA DAW</H2> (<a href=# id=altaencargados>Alta de Encargados</a>)";
echo "<table border=1 id=listado>";
echo "<tr><th>Apelidos</th><th>Nome</th><th>Identificador</th><th>E-mail</th><th>Tipo</th><th>Estancias Asignadas</th><th colspan=2>Edición</th></tr>";

while($fila=mysqli_fetch_assoc($registros))
{
    echo "<tr><td>".$fila['apellidos']."</td><td>".$fila['nombre']."</td><td id='encargado'>".$fila['idencargado']."</td><td>".$fila['email']."</td><td>".$fila['tipo']."</td>";

    // Consultamos las estancias asignadas a cada encargado.
    $sql=sprintf("SELECT estancia FROM `estancias` inner join ee on estancias.idestancia=ee.idestancia  where idencargado='%s'",$fila['idencargado']);
    $listado=mysqli_query($conexion, $sql) or die(mysqli_error());
    $cadena="";
    while($filanueva=mysqli_fetch_assoc($listado))
        $cadena.=$filanueva['estancia'].", ";
    $cadena=substr($cadena,0,strlen($cadena)-2);

    echo "<td>$cadena</td><td id='borrar'>Borrar</td><td>Editar</td></tr>";
}

echo "</table>";
?>
