<?php
class cita {

  private $id;
  private $cliente;
  private $empregado;
  private $fecha;
  private $servicio;
  private $estado;

    public function __construct($id,$cliente,$empregado,$fecha,$servicio,$estado)
    {
      $this->id = $id;
      $this->cliente = $cliente;
      $this->empregado = $empregado;
      $this->fecha = $fecha;
      $this->servicio = $servicio;
      $this->estado = $estado;

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
    function getEstado(){
      return   $this->estado;
    }
  static  function  completar($con,$id){

       $sql = "UPDATE cita SET estado = 'completada'  WHERE id='" .$id ."'";

       mysqli_query($con, $sql);
       echo mysqli_error($con);

    }
    static function anular($con,$id){

       $sql = "UPDATE cita SET estado = 'anulada'  WHERE id='" .$id ."'";

       mysqli_query($con, $sql);
       echo mysqli_error($con);

    }

}

?>
