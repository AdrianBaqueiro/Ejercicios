<?php
require("../functions/DB.php");

  class Alumno(){

    public $Id,$Nome,$nota;

    public function __construct($Id,$Nome,$nota)
    {

      $this->Id = $Id;
      $this->Nome = $Nome;
      $this->nota = $nota;

    }

    public function Alta($con)
    {

      $query = sprintf(
        "INSERT INTO alumno (id,nome,nota)
        VALUES ('%s','%s','%s')",
        $this->Id,$this->Nome,$this->nota);
      consultaDB_PDO($con,$query);

    }
    public function CONTA_ALUM($con)
    {

      $query ="SELECT COUNT(id) FROM alumno";
      echo consultaDB_PDO($con,$query);

    }






  }









 ?>
