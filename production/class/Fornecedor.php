<?php
	
	class Fornecedor{
		private $id;
		private $razao;
		private $nome;
		private $cnpj;
		private $endereco;
		private $estado;
		private $cidade;
		private $tel;
		private $segmento;

		function __construct($razao, $nome, $cnpj, $endereco, $estado, $cidade,  $tel, $segmento){
			$this->razao = $razao;
			$this->nome = $nome;
			$this->cnpj = $cnpj;
			$this->endereco = $endereco;
			$this->estado = $estado;
			$this->cidade = $cidade;
			$this->tel = $tel;
			$this->segmento = $segmento;
		}

		public function getRazao() {
			return $this->razao;
		}

		public function setRazao($razao) {
			$this->razao = $razao;
		}

		public function getNome() {
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function getCnpj() {
			return $this->cnpj;
		}

		public function setCnpj($cnpj) {
			$this->cnpj = $cnpj;
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

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getSegmento() {
			return $this->segmento;
		}

		public function setSegmento($segmento) {
			$this->segmento = $segmento;
		}


	}

?>