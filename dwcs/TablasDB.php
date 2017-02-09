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
$tablaSl = isset($_POST['tablaSl']) ? $_POST['tablaSl']: null;



$con = connectDB('localhost','root','',"alumnos");

//echo $debug;

if($selNum == null)
{
  if(isset($_SESSION['selNum']))
    $selNum = $_SESSION['selNum'];
  else
    $selNum = 1;
}
if($tablaSl == null)
{
  if(isset($_SESSION['$tablaSl']))
    $tablaSl = $_SESSION['$tablaSl'];
  else
    $tablaSl = 1;
}


if($submit == null)
{
  if(isset($_SESSION['submit']))
    $submit = $_SESSION['submit'];
  else
    $submit = "default";
}
if(isset($_POST['crearTabla']) && $_POST['NombreTabla'] != "" && $_POST['columna0'] != ""){
  crearTabla($con);
}
if(isset($_POST['consulta']))
{
  verConsulta($con);
}

var_dump($_POST);

openHTML("TablasDB");
menuBarI("TablasDB","TablasDB.php");
menuItems("CrearTabla");
menuItems("ConsultaSQL");
menuItems("VerDB");
menuBarF();



switch ($submit) {
  case 'CrearTabla':
    formI("CrearTabla","TablasDB.php");
    echo '<input type="hidden" name="crearTabla" />';
    createInput("NombreTabla");
    crearSelectNum("Columnas",10,$selNum);
    for($i=0;$i<$selNum;$i++)
    {
      echo
      "<div  class='input-group'>
        <span class='input-group-addon'>Columna".$i."</span>
        <input type='text' name='columna".$i."' class='form-control'  required />";
        crearSelectTipo($i);

        echo  "</div>";
    }
    formF("crearTabla");
    break;
  case 'ConsultaSQL':
    formI("InsertarFilas","TablasDB.php");
    echo '<input type="hidden" name="insertar" />';
    $sql = " SHOW TABLES FROM alumnos";
    $result =  consultaDB($con,$sql);
    crearSelectDB("tablaSl",$result,$tablaSl);
    formF("insertar");
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
$_SESSION['tablaSl'] = $tablaSl;

//$con = connectDB("localhost","root","",null);

 //crearDB($con,"persona2");



function crearTabla($con){
  $auxC = 0;
  $auxT = 0;
  $arrayC = Array();
  $arrayT = Array();



  foreach ($_POST as $key => $value) {
    if($key == "columna".$auxC)
    {
      $arrayC[$auxC] = $value;
      $auxC++;
    }
    if($key == "tipo".$auxT)
    {
      $arrayT[$auxT] = $value;
      $auxT++;
    }
  }
$sql = "create table ".$_POST['NombreTabla']." ( ";

  for($i=0;$i<count($arrayC);$i++)
  {

    if($i== (count($arrayC)-1))
    {
        $sql = $sql.$arrayC[$i]." ".$arrayT[$i]." )";
    }else {
      $sql = $sql.$arrayC[$i]." ".$arrayT[$i].", ";
    }
  }

  $error = consultaDB($con,$sql);
echo $error;
}

function verConsulta($con){

  $nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : null;
  $sql = " SHOW COLUMNS FROM ".$nombre;

  $result =  consultaDB($con,$sql);

  //var_dump( $mensaje);
//  $row = mysqli_fetch_array($mensaje, MYSQLI_NUM);
  //printf ("%s (%s)\n", $row[0], $row[1]);
  //var_dump( $row );

  while ($fieldinfo = mysqli_fetch_row($result))
  {
    echo "Tabla: {$fieldinfo[0]}\n";

  }

}








 ?>
