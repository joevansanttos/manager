<?php
	
	class Cliente{
		private $id;
		private $razao;
		private $nome;
		private $cnpj;
		private $site;
		private $endereco;
		private $estado;
		private $cidade;
		private $segmento;
		private $tel;
		private $bairro;
		private $porte;
		private $consultor;
		private $leads;

		function __construct($razao, $nome, $cnpj, $site, $endereco, $estado, $cidade, $segmento, $tel, $bairro, Porte $porte) {
			$this->razao = $razao;
			$this->nome = $nome;
			$this->cnpj = $cnpj;
			$this->site = $site;
			$this->endereco = $endereco;
			$this->estado = $estado;
			$this->cidade = $cidade;
			$this->segmento = $segmento;
			$this->tel = $tel;
			$this->bairro = $bairro;
			$this->porte = $porte;
			$this->leads = array();
		}

		public function addLead (Lead $lead){
			$this->leads[] = $lead;
		}

		public function getLeads(){
			return $this->leads;
		}

		public function getRazao() {
			return $this->razao;
		}

		public function setRazao($razao) {
			$this->razao = $razao;
		}

		public function getNome() {
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function getCnpj() {
			return $this->cnpj;
		}

		public function setCnpj($cnpj) {
			$this->cnpj = $cnpj;
		}		

		public function getSite() {
			return $this->site;
		}

		public function setSite($site) {
			$this->site = $site;
		}

		public function getEndereco() {
			return $this->endereco;
		}

		public function setEndereco($endereco) {
			$this->endereco = $endereco;
		}

		public function getCidade() {
			return $this->cidade;
		}

		public function setCidade($cidade) {
			$this->cidade = $cidade;
		}

		public function getEstado() {
			return $this->estado;
		}

		public function setEstado($estado) {
			$this->estado = $estado;
		}

		public function getSegmento() {
			return $this->segmento;
		}

		public function setSegmento($segmento) {
			$this->segmento = $segmento;
		}

		public function getTel() {
			return $this->tel;
		}

		public function setTel($tel) {
			$this->tel = $tel;
		}

		public function getBairro() {
			return $this->bairro;
		}

		public function setBairro($bairro) {
			$this->bairro = $bairro;
		}

		public function getPorte() {
			return $this->porte;
		}

		public function setPorte($porte) {
			$this->porte = $porte;
		}

		public function getConsultor() {
			return $this->consultor;
		}

		public function setConsultor($consultor) {
			$this->consultor = $consultor;
		}

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}


	}

?>