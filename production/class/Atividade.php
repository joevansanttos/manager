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
		private $observacao;
		private $objetivo;
		private $delegante;
		private $delegado;
		private $statusPrazo;

		function __construct($descricao, $inicio,  $prazo, $setor, $resultados, $importancia, $observacao, $objetivo, StatusAtividade $statusAtividade, Usuario $delegante, Usuario $delegado, StatusPrazo $statusPrazo, Filial $filial ) {
			$this->descricao = $descricao;
			$this->inicio = $inicio;
			$this->prazo = $prazo;			
			$this->setor = $setor;
			$this->filial = $filial;
			$this->resultados = $resultados;
			$this->importancia = $importancia;
			$this->statusAtividade = $statusAtividade;
			$this->observacao = $observacao;
			$this->objetivo = $objetivo;
			$this->delegante = $delegante;
			$this->delegado = $delegado;
			$this->statusPrazo = $statusPrazo;
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

		public function getDelegante() {
			return $this->delegante;
		}

		public function setDelegante($delegante) {
			$this->delegante = $delegante;
		}

		public function getDelegado() {
			return $this->delegado;
		}

		public function setDelegado($delegado) {
			$this->delegado = $delegado;
		}

		public function getImportancia() {
			return $this->importancia;
		}

		public function setImportancia($importancia) {
			$this->importancia = $importancia;
		}

		public function getObjetivo() {
			return $this->objetivo;
		}

		public function setObjetivo($objetivo) {
			$this->objetivo = $objetivo;
		}

		public function getObservacao() {
			return $this->observacao;
		}

		public function setObservacao($observacao) {
			$this->observacao = $observacao;
		}
		
		public function getStatusPrazo() {
			return $this->statusPrazo;
		}

		public function setStatusPrazo($statusPrazo) {
			$this->statusPrazo = $statusPrazo;
		}
	}

?>