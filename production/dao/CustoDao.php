<?php
require_once "../factory/CustoFactory.php";

class CustoDao{
	private $conexao;

	function __construct($conexao) {
		$this->conexao = $conexao;
	}

	function lista() {
		$custos = array();			
		$resultado = mysqli_query($this->conexao->conecta(), "select * from custos");
		while($custo_array = mysqli_fetch_assoc($resultado)) {
			$factory = new CustoFactory();
			$custo_id = $custo_array['id'];				
			$custo = $factory->cria($custo_array);
			$custo->setId($custo_id);
			array_push($custos, $custo);
		}
		return $custos;
	}

	function listaNovosCustos($start, $end) {
		$custos = array();			
		$resultado = mysqli_query($this->conexao->conecta(), "select * from custos where data between '{$start}' and '{$end}'");
		while($custo_array = mysqli_fetch_assoc($resultado)) {
			$factory = new CustoFactory();
			$custo_id = $custo_array['id'];				
			$custo = $factory->cria($custo_array);
			$custo->setId($custo_id);
			array_push($custos, $custo);
		}
		return $custos;
	}
	

	function insere(Custo $custo) {
		$query = "insert into custos ( usuario_id, data, descricao, valor, categoria_id, pagamento_id, pago_id, filial_id) values ('{$custo->getUsuario()->getId()}', '{$custo->getData()}', '{$custo->getDescricao()}', '{$custo->getValor()}', '{$custo->getCategoria()->getId()}', '{$custo->getPagamento()->getId()}', '{$custo->getPago()->getId()}', '{$custo->getFilial()->getId()}')";
		if(mysqli_query($this->conexao->conecta(), $query)){

		}else{
			echo mysqli_error($this->conexao->conecta());
		}
	}

	function busca($id) {
		$query = "select * from custos where id = {$id}";
		$resultado = mysqli_query($this->conexao->conecta(), $query);
		$custo_array = mysqli_fetch_assoc($resultado);
		$id = $custo_array['id'];
		$factory = new CustoFactory();
		$custo = $factory->cria($custo_array);
		$custo->setId($id);
		return $custo;
	}

	function atualiza(Custo $custo) {
		$query = "update custos set  data = '{$custo->getData()}', descricao = '{$custo->getDescricao()}', valor =  '{$custo->getValor()}', categoria_id = '{$custo->getCategoria()->getId()}', pagamento_id = '{$custo->getPagamento()->getId()}', pago_id = '{$custo->getPago()->getId()}', usuario_id = '{$custo->getUsuario()->getId()}' where id = '{$custo->getId()}'";
		if(mysqli_query($this->conexao->conecta(), $query)){

		}else{
			echo mysqli_error($this->conexao->conecta());
		}
	}

	

}

?>