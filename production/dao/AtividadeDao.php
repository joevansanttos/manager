<?php
	require_once "../factory/AtividadeFactory.php";

	class AtividadeDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaAtividades() {
			$atividades = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from atividades as u");
			while($atividade_array = mysqli_fetch_assoc($resultado)) {
				$factory = new AtividadeFactory();
				$atividade_id = $atividade_array['id'];				
				$atividade = $factory->criaAtividade($atividade_array);
				$atividade->setId($atividade_id);
				array_push($atividades, $atividade);
			}
			return $atividades;
		}

		function insereAtividade(Atividade $atividade) {
			$query = "insert into atividades ( descricao, inicio, prazo, setor, filial, resultados, importancia, status_atividade_id, usuario_id) values ('{$atividade->getDescricao()}', '{$atividade->getInicio()}', '{$atividade->getPrazo()}', '{$atividade->getSetor()}', '{$atividade->getFilial()}', '{$atividade->getResultados()}', '{$atividade->getImportancia()}', '{$atividade->getStatusAtividade()->getId()}', '{$atividade->getUsuario()->getId()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}
	}

?>