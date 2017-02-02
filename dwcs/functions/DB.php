<?php

function connectDB($server,$user,$pass,$db){
  if($db == null)
  {
      $mysqli = new mysqli($server,$user,$pass) or die("error");

  }else {
      $mysqli = new mysqli($server,$user,$pass,$db) or die("error");
  }
  echo "<p>conexion establecida con la base de datos</p>";
  return $mysqli;
}

function crearDB($con,$nameDB){
  try{
    $query = "Create DATABASE ".$nameDB;
    if($con->query($query) === true)
      echo "<p>Base de datos creada</p>";
      else {
        echo "<p>Error al crear la base de datos</p>";
      }
  }catch(Exception $e)
  {
      echo $e;
  }
}
function consultaDB($con,$query)
{

  $con->query($query);

}

function verDB($con,$db){
  $con -> query("SELECT * FROM ".$db);
}




 ?>
