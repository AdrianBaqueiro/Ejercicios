<?php

    class  AULA{

    	public $nombre,$estado,$dia,$horai,$horaf,$you,$face;

    	public function __construct($aula,$estado,$dia,$horai,$horaf,$you,$face)
    	{
    		$this->nombre = $aula;
    		$this->estado = $estado;
    		$this->dia = $dia;
    		$this->horai = $horai;
    		$this->horaf = $horaf;
    		$this->you = $you;
    		$this->face = $face;
    	}
    	public function getNombre()
    	{
    		return $this->nombre;
    	}
    	public function getEstado()
    	{
    		return $this->estado;
    	}
    	public function getHorai()
    	{
    		return $this->horai;
    	}
    	public function getHoraf()
    	{
    		return $this->horaf;
    	}
    	public function getDia()
    	{
    		return $this->dia;
    	}
    	public function getYou()
    	{
    		return $this->you;
    	}
    	public function getFace()
    	{
    		return $this->face;
    	}
    	public function setNombre($nombre){
    		$this->nombre = $nombre;
    	}
    	public function setEstado($estado){
    		$this->estado = $estado;
    	}
    	public function setDia($dia){
    		$this->dia = $dia;
    	}
    	public function setHorai($horai){
    		$this->horai = $horai;
    	}
    	public function setHoraf($horaf){
    		$this->horaf = $horaf;
    	}
    	public function setYou($you){
    		$this->you = $you;
    	}
    	public function setFace($face){
    		$this->face = $face;
    	}
    }

?>