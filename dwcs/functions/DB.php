<?php
$debug;

function connectDB($server,$user,$pass,$db){
   global $debug;
  if($db == null)
  {
      $mysqli = new mysqli($server,$user,$pass) or die("error");

  }else {
      $mysqli = new mysqli($server,$user,$pass,$db) or die("error".mysql_error());
  }
  $debug = "<p>conexion establecida con la base de datos</p>";
  return $mysqli;
}

function connectDB_PDO($server,$user,$pass){
   global $debug;
   try{

    $mysqli = new PDO($server,$user,$pass) or die("error");

    $debug = "<p>conexion establecida con la base de datos</p>";
    return $mysqli;

  }catch (PDOException $e)
  {
    return $mysqli."".$e->getMessage();
  }
}


function crearDB($con,$nameDB){
   global $debug;
  try{
    $query = "Create DATABASE ".$nameDB;
    if($con->query($query) === true)
        $debug =  true;
      else {
       $debug = false;
      }
      return $debug;
  }catch(Exception $e)
  {
      return $e;
  }
}

function consultaDB($con,$query)
{
  $e;
  try{
  $e =  $con->query($query);
  return $e;
  echo mysqli_error($con);
  }catch(Exception $e)
  {
    return mysqli_error($con);
  }

}

function consultaDB_PDO($con,$query)
{
  $e;
  try{
  $e =  $con->query($query);
  return $e;
  echo mysqli_error($con);
  }catch(Exception $e)
  {
    return mysqli_error($con." ".$e);
  }

}

function verDB($con,$db){
  $con -> query("SELECT * FROM ".$db);
}




 ?>
