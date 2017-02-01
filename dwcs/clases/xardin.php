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
			echo "

			<li class='list-group-item'>
				<p>Nome xardin: ".$this->nome."</p>
			</li>
			<li class='list-group-item'>
				<p><p>Ubicacion xardin: ".$this->ubicacion."</p>
			</li>
			<li class='list-group-item'>
				<p>Capacidade xardin: ".$this->capacidade."</p>
			</li>
			";
		}
		function getNome(){
			return $this->nome;
		}

	}



?>