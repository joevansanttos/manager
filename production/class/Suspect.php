<?php
	
	class Suspect{
		private $id;
		private $nome;
		private $data;
		private $status;
		private $hora;
		private $email;	
		private $tel;
		private $idCliente;

		function __construct($id_market, $nome, $email ,$tel, $status, $data, $hora) {
			$this->idCliente = $id_market;
			$this->nome = $nome;
			$this->email = $email;				
			$this->tel = $tel;
			$this->status = $status;
			$this->data = $data;	
			$this->hora = $hora;					
			
		}		

		public function getNome() {
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}	
		

		public function getData() {
			return $this->data;
		}

		public function setData($data) {
			$this->data = $data;
		}

		public function getStatus() {
			return $this->status;
		}

		public function setStatus($status) {
			$this->status = $status;
		}

		public function getHora() {
			return $this->hora;
		}

		public function setHora($hora) {
			$this->hora = $hora;
		}

		public function getEmail() {
			return $this->email;
		}

		public function setEmail($email) {
			$this->email = $email;
		}	

		public function getTel() {
			return $this->tel;
		}

		public function setTel($tel) {
			$this->tel = $tel;
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