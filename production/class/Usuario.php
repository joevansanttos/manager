<?php
	
	class Usuario{
		private $email;		
		private $senha;
		private $nome;
		private $sobrenome;
		private $sexo;
		private $estado;
		private $cidade;
		private $telefone;
		private $id;

		function __construct($nome ,$email, $senha, $sobrenome, $sexo, $estado, $cidade, $telefone) {
			$this->email = $email;
			$this->senha = $senha;
			$this->nome = $nome;
			$this->sobrenome = $sobrenome;
			$this->sexo = $sexo;
			$this->estado = $estado;
			$this->cidade = $cidade;
			$this->telefone = $telefone;
		}

		public function getEmail() {
			return $this->email;
		}

		public function setEmail($email) {
			$this->email = $email;
		}

		public function getSenha() {
			return $this->senha;
		}

		public function setSenha($senha) {
			$this->senha = $senha;
		}

		public function getNome() {
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function getSobrenome() {
			return $this->sobrenome;
		}

		public function setSobrenome($sobrenome) {
			$this->sobrenome = $sobrenome;
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

		public function getTelefone() {
			return $this->telefone;
		}

		public function setTelefone($telefone) {
			$this->telefone = $telefone;
		}

		public function getSexo() {
			return $this->sexo;
		}

		public function setSexo($sexo) {
			$this->sexo = $sexo;
		}

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}


	}

?>