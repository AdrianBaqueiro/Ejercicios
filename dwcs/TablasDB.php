<?php
include('functions/DB.php');
include('functions/html.php');
include('functions/interface.php');
session_start();
$con;



$tipo = isset($_POST['tipo']) ? $_POST['tipo']: null;
$cor = isset($_POST['cor']) ? $_POST['cor']: null;
$numPetalos = isset($_POST['numPetalos']) ? $_POST['numPetalos']: null;
$submit = isset($_POST['submit']) ? $_POST['submit']: null;
$selNum = isset($_POST['Columnas']) ? $_POST['Columnas']: null;

if($selNum == null)
{
  if(isset($_SESSION['$selNum']))
    $selNum = $_SESSION['$selNum'];
  else
    $selNum = 1;
}


if($submit == null)
{
  if(isset($_SESSION['submit']))
    $submit = $_SESSION['submit'];
  else
    $submit = "default";
}




openHTML("TablasDB");
menuBarI("TablasDB","TablasDB.php");
menuItems("CrearTabla");
menuItems("ConsultaSQL");
menuItems("VerDB");
menuBarF();



switch ($submit) {
  case 'CrearTabla':
    formI("CrearTabla","TablasDB.php");
    createInput("NombreTabla");
    crearSelectNum("Columnas",10,$selNum);
    for($i=0;$i<$selNum;$i++)
    {
        createInput("Columna".$i);
    }
    formF("crearTabla");
    break;
  case 'ConsultaSQL':
    formI("ConsultaSQL","TablasDB.php");
    createInput("Nombre");
    formF("RealizarConsulta");
    break;
  case 'VerDB':
    formI("VerDB","TablasDB.php");
    createInput("DB");
    formF("DB");
    break;

  default:
    # code...
    break;
}


finishHTML();
$_SESSION['selNum'] = $selNum;
$_SESSION['submit'] = $submit;
//$con = connectDB("localhost","root","",null);

 //crearDB($con,"persona2");












 ?>
