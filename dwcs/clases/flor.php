<?php
	require ("petalo.php");
	require ("xardin.php");

	class Flor {

	 	protected $tipo;
	    private $n_petalos = array();
	    public static $altura;
	    public static $n_flores;
	    private $xardins = array();

	    function plantar_flor($tipo,$n_petalos,$cor){

	    	$this->tipo = $tipo;
	    	$this->n_flores +=1;

	    	for($i=0;$i<$n_petalos;$i++)
	    	{
				$this->n_petalos[$i] = new Petalo($i,$cor); 
	    	}

	    }

	    function contemplar_flor(){
	       echo "tipo: ".$this->tipo."</br>Numero de petalos: ".count($this->n_petalos)."</br>altura flores: ".$this->altura."</br>numero de flores: ".$this->n_flores."</br>Xardins</br>";
	       if(count($this->xardins)!=0)
	       {
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
	    	$this->altura += $altura;
	    }

	    function contar_flores(){
	    	echo $this->n_flores."</br>";

	    }

	    function incrementar_flores(){
	    	$this->n_flores += 1;

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