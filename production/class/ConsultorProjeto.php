<?php

	class ConsultorProjeto	{		
		private $id;
		private $contrato;
		private $consultor;

		function __construct(Contrato $contrato, Usuario $consultor){
			$this->contrato = $contrato;
			$this->consultor = $consultor;
		}

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getContrato() {
			return $this->contrato;
		}

		public function setContrato($contrato) {
			$this->contrato = $contrato;
		}

		public function getConsultor() {
				return $this->consultor;
			}

			public function setConsultor($consultor) {
				$this->consultor = $consultor;
			}
	}
