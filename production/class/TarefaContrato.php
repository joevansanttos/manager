<?php
class TarefaContrato{
	private $id;
	private $inicio;
	private $fim;
	private $horas;
	private $tarefa;
	private $departamentoContrato;

	function __construct(Tarefa $tarefa, DepartamentoContrato $departamentoContrato){
		$this->tarefa = $tarefa;
		$this->departamentoContrato = $departamentoContrato;
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getInicio() {
		return $this->inicio;
	}

	public function setInicio($inicio) {
		$this->inicio = $inicio;
	}	
	

	public function getFim() {
		return $this->fim;
	}

	public function setFim($fim) {
		$this->fim = $fim;
	}

	public function getHoras() {
		return $this->horas;
	}

	public function setHoras($horas) {
		$this->horas = $horas;
	}
	
	public function getTarefa() {
		return $this->tarefa;
	}

	public function setTarefa($tarefa) {
		$this->tarefa = $tarefa;
	}

	public function getDepartamentoContrato() {
			return $this->departamentoContrato;
		}

		public function setDepartamentoContrato($departamentoContrato) {
			$this->departamentoContrato = $departamentoContrato;
		}
}
?>