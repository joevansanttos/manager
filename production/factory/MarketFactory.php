<?php	
	require_once "../class/Market.php";
	require_once "../class/Porte.php";
	require_once "../dao/PorteDao.php";
	require_once "../dao/UsuarioDao.php";
	require_once "../class/Conexao.php";

	class MarketFactory {

		public function criaMarket($params) {
			$conexao = new Conexao();
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
			$porte_id = $params["porte_id"];
			$usuario_id = $params["usuario_id"];
			$usuarioDao = new UsuarioDao($conexao);
			$usuario = $usuarioDao->buscaUsuario($usuario_id);
			$porteDao = new PorteDao($conexao);
			$porte = $porteDao->buscaPorte($porte_id);
			return new Market($razao, $nome, $cnpj, $site, $endereco , $estado, $cidade, $segmento, $tel, $bairro, $porte, $usuario);
		}	

	}

?>