<?php
class Relatorio{
	private $id;
	private $descricao;
	private $data;
	private $tarefaContrato;
	private $usuario;

	function __construct($descricao, $data, TarefaContrato $tarefaContrato, Usuario $usuario){
		$this->descricao = $descricao;
		$this->data = $data;
		$this->tarefaContrato = $tarefaContrato;
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

	public function getTarefaContrato() {
		return $this->tarefaContrato;
	}

	public function setTarefaContrato($tarefaContrato) {
		$this->tarefaContrato = $tarefaContrato;
	}

	public function getData() {
		return $this->data;
	}

	public function setData($data) {
		$this->data = $data;
	}

	public function getUsuario() {
		return $this->usuario;
	}

	public function setUsuario($usuario) {
		$this->usuario = $usuario;
	}
}
?>