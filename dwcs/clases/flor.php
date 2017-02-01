<?php
	require ("petalo.php");
	require ("xardin.php");

	class Flor {

	 	protected $tipo;
	    private $n_petalos = array();
	    public static $altura = 0;
	    public static $n_flores = 0;
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
	       echo "<h2> Flor </h2>
	       <div class='well' class='list-group'>
	       			<ul>
						<li class='list-group-item'>
							<p>Tipo: ".$this->tipo."</p>
						</li>
		       			<li class='list-group-item'>
		       				<p>Numero de petalos: ".count($this->n_petalos)."</p>
		       			</li>
		       			<li class='list-group-item'>
		       				<p>Altura flores: ".self::$altura."</p>
		       			</li>
		       			<li class='list-group-item'>
		       				<p>Numero de flores: ".self::$n_flores."</p>
		       			</li>
	       			</ul>
	    		 </div>";
	       if(count($this->xardins)!=0)
	       {
	       	echo "<h2>Xardins</h2>";
	       	   echo "<div class='well' class='list-group'>
	       			<ul>";

	       		for($i=0;$i<count($this->xardins);$i++)
	       		{
	       			echo $this->xardins[$i]->ver_xardin();
	       		}
	       }
	       echo 	"</ul>
	    		 </div>";

	    }

	    function cambiar_cor($cor){
	    	$this->cor = $cor;
	    }

	    function arranca_petalos($petalos){
	    	for($i=0;$i<$petalos;$i++)
	    	{
	    		array_pop($this->n_petalos);
	    	}
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