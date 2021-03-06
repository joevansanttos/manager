<?php
	
	class Mensagem{
		private $id;
		private $mensagem;
		private $titulo;
		private $data;
		private $statusMensagem;
		private $emissor;
		private $receptor;

		function __construct($mensagem, $data, $titulo, StatusMensagem $statusMensagem, Usuario $emissor, Usuario $receptor) {
			$this->mensagem = $mensagem;
			$this->data = $data;
			$this->titulo = $titulo;
			$this->statusMensagem = $statusMensagem;
			$this->emissor = $emissor;
			$this->receptor = $receptor;
		}		

		
		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getMensagem() {
			return $this->mensagem;
		}

		public function setMensagem($mensagem) {
			$this->mensagem = $mensagem;
		}

		public function getData() {
			return $this->data;
		}

		public function setData($data) {
			$this->data = $data;
		}

		public function getStatusMensagem() {
			return $this->statusMensagem;
		}

		public function setStatusMensagem($statusMensagem) {
			$this->statusMensagem = $statusMensagem;
		}
		
		public function getEmissor() {
			return $this->emissor;
		}

		public function setEmissor($emissor) {
			$this->emissor = $emissor;
		}
		
		public function getReceptor() {
			return $this->receptor;
		}

		public function setReceptor($receptor) {
			$this->receptor = $receptor;
		}

		public function getTitulo() {
			return $this->titulo;
		}

		public function setTitulo($titulo) {
			$this->titulo = $titulo;
		}

	}

?>