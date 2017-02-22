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
//if para crear la base de datos y las tablas correspondientes.
if(crearDB($con,"Citas"))
{
  $con = connectDB('localhost','root','','Citas');
  $sql = "CREATE TABLE IF NOT EXISTS usuario (
    id VarChar(100) not null,
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
    $sql = "CREATE TABLE IF NOT EXISTS servicio (
      id int not null auto_increment,
      nome text,
      precio int,
      primary key(id))
      ";
    consultaDB($con,$sql);

  $sql = "CREATE TABLE IF NOT EXISTS cita (
    id int not null auto_increment,
    id_cliente VarChar(100),
    id_empregado VarChar(100),
    fecha text,
    servicio int,
    primary key(id),
    FOREIGN KEY (id_empregado) REFERENCES usuario(id),
    FOREIGN KEY (id_cliente) REFERENCES usuario(id),
    FOREIGN KEY (servicio) REFERENCES servicio(id)
    )
    ";
  consultaDB($con,$sql);
  mysqli_close($con);
  }
  $con = connectDB('localhost','root','','Citas');

  //if funciones relacionadas con los submits
  if($submit == null)
  {
    if(isset($_SESSION['submit']))
      $submit = $_SESSION['submit'];
    else
      $submit = "default";
  }
  if(isset($_POST['alta']))
  {
    altaUsuario($con);
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
    createInput("Usuario");
    createInputP("Contraseña");
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

function altaUsuario($con){

  $id = isset($_POST['Usuario']) ? $_POST['Usuario'] : null;
  $pass = isset($_POST['Contraseña']) ? $_POST['Contraseña'] : null;
  $nome = isset($_POST['Nombre']) ? $_POST['Nombre'] : null;
  $ape1 = isset($_POST['Primer_Apellido']) ? $_POST['Primer_Apellido'] : null;
  $ape2 = isset($_POST['Segundo_Apellido']) ? $_POST['Segundo_Apellido'] : null;
  $tlf = isset($_POST['Telefono']) ? $_POST['Telefono'] : null;
  $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : null;

  $usuario  =  new Usuario($id,$pass,$tipo,$nome,$ape1,$ape2,$tlf);
  $sql = sprintf(
  "INSERT INTO usuario (id,password,tipo,nome,apelido1,apelido2,telefono)
  VALUES ('%s','%s','%s','%s','%s','%s','%s')  ON DUPLICATE KEY UPDATE
  password='%s', tipo='%s', nome='%s', apelido1='%s', apelido2='%s', telefono='%s')",
  $id,$pass,$tipo,$nome,$ape1,$ape2,$tlf,$pass,$tipo,$nome,$ape1,$ape2,$tlf);

  mysqli_query($con, $sql);
  echo mysqli_error($con);
}


 ?>
