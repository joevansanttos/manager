<?php
	require_once "../factory/RecebimentoFactory.php";
	require_once "../factory/AtividadeFactory.php";

	class RecebimentoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaNovosRecebimentos($start, $end) {
			$recebimentos = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select * from recebimentos where data between '{$start}' and '{$end}'");
			while($recebimento_array = mysqli_fetch_assoc($resultado)) {
				$factory = new RecebimentoFactory();
				$recebimento_id = $recebimento_array['id'];				
				$recebimento = $factory->criaRecebimento($recebimento_array);
				$recebimento->setId($recebimento_id);
				array_push($recebimentos, $recebimento);
			}
			return $recebimentos;
		}

		function listaRecebimentos() {
			$recebimentos = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from recebimentos as u");
			while($recebimento_array = mysqli_fetch_assoc($resultado)) {
				$factory = new RecebimentoFactory();
				$recebimento_id = $recebimento_array['id'];				
				$recebimento = $factory->criaRecebimento($recebimento_array);
				$recebimento->setId($recebimento_id);
				array_push($recebimentos, $recebimento);
			}
			return $recebimentos;
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

		function insereRecebimento(Recebimento $recebimento) {
			$query = "insert into recebimentos ( contrato_id, data, descricao, valor, categoria_id, pagamento_id, pago_id, filial_id, doc) values ('{$recebimento->getContrato()->getNumero()}', '{$recebimento->getData()}', '{$recebimento->getDescricao()}', '{$recebimento->getValor()}', '{$recebimento->getCategoria()->getId()}', '{$recebimento->getPagamento()->getId()}', '{$recebimento->getPago()->getId()}' , '{$recebimento->getFilial()->getId()}', '{$recebimento->getDoc()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function buscaRecebimento($id) {
			$query = "select * from recebimentos where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$recebimento_array = mysqli_fetch_assoc($resultado);
			$id = $recebimento_array['id'];
			$factory = new RecebimentoFactory();
			$recebimento = $factory->criaRecebimento($recebimento_array);
			$recebimento->setId($id);
			return $recebimento;
		}

	function atualiza(Recebimento $recebimento) {
		$query = "update recebimentos set  data = '{$recebimento->getData()}', descricao = '{$recebimento->getDescricao()}', valor =  '{$recebimento->getValor()}', categoria_id = '{$recebimento->getCategoria()->getId()}', pagamento_id = '{$recebimento->getPagamento()->getId()}', pago_id = '{$recebimento->getPago()->getId()}', doc = '{$recebimento->getDoc()}', contrato_id = '{$recebimento->getContrato()->getNumero()}' where id = '{$recebimento->getId()}'";
		if(mysqli_query($this->conexao->conecta(), $query)){

		}else{
			echo mysqli_error($this->conexao->conecta());
		}
	}

	function remove(Recebimento $recebimento){
		$query = "delete from recebimentos where id = {$recebimento->getId()}";
		if(mysqli_query($this->conexao->conecta(), $query)){

		}else{
			echo mysqli_error($this->conexao->conecta());
		}
	}

}
	

?>