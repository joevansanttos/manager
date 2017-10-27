<?php
	require_once "../factory/PorteFactory.php";

	class PorteDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaPortes() {
			$portes = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from porte as u");
			while($porte_array = mysqli_fetch_assoc($resultado)) {
				$factory = new PorteFactory();
				$porte_id = $porte_array['id_porte'];				
				$porte = $factory->criaPorte($porte_array);
				$porte->setId($porte_id);
				array_push($portes, $porte);
			}
			return $portes;
		}

		function buscaPorte($id) {
			$query = "select * from porte where id_porte = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$porte_buscado = mysqli_fetch_assoc($resultado);
			$id_porte = $porte_buscado['id_porte'];
			$factory = new PorteFactory();
			$porte = $factory->criaPorte($porte_buscado);
			$porte->setId($id_porte);
			return $porte;
		}		
	}

?>