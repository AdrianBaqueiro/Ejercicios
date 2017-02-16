<?php

class Cliente {
  protected $id;
  private $nome;
  private $apellido1;
  private $apellido2;
  private $telefono;

    public function __construct($id,$nome,$apellido1,$apellido2,$telefono)
    {
      $this->id = $id;
      $this->nome = $nome;
      $this->apellido1 = $apellido1;
      $this->apellido2 = $apellido2;
      $this->telefono = $telefono;

    }

    function setId($id){
        $this->id = $id;
    }
    function getNome(){
      return   $this->nome;
    }
    function getAp1(){
      return   $this->apellido1;
    }
    function getAp2(){
      return   $this->apellido2;
    }
    function getTl(){
      return   $this->telefono;
    }

}






 ?>
