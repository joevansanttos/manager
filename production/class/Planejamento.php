<?php

	class Planejamento{
		private $ano;
		private $id;
		private $receitas;
		private $despesas;

		function __construct($ano) {
			$this->ano = $ano;
			$this->receitas = array();	
			$this->despesas = array();	
		}

		public function getAno() {
			return $this->ano;
		}
		public function setAno($ano) {
			$this->ano = $ano;
		}

		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}

		public function getReceitas() {
			return $this->receitas;
		}	

		public function addReceita(PlanejamentoReceita $receita) {
			$this->receitas[] = $receita;
		}

		public function getDespesas() {
			return $this->despesas;
		}	

		public function addDespesa(PlanejamentoDespesa $despesa) {
			$this->despesas[] = $despesa;
		}

	}

?>