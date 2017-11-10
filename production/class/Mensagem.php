<?php
	
	class Mensagem{
		private $id;
		private $mensagem;
		private $data;
		private $statusMensagem;
		private $emissor;
		private $receptor;

		function __construct($mensagem, $data, StatusMensagem $statusMensagem, Usuario $emissor, Usuario $receptor) {
			$this->mensagem = $mensagem;
			$this->data = $data;
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

	}

?>