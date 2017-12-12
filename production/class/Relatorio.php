<?php
class Relatorio{
	private $id;
	private $descricao;
	private $data;
	private $tarefa;
	private $usuario;

	function __construct($descricao, $data, Tarefa $tarefa, Usuario $usuario){
		$this->descricao = $descricao;
		$this->data = $data;
		$this->tarefa = $tarefa;
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

	public function getTarefa() {
		return $this->tarefa;
	}

	public function setTarefa($tarefa) {
		$this->tarefa = $tarefa;
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