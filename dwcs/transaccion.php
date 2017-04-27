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
