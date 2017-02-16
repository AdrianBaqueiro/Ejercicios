<?php
class cita {

  protected $id;
  private $cliente;
  private $empregado;
  private $fecha;
  private $servicio;

    public function __construct($cliente,$empregado,$fecha,$servicio)
    {

      $this->cliente = $cliente;
      $this->empregado = $empregado;
      $this->fecha = $fecha;
      $this->servicio = $servicio;

    }

    function setId($id){
        $this->id = $id;
    }
    function getCliente(){
      return   $this->cliente;
    }
    function getEmpregado(){
      return   $this->empregado;
    }
    function getFecha(){
      return   $this->fecha;
    }
    function getServicio(){
      return   $this->servicio;
    }


}

?>
