<?php
require_once "../factory/CurriculoFactory.php";

class CurriculoDao{
	private $conexao;

	function __construct($conexao) {
		$this->conexao = $conexao;
	}


	function insere(Curriculo $curriculo) {
		$query = "insert into curriculos (nome, email,  sobrenome, sexo, estado, cidade, telefone, idade, filhos, endereco, objetivo, curso, universidade, conclusao, ano, empresa1, entrada1, saida1, cargo1, empresa2, entrada2, saida2, cargo2, qualificacoes ) values ('{$curriculo->getNome()}', '{$curriculo->getEmail()}', '{$curriculo->getSobrenome()}', '{$curriculo->getSexo()}', '{$curriculo->getEstado()}', '{$curriculo->getCidade()}', '{$curriculo->getTelefone()}', '{$curriculo->getIdade()}', '{$curriculo->getFilhos()}', '{$curriculo->getEndereco()}', '{$curriculo->getObjetivo()}', '{$curriculo->getCurso()}', '{$curriculo->getUniversidade()}', '{$curriculo->getConclusao()}', '{$curriculo->getAno()}', '{$curriculo->getEmpresa1()}', '{$curriculo->getEntrada1()}', '{$curriculo->getSaida1()}', '{$curriculo->getCargo1()}', '{$curriculo->getEmpresa2()}', '{$curriculo->getEntrada2()}', '{$curriculo->getSaida2()}', '{$curriculo->getCargo2()}', '{$curriculo->getQualificacoes()}')";
		if(mysqli_query($this->conexao->conecta(), $query)){

		}else{
			echo mysqli_error($this->conexao->conecta());
		}
	}

	function lista() {
		$curriculos = array();
		$resultado = mysqli_query($this->conexao->conecta(), "select * from curriculos order by nome");
		while($curriculo_array = mysqli_fetch_assoc($resultado)) {
			$factory = new CurriculoFactory();
			$curriculo_id = $curriculo_array['id'];				
			$curriculo = $factory->cria($curriculo_array);
			$curriculo->setId($curriculo_id);
			array_push($curriculos, $curriculo);
		}

		return $curriculos;
	}

	function busca($id) {
		$query = "select * from curriculos where id = {$id}";
		$resultado = mysqli_query($this->conexao->conecta(), $query);
		$curriculo = mysqli_fetch_assoc($resultado);
		$id = $curriculo['id'];
		$factory = new CurriculoFactory();
		$curriculo = $factory->cria($curriculo);
		$curriculo->setId($id);
		return $curriculo;
	}

}


?>