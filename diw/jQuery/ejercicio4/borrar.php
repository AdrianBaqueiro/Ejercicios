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

mysqli_query($conexion, $sql1) or die(mysqli_error());
mysqli_query($conexion, $sql2) or die(mysqli_error());
echo "borrado";
}
