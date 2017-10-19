<?php
	
	class Prospect {
		private $id;
		private $prob;
		private $valorOp;
		private $valorEs;
		private $recebimento;
		private $fechamento;	
		private $produto;
		private $idCliente;

		function __construct($id_market, $prob, $valorOp, $valorEs, $recebimento, $fechamento, Produto $produto) {
			$this->idCliente = $id_market;
			$this->prob = $prob;
			$this->valorOp = $valorOp;				
			$this->valorEs = $valorEs;
			$this->recebimento = $recebimento;
			$this->fechamento = $fechamento;	
			$this->produto = $produto;					
			
		}		

		public function getProb() {
			return $this->prob;
		}

		public function setProb($prob) {
			$this->prob = $prob;
		}	
		

		public function getValorOp() {
			return $this->valorOp;
		}

		public function setValorOp($valorOp) {
			$this->valorOp = $valorOp;
		}

		public function getValorEs() {
			return $this->valorEs;
		}

		public function setValorEs($valorEs) {
			$this->valorEs = $valorEs;
		}

		public function getRecebimento() {
			return $this->recebimento;
		}

		public function setRecebimento($recebimento) {
			$this->recebimento = $recebimento;
		}

		public function getFechamento() {
			return $this->fechamento;
		}

		public function setFechamento($fechamento) {
			$this->fechamento = $fechamento;
		}	

		public function getProduto() {
			return $this->produto;
		}

		public function setProduto($produto) {
			$this->produto = $produto;
		}

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getIdCliente() {
			return $this->idCliente;
		}

		public function setIdCliente($idCliente) {
			$this->idCliente = $idCliente;
		}


	}

?>