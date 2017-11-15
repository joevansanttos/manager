<?php
	require_once "../factory/MarketFactory.php";
	require_once "../factory/ProspectFactory.php";
	require_once "../factory/SuspectFactory.php";
	require_once "../factory/LeadFactory.php";
	require_once "../factory/HistoricoFactory.php";
	
	class MarketDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaMarkets($usuario_id) {
			$markets = array();
			if($usuario_id == 1){
				$resultado = mysqli_query($this->conexao->conecta(), "select * from market");
			}else{
				$resultado = mysqli_query($this->conexao->conecta(), "select u.* from market as u where usuario_id = {$usuario_id}");
			}
			
			while($market_array = mysqli_fetch_assoc($resultado)) {
				$factory = new MarketFactory();
				$id = $market_array['id'];				
				$market = $factory->criaMarket($market_array);
				$market->setId($id);
				array_push($markets, $market);
			}

			return $markets;
		}

		function insereMarket(Market $market) {
			$query = "insert into market (nome, razao, cnpj, site, endereco, estado, cidade, segmento, tel, bairro, porte_id, usuario_id) values ('{$market->getNome()}', '{$market->getRazao()}', '{$market->getCnpj()}', '{$market->getSite()}', '{$market->getEndereco()}', '{$market->getEstado()}', '{$market->getCidade()}', '{$market->getSegmento()}' , '{$market->getTel()}', '{$market->getBairro()}' , '{$market->getPorte()->getId()}', '{$market->getUsuario()->getId()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function atualizaMarket(Market $market) {
			$query = "update market set razao = '{$market->getRazao()}', nome = '{$market->getNome()}' , cnpj = '{$market->getCnpj()}' , site = '{$market->getSite()}' , endereco = '{$market->getEndereco()}', estado = '{$market->getEstado()}', cidade = '{$market->getCidade()}', segmento = '{$market->getSegmento()}', tel = '{$market->getTel()}', bairro = '{$market->getBairro()}', porte_id = '{$market->getPorte()->getId()}' , image = '{$market->getImage()}' where id = {$market->getId()}";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function buscaMarket($id) {
			$query = "select * from market where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$market_buscado = mysqli_fetch_assoc($resultado);
			$id_market = $market_buscado['id'];
			$factory = new MarketFactory();
			$cliente = $factory->criaMarket($market_buscado);
			$cliente->setId($id_market);
			return $cliente;
		}

		function buscaCidade($cidade){
			$query = "select  * from cidade where CT_IBGE = '{$cidade}'";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$novaCidade = mysqli_fetch_assoc($resultado);
			return $novaCidade['CT_NOME'];
			
		}
	

		function listaLeadsMarket($market_id) {
			$leads = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from leads as u where market_id = {$market_id}");
			while($lead_array = mysqli_fetch_assoc($resultado)) {
				$factory = new LeadFactory();
				$lead_id = $lead_array['id'];				
				$lead = $factory->criaLead($lead_array);
				$lead->setId($lead_id);
				array_push($leads, $lead);
			}		
			return $leads;
		}

		function listaSuspectsMarket($market_id) {
			$suspects = array();		
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from suspects as u where market_id = {$market_id}");
			while($suspect_array = mysqli_fetch_assoc($resultado)) {
				$factory = new SuspectFactory();
				$suspect_id = $suspect_array['id'];				
				$suspect = $factory->criaSuspect($suspect_array);
				$suspect->setId($suspect_id);
				array_push($suspects, $suspect);
			}
			return $suspects;
		}
		
		function listaProspectsMarket($market_id) {
			$prospects = array();	
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from prospects as u where market_id = {$market_id}");
			while($prospect_array = mysqli_fetch_assoc($resultado)) {
				$factory = new ProspectFactory();
				$prospect_id = $prospect_array['id'];				
				$prospect = $factory->criaProspect($prospect_array);
				$prospect->setId($prospect_id);
				array_push($prospects, $prospect);
			}				
			return $prospects;
		}

		function listaHistoricosMarket($market_id) {
			$historicos = array();	
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from historico as u where market_id = {$market_id}");
			while($historico_array = mysqli_fetch_assoc($resultado)) {
				$factory = new HistoricoFactory();
				$historico_id = $historico_array['id'];				
				$historico = $factory->criaHistorico($historico_array);
				$historico->setId($historico_id);
				array_push($historicos, $historico);
			}				
			return $historicos;
		}

	}	
?>