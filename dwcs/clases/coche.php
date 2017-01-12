<?php
	
	class Coche {
		protected $id;
	 	private $cor;
	    private $numero_portas;
	    private $marca;
	    private $gasolina;
	    private $km;

	    public function __construct($id,$marca,$cor,$numero_portas)
	    {
	    	$this->marca = $marca;
	    	$this->cor = $cor;
	    	$this->numero_portas = $numero_portas;
	    	$this->gasolina = 0;
	    	$this->km = 0;
	    }

	    function encherTanque($gasolina_nova){
	        $this->gasolina = $this->gasolina + $gasolina_nova;
	        echo "se ha añadido ".$gasolina_nova." litros de gasolina actualmente hay ".$this->gasolina." litros de gasolina";
	    }
	    function acelerar(){
	        $this->gasolina = $this->gasolina - 1;
	        return 'Gasolina restante: '.$this->gasolina;
	    }
	    function visualizar(){
	    	echo 'Color: '.$this->cor.'</br>'.'Puertas: '.
	    	$this->numero_portas.'</br>'.'Marca: '.$this->marca.'</br>'.'Gasolina: '.$this->gasolina;
	    }
	    function comprobarGasolina(){
	    	return $this->gasolina;
	    }
	    function viaxar($km){
	    	echo "viajando ".$km." Km"."</br>";
	    	$this->km = $this->km + $km;
	    	$this->gasolina  = $this->gasolina - (($km/100)*5);
	    	$this->revision();
	    }
	    function revision(){
	    	$auxKm = $this->km;
	    	while($auxKm>=1000)
	    	{
	    		$auxKm -= 1000;
	    	}
	    	echo "Km totales: ".$this->km." Km siguiente revisión: ". (($auxKm - 1000) *-1);

	    }

	}

?>