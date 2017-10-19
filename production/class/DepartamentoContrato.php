<?php
class DepartamentoContrato{
	private $id;
	private $contrato;
	private $departamento;

	function __construct(Contrato $contrato, Departamento $departamento){
		$this->contrato = $contrato;
		$this->departamento = $departamento;
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

	public function getDepartamento() {
			return $this->departamento;
		}

		public function setDepartamento($departamento) {
			$this->departamento = $departamento;
		}
}
?>