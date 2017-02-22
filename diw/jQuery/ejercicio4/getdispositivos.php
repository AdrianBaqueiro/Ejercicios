<?php
require_once("conexion.php");

if (isset($_POST['idestancia']))
{
    $sql="select * from estancias where idestancia='{$_POST['idestancia']}'";
    $registros=mysql_query($sql,$conexion) or die(mysql_error());
    $fila=mysql_fetch_assoc($registros);
    
    for ($i=0; $i<$fila['numequipos'];$i++)
    {
        if ($i<10)
            $valor="{$fila['acronimo']}eq0".$i;
        else
            $valor="{$fila['acronimo']}eq".$i;
        echo "<option value=\"$valor\">$valor</option>";   
    }
}
?>