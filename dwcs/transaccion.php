<?php
  $id= 1;
  $nome = "Juan";
  $apelido = "Perez";
  try{
    $conn = new PDO('mysql:host=localhost;dbname=incidencias','root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //$sql = $conn->prepare('INSERT into usuario  ( nome, apelido )  values ( ? , ? )');
    $sql = $conn->prepare('SELECT * FROM usuario WHERE nome = :Nome');
    /*
    $sql->bindParam(1,$nome,PDO::PARAM_STR);
    $sql->bindParam(2,$apelido,PDO::PARAM_STR);
    */
    $sql->bindParam(":Nome",$nome,PDO::PARAM_STR);

    $nome = "Juan";
    $apelido = "Perez";
    $sql->setFetchMode(PDO::FETCH_LAZY);
  //$sql->execute(array('ss', "Juan","Perez"));
    $sql->execute();
    $resultado= $sql->fetch();
    echo $resultado->nome;


    foreach($resultado as $row) {
      //echo $row->nome;
    //  echo  $row["nome"] . " " .  $row["apelido"] . "</br>";
    }
  }catch(PDOException $e){
    echo  "ERRO: " . $e->getMessage();
  }

  ?>

  <?php

  //$db = getcwd() . "\\" . 'proba2.mdb';
  $db="dbs\bd1.mdb";
  echo "db ".$db."<br>";
  if (!file_exists($db)) {
      die("non existe a bd !");
  }
  else
    echo "existe a BD<br>";

  $db_conexion = new PDO('odbc:DRIVER={Microsoft Access Driver (*.mdb)};DBQ='.realpath($db));

  $txtsql = 'Select * From tabla1';
  $consulta = $db_conexion->prepare($txtsql);
  $consulta->setFetchMode(PDO::FETCH_ASSOC);
  $consulta->execute();

  //Obtemos os datos cun Bucle

  foreach($consulta as $index => $row){
        //  echo ''.$row['nome].'
      echo "id ".$row['Id']." ";
  		echo "nome ".$row['Nombre']." ";
  		echo "apelido ".$row['Apellido']."<br>";
  }


  ?>
