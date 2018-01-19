<?php
	require_once "../factory/PlanejamentoReceitaFactory.php";
	require_once "../dao/PlanejamentoReceitaDao.php";


	class PlanejamentoReceitaDao{

		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function addReceitas($planejamento){
			$id = $planejamento->getId();
			$recebimentos = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select * from planejamento_receita where planejamento_id = '{$id}'");
			while($recebimento_array = mysqli_fetch_assoc($resultado)) {
				$factory = new PlanejamentoReceitaFactory();
				$recebimento_id = $recebimento_array['id'];				
				$recebimento = $factory->cria($recebimento_array);
				$recebimento->setId($recebimento_id);
				$planejamento->addReceita($recebimento);
			}
			return $planejamento;
		}

		function lista($id) {
			$recebimentos = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select * from planejamento_receita where planejamento_id = '{$id}'");
			while($recebimento_array = mysqli_fetch_assoc($resultado)) {
				$factory = new PlanejamentoReceitaFactory();
				$recebimento_id = $recebimento_array['id'];				
				$recebimento = $factory->cria($recebimento_array);
				$recebimento->setId($recebimento_id);
				array_push($recebimentos, $recebimento);
			}
			return $recebimentos;
		}

		function busca($id) {
			$query = "select * from planejamento_receita where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$planejamento_buscado = mysqli_fetch_assoc($resultado);
			$planejamento_id = $planejamento_buscado['id'];
			$factory = new PlanejamentoReceitaFactory();
			$planejamento_receita = $factory->cria($planejamento_buscado);
			$planejamento_receita->setId($planejamento_id);
			$planejamentoDao = new PlanejamentoDao($this->conexao);
			$planejamento = $planejamentoDao->busca($planejamento_buscado['planejamento_id']);
			$planejamento_receita->setPlanejamento($planejamento);
			return $planejamento_receita;
		}		
		
		function calculoRecebimentosMes($today) {
			$mes = date("m",strtotime($today));
			$recebimentos = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select * from recebimentos");
			while($recebimento_array = mysqli_fetch_assoc($resultado)) {
				$factory = new RecebimentoFactory();
				$recebimento_id = $recebimento_array['id'];				
				$recebimento = $factory->criaRecebimento($recebimento_array);
				$recebimento->setId($recebimento_id);
				array_push($recebimentos, $recebimento);
			}
			$valor = 0;
			foreach ($recebimentos as $recebimento) {
				$m = date("m",strtotime($recebimento->getData()));
				if( $m == $mes){
					$valor = $valor + $recebimento->getValor();

				}
			}
			return $valor;
		}

		function insere(PlanejamentoReceita $planejamento) {
			$query = "insert into planejamento_receita ( market_id, data, descricao, valor, categoria_id, pagamento_id, filial_id, doc, planejamento_id) values ('{$planejamento->getMarket()->getId()}', '{$planejamento->getData()}', '{$planejamento->getDescricao()}', '{$planejamento->getValor()}', '{$planejamento->getCategoria()->getId()}', '{$planejamento->getPagamento()->getId()}', '{$planejamento->getFilial()->getId()}', '{$planejamento->getDoc()}', '{$planejamento->getPlanejamento()->getId()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function atualiza(PlanejamentoReceita $planejamento) {
			$query = "update planejamento_receita set market_id = '{$planejamento->getMarket()->getId()}', data = '{$planejamento->getData()}', descricao = '{$planejamento->getDescricao()}', valor = '{$planejamento->getValor()}', categoria_id = '{$planejamento->getCategoria()->getId()}', filial_id = '{$planejamento->getFilial()->getId()}', doc = '{$planejamento->getDoc()}' where id = '{$planejamento->getId()}'";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function remove(PlanejamentoReceita $planejamento){
			$query = "delete from planejamento_receita where id = {$planejamento->getId()}";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

}
	

?>