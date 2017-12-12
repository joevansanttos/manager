<?php	
	require_once "cabecalho.php";
	require_once "../dao/PlanejamentoDao.php"; 

  $planejamentoDao = new PlanejamentoDao($conexao);
  $receitas = $planejamentoDao->calculaReceitas();
  $despesas = $planejamentoDao->calculaDespesas();
?>

<!-- Datatables -->
<link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../css/planejamento.css">
	
<style type="text/css">
  td,th{
    text-align: center;
    width: 7%;
  }
  table{
    font-family: "Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif;
    font-size: 9pt;
  }
  #dre{
    width: 10%;
  }
   #total{
    width: 10%;
  }

</style>
<?php require_once "css.php"; ?> 

<h3>Financeiro</h3>

<?php require "../views/body.php";  ?>

<div class="x_title">
  <h2>Planejamento<small>Este espaço é para que você faça o seu planejamento Anual</small></h2>
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
    <div class="tabbable-line">
      <ul class="nav nav-tabs ">
          <li class="active">
            <a href="#principal" data-toggle="tab">
           Principal </a>
          </li>
          <li>
            <a href="#analise" data-toggle="tab">
            Análise</a>
          </li>
      </ul>
      <div class="tab-content">
          <div class="tab-pane active" id="principal">
            <table class="table table-responsive table-bordered" >
              <thead> 
                <tr class="bg-primary">
                  <th id="dre">DRE</th>
                  <th>Janeiro</th>
                  <th>Fevereiro</th>  
                  <th>Março</th>
                  <th>Abril</th>
                  <th>Maio</th>
                  <th>Junho</th>
                  <th>Julho</th>
                  <th>Agosto</th>
                  <th>Setembro</th>
                  <th>Outubro</th>
                  <th>Novembro</th>
                  <th>Dezembro</th>
                  <th id="total">Total</th>
                </tr>                
              </thead>
              <tbody>
                <tr>
                  <td id="dre">Receitas Operacionais</td>
                  <td><?='R$ '.number_format($receitas[1], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[2], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[3], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[4], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[5], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[6], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[7], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[8], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[9], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[10], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[11], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[12], 2, '.', '')?></td>
                  <td id="total"><?='R$ '.number_format($receitas[13], 2, '.', '')?></td>
                </tr>
                <tr>
                  <td id="dre">Despesas Diretas</td>
                  <td><?='R$ '.number_format($despesas[1], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesas[2], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesas[3], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesas[4], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesas[5], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesas[6], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesas[7], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesas[8], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesas[9], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesas[10], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesas[11], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesas[12], 2, '.', '')?></td>
                  <td id="total"><?='R$ '.number_format($despesas[13], 2, '.', '')?></td>
                </tr>
                <tr>
                  <td id="dre">Lucro ou Prejuízo</td>
                  <td><?='R$ '.number_format($receitas[1] - $despesas[1], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[2] - $despesas[2], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[3] - $despesas[3], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[4] - $despesas[4], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[5] - $despesas[5], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[6] - $despesas[6], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[7] - $despesas[7], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[8] - $despesas[8], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[9] - $despesas[9], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[10] - $despesas[10], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[11] - $despesas[11], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($receitas[12] - $despesas[12], 2, '.', '')?></td>
                  <td id="total"><?='R$ '.number_format($receitas[13] - $despesas[13], 2, '.', '')?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="tab-pane" id="analise" >
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

<?php	require_once "rodape.php"; ?>

  