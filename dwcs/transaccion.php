<?php

  dbh = mysql_connect($servidor,$usuario,$pass);
  mysql_select_db($base_de_datos,$dbh);
  $sql = "SET AUTOCOMMIT=0;";
  $resultado = mysql_query($sql, $dbh);
  $sql = "BEGIN;";
  $resultado = mysql_query($sql, $dbh);
  $sql = "SELECT * FROM primeira; ";
  $resultado = mysql_query($sql, $dbh);
  $sql = "INSERT INTO `segunda` (`ide`, `descripcion`) VALUES ('', 'Outro
  valor');";
  $resultado = mysql_query($sql, $dbh);
  $sql = "INSERT INTO `primeira` (`ide`, `ripcion`) VALUES ( ́ ́,  ́Outro valor ́);";
  $resultado = mysql_query($sql, $dbh);
  if ($resultado) {
  echo 'OK';
  echo ' ';
  $sql = "COMMIT";
  $resultado = mysql_query($sql, $dbh);
  }
  else
  {
  echo 'MAL';
  echo ' ';
  echo 'EXECÚTASE O ROOLBACK';
  echo ' ';
  $sql = "ROLLBACK;";
  $resultado = mysql_query($sql, $dbh);
  }










 ?>
