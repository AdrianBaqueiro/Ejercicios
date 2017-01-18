<?php
	

	Class Xardin{

		protected $nome;
		private $ubicacion;
		private $capacidade;


		function alta_xardin($nome,$ubicacion,$capacidade)
		{

			$this->nome = $nome;
			$this->ubicacion = $ubicacion;
			$this->capacidade = $capacidade;

		}
		function ver_xardin(){
			echo "Nome xardin: ".$this->nome."</br>Ubicacion xardin: ".$this->ubicacion."</br>Capacidade xardin: ".$this->capacidade;

		}

	}



?>