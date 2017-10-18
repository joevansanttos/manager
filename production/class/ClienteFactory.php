<?php 
	
	require_once "Cliente.php";
	require_once "Porte.php";
	require_once "PorteDao.php";


	class ClienteFactory {

		public function criaCliente($params) {
			$conexao = mysqli_connect("127.0.0.1", "root", "", "manager");	
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