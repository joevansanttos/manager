<?php
	require_once "../factory/RecebimentoFactory.php";
	require_once "../factory/AtividadeFactory.php";

	class RecebimentoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
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

		function insereRecebimento(Recebimento $recebimento) {
			$query = "insert into recebimentos ( market_id, data, descricao, valor, categoria_id, pagamento_id, pago_id, image) values ('{$recebimento->getMarket()->getId()}', '{$recebimento->getData()}', '{$recebimento->getDescricao()}', '{$recebimento->getValor()}', '{$recebimento->getCategoria()->getId()}', '{$recebimento->getPagamento()->getId()}', '{$recebimento->getPago()->getId()}' ,'{$recebimento->getImage()}')";
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
	}

?>