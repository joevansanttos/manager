<?php
	
	class Produto{
		private $id;
		private $nome;
		private $descricao;
		private $beneficios;
		private $entregas;
		private $preco;

		function __construct($nome, $descricao, $beneficios, $entregas, $preco) {
			$this->nome = $nome;
			$this->descricao = $descricao;
			$this->beneficios = $beneficios;			
			$this->entregas = $entregas;
			$this->preco = $preco;
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

		public function getDescricao() {
			return $this->descricao;
		}

		public function setDescricao($descricao) {
			$this->descricao = $descricao;
		}	
		

		public function getBeneficios() {
			return $this->beneficios;
		}

		public function setBeneficios($beneficios) {
			$this->beneficios = $beneficios;
		}

		public function getEntregas() {
			return $this->entregas;
		}

		public function setEntregas($entregas) {
			$this->entregas = $entregas;
		}	

		public function getPreco() {
			return $this->preco;
		}

		public function setPreco($preco) {
			$this->preco = $preco;
		}
	}

?>