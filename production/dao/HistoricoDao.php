<?php
	require_once "../factory/HistoricoFactory.php";

	class HistoricoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}


		function insereHistorico(Historico $historico) {
			$query = "insert into historico ( descricao, data, market_id) values ('{$historico->getDescricao()}', '{$historico->getData()}',  '{$historico->getMarket()->getId()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function buscaHistorico($id) {
			$query = "select * from historico where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$relatorio_buscado = mysqli_fetch_assoc($resultado);
			$relatorio_id = $relatorio_buscado['id'];
			$factory = new HistoricoFactory();
			$relatorio = $factory->criaHistorico($relatorio_buscado);
			$relatorio->setId($relatorio_id);
			return $relatorio;
		}

		function atualizaHistorico(Historico $historico) {
			$query = "update historico set descricao = '{$historico->getDescricao()}', data = '{$historico->getData()}' where id= '{$historico->getId()}'";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

	}

?>