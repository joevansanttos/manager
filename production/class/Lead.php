<?php
	
	class Lead{
		private $id;
		private $nome;
		private $email;
		private $cargo;
		private $tel;
		private $market;

		function __construct($nome, $email, $tel, $cargo, Market $market) {
			$this->nome = $nome;
			$this->email = $email;
			$this->cargo = $cargo;			
			$this->tel = $tel;
			$this->market = $market;
		}		

		public function getNome() {
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}	
		

		public function getCargo() {
			return $this->cargo;
		}

		public function setCargo($cargo) {
			$this->cargo = $cargo;
		}

		public function getEmail() {
			return $this->email;
		}

		public function setEmail($email) {
			$this->email = $email;
		}	

		public function getTel() {
			return $this->tel;
		}

		public function setTel($tel) {
			$this->tel = $tel;
		}

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getMarket() {
			return $this->market;
		}

		public function setMarket($market) {
			$this->market = $market;
		}


	}

?>