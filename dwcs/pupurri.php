<?php

include('functions/DB.php');
include('functions/html.php');
include('functions/interface.php');

session_start();

$con;
$auxC;
$auxT;
$arrayC;
$arrayT;

$tipo = isset($_POST['tipo']) ? $_POST['tipo']: null;
$cor = isset($_POST['cor']) ? $_POST['cor']: null;
$numPetalos = isset($_POST['numPetalos']) ? $_POST['numPetalos']: null;
$submit = isset($_POST['submit']) ? $_POST['submit']: null;
$selNum = isset($_POST['Columnas']) ? $_POST['Columnas']: null;
$tablaSl = isset($_POST['tablaSl']) ? $_POST['tablaSl']: $_SESSION['tablaSl'];



$con = connectDB('localhost','root','',"Productos");



if($submit == null)
{
  if(isset($_SESSION['submit']))
    $submit = $_SESSION['submit'];
  else
    $submit = "default";
}


var_dump($_POST);


openHTML("Pupurri");
menuBarI("Pupurri","Pupurri.php");
menuItems("CrearEstanteria");
menuItems("CrearProducto");
menuItems("ConsultarProducto");
menuItems("ListarProducto");
menuBarF();



switch ($submit) {
  case 'CrearEstanteria':

    break;
  case 'CrearProducto':

    break;

  case 'ConsultarProducto':

    break;
  case 'ListarProducto':

    break;

  default:

    break;
}

finishHTML();
$_SESSION['selNum'] = $selNum;
$_SESSION['submit'] = $submit;
$_SESSION['tablaSl'] = $tablaSl;















 ?>
