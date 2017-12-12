<?php	
	require_once "cabecalho.php";
	require_once "../dao/RelatorioDao.php";
	$id = $_GET['id'];
	$relatorioDao = new RelatorioDao($conexao);
	$relatorio = $relatorioDao->buscaRelatorio($id);
?>	

<?php require_once "css.php"; ?>
	
<h3>Consultoria</h3>

<?php require "body.php"; ?>

<div class="x_title">
  <h2>Detalhes do Relatório</h2>
  <ul class="nav navbar-right panel_toolbox">
    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Settings 1</a>
        </li>
        <li><a href="#">Settings 2</a>
        </li>
      </ul>
    </li>
    <li><a class="close-link"><i class="fa fa-close"></i></a>
    </li>
  </ul>
  <div class="clearfix"></div>
</div>
<div class="x_content">


<?php require_once "body.php";	?>

<div style="padding: 1cm;">
  <h2 style="text-align: center;">Relatório da Atividade</h2>
    <div class="ln_solid"></div>
    <p>Consultor: <?=$relatorio->getUsuario()->getNome() . ' ' . $relatorio->getUsuario()->getSobrenome() ?></p>
    <p>Data: <?=$relatorio->getData()?></p>
    <p>Cliente: <?=$relatorio->getTarefa()->getDepartamentoContrato()->getContrato()->getMarket()->getNome() ?></p>
    <p>Departamento: <?=$relatorio->getTarefa()->getDepartamentoContrato()->getDepartamento()->getDescricao() ?></p>
    <p>Atividade: <?=$relatorio->getTarefa()->getDescricao() ?></p>
    <p>Observação do Consultor: <?=$relatorio->getDescricao() ?></p>

  <br>
 
</div>

		    	


<?php	require_once "script.php"; ?>


<?php	require_once "rodape.php"; ?>