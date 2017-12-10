<?php
	
	class ContatoCliente{
		private $id;
		private $nome;
		private $endereco;
		private $estado;
		private $cidade;
		private $tel;
		private $email;
		private $cpf;
		private $market;


		function __construct($nome, $endereco, $estado, $cidade, $email,  $tel, $cpf, Market $market){
			$this->nome = $nome;
			$this->endereco = $endereco;
			$this->estado = $estado;
			$this->cidade = $cidade;
			$this->tel = $tel;
			$this->email = $email;
			$this->cpf = $cpf;
			$this->market = $market;
		}


		public function getNome() {
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function getEmail() {
			return $this->email;
		}

		public function setEmail($email) {
			$this->email = $email;
		}


		public function getEndereco() {
			return $this->endereco;
		}

		public function setEndereco($endereco) {
			$this->endereco = $endereco;
		}

		public function getCidade() {
			return $this->cidade;
		}

		public function setCidade($cidade) {
			$this->cidade = $cidade;
		}

		public function getEstado() {
			return $this->estado;
		}

		public function setEstado($estado) {
			$this->estado = $estado;
		}


		public function getTel() {
			return $this->tel;
		}

		public function setTel($tel) {
			$this->tel = $tel;
		}

		public function getCpf() {
			return $this->cpf;
		}

		public function setCpf($cpf) {
			$this->cpf = $scpf;
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