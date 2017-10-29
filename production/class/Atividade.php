<?php
	
	class Atividade{
		private $id;
		private $descricao;
		private $inicio;
		private $prazo;
		private $statusAtividade;
		private $setor;
		private $filial;
		private $resultados;
		private $usuario;

		function __construct($descricao, $inicio, $prazo, $setor, $filial, $resultados, $importancia, StatusAtividade $statusAtividade, Usuario $usuario) {
			$this->descricao = $descricao;
			$this->inicio = $inicio;
			$this->prazo = $prazo;			
			$this->setor = $setor;
			$this->filial = $filial;
			$this->resultados = $resultados;
			$this->importancia = $importancia;
			$this->statusAtividade = $statusAtividade;
			$this->usuario = $usuario;
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

		public function getInicio() {
			return $this->inicio;
		}

		public function setInicio($inicio) {
			$this->inicio = $inicio;
		}

		public function getPrazo() {
			return $this->prazo;
		}

		public function setPrazo($prazo) {
			$this->prazo = $prazo;
		}

		public function getSetor() {
			return $this->setor;
		}

		public function setSetor($setor) {
			$this->setor = $setor;
		}

		public function getFilial() {
			return $this->filial;
		}

		public function setFilial($filial) {
			$this->filial = $filial;
		}

		public function getResultados() {
			return $this->resultados;
		}

		public function setResultados($resultados) {
			$this->resultados = $resultados;
		}

		public function getStatusAtividade() {
			return $this->statusAtividade;
		}

		public function setStatusAtividade($statusAtividade) {
			$this->statusAtividade = $statusAtividade;
		}

		public function getUsuario() {
			return $this->usuario;
		}

		public function setUsuario($usuario) {
			$this->usuario = $usuario;
		}

		public function getImportancia() {
			return $this->importancia;
		}

		public function setImportancia($importancia) {
			$this->importancia = $importancia;
		}

		

	}

?>