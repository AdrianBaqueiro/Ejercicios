<?php
	require ("petalo.php");
	require ("xardin.php");

	class Flor {

	 	protected $tipo;
	    private $n_petalos = array();
	    public static $altura;
	    public static $n_flores;
	    private $xardins = array();

	    function plantar_flor($tipo,$n_petalos,$cor,$altura,$n_flores){

	    	$this->tipo = $tipo;
	    	$this->altura = $altura;
	    	$this->n_flores = $n_flores;

	    	for($i=0;$i<$n_petalos;$i++)
	    	{
				$this->n_petalos[$i] = new Petalo($i,$cor); 
	    	}

	    }

	    function contemplar_flor(){
	       echo "tipo: ".$this->tipo."</br>Numero de petalos: ".count($this->n_petalos)."</br>altura flores: ".$this->altura."</br>numero de flores: ".$this->n_flores."</br>";
	    }

	    function cambiar_cor($cor){
	    	$this->cor = $cor;
	    }

	    function arranca_petalos($petalos){
	    	$this->n_petalos -= $petalos;
	    }

	    function regar_flor($altura){
	    	$this->altura += $altura;
	    }

	    function contar_flores(){
	    	echo $this->n_flores."</br>";

	    }

	    function incrementar_flores(){
	    	$this->n_flores += 1;

	    }

	    function asignar_xardin($nome,$ubicacion,$capacidade){

	    	array_push($this->xardins, new Xardin($nome,$ubicacion,$capacidade));
	    	
	    }
	    function getTipo(){
	    	return $this->tipo;
	    }

	}

?>