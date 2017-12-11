<?php

	class Planejamento{
		private $ano;
		private $id;

		function __construct($ano) {
			$this->ano = $ano;
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

	}

?>