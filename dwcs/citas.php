<?php
include('functions/DB.php');
include('functions/html.php');
include('functions/interface.php');
include('clases/cita.php');
include('clases/usuario.php');
include('clases/servicio.php');

session_start();

$con;
$auxC;
$auxT;
$arrayC;
$arrayT;

$tipo = isset($_POST['tipo']) ? $_POST['tipo']: null;
$submit = isset($_POST['submit']) ? $_POST['submit']: null;
$selNum = isset($_POST['Columnas']) ? $_POST['Columnas']: null;
$tablaSl = isset($_POST['tablaSl']) ? $_POST['tablaSl']: $_SESSION['tablaSl'];


$con = connectDB('localhost','root','',null);
crearDB($con,"Citas");
$con = connectDB('localhost','root','','Citas');
$sql = "CREATE TABLE IF NOT EXISTS usuario (
  id text not null,
  password text,
  tipo text,
  nome text,
  apelido1 text,
  apelido2 text,
  telefono int,
  primary key(id)
  )
  ";
consultaDB($con,$sql);
$sql = "CREATE TABLE IF NOT EXISTS cita (
  id int not null auto_increment,
  id_cliente text,
  id_empregado text,
  fecha text,
  servicio text,
  primary key(id))
  ";

consultaDB($con,$sql);
$sql = "CREATE TABLE IF NOT EXISTS servicio (
  id int not null auto_increment,
  nome text,
  precio int,
  primary key(id))
  ";
consultaDB($con,$sql);

if($submit == null)
{
  if(isset($_SESSION['submit']))
    $submit = $_SESSION['submit'];
  else
    $submit = "default";
}

//echo $debug;
var_dump($_POST);

openHTML("Citas");
menuBarI("Citas","citas.php");
menuItems("Alta");
menuItems("Login");
menuItems("Cita");
menuItems("VerCitas");


menuBarF();



switch ($submit) {
  case 'Alta':
    formI("Alta usuarios","citas.php");
    echo '<input type="hidden" name="alta" />';
    createInput("Nombre");
    createInput("Primer Apellido");
    createInput("Segundo Apellido");
    createInput("Telefono");
    print('
    <div class="input-group">
      <span class="input-group-addon">Tipo</span>
      <select name="tipo" class="form-control">
        <option value="cliente" >Cliente</option>
        <option value="empregado" >Empregado</option>
      </select>
    </div>
    ');
    formF("Dar alta");
    break;
  case 'Cita':

    formI("Cita","citas.php");
    echo '<input type="hidden" name="cita" />';
    crearSelectNumNoChange("dia",30);
    crearSelectNumNoChange("mes",12);
    crearSelectNumYear("año",2017);
    print('
    <div class="input-group">
      <span class="input-group-addon">Servicio</span>
      <select name="servicio" class="form-control">
        <option value="cliente" >Cliente</option>
        <option value="empregado" >Empregado</option>
      </select>
    </div>
    ');
    formF("Generar");
    break;

  case 'VerCitas':
    formI("VerDB","TablasDB.php");
    echo '<input type="hidden" name="tabla" />';
    $sql = " SHOW TABLES FROM alumnos";
    $result =  consultaDB($con,$sql);
    crearSelectDB("tablaSl",$result,$tablaSl);
    formF("Tabla");
    break;

  case 'Login':
    formI("Login","citas.php");
    echo '<input type="hidden" name="tabla" />';
    $sql = " SHOW TABLES FROM alumnos";
    $result =  consultaDB($con,$sql);
    crearSelectDB("tablaSl",$result,$tablaSl);
    formF("Tabla");
    break;

  default:

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
      if($value == "VarChar")
      {
          $arrayT[$auxT] = $value."(100)";
      }else{
          $arrayT[$auxT] = $value;
      }
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

function verColumnas($con,$tablaSl){

  $sql = " SHOW COLUMNS FROM ".$tablaSl;
  $result =  consultaDB($con,$sql);

  while ($fieldinfo = mysqli_fetch_row($result))
  {
      createInput($fieldinfo[0]);
  }
}

function insertarTabla($con,$tablaSl)
{
  $sql = " SHOW COLUMNS FROM ".$tablaSl;
  $result =  consultaDB($con,$sql);
  $aux=0;
  $array = array();
  $values = "";

  while ($fieldinfo = mysqli_fetch_row($result))
  {
    foreach ($_POST as $key => $value) {
      if($key == $fieldinfo[0])
        $array[$aux] = $value;
    }
    $aux++;
  }
  for($i=0;$i<count($array);$i++)
  {
    if($i === (count($array)-1))
    {
      $values = $values."'".$array[$i]."'";
    }else {
      $values = $values."'".$array[$i]."', ";
    }
  }

  $sql =  "INSERT INTO ".$tablaSl." VALUES (".$values.") " ;
  var_dump($sql);
  $result = consultaDB($con,$sql);
  echo $result;

}

function verDatosTabla($con,$tablaSl){

  $sql = " SHOW COLUMNS FROM ".$tablaSl;
  $result =  consultaDB($con,$sql);
  $arrayC = array();
  $aux=0;

  while ($fieldinfo = mysqli_fetch_row($result))
  {
      $arrayC[$aux] = $fieldinfo[0];
      $aux++;
  }

  $sql = " select * FROM ".$tablaSl;
  $result =  consultaDB($con,$sql);

   while ($fieldinfo = mysqli_fetch_array($result))
  {
    for($i=0;$i<$aux;$i++){
      echo $fieldinfo[$arrayC[$i]]."</br>";
    }
  }
}

 ?>
