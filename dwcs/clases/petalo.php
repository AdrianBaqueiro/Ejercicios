<?php

	Class Petalo{

		private $cor;
		private $num_petalos;


		public function __construct ($num_petalos,$cor)
		{

			$this->num_petalos = $num_petalos;
			$this->cor = $cor;

		}

		function getCor(){
			return $this->cor;
		}

		function getNum(){
			return $this->num_petalos;
		}

		function setCor($cor){
			$this->cor = $cor;
		}

	}





?>