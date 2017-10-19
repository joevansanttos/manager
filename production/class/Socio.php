<?php
	
	class Socio{	
		private $nome;
		private $cpf;
		private $residencia;
		private $nacionalidade;
		private $profissao;
		private $civil;
		private $contrato;
		private $id;

		function __construct($nome, $cpf, $residencia, $nacionalidade, $profissao, $civil, Contrato $contrato) {
			$this->nome = $nome;
			$this->cpf = $cpf;
			$this->residencia = $residencia;
			$this->nacionalidade = $nacionalidade;
			$this->profissao = $profissao;
			$this->civil = $civil;
			$this->contrato = $contrato;
		}

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getNome() {
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function getCpf() {
			return $this->cpf;
		}

		public function setCpf($cpf) {
			$this->cpf = $scpf;
		}

		public function getResidencia() {
			return $this->residencia;
		}

		public function setResidencia($residencia) {
			$this->residencia = $cresidencia;
		}

		public function getNacionalidade() {
			return $this->nacionalidade;
		}

		public function setNacionalidade($nacionalidade) {
			$this->nacionalidade = $nacionalidade;
		}

		public function getProfissao() {
			return $this->profissao;
		}

		public function setProfissao($profissao) {
			$this->profissao = $profissao;
		}

		public function getCivil() {
			return $this->civil;
		}

		public function setCivil($civil) {
			$this->civil = $civil;
		}

		public function getContrato() {
			return $this->contrato;
		}

		public function setContrato($contrato) {
			$this->contrato = $contrato;
		}


	}

?>