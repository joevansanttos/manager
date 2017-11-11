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
	
<h3>Atividade <?=$atividade->getDescricao()?></p></h3>


<?php require_once "body.php";	?>

<div class="" role="tabpanel" data-example-id="togglable-tabs">
  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Detalhes</a>
    </li>
    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Resultados Esperados</a>
    </li>
    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Observação do Colaborador</a>
    </li>
  </ul>
  <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
      <p>Inicio: <?=$novoInicio?></p>
      <p>Prazo: <?=$novoPrazo?></p>
      <p>Status: <?=$atividade->getStatusAtividade()->getDescricao()?></p>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
      <p><?=$atividade->getResultados()?></p>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
      <p><?=$atividade->getObservacao()?></p>
    </div>
  </div>
</div>
			    	


<?php	require_once "script.php"; ?>
<?php	require_once "rodape.php"; ?>