<?php	
	require_once "cabecalho.php";
	require_once "../dao/PlanejamentoDao.php"; 
  require_once "../dao/PlanejamentoReceitaDao.php"; 
  require_once "../dao/PlanejamentoDespesaDao.php"; 

  $id = $_GET['id'];
  $planejamentoDao = new PlanejamentoDao($conexao);
  $planejamento = $planejamentoDao->busca($id);

?>

<!-- Datatables -->
<link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../css/planejamento.css">
	
<style type="text/css">
  #orcamento tr, #orcamento th{
   width: 8%;
   text-align: center;
   font-size: 9pt;
  }

  #atual tr, #atual th {
   width: 8%;
   text-align: center;
   font-size: 9pt;
  }

</style>
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
          <div class="tab-pane active" id="principal" id="grafico_receitas" >
            <canvas id="line-chart" width="800" height="450"></canvas>
          </div>
          <div class="tab-pane" id="grafico_despesas" >
            <canvas id="despesas" width="800" height="450"></canvas>
          </div>
      </div>
    </div>
  </div>
			

<?php	require_once "script.php"; ?>

<!-- Datatables -->
<script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../js/datatable.js"></script>
<script type="text/javascript" src="../../vendors/Chart.js/dist/Chart.min.js"></script>


<script type="text/javascript">
  new Chart(document.getElementById("line-chart"), {
    type: 'line',
    data: {
      labels: ["Janeiro", "Fevereiro", "Março", "Maio", "Junho", "Julho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
      datasets: [{ 
          data: [<?=$receitas[1]?>, <?=$receitas[2]?>, <?=$receitas[3]?>, <?=$receitas[4]?>, <?=$receitas[5]?>, <?=$receitas[6]?>, <?=$receitas[7]?>, <?=$receitas[8]?>, <?=$receitas[9]?>, <?=$receitas[10]?>, <?=$receitas[11]?>, <?=$receitas[12]?> ],
          label: "Receita Atual",
          borderColor: "#3e95cd",
          fill: false
        }, { 
          data: [<?=$recebimentos[1]?>, <?=$recebimentos[2]?>, <?=$recebimentos[3]?>, <?=$recebimentos[4]?>, <?=$recebimentos[5]?>, <?=$recebimentos[6]?>, <?=$recebimentos[7]?>, <?=$recebimentos[8]?>, <?=$recebimentos[9]?>, <?=$recebimentos[10]?>, <?=$recebimentos[11]?>, <?=$recebimentos[12]?> ],
          label: "Receita Planejada",
          borderColor: "#8e5ea2",
          fill: false
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Comparação entre Receitas'
      }
    }
  });
</script>

<script type="text/javascript">
  new Chart(document.getElementById("despesas"), {
    type: 'line',
    data: {
      labels: ["Janeiro", "Fevereiro", "Março", "Maio", "Junho", "Julho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
      datasets: [{ 
          data: [<?=$despesas[1]?>, <?=$despesas[2]?>, <?=$despesas[3]?>, <?=$despesas[4]?>, <?=$despesas[5]?>, <?=$despesas[6]?>, <?=$despesas[7]?>, <?=$despesas[8]?>, <?=$despesas[9]?>, <?=$despesas[10]?>, <?=$despesas[11]?>, <?=$despesas[12]?> ],
          label: "Despesa Planejada",
          borderColor: "#3e95cd",
          fill: false
        }, { 
          data: [<?=$despesasAtuais[1]?>, <?=$despesasAtuais[2]?>, <?=$despesasAtuais[3]?>, <?=$despesasAtuais[4]?>, <?=$despesasAtuais[5]?>, <?=$despesasAtuais[6]?>, <?=$despesasAtuais[7]?>, <?=$despesasAtuais[8]?>, <?=$despesasAtuais[9]?>, <?=$despesasAtuais[10]?>, <?=$despesasAtuais[11]?>, <?=$despesasAtuais[12]?> ],
          label: "Despesa Atual",
          borderColor: "#8e5ea2",
          fill: false
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Comparação entre Despesas'
      }
    }
  });
</script>

<?php	require_once "rodape.php"; ?>

  