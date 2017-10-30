<?php
class Historico{
	private $id;
	private $descricao;
	private $data;
	private $market;

	function __construct($descricao, $data, Market $market){
		$this->descricao = $descricao;
		$this->data = $data;
		$this->market = $market;
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

	public function getMarket() {
		return $this->market;
	}

	public function setMarket($market) {
		$this->market = $market;
	}

	public function getData() {
		return $this->data;
	}

	public function setData($data) {
		$this->data = $data;
	}
}
?>