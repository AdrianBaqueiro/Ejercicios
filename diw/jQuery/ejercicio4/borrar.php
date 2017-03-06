<?php
require ("conexion.php");

if (isset($_POST['tabla']) && $_POST['tabla']!="")
{
    switch($_POST['tabla'])
    {
        case 'encargados':
            $sql1=sprintf("delete from encargados where idencargado='%s'",$_POST['idencargado']);
            $sql2=sprintf("delete from ee where idencargado='%s'",$_POST['idencargado']);
            break;
            
        case 'estancias':
            $sql1=sprintf("delete from estancias where idestancia='%s'",$_POST['idestancia']);
            $sql2=sprintf("delete from ee where idestancia='%s'",$_POST['idestancia']);
            break;
    }

mysql_query($sql1,$conexion) or die(mysql_error());
mysql_query($sql2,$conexion) or die(mysql_error());
echo "borrado";
}