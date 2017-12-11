<?php
require_once "../factory/PlanejamentoFactory.php";
require_once "../factory/PlanejamentoReceitaFactory.php";
require_once "../factory/PlanejamentoDespesaFactory.php";


class PlanejamentoDao{
	private $conexao;

	function __construct($conexao) {
		$this->conexao = $conexao;
	}

	function lista() {
		$pagos = array();			
		$resultado = mysqli_query($this->conexao->conecta(), "select u.* from planejamentos as u");
		while($pago_array = mysqli_fetch_assoc($resultado)) {
			$factory = new PlanejamentoFactory();
			$pago_id = $pago_array['id'];				
			$pago = $factory->cria($pago_array);
			$pago->setId($pago_id);
			array_push($pagos, $pago);
		}
		return $pagos;
	}

	function busca($id) {
		$query = "select * from planejamentos where id = {$id}";
		$resultado = mysqli_query($this->conexao->conecta(), $query);
		$pago_buscado = mysqli_fetch_assoc($resultado);
		$pago_id = $pago_buscado['id'];
		$factory = new PlanejamentoFactory();
		$pago = $factory->cria($pago_buscado);
		$pago->setId($pago_id);
		return $pago;
	}		


	function insere(Planejamento $planejamento) {
		$query = "insert into planejamentos (ano) values ('{$planejamento->getAno()}')";
		if(mysqli_query($this->conexao->conecta(), $query)){

		}else{
			echo mysqli_error($this->conexao->conecta());
		}
	}

	function calculaReceitas() {
		$recebimentos = array();			
		$resultado = mysqli_query($this->conexao->conecta(), "select * from planejamento_receita");
		while($recebimento_array = mysqli_fetch_assoc($resultado)) {
			$factory = new PlanejamentoReceitaFactory();
			$recebimento_id = $recebimento_array['id'];				
			$recebimento = $factory->cria($recebimento_array);
			$recebimento->setId($recebimento_id);
			array_push($recebimentos, $recebimento);
		}

		$receitas = [];
		$i = 1;
		while ( $i <= 12) {
			$receitas[$i] = 0;
			$i++;
		}

		$receitas[13] = 0;
		foreach ($recebimentos as $recebimento) {
			$int = idate('m', strtotime($recebimento->getData()));
			$int = idate('m', $m);
			$receitas[$int] = $receitas[$m] + $recebimento->getValor();
			$receitas[13] = $receitas[13] + $recebimento->getValor();
		}
		return $receitas;
	}


	function calculaDespesas() {
		$recebimentos = array();			
		$resultado = mysqli_query($this->conexao->conecta(), "select * from planejamento_despesas");
		while($recebimento_array = mysqli_fetch_assoc($resultado)) {
			$factory = new PlanejamentoDespesaFactory();
			$recebimento_id = $recebimento_array['id'];				
			$recebimento = $factory->cria($recebimento_array);
			$recebimento->setId($recebimento_id);
			array_push($recebimentos, $recebimento);
		}

		$despesas = [];
		$i = 1;
		while ( $i <= 12) {
			$despesas[$i] = 0;
			$i++;
		}

		$despesas[13] = 0;
		foreach ($recebimentos as $recebimento) {
			$int = idate('m', strtotime($recebimento->getData()));
			$despesas[$int] = $despesas[$m] + $recebimento->getValor();
			$despesas[13] = $receitas[13] + $recebimento->getValor();
		}


		return $despesas;
	}
	
}


?>