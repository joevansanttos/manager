<?php

class PlanejamentoDespesa{
	private $data;
	private $descricao;
	private $fornecedor;
	private $valor;
	private $categoria;
	private $pagamento;
	private $filial;
	private $doc;
	private $pago;
	private $id;

	function __construct($data, $descricao,  $valor, CategoriaDespesa $categoria,Pagamento $pagamento,  Filial $filial, Fornecedor $fornecedor, $doc) {
		$this->data = $data;
		$this->descricao = $descricao;
		$this->fornecedor = $fornecedor;
		$this->valor = $valor;
		$this->categoria = $categoria;
		$this->pagamento = $pagamento;
		$this->pago = $pago;
		$this->filial = $filial;
		$this->doc = $doc;
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

	public function getFornecedor() {
		return $this->fornecedor;
	}
	public function setFornecedor($fornecedor) {
		$this->fornecedor = $fornecedor;
	}

	public function getValor() {
		return $this->valor;
	}
	public function setValor($valor) {
		$this->valor = $valor;
	}

	public function getCategoria() {
		return $this->categoria;
	}
	public function setCategoria($categoria) {
		$this->categoria = $categoria;
	}

	public function getPagamento() {
		return $this->pagamento;
	}
	public function setPagamento($pagamento) {
		$this->pagamento = $pagamento;
	}

	public function getPago() {
		return $this->pago;
	}
	public function setPago($pago) {
		$this->pago = $pago;
	}

	public function getFilial() {
		return $this->filial;
	}
	public function setFilial($filial) {
		$this->filial = $filial;
	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}

	public function getDoc() {
		return $this->doc;
	}

	public function setDoc($doc) {
		$this->doc = $doc;
	}

	public function getPlanejamento() {
		return $this->planejamento;
	}

	public function setPlanejamento($planejamento) {
		$this->planejamento = $planejamento;
	}

	public function getNovaData() {
		$novoData = date("d/m/Y", strtotime($this->data));
		return $novoData;
	}

	public function getValorConvertido(){
		$novoValor = "R$ " . $this->valor;
		return $novoValor;
	}
	

}

?>