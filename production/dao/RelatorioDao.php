<?php
	require_once "../factory/RelatorioFactory.php";

	class RelatorioDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}


		function insereRelatorio(Relatorio $relatorio) {
			$query = "insert into relatorios ( descricao, data, tarefa_contrato_id, usuario_id) values ('{$relatorio->getDescricao()}', '{$relatorio->getData()}', '{$relatorio->getTarefaContrato()->getId()}', '{$relatorio->getUsuario()->getId()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function buscaRelatorio($id) {
			$query = "select * from relatorios where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$relatorio_buscado = mysqli_fetch_assoc($resultado);
			$relatorio_id = $relatorio_buscado['id'];
			$factory = new RelatorioFactory();
			$relatorio = $factory->criaRelatorio($relatorio_buscado);
			$relatorio->setId($relatorio_id);
			return $relatorio;
		}

		

	}

?>