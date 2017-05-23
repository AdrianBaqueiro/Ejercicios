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

try{
  $con = new PDO('mysql:host=localhost;dbname=Usuarios','root', '');

}catch(exception $e)
{
    $con = new PDO('mysql:host=localhost','root', '');
}

if(crearDB_PDO($con,"Usuarios"))
{
  $con = new PDO('mysql:host=localhost;dbname=usuarios','root', '');
  $sql = "CREATE TABLE IF NOT EXISTS usuario (
    id VarChar(100) not null,
    password text,
    tipo text,
    nome text,
    dni text,
    email text,
    direccion text,
    primary key(id)
    )";
    $e = consultaDB_PDO($con,$sql);

  }

if($submit == null)
{
  if(isset($_SESSION['submit']))
    $submit = $_SESSION['submit'];
  else
    $submit = "default";
}
if(isset($_POST['validarUser']))
{
    crearEstanteria($db_mdb);
}
if(isset($_POST['usuario']))
{

    echo "concedido";
    exit();
}

var_dump($_POST);


openHTML_script("ajax","ajaxScript");
menuBarI("ajax","ajax.php");
menuItems("Login");
menuItems("CrearUsuario");
//menuItems("ConsultarProducto");
//menuItems("ListarProducto");
menuBarF();



switch ($submit) {
  case 'Login':
    formI("Login","ajax.php");
    echo '<input type="hidden" name="login" />';
    createInput("Usuario");
    createInput("Contraseña");
    formF("Login");
    break;
  case 'CrearUsuario':
    formI("CrearUsuario","ajax.php");
    echo '<input type="hidden" name="CrearUsuario" />';
    
    createInput("id");
    createInput("password");
    createInput("tipo");
    createInput("nome");
    createInput("dni");
    createInput("email");
    createInput("direccion");

    formF("crear");
    break;

  case 'ConsultarProducto':
    formI("ConsultarProducto","pupurri.php");
    echo '<input type="hidden" name="consultarProducto" />';
    $sql = "SELECT * FROM productos ";
    $e = consultaDB_PDO($db_mysql,$sql);
    $resultado =  $e->fetchAll();

    crearSelectDB_PDO("cod_producto",$resultado,$tablaSl);
    formF("buscar");
    break;
  case 'usuario':
      echo "concedido";
    break;


  default:

    break;
}

if(isset($_POST['consultarProducto']))
{
    consultarProducto($db_mysql,$db_mdb);
}
echo "<div id='debug'></div>";

finishHTML();
$_SESSION['selNum'] = $selNum;
$_SESSION['submit'] = $submit;
$_SESSION['tablaSl'] = $tablaSl;
















 ?>
