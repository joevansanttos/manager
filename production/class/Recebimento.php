<?php

	class Recebimento{
		private $data;
		private $descricao;
		private $cliente;
		private $valor;
		private $categoria;
		private $pagamento;
		private $pago;
		private $id;

		function __construct($data, $descricao, Cliente $cliente, $valor, Categoria $categoria,Pagamento $pagamento, Pago $pago) {
			$this->data = $data;
			$this->descricao = $descricao;
			$this->cliente = $cliente;
			$this->valor = $valor;
			$this->categoria = $categoria;
			$this->pagamento = $pagamento;
			$this->pago = $pago;
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

		public function getCliente() {
			return $this->cliente;
		}
		public function setCliente($cliente) {
			$this->cliente = $cliente;
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

		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}

	}

?>