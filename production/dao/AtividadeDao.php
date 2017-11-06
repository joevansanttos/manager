<?php
	require_once "../factory/AtividadeFactory.php";

	class AtividadeDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaAtividades($usuario_id) {
			$atividades = array();
			if($usuario_id == 1){
				$resultado = mysqli_query($this->conexao->conecta(), "select u.* from atividades as u");
			}else{
				$resultado = mysqli_query($this->conexao->conecta(), "select u.* from atividades as u where usuario_id = $usuario_id");

			}			
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

		function buscaAtividade($id) {
			$query = "select * from atividades where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$atividade_buscada = mysqli_fetch_assoc($resultado);
			$atividade_id = $atividade_buscada['id'];
			$factory = new AtividadeFactory();
			$atividade = $factory->criaAtividade($atividade_buscada);
			$atividade->setId($atividade_id);
			return $atividade;
		}

		function atualizaAtividade(Atividade $atividade) {
			$query = "update atividades set descricao = '{$atividade->getDescricao()}', inicio = '{$atividade->getInicio()}', prazo = '{$atividade->getPrazo()}' , setor = '{$atividade->getSetor()}', filial = '{$atividade->getFilial()}', resultados = '{$atividade->getResultados()}', importancia = '{$atividade->getImportancia()}', status_atividade_id = '{$atividade->getStatusAtividade()->getId()}' where id = '{$atividade->getId()}'";

			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function remove(Atividade $atividade){
			$query = "delete from atividades where id = {$atividade->getId()}";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}		

	}

?>