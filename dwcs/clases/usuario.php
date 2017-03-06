<?php
  class Usuario {
    private $id;
    private $password;
    private $tipo;
    private $nome;
    private $apellido1;
    private $apellido2;
    private $telefono;


      public function __construct($id,$password,$tipo,$nome,$apellido1,$apellido2,$telefono)
      {

        $this->id = $id;
        $this->password = $password;
        $this->tipo = $tipo;
        $this->nome = $nome;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->telefono = $telefono;

      }


      function getId(){
        return   $this->id;
      }
      function getPassword(){
        return   $this->password;
      }
      function getTipo(){
        return   $this->tipo;
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
