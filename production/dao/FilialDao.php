<?php
require_once "../factory/FilialFactory.php";

class FilialDao{
	private $conexao;

	function __construct($conexao) {
		$this->conexao = $conexao;
	}

	function lista() {
		$filiais = array();			
		$resultado = mysqli_query($this->conexao->conecta(), "select u.* from filiais as u");
		while($filial_array = mysqli_fetch_assoc($resultado)) {
			$factory = new FilialFactory();
			$filial_id = $filial_array['id'];				
			$filial = $factory->cria($filial_array);
			$filial->setId($filial_id);
			array_push($filiais, $filial);
		}
		return $filiais;
	}

	function busca($id) {
		$query = "select * from filiais where id = {$id}";
		$resultado = mysqli_query($this->conexao->conecta(), $query);
		$filial_buscado = mysqli_fetch_assoc($resultado);
		$filial_id = $filial_buscado['id'];
		$factory = new FilialFactory();
		$filial = $factory->cria($filial_buscado);
		$filial->setId($filial_id);
		return $filial;
	}		
}

?>