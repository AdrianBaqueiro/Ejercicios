<?php
	require ("petalo.php");
	require ("xardin.php");

	class Flor {

	 	protected $tipo;
	    private $n_petalos = array();
	    static $altura = 0;
	    static $n_flores = 0;
	    private $xardins = array();

	    function plantar_flor($tipo,$n_petalos,$cor){

	    	$this->tipo = $tipo;

	    	for($i=0;$i<$n_petalos;$i++)
	    	{
				$this->n_petalos[$i] = new Petalo($i,$cor); 
	    	}
	    	Flor::incrementar_flores();

	    }

	    function contemplar_flor(){
	       echo "tipo: ".$this->tipo."</br>Numero de petalos: ".count($this->n_petalos)."</br>altura flores: ".self::$altura."</br>numero de flores: ".self::$n_flores."</br>";
	       if(count($this->xardins)!=0)
	       {
	       	echo "Xardins</br>";
	       		for($i=0;$i<count($this->xardins);$i++)
	       		{
	       			echo $this->xardins[$i]->ver_xardin();
	       		}
	       }

	    }

	    function cambiar_cor($cor){
	    	$this->cor = $cor;
	    }

	    function arranca_petalos($petalos){
	    	$this->n_petalos -= $petalos;
	    }

	    function regar_flor($altura){
	    	self::$altura;
	    }

	    function contar_flores(){
	    	echo self::$n_flores."</br>";
	    }

	    function  incrementar_flores(){
	    	return self::$n_flores++;

	    }

	    function asignar_xardin($xardin){

	    	array_push($this->xardins,$xardin);
	    	
	    }
	    function getTipo(){
	    	return $this->tipo;
	    }
	    function getN_petalos(){
	    	return $this->n_petalos;
	    }
	    function setN_petalos($n_petalos){
	    	return $this->n_petalos = $n_petalos;
	    }


	}

?>