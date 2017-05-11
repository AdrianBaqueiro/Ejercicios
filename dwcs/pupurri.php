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



$db="dbs\almacen2.mdb";
$db_mdb = new PDO('odbc:DRIVER={Microsoft Access Driver (*.mdb)};DBQ='.realpath($db));
$db_mysql = new PDO('mysql:host=localhost;dbname=productos','root', '');




if($submit == null)
{
  if(isset($_SESSION['submit']))
    $submit = $_SESSION['submit'];
  else
    $submit = "default";
}
if(isset($_POST['crearEstanteria']))
{
    crearEstanteria($db_mdb);
}
if(isset($_POST['crearProducto']))
{
    crearProducto($db_mysql);
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
    formI("CrearEstanteria","pupurri.php");
    echo '<input type="hidden" name="crearEstanteria" />';
    createInput("Ubicacion");
    createInput("total_Producto");
    formF("crear");
    break;
  case 'CrearProducto':
    formI("CrearEstanteria","pupurri.php");
    echo '<input type="hidden" name="crearProducto" />';
    createInput("nome");
    createInput("prezo");

    $sql = "SELECT * FROM estanteria ";
    $e = consultaDB_PDO($db_mdb,$sql);
    $resultado =  $e->fetchAll();
    //var_dump($resultado);
    crearSelectDB_PDO("cod_est",$resultado,$tablaSl);
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
  case 'ListarProducto':
      ListarProducto($db_mysql,$db_mdb);
    break;

  default:

    break;
}

if(isset($_POST['consultarProducto']))
{
    consultarProducto($db_mysql,$db_mdb);
}

finishHTML();
$_SESSION['selNum'] = $selNum;
$_SESSION['submit'] = $submit;
$_SESSION['tablaSl'] = $tablaSl;




function crearEstanteria($db_mdb){

  $ubicacion = isset($_POST['Ubicacion']) ? $_POST['Ubicacion'] : null;
  $total = isset($_POST['total_Producto']) ? $_POST['total_Producto'] : null;


  $sql = sprintf("INSERT INTO estanteria (ubicacion,total_prod) VALUES ('%s','%s')",
  $ubicacion,$total);
  consultaDB_PDO($db_mdb,$sql);

}
function crearProducto($db_mysql){


  $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
  $prezo = isset($_POST['prezo']) ? $_POST['prezo'] : null;
  $cod_est = isset($_POST['cod_est']) ? $_POST['cod_est'] : null;

  $sql = sprintf("INSERT INTO productos (nome,prezo,cod_est) VALUES ('%s','%s','%s')",
  $nome,$prezo,$cod_est);
  consultaDB_PDO($db_mysql,$sql);


}
function crearSelectDB_PDO($id,$consulta,$tablaSl){
  print('
    <div  class="input-group">
      <span class="input-group-addon">'.$id.'</span>
      <select name="'.$id.'" class="form-control" >
');
  $i = 0;
    while (count($consulta) > $i )
    {
        echo "<option value='{$consulta[$i][0]}' selected>{$consulta[$i][0]} {$consulta[$i][1]}</option>";
        $i++;
    }

print('
      </select>
      </div>
  ');

}
function consultarProducto($db_mysql,$db_mdb){
  $cod_producto = isset($_POST['cod_producto']) ? $_POST['cod_producto'] : null;


  $sql = "SELECT * FROM productos WHERE  id=".$cod_producto;

  $e = consultaDB_PDO($db_mysql,$sql);
  $consulta =  $e->fetch();
  $cod_est;
  echo "<div class='well'>";
    foreach ($consulta as $key => $value) {
      if(!is_numeric($key))
        crearLabel ($key,$value);
      if($key == 3)
      {
          $cod_est = $value;
      }
    }

    $sql = "SELECT * FROM estanteria WHERE  cod=".$cod_est;

    $e = consultaDB_PDO($db_mdb,$sql);
    $consulta =  $e->fetch();

    foreach ($consulta as $key => $value) {
      if(!is_numeric($key))
        crearLabel ($key,$value);
    }

  echo "</div>";
}
function ListarProducto($db_mysql,$db_mdb){
  $cod_producto = isset($_POST['cod_producto']) ? $_POST['cod_producto'] : null;


  $sql = "SELECT * FROM productos";

  $e = consultaDB_PDO($db_mysql,$sql);
  $consulta =  $e->fetchAll();
  $cod_est;
  echo "<div class='well'>";
    foreach ($consulta as $key => $value) {
        foreach ($value as $key2 => $value2) {
          if(!is_numeric($key2))
            crearLabel ($key2,$value2);
          if($key2 == 3)
          {
              $cod_est = $value2;
              $sql = "SELECT * FROM estanteria WHERE cod = ".$cod_est;

              $e = consultaDB_PDO($db_mdb,$sql);
              $consulta2 =  $e->fetchAll();

              foreach ($consulta2 as $key3 => $value3) {
                  foreach ($value3 as $key4 => $value4) {
                    if(!is_numeric($key4))
                      crearLabel ($key4,$value4);
                    }
                  crearLabel("------------------------","");
              }
          }
      }
    }



  echo "</div>";
}
















 ?>
