<?php

session_start();

include('functions/DB.php');
include('functions/html.php');
include('functions/interface.php');
include('clases/cita.php');
include('clases/usuario.php');
include('clases/servicio.php');


var_dump($_POST);

$con;
$auxC;
$auxT;
$arrayC;
$arrayT;
$usuario;
$usuarios;


$tipo = isset($_POST['tipo']) ? $_POST['tipo']: null;
$submit = isset($_POST['submit']) ? $_POST['submit']: null;
$selNum = isset($_POST['Columnas']) ? $_POST['Columnas']: null;
if(isset($_SESSION['tablaSl'])){
  $tablaSl = isset($_POST['tablaSl']) ? $_POST['tablaSl']: $_SESSION['tablaSl'];
}
else {
  $tablaSl = isset($_POST['tablaSl']) ? $_POST['tablaSl']: null;
}




$con = connectDB('localhost','root','',null);

//if para crear la base de datos y las tablas correspondientes, en caso de que no existan

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
    estado Boolean not null default 1,
    primary key(id)
    )";
    consultaDB($con,$sql);
    echo mysqli_error($con);

    $sql = "CREATE TABLE IF NOT EXISTS servicio (
      nome VarChar(100) not null,
      precio int,
      estado Boolean not null default 1,
      primary key(nome))
      ";
    consultaDB($con,$sql);
    echo mysqli_error($con);

  $sql = "CREATE TABLE IF NOT EXISTS cita (
    id int not null auto_increment,
    id_cliente VarChar(100),
    id_empregado VarChar(100),
    fecha text,
    servicio VarChar(100),
    estado VarChar(100) not null default 'Pendiente',
    primary key(id),
    FOREIGN KEY (id_empregado) REFERENCES usuario(id),
    FOREIGN KEY (id_cliente) REFERENCES usuario(id),
    FOREIGN KEY (servicio) REFERENCES servicio(nome)
    )";

  consultaDB($con,$sql);
  echo mysqli_error($con);
  mysqli_close($con);
  }

  $con = connectDB('localhost','root','','Citas');

  $usuarios = Array();
  $usuarios = optenerUsuarios($con);
//  var_dump($usuarios);


  if(isset($_SESSION['usuario']))
  {
    $usuario = unserialize($_SESSION['usuario']);
  }else
  {
    $usuario = null;
  }

  if(isset($_SESSION['servicios']))
  {
    $servicio = unserialize($_SESSION['servicios']);
  }else
  {
    $servicio = null;
  }
  if(isset($_SESSION['tablaSl']))
  {
    $tablaSl = $_SESSION['tablaSl'];
  }else {
    $tablaSl = null;
  }


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
  if(isset($_POST['login']))
  {
    login($con);
  }
  if(isset($_POST['servicio']))
  {
    crearServicio($con);
  }
  if(isset($_POST['cita']))
  {
    crearCita($con);
  }
  //echo $usuario->getNome();
if($usuario != null)
  if($submit == $usuario->getNome())
  {
    echo "asd";
  }
  if(isset($_POST['Usuarios']))
  {
    $tablaSl = $_POST['Usuarios'];
  }
  if(isset($_POST['Citas']))
  {
    $tablaSl = $_POST['Citas'];
  }


//echo $debug;

  menuBarI("Citas","citas.php");
if($usuario != null)
{
  if($usuario->getTipo() != 'cliente')
  {
    menuItems("Servicios");
    menuItems("Cita");
    menuItems("VerCitas");
    menuItems('Usuarios');
    menuItems('UsuariosDetalles');
    menuItems($usuario->getNome());
    menuItems('LogOut');
  }else {

     menuItems("Cita");
     menuItems("VerCitas");
     menuItems($usuario->getNome());
     menuItems('LogOut');
  }

}else {
  menuItems("Alta");
  menuItems("Login");
}

openHTML("Citas");

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
    $servicios = getServiceOptions($con);
    //var_dump($servicios);
    formI("Cita","citas.php");
    echo '<input type="hidden" name="cita" />';
    crearSelectNumNoChange("dia",30);
    crearSelectNumNoChange("mes",12);
    crearSelectNumYear("año",2017);

    print('
    <div class="input-group">
      <span class="input-group-addon">Servicio</span>
      <select name="servicio" class="form-control">
      ');

      for($i=0;$i< count($servicios);$i++)
      {
        echo "<option value='".$servicios[$i]->getNome()."'>".$servicios[$i]->getNome()."</option>";
      }
    print('
      </select>
    </div>
    ');
    formF("Generar");
    break;

  case 'VerCitas':
    formI("VerCitas","citas.php");
    echo '<input type="hidden" name="verCitas" />';
    if($usuario->getTipo() == "empregado")
    {
      $sql = "SELECT * FROM cita ";
    }else {
      $sql = "SELECT * FROM cita where id_cliente = '".$usuario->getId()."'";
    }
    $result =  consultaDB($con,$sql);
    crearSelectDB("Citas",$result,$tablaSl);
    formF("Ver Cita");

    break;

  case 'Login':
    formI("Login","citas.php");
    echo '<input type="hidden" name="login" />';
    createInput("Usuario");
    createInputP("Contraseña");
    formF("Login");
    break;
  case 'LogOut':
    $submit = 'Login';
    unset($_SESSION['usuario']);
    header("Location: citas.php");
    break;
  case 'Invitado':
    $submit = 'Login';
    header("Location: citas.php");
    break;
  case 'Servicios':
    formI("servicios","citas.php");
    echo '<input type="hidden" name="servicio" />';
    createInput("Servicio");
    createInput("Precio");
    formF("Crear");
    break;

  case 'Usuarios':
    formI("Usuarios","citas.php");
    echo '<input type="hidden" name="verUsuario" />';
    $sql = "SELECT * FROM Usuario where estado = 1";
    $result =  consultaDB($con,$sql);
    crearSelectDB("Usuarios",$result,$tablaSl);
    formF(null);
    break;
  case 'UsuariosDetalles':
    formI("UsuariosDetalles","citas.php");
    echo '<input type="hidden" name="UsuariosDetalles" />';
    $sql = "SELECT * FROM Usuario where estado = 1";
    $result =  consultaDB($con,$sql);
    echo "<table>";
    while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
      echo "<tr><td><a href=citas.php?id=".$row['id'].">".$row['id'].": ".$row['nome']." ".$row['apelido1'].
      " ".$row['apelido2']."</a></td></tr>";
    }
    echo "</table>";
      //crearSelectDB("Usuarios",$result,$tablaSl);
      formF(null);
      break;

  default:

    break;
}
if(isset($_POST['verCitas']))
{
  verCita($con);
}
if(isset($_POST['verUsuario']))
{
  verUsuario($con);
}
if(isset($_POST['baja']))
{
  //var_dump($usuarios);
  darBaja($con,$tablaSl,$usuarios);
}
if(isset($_POST['anular']))
{
  //var_dump($usuarios);
  cita::anular($con,$tablaSl);
}
if(isset($_POST['completar']))
{
  //var_dump($usuarios);
  cita::completar($con,$tablaSl);
}
if(isset($_GET['id']))
{
  verCitasUsuario($con);
}

finishHTML();
$_SESSION['selNum'] = $selNum;
$_SESSION['usuarios'] = serialize($usuarios);
$_SESSION['submit'] = $submit;
$_SESSION['tablaSl'] = $tablaSl;
//$_SESSION['servicios'] = $servicios;


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
  $usuario->darAlta($con);

}

function login ($con)
{
  global  $submit;
  $id = isset($_POST['Usuario']) ? $_POST['Usuario'] : null;
  $pass = isset($_POST['Contraseña']) ? $_POST['Contraseña'] : null;

  $sql = sprintf(
  "SELECT * FROM usuario WHERE id= '%s' and password= '%s'",
  $id,$pass);

  $result = mysqli_query($con, $sql);
  echo mysqli_error($con);

  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  if($row != '')
  {

    $usuario  =  new Usuario($row['id'],$row['password'],$row['tipo'],$row['nome'],$row['apelido1'],$row['apelido2'],$row['telefono']);

    $_SESSION['usuario'] = serialize($usuario);
    //array_push($usuarios,$usuario);
    $submit = 'Cita';

    header("Location: citas.php");

  }else {
    $submit = 'Alta';

    header("Location: citas.php");
  }

}


function crearServicio($con){

    $nombre = isset($_POST['Servicio']) ? $_POST['Servicio'] : null;
    $precio = isset($_POST['Precio']) ? $_POST['Precio'] : null;

    //$servicio  =  new Servicio($nome,$prezo);
    $sql = sprintf(
    "INSERT INTO servicio (nome,precio)
    VALUES ('%s','%s') ON DUPLICATE KEY UPDATE
    precio='%s'",
    $nombre,$precio,$precio);

    mysqli_query($con, $sql);
    echo mysqli_error($con);

}



function getServiceOptions($con){
  $servicios = Array();

  $sql = "SELECT * FROM servicio";

  $result = mysqli_query($con, $sql);
  echo mysqli_error($con);


  $i=0;
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
  {

    $servicios[$i]  =  new Servicio($row['nome'],$row['precio']);
    $i++;
  }
  return $servicios;

}


function crearCita($con){
    $empregados = Array();

    $dia = isset($_POST['dia']) ? $_POST['dia'] : null;
    $mes = isset($_POST['mes']) ? $_POST['mes'] : null;
    $año = isset($_POST['año']) ? $_POST['año'] : null;
    $servicio = isset($_POST['servicio']) ? $_POST['servicio'] : null;

    $fecha = $dia."-".$mes."-".$año;
    $sql = "SELECT * FROM usuario where tipo = 'empregado'";

    $result = mysqli_query($con, $sql);
    echo mysqli_error($con);
    $i=0;
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {

      $empregados[$i]  =  new usuario($row['id'],$row['password'],$row['tipo'],$row['nome'],$row['apelido1'],$row['apelido2'],$row['telefono']);
      $i++;
    }

    $empregado = $empregados[rand(1,count($empregados))-1];
    $cliente = unserialize($_SESSION['usuario']);
    $sql = sprintf(
    "INSERT INTO cita (id_cliente,id_empregado,fecha,servicio)
    VALUES ('%s','%s','%s','%s')",
    $cliente->getId(),$empregado->getId(),$fecha,$servicio);

    mysqli_query($con, $sql);
    echo mysqli_error($con);

}
function verCita($con){

      $citas = isset($_POST['Citas']) ? $_POST['Citas'] : null;
      $sql = "SELECT cita.id,cliente.nome as nome_cliente,
       empregado.nome as nome_empregado, fecha, servicio, cita.estado as estado
       FROM cita
       inner join usuario cliente on cliente.id = cita.id_cliente
       inner join usuario empregado on empregado.id = id_empregado
       where cita.id = '".$citas."'";
      $result = mysqli_query($con, $sql);
      echo mysqli_error($con);

      formI("","citas.php");
      //echo '<input type="hidden" name="completarCita" />';

      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

      crearLabel("ID cita:", $row ['id']);
      crearLabel("Nome Cliente", $row ['nome_cliente']);
      crearLabel("Nome empregado", $row ['nome_cliente']);
      crearLabel("Fecha", $row ['fecha']);
      crearLabel("Servicio", $row ['servicio']);
      crearLabel("Estado", $row ['estado']);

      print('
        <input class="btn btn-default navbar-btn" type="submit" name="anular" value="Anular" class="btn-group" />
      ');
      print('
        <input class="btn btn-default navbar-btn" type="submit" name="completar" value="Completar" class="btn-group" />
      </form>');


}

function verUsuario($con){
  
  $usuarios = isset($_POST['Usuarios']) ? $_POST['Usuarios'] : null;
  $sql = "SELECT * FROM usuario where id = '".$usuarios."'";
  $result = mysqli_query($con, $sql);
  echo mysqli_error($con);

  formI("","citas.php");
  echo '<input type="hidden" name="baja" />';
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
  {
    crearLabel("ID Usuario", $row ['id']);
    crearLabel("Nome", $row ['nome']);
    crearLabel("Apelido1", $row ['apelido1']);
    crearLabel("Apelido2", $row ['apelido2']);
    crearLabel("Telefono", $row ['telefono']);
    crearLabel("E un", $row ['tipo']);

  }

  formF("DarBaja");

}
function darBaja($con,$tablaSl,$usuarios)
{

  for($i=0;$i<count($usuarios);$i++)
  {
    if($usuarios[$i]->getId()==$tablaSl)
    {
      $usuarios[$i]->darBaja($con);
      echo " ok ";
    }else {
    //  echo " error ";
    }
  }
}
function optenerUsuarios($con){
  $sql = "SELECT * FROM usuario";
  $result = mysqli_query($con, $sql);
  echo mysqli_error($con);
 $usuarios =  Array();


  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
  {
    if($row['id']!=null)
    {
      //echo $row['id'];
      $usuario =  new usuario($row['id'],$row['password'],$row['tipo'],$row['nome'],$row['apelido1'],$row['apelido2'],$row['telefono']);

      array_push($usuarios ,$usuario);

    }

  }
  return $usuarios;
}

function verCitasUsuario($con)
{
  $idUsuario=$_GET['id'];

  $sql = "SELECT cita.id,cliente.nome as nome_cliente,
   empregado.nome as nome_empregado, fecha, servicio, cita.estado as estado
   FROM cita
   inner join usuario cliente on cliente.id = cita.id_cliente
   inner join usuario empregado on empregado.id = id_empregado
   where cliente.id = '".$idUsuario."' or cliente.id = '".$idUsuario."'";
  $result = mysqli_query($con, $sql);
  echo mysqli_error($con);

  formI("","citas.php");
  //echo '<input type="hidden" name="completarCita" />';

  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    echo "<h3>".$row ['id']."</h3>";
    crearLabel("ID cita:", $row ['id']);
    crearLabel("Nome Cliente", $row ['nome_cliente']);
    crearLabel("Nome empregado", $row ['nome_cliente']);
    crearLabel("Fecha", $row ['fecha']);
    crearLabel("Servicio", $row ['servicio']);
    crearLabel("Estado", $row ['estado']);
  }
  formF(null);
}



?>
