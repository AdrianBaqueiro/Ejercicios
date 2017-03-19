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
      function darBaja($con){

         $sql = "UPDATE usuario SET estado = 0  WHERE id='" .$this->id ."'";

         mysqli_query($con, $sql);
         echo mysqli_error($con);
      }
      function darAlta($con){
        $sql = sprintf(
        "INSERT INTO usuario (id,password,tipo,nome,apelido1,apelido2,telefono)
        VALUES ('%s','%s','%s','%s','%s','%s','%s')  ON DUPLICATE KEY UPDATE
        password='%s', tipo='%s', nome='%s', apelido1='%s', apelido2='%s', telefono='%s',estado = '1' ",
        $this->id,$this->password,$this->tipo,$this->nome,$this->apellido1,$this->apellido2,$this->telefono,
        $this->password,$this->tipo,$this->nome,$this->apellido1,$this->apellido2,$this->telefono);

         mysqli_query($con, $sql);
         echo mysqli_error($con);
      }


  }

?>
