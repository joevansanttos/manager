<?php	
	require_once "cabecalho.php";
	require_once "../dao/PlanejamentoDao.php"; 
  require_once "../dao/PlanejamentoReceitaDao.php"; 
  require_once "../dao/PlanejamentoDespesaDao.php"; 



  $id = $_GET['id'];
  $planejamentoDao = new PlanejamentoDao($conexao);
  $planejamento = $planejamentoDao->busca($id);
  $ano = $planejamento->getAno();
  $planejamentoReceitaDao = new PlanejamentoReceitaDao($conexao);
  $planejamentoReceitas = $planejamentoReceitaDao->lista($id);
  $planejamentoDespesaDao = new PlanejamentoDespesaDao($conexao);
  $planejamentoDespesas = $planejamentoDespesaDao->lista($id);
  $planejamentoDao = new PlanejamentoDao($conexao);
  $receitas = $planejamentoDao->calculaReceitas($id);
  $despesas = $planejamentoDao->calculaDespesas($id);
  $lucro = $planejamentoDao->calculaLucro($id);

  $recebimentos = $planejamentoDao->calculaRecebimentos($ano);
  $despesasAtuais = $planejamentoDao->calculaDespesasAtuais($ano);
  $lucroAtual = $planejamentoDao->calculaLucroAtual($ano);

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

<?php require "../views/body.php";  ?>

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
            <a href="#principal" data-toggle="tab">
           Orçamento </a>
          </li>
          <li>
            <a href="#resultado" data-toggle="tab">
           Resultado Atual</a>
          </li>
          <li>
            <a href="#grafico_receitas" data-toggle="tab">
           Comparação entre Receitas</a>
          </li>
          <li>
            <a href="#grafico_despesas" data-toggle="tab">
           Comparação entre Despesas</a>
          </li>
          <li>
            <a href="#tabela_orçamento" data-toggle="tab">
          Receitas Planejadas</a>
          </li>
          <li>
            <a href="#tabela_despesas" data-toggle="tab">
          Despesas Planejadas</a>
          </li>
      </ul>
      <div class="tab-content">
          <div class="tab-pane active" id="principal">
            <table style="table-layout: fixed;" id="orcamento" cellspacing="0" class="table  table-bordered" >
              <thead> 
                <tr class="bg-primary">
                  <th id="dre">DRE</th>
                  <th>Jan</th>
                  <th>Fev</th>  
                  <th>Mar</th>
                  <th>Abr</th>
                  <th>Mai</th>
                  <th>Jun</th>
                  <th>Jul</th>
                  <th>Ago</th>
                  <th>Set</th>
                  <th>Out</th>
                  <th>Nov</th>
                  <th>Dez</th>
                  <th class="total">Total</th>
                </tr>                
              </thead>
              <tbody>
                <tr>
                  <td id="dre">Receitas</td>
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
                  <td class="total"><?='R$ '.number_format($receitas[13], 2, '.', '')?></td>
                </tr>
                <tr>
                  <td id="dre">Despesas</td>
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
                  <td class="total"><?='R$ '.number_format($despesas[13], 2, '.', '')?></td>
                </tr>
                <tr>
                  <td id="dre">Lucro</td>
                  <td class=<?=$lucro['class'][1]?>><?='R$ '.number_format($lucro['valor'][1], 2, '.', '')?></td>
                  <td class=<?=$lucro['class'][2]?>><?='R$ '.number_format($lucro['valor'][2], 2, '.', '')?></td>
                  <td class=<?=$lucro['class'][3]?>><?='R$ '.number_format($lucro['valor'][3], 2, '.', '')?></td>
                  <td class=<?=$lucro['class'][4]?>><?='R$ '.number_format($lucro['valor'][4], 2, '.', '')?></td>
                  <td class=<?=$lucro['class'][5]?>><?='R$ '.number_format($lucro['valor'][5], 2, '.', '')?></td>
                  <td class=<?=$lucro['class'][6]?>><?='R$ '.number_format($lucro['valor'][6], 2, '.', '')?></td>
                  <td class=<?=$lucro['class'][7]?>><?='R$ '.number_format($lucro['valor'][7], 2, '.', '')?></td>
                  <td class=<?=$lucro['class'][8]?>><?='R$ '.number_format($lucro['valor'][8], 2, '.', '')?></td>
                  <td class=<?=$lucro['class'][9]?>><?='R$ '.number_format($lucro['valor'][9], 2, '.', '')?></td>
                  <td class=<?=$lucro['class'][10]?>><?='R$ '.number_format($lucro['valor'][10], 2, '.', '')?></td>
                  <td class=<?=$lucro['class'][11]?>><?='R$ '.number_format($lucro['valor'][11], 2, '.', '')?></td>
                  <td class=<?=$lucro['class'][12]?>><?='R$ '.number_format($lucro['valor'][12], 2, '.', '')?></td>
                  <td class=<?=$lucro['class'][13]?>><?='R$ '.number_format($lucro['valor'][13], 2, '.', '')?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="tab-pane" id="resultado" >
            <table style="table-layout: fixed;" id="atual" class="table  table-bordered" >
              <thead> 
                <tr class="bg-primary">
                  <th id="dre">DRE</th>
                  <th>Jan</th>
                  <th>Fev</th>  
                  <th>Mar</th>
                  <th>Abr</th>
                  <th>Mai</th>
                  <th>Jun</th>
                  <th>Jul</th>
                  <th>Ago</th>
                  <th>Set</th>
                  <th>Out</th>
                  <th>Nov</th>
                  <th>Dez</th>
                  <th class="total">Total</th>
                </tr>                
              </thead>
              <tbody>
                <tr>
                  <td id="dre">Receitas</td>
                  <td><?='R$ '.number_format($recebimentos[1], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($recebimentos[2], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($recebimentos[3], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($recebimentos[4], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($recebimentos[5], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($recebimentos[6], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($recebimentos[7], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($recebimentos[8], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($recebimentos[9], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($recebimentos[10], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($recebimentos[11], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($recebimentos[12], 2, '.', '')?></td>
                  <td class="total"><?='R$ '.number_format($recebimentos[13], 2, '.', '')?></td>
                </tr>
                <tr>
                  <td id="dre">Despesas</td>
                  <td><?='R$ '.number_format($despesasAtuais[1], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesasAtuais[2], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesasAtuais[3], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesasAtuais[4], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesasAtuais[5], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesasAtuais[6], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesasAtuais[7], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesasAtuais[8], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesasAtuais[9], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesasAtuais[10], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesasAtuais[11], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($despesasAtuais[12], 2, '.', '')?></td>
                  <td class="total"><?='R$ '.number_format($despesasAtuais[13], 2, '.', '')?></td>
                </tr>
                <tr>
                  <td id="dre">Lucro</td>
                  <td class=<?=$lucroAtual['class'][1]?>><?='R$ '.number_format($lucroAtual['valor'][1], 2, '.', '')?></td>
                  <td class=<?=$lucroAtual['class'][2]?>><?='R$ '.number_format($lucroAtual['valor'][2], 2, '.', '')?></td>
                  <td class=<?=$lucroAtual['class'][3]?>><?='R$ '.number_format($lucroAtual['valor'][3], 2, '.', '')?></td>
                  <td class=<?=$lucroAtual['class'][4]?>><?='R$ '.number_format($lucroAtual['valor'][4], 2, '.', '')?></td>
                  <td class=<?=$lucroAtual['class'][5]?>><?='R$ '.number_format($lucroAtual['valor'][5], 2, '.', '')?></td>
                  <td class=<?=$lucroAtual['class'][6]?>><?='R$ '.number_format($lucroAtual['valor'][6], 2, '.', '')?></td>
                  <td class=<?=$lucroAtual['class'][7]?>><?='R$ '.number_format($lucroAtual['valor'][7], 2, '.', '')?></td>
                  <td class=<?=$lucroAtual['class'][8]?>><?='R$ '.number_format($lucroAtual['valor'][8], 2, '.', '')?></td>
                  <td class=<?=$lucroAtual['class'][9]?>><?='R$ '.number_format($lucroAtual['valor'][9], 2, '.', '')?></td>
                  <td class=<?=$lucroAtual['class'][10]?>><?='R$ '.number_format($lucroAtual['valor'][10], 2, '.', '')?></td>
                  <td class=<?=$lucroAtual['class'][11]?>><?='R$ '.number_format($lucroAtual['valor'][11], 2, '.', '')?></td>
                  <td class=<?=$lucroAtual['class'][12]?>><?='R$ '.number_format($lucroAtual['valor'][12], 2, '.', '')?></td>
                  <td class=<?=$lucroAtual['class'][13]?>><?='R$ '.number_format($lucroAtual['valor'][13], 2, '.', '')?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="tab-pane" id="grafico_receitas" >
            <canvas id="line-chart" width="800" height="450"></canvas>
          </div>
          <div class="tab-pane" id="grafico_despesas" >
            <canvas id="despesas" width="800" height="450"></canvas>
          </div>
          <div class="tab-pane" id="tabela_orçamento" >
            <?php
            if($planejamentoReceitas != null){
            ?>

            <table id="tabela"  class="table table-bordered">
              <thead>
                <tr>
                  <th >Descrição</th>
                  <th>Cliente</th>
                  <th>Valor</th>
                  <th>Data</th>
                  <th>Categoria</th>
                  <th>Filial</th>
                  <th >Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($planejamentoReceitas as $pr) {
                ?>

                <tr>
                  <td><?=$pr->getDescricao()?></td>
                  <td><?=$pr->getMarket()->getNome()?></td>
                  <td><?=$pr->getValor()?></td>
                  <td><?=$pr->getData()?></td>
                  <td><?=$pr->getCategoria()->getDescricao()?></td>
                  <td><?=$pr->getFilial()->getNome()?></td>
                  <td align="center">
                    <a href="financeiro_plan_receita_altera.php?id=<?=$pr->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Alterar Receita" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                    <a  href="../remove/remove_plan_receita.php?id=<?=$pr->getId()?>" class="delete" data-toggle="tooltip" data-placement="top" title="Remover Receita"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                  </td>
                </tr>

                <?php
                }
                ?>
              </tbody>
            </table>

            <?php
            }
            ?>

          </div>
          <div class="tab-pane" id="tabela_despesas" >
            <?php
            if($planejamentoDespesas != null){
            ?>

            <table id="tabela"  class="table table-bordered">
              <thead>
                <tr>
                  <th >Descrição</th>
                  <th>Fornecedor</th>
                  <th>Valor</th>
                  <th>Data</th>
                  <th>Categoria</th>
                  <th>Filial</th>
                  <th >Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($planejamentoDespesas as $pd) {
                ?>

                <tr>
                  <td><?=$pd->getDescricao()?></td>
                  <td><?=$pd->getFornecedor()->getNome()?></td>
                  <td><?=$pd->getValor()?></td>
                  <td><?=$pd->getData()?></td>
                  <td><?=$pd->getCategoria()->getDescricao()?></td>
                  <td><?=$pd->getFilial()->getNome()?></td>
                  <td align="center">
                    <a href="financeiro_plan_despesa_altera.php?id=<?=$pd->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Alterar Receita" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                    <a  href="../remove/remove_plan_despesa.php?id=<?=$pd->getId()?>" class="delete" data-toggle="tooltip" data-placement="top" title="Remover Receita"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                  </td>
                </tr>

                <?php
                }
                ?>
              </tbody>
            </table>

            <?php
            }
            ?>
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
          label: "Despesa Atual",
          borderColor: "#3e95cd",
          fill: false
        }, { 
          data: [<?=$despesasAtuais[1]?>, <?=$despesasAtuais[2]?>, <?=$despesasAtuais[3]?>, <?=$despesasAtuais[4]?>, <?=$despesasAtuais[5]?>, <?=$despesasAtuais[6]?>, <?=$despesasAtuais[7]?>, <?=$despesasAtuais[8]?>, <?=$despesasAtuais[9]?>, <?=$despesasAtuais[10]?>, <?=$despesasAtuais[11]?>, <?=$despesasAtuais[12]?> ],
          label: "Despesa Planejada",
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

  