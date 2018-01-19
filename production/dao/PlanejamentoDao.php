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
		$conexao = new Conexao();
		$query = "select * from planejamentos where id = {$id}";
		$resultado = mysqli_query($conexao->conecta(), $query);
		$pago_buscado = mysqli_fetch_assoc($resultado);
		$planejamento_id = $pago_buscado['id'];
		$factory = new PlanejamentoFactory();
		$planejamento = $factory->cria($pago_buscado);
		$planejamento->setId($planejamento_id);
		$planejamentoReceitaDao = new PlanejamentoReceitaDao($conexao);
		$planejamento = $planejamentoReceitaDao->addReceitas($planejamento);
		$planejamentoDespesaDao = new PlanejamentoDespesaDao($conexao);
		$planejamento = $planejamentoDespesaDao->addDespesas($planejamento);
		return $planejamento;
	}	

	function insere(Planejamento $planejamento) {
		$query = "insert into planejamentos (ano) values ('{$planejamento->getAno()}')";
		if(mysqli_query($this->conexao->conecta(), $query)){

		}else{
			echo mysqli_error($this->conexao->conecta());
		}
	}

	function geraArray(){
		$receitas = [];
		$i = 1;
		while ( $i <= 13) {
			$receitas[$i] = 0;
			$i++;
		}
	}
	function calculaPlanejamento($recebimentos) {
		$receitas = $this->geraArray();

		foreach ($recebimentos as $recebimento) {
			$int = idate('m', strtotime($recebimento->getData()));
			$receitas[$int] = $receitas[$int] + $recebimento->getValor();
			$receitas[13] = $receitas[13] + $recebimento->getValor();
		}
		return $receitas;
	}


	function calculaLucro($receitas, $despesas) {
		$lucro = array();			
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
			$receitas[$int] = $receitas[$int] + $recebimento->getValor();
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
			$receitas[$int] = $receitas[$int] + $recebimento->getValor();
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

	function criaArrayDespesas(){
		$despesas = [];
		$i = 3;
		while ( $i <= 9) {
			$j = 1;
			while ($j <= 13){
				$despesas[$i][$j] = 0;
				$j++;
			}
			
			$i++;
		}
	}

	function geraArrayDespesas($outrasDespesas){
		$despesas = $this->criaArrayDespesas();

		foreach ($outrasDespesas as $d) {
			$int = idate('m', strtotime($d->getData()));

			switch ($d->getCategoria()->getId()) {
			    case 3:
			        $despesas[3][$int] = $despesas[3][$int] + $d->getValor();
			        $despesas[3][13] = $despesas[3][13] + $d->getValor();
			        break;
			    case 4:
			        $despesas[4][$int] = $despesas[4][$int] + $d->getValor();
			        $despesas[4][13] = $despesas[4][13] + $d->getValor();
			        break;
			    case 5:
			        $despesas[5][$int] = $despesas[5][$int] + $d->getValor();
			        $despesas[5][13] = $despesas[5][13] + $d->getValor();
			        break;
			    case 6:
			        $despesas[6][$int] = $despesas[6][$int] + $d->getValor();
			        $despesas[6][13] = $despesas[6][13] + $d->getValor();
			        break;
			    case 7:
			        $despesas[7][$int] = $despesas[7][$int] + $d->getValor();
			        $despesas[7][13] = $despesas[7][13] + $d->getValor();
			        break;
			    case 8:
			        $despesas[8][$int] = $despesas[8][$int] + $d->getValor();
			        $despesas[8][13] = $despesas[8][13] + $d->getValor();
			        break;
			     case 9:
			         $despesas[9][$int] = $despesas[9][$int] + $d->getValor();
			         $despesas[9][13] = $despesas[9][13] + $d->getValor();
			         break;
			}


		}

		return $despesas;
	}
	
}


?>