<?php	
	require_once "../class/Cliente.php";
	require_once "../class/Porte.php";
	require_once "../dao/PorteDao.php";


	class ClienteFactory {
		

		public function criaCliente($params) {
			$conexao = mysqli_connect("localhost", "root", "", "manager");			
			$razao = $params["razao"];
			$nome = $params["nome"];
			$cnpj = $params["cnpj"];
			$site = $params["site"];
			$endereco = $params["endereco"];
			$estado = $params["estado"];
			$cidade = $params["cidade"];
			$segmento = $params["segmento"];
			$tel = $params["tel"];
			$bairro = $params["bairro"];
			$id_porte = $params["id_porte"];
			$porteDao = new PorteDao($conexao);
			$porte = $porteDao->buscaPorte($id_porte);
			return new Cliente($razao, $nome, $cnpj, $site, $endereco , $estado, $cidade, $segmento, $tel, $bairro, $porte);
		}	

	}

?>