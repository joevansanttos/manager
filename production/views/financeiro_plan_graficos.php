<?php	
	require_once "cabecalho.php";
	require_once "../dao/PlanejamentoDao.php"; 
  
  $id = $_GET['id'];
  $planejamentoDao = new PlanejamentoDao($conexao);
  $planejamento = $planejamentoDao->busca($id);
  $receitas = $planejamentoDao->calculaPlanejamento($planejamento->getReceitas());
  $despesas = $planejamentoDao->calculaPlanejamento($planejamento->getDespesas());
  $receitasAtuais = $planejamentoDao->calculaRecebimentos($planejamento->getAno());
  $despesasAtuais = $planejamentoDao->calculaDespesasAtuais($planejamento->getAno());

?>

<link rel="stylesheet" type="text/css" href="../css/planejamento.css">
	
<?php require_once "css.php"; ?> 

<h3>Financeiro</h3>

<?php require_once "body.php";  ?>

<div class="x_title">
  <h2>Planejamento <?=$ano?><small>Este espaço é para que você faça o seu planejamento Anual</small></h2>
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

  <div class="tabbable-panel">
    <div class="tabbable-line " >
      <ul  class="nav nav-tabs ">
          <li class="active">
            <a href="#grafico_receitas" data-toggle="tab">
           Comparação entre Receitas</a>
          </li>
          <li>
            <a href="#grafico_despesas" data-toggle="tab">
           Comparação entre Despesas</a>
          </li>
      </ul>
      <div class="tab-content">
          <div class="tab-pane active"  id="grafico_receitas" >
            <canvas id="receitas" width="800" height="450"></canvas>
          </div>
          <div class="tab-pane" id="grafico_despesas" >
            <canvas id="despesas" width="800" height="450"></canvas>
          </div>
      </div>
    </div>
  </div>
			

<?php	require_once "script.php"; ?>

<script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../vendors/Chart.js/dist/Chart.min.js"></script>
<script type="text/javascript" src="../js/planejamento_graficos.js"></script>
<script>
  var receitas = <?=json_encode($receitas)?>;
  var receitasAtuais = <?=json_encode($receitasAtuais)?>;
  gerar_grafico_receitas(receitas, receitasAtuais);

  var despesas = <?=json_encode($despesas)?>;
  var despesasAtuais = <?=json_encode($despesasAtuais)?>;
  gerar_grafico_despesas(despesas, despesasAtuais);
</script>

<?php	require_once "rodape.php"; ?>

  