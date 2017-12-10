<?php
	
	class Filial{
		private $id;
		private $nome;

		function __construct($nome) {
			$this->nome = $nome;
		}

		public function getNome() {
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}		
	}

?>