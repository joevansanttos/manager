<?php
	
	class Contrato {
		private $inicio;
		private $fim;
		private $numero;
		private $sede;
		private $razao;	
		private $cnpj;	
		private $produto;
		private $statusContrato;
		private $market;
		private $socios;
		private $departamentos;

		function __construct($inicio, $fim, $numero, $sede, $razao, $cnpj, Produto $produto, Market $market, StatusContrato $statusContrato) {
			$this->market = $market;
			$this->inicio = $inicio;
			$this->fim = $fim;				
			$this->numero = $numero;
			$this->sede = $sede;
			$this->razao = $razao;
			$this->cnpj = $cnpj;	
			$this->produto = $produto;
			$this->statusContrato = $statusContrato;
			$this->socios = array();	
			$this->departamentos = array();					
			
		}


		public function getDepartamentos() {
			return $this->departamentos;
		}	

		public function addDepartamento(Departamento $departamento) {
			$this->departamentos[] = $departamento;
		}

		public function getSocios() {
			return $this->socios;
		}	

		public function addSocio(Socio $socio) {
			$this->socios[] = $socio;
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

		public function getNumero() {
			return $this->numero;
		}

		public function setNumero($numero) {
			$this->numero = $numero;
		}

		public function getSede() {
			return $this->sede;
		}

		public function setSede($sede) {
			$this->sede = $sede;
		}

		public function getRazao() {
			return $this->razao;
		}

		public function setRazao($razaorazao) {
			$this->razao = $razao;
		}	

		public function getCnpj() {
			return $this->cnpj;
		}

		public function setCnpj($cnpj) {
			$this->cnpj = $cnpj;
		}	

		public function getProduto() {
			return $this->produto;
		}

		public function setProduto($produto) {
			$this->produto = $produto;
		}		

		public function getMarket() {
			return $this->market;
		}

		public function setMarket($market) {
			$this->market = $market;
		}

		public function getStatusContrato() {
			return $this->statusContrato;
		}

		public function setStatusContrato($statusContrato) {
			$this->statusContrato = $statusContrato;
		}

		public function getAnoContrato() {
			$pieces = explode('-', $this->inicio);
			$ano = $pieces[0];
			return $ano;
		}

		public function getNovoInicio() {
			$novoInicio = date("d/m/Y", strtotime($this->inicio));
			return $novoInicio;
		}

		public function getNovoFim() {
			$novoFim = date("d/m/Y", strtotime($this->fim));
			return $novoFim;
		}

		public function getNumeroConvertido(){
			$novoNumero = str_pad($this->getNumero(), 3, '0', STR_PAD_LEFT);
			return $novoNumero;
		}


	}

?>