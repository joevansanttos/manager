<?php
class Tarefa{

	private $id;
	private $fim;
	private $horas;
	private $departamentoContrato;
	private $statusAtividade;
	private $usuario;
	private $descricao;
	private $data;

	function __construct(DepartamentoContrato $departamentoContrato, $horas,  $fim, $descricao, StatusAtividade $statusAtividade, Usuario $usuario, $data){
		$this->departamentoContrato = $departamentoContrato;
		$this->horas = $horas;
		$this->fim = $fim;
		$this->descricao = $descricao;
		$this->statusAtividade = $statusAtividade;
		$this->usuario = $usuario;
		$this->data = $data;
	}


	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getData() {
		return $this->data;
	}

	public function setData($data) {
		$this->data = $data;
	}

	public function getDescricao() {
		return $this->descricao;
	}

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
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
	

	public function getDepartamentoContrato() {
		return $this->departamentoContrato;
	}

	public function setDepartamentoContrato($departamentoContrato) {
		$this->departamentoContrato = $departamentoContrato;
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
	
}
?>