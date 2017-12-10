<?php	
	require_once "cabecalho.php";
	require_once '../dao/AtividadeDao.php';
	$id = $_GET['id'];
	$atividadeDao = new AtividadeDao($conexao);
	$atividade = $atividadeDao->buscaAtividade($id); 
	$novoInicio = date("d-m-Y", strtotime($atividade->getInicio()));
	$novoPrazo = date("d-m-Y", strtotime($atividade->getPrazo()));
?>	

<?php require_once "css.php"; ?>
	
<h3>Relatório de Atividades</h3>


<?php require_once "body.php";	?>
<button id="button" onclick="window.print()" class="btn btn-default">Baixar</button>    
<div style="padding: 1cm;">
  <h2 style="text-align: center;">Relatório da Atividade <?=$atividade->getDescricao()?></h2>
    <div class="ln_solid"></div>

  <br>
  <p><strong>Delegante:</strong> <?=$atividade->getDelegante()->getNome() . ' ' . $atividade->getDelegante()->getSobrenome()?></p>
   <p><strong>Delegado:</strong> <?=$atividade->getDelegado()->getNome() . ' ' . $atividade->getDelegado()->getSobrenome()?></p>
  <p><strong>Inicio da Tarefa:</strong> <?=$novoInicio?></p>
  <p><strong>Prazo da Tarefa:</strong> <?=$novoPrazo?></p>
  <p><strong>Status:</strong> <?=$atividade->getStatusAtividade()->getDescricao()?></p>
  <p><strong>Resultados Esperados:</strong> <?=$atividade->getResultados()?></p>
  <p><strong>Objetivo Estratégico:</strong> <?=$atividade->getObjetivo()?></p>
  <p><strong>Observação do Colaborador:</strong> <?=$atividade->getObservacao()?></p>  
</div>

		    	


<?php	require_once "script.php"; ?>


<?php	require_once "rodape.php"; ?>