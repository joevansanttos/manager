<?php

class PlanejamentoReceita{
	private $data;
	private $descricao;
	private $market;
	private $valor;
	private $categoria;
	private $pagamento;
	private $filial;
	private $doc;
	private $pago;
	private $planejamento;
	private $id;

	function __construct($data, $descricao,  $valor, CategoriaRecebimento $categoria,Pagamento $pagamento,  Filial $filial, Market $market, $doc) {
		$this->data = $data;
		$this->descricao = $descricao;
		$this->market = $market;
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

	public function getMarket() {
		return $this->market;
	}
	public function setMarket($market) {
		$this->market = $market;
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