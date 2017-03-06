<?php
require_once("conexion.php");
$sql="select * from encargados order by apellidos";
$registros=mysql_query($sql, $conexion) or die(mysql_error());

echo "<h2 style=\"display:inline\">ENCARGADOS MANTEMENTO AULAS INFORMATICA PLATEGA</H2> (<a href=# id=altaencargados>Alta de Encargados</a>)";
echo "<table border=1 id=listado>";
echo "<tr><th>Apelidos</th><th>Nome</th><th>Identificador</th><th>E-mail</th><th>Tipo</th><th>Estancias Asignadas</th><th colspan=2>Edición</th></tr>";

while($fila=mysql_fetch_assoc($registros))
{
    echo "<tr><td>".$fila['apellidos']."</td><td>".$fila['nombre']."</td><td>".$fila['idencargado']."</td><td>".$fila['email']."</td><td>".$fila['tipo']."</td>";
    
    // Consultamos las estancias asignadas a cada encargado.
    $sql=sprintf("SELECT estancia FROM `estancias` inner join ee on estancias.idestancia=ee.idestancia  where idencargado='%s'",$fila['idencargado']);
    $listado=mysql_query($sql,$conexion) or die(mysql_error());
    $cadena="";
    while($filanueva=mysql_fetch_assoc($listado))
        $cadena.=$filanueva['estancia'].", ";
    $cadena=substr($cadena,0,strlen($cadena)-2);
    
    echo "<td>$cadena</td><td>Borrar</td><td>Editar</td></tr>";
}

echo "</table>";
?>