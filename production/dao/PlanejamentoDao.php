<?php
require_once "../factory/PlanejamentoFactory.php";
require_once "../factory/PlanejamentoReceitaFactory.php";
require_once "../factory/PlanejamentoDespesaFactory.php";
require_once "../factory/RecebimentoFactory.php";
require_once "../factory/DespesaFactory.php";


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

	function calculaReceitas($id) {
		$recebimentos = array();			
		$resultado = mysqli_query($this->conexao->conecta(), "select * from planejamento_receita where planejamento_id = $id");
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
			$receitas[$int] = $receitas[$m] + $recebimento->getValor();
			$receitas[13] = $receitas[13] + $recebimento->getValor();
		}
		return $receitas;
	}


	function calculaDespesas($id) {
		$recebimentos = array();			
		$resultado = mysqli_query($this->conexao->conecta(), "select * from planejamento_despesas where planejamento_id = $id");
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

	function calculaLucro($id) {
		$lucro = array();			
		$despesas = $this->calculaDespesas($id);
		$receitas = $this->calculaReceitas($id);

		for ($i=1; $i < 14 ; $i++) { 
			$lucro['valor'][$i] = $receitas[$i] - $despesas[$i];
			if($lucro['valor'][$i] == 0){
				$lucro['class'][$i] = 'default';
			}elseif($lucro['valor'][$i] > 0){
				$lucro['class'][$i] = 'success';
			}else{
				$lucro['class'][$i] = 'danger';
			}
		}
		return $lucro;
	}

	function calculaRecebimentos($ano) {
		$recebimentos = array();			
		$resultado = mysqli_query($this->conexao->conecta(), "select * from recebimentos");
		while($recebimento_array = mysqli_fetch_assoc($resultado)) {
			$factory = new RecebimentoFactory();
			$recebimento_id = $recebimento_array['id'];				
			$recebimento = $factory->criaRecebimento($recebimento_array);
			$recebimento->setId($recebimento_id);
			$year = date("Y", strtotime($recebimento->getData()));
			if($year == $ano){
				array_push($recebimentos, $recebimento);
			}
			
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
			$receitas[$int] = $receitas[$m] + $recebimento->getValor();
			$receitas[13] = $receitas[13] + $recebimento->getValor();
		}
		return $receitas;
	}

	function calculaDespesasAtuais($ano) {
		$recebimentos = array();			
		$resultado = mysqli_query($this->conexao->conecta(), "select * from despesas");
		while($recebimento_array = mysqli_fetch_assoc($resultado)) {
			$factory = new DespesaFactory();
			$recebimento_id = $recebimento_array['id'];				
			$recebimento = $factory->criaDespesa($recebimento_array);
			$recebimento->setId($recebimento_id);
			$year = date("Y", strtotime($recebimento->getData()));
			if($year == $ano){
				array_push($recebimentos, $recebimento);
			}
			
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
			$receitas[$int] = $receitas[$m] + $recebimento->getValor();
			$receitas[13] = $receitas[13] + $recebimento->getValor();
		}
		return $receitas;
	}

	function calculaLucroAtual($ano) {
		$lucro = array();			
		$despesas = $this->calculaDespesasAtuais($ano);
		$receitas = $this->calculaRecebimentos($ano);

		for ($i=1; $i < 14 ; $i++) { 
			$lucro['valor'][$i] = $receitas[$i] - $despesas[$i];
			if($lucro['valor'][$i] == 0){
				$lucro['class'][$i] = 'default';
			}elseif($lucro['valor'][$i] > 0){
				$lucro['class'][$i] = 'success';
			}else{
				$lucro['class'][$i] = 'danger';
			}
		}
		return $lucro;
	}
	
}


?>