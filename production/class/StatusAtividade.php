<?php
class StatusAtividade{
	private $id;
	private $porcentagem;
	private $descricao;

	function __construct($descricao, $porcentagem){
		$this->descricao = $descricao;
		$this->porcentagem = $porcentagem;
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

		public function getPorcentagem() {
				return $this->porcentagem;
			}

			public function setPorcentagem($porcentagem) {
				$this->porcentagem = $porcentagem;
			}
}
?>