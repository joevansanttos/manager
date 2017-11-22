<?php	
	require_once "cabecalho.php";
	require_once "../dao/RelatorioDao.php";
	$id = $_GET['id'];
	$relatorioDao = new RelatorioDao($conexao);
	$relatorio = $relatorioDao->buscaRelatorio($id);
?>	

<?php require_once "css.php"; ?>
	
<h3>Relatório de Atividades de Consultoria</h3>


<?php require_once "body.php";	?>

<div style="padding: 1cm;">
  <h2 style="text-align: center;">Relatório da Atividade</h2>
    <div class="ln_solid"></div>
    <p>Consultor: <?=$relatorio->getUsuario()->getNome() . ' ' . $relatorio->getUsuario()->getSobrenome() ?></p>
    <p>Data: <?=$relatorio->getData()?></p>
    <p>Cliente: <?=$relatorio->getTarefaContrato()->getDepartamentoContrato()->getContrato()->getMarket()->getNome() ?></p>
    <p>Departamento: <?=$relatorio->getTarefaContrato()->getDepartamentoContrato()->getDepartamento()->getDescricao() ?></p>
    <p>Atividade: <?=$relatorio->getTarefaContrato()->getTarefa()->getDescricao() ?></p>
    <p>Observação do Consultor: <?=$relatorio->getDescricao() ?></p>

  <br>
 
</div>

		    	


<?php	require_once "script.php"; ?>


<?php	require_once "rodape.php"; ?>