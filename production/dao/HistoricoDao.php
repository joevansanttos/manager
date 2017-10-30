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
	}

?>