<?php

class Servicio {
  protected $id;
  private $nome;
  private $prezo;


    public function __construct($nome,$prezo)
    {
      $this->nome = $nome;
      $this->prezo = $prezo;
    }

    function setId($id){
        $this->id = $id;
    }
    function getNome(){
      return   $this->nome;
    }
    function getPrezo(){
      return   $this->prezo;
    }
    function setPrezo($prezo){
      $this->prezo = $prezo;
    }


}


 ?>
