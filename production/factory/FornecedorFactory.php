<?php	
	require_once "../class/Fornecedor.php";
	require_once "../class/Conexao.php";

	class FornecedorFactory {

		public function criaFornecedor($params) {
			$conexao = new Conexao();
			$razao = $params["razao"];
			$nome = $params["nome"];
			$cnpj = $params["cnpj"];
			$endereco = $params["endereco"];
			$estado = $params["estado"];
			$cidade = $params["cidade"];
			$tel = $params["tel"];
			$segmento = $params["segmento"];
			return new Fornecedor($razao, $nome, $cnpj, $endereco, $estado, $cidade,  $tel, $segmento);
		}	

	}

?>