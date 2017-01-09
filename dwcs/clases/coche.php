<?php
	
	class Coche {

	    var $cor;
	    var $numero_portas;
	    var $marca;
	    var $gasolina;
	    var $km;

	    public function __construct($marca,$cor,$numero_portas)
	    {
	    	$this->marca = $marca;
	    	$this->cor = $cor;
	    	$this->numero_portas = $numero_portas;
	    	$this->gasolina = 0;
	    	$this->km = 0;
	    }

	    function encherTanque($gasolina_nova){
	        $this->gasolina = $this->gasolina + $gasolina_nova;
	    }
	    function acelerar(){
	        $this->gasolina = $this->gasolina - 1;
	        return 'Gasolina restante: '.$this->gasolina;
	    }
	    function visualizar(){
	    	echo 'Color: '.$this->$cor.'</br>'.'Puertas: '.
	    	$this->$numero_portas.'</br>'.'Marca: '.$this->$marca.'</br>'.'Gasolina: '.$this->$gasolina;
	    }
	    function comprobarGasolina(){
	    	return $this->gasolina;
	    }
	    function viaxar($km){
	    	$this->km = $this->km + $km;
	    	$this->gasolina  = $this->gasolina - (($km/100)*5);
	    	revision();
	    }
	    function revision(){
	    	$auxKm = $this->km;
	    	while($auxKm>=1000)
	    	{
	    		$auxKm -= 1000;
	    	}
	    	return $auxKm - 1000;

	    }

	}

?>