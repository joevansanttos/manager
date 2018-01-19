<?php	
	require_once "cabecalho.php";
	require_once "../dao/PlanejamentoDao.php"; 

  $id = $_GET['id'];
  $planejamentoDao = new PlanejamentoDao($conexao);
  $planejamento = $planejamentoDao->busca($id);
  $receitas = $planejamentoDao->calculaPlanejamento($planejamento->getReceitas());
  $despesas = $planejamentoDao->calculaPlanejamento($planejamento->getDespesas());
  $lucro = $planejamentoDao->calculaLucro($receitas, $despesas);

  $recebimentos = $planejamentoDao->calculaRecebimentos($planejamento->getAno());
  $despesasAtuais = $planejamentoDao->calculaDespesasAtuais($planejamento->getAno());
  $lucroAtual = $planejamentoDao->calculaLucroAtual($planejamento->getAno());

  $arrayDespesas = $planejamentoDao->geraArrayDespesas($planejamento->getDespesas());

?>

<!-- Datatables -->
<link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<link href="../css/financeiro_planejamento.css" rel="stylesheet">

	
<?php require_once "css.php"; ?> 

<h3>Financeiro</h3>

<?php require "../views/body.php";  ?>

<div class="x_title">
  <h2>Planejamento <?=$planejamento->getAno()?><small>Este espaço é para que você faça o seu planejamento Anual</small></h2>
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
            <a href="#detalhada" data-toggle="tab">
           Tabela Detalhada</a>
          </li>
      </ul>
      <div class="tab-content">
          <div class="tab-pane active horizontal" id="principal">
            <table  id="orcamento" class="table" >
              <thead> 
                <tr class="bg-primary">
                  <th class="dre" id="dre">DRL</th>
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
                  <td class="dre" bgcolor="#27ae60">Receitas</td>
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
                  <td class="dre" bgcolor="#27ae60" >Despesas</td>
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
                  <td class="dre" bgcolor="#27ae60" >Lucro</td>
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
            <table  id="atual" class="table" >
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
                  <td bgcolor="#27ae60" class="dre">Receitas</td>
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
                  <td bgcolor="#27ae60" class="dre">Despesas</td>
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
                  <td bgcolor="#27ae60" class="dre">Lucro</td>
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
          <div class="tab-pane horizontal" id="detalhada" >
            <table  class="table" >
              <thead> 
                <tr class="bg-primary">
                  <th class="dre" id="dre">Despesas</th>
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
                  <td class="dre" bgcolor="#27ae60">Despesas Administrativas</td>
                  <td><?='R$ '.number_format($arrayDespesas[3][1], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[3][2], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[3][3], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[3][4], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[3][5], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[3][6], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[3][7], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[3][8], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[3][9], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[3][10], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[3][11], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[3][12], 2, '.', '')?></td>
                  <td class="total"><?='R$ '.number_format($arrayDespesas[3][13], 2, '.', '')?></td>
                </tr>
                <tr>
                  <td class="dre" bgcolor="#27ae60">Despesas com Impostos</td>
                  <td><?='R$ '.number_format($arrayDespesas[4][1], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[4][2], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[4][3], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[4][4], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[4][5], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[4][6], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[4][7], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[4][8], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[4][9], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[4][10], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[4][11], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[4][12], 2, '.', '')?></td>
                  <td class="total"><?='R$ '.number_format($arrayDespesas[4][13], 2, '.', '')?></td>
                </tr>
                <tr>
                  <td class="dre" bgcolor="#27ae60">Despesas com RH</td>
                  <td><?='R$ '.number_format($arrayDespesas[5][1], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[5][2], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[5][3], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[5][4], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[5][5], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[5][6], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[5][7], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[5][8], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[5][9], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[5][10], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[5][11], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[5][12], 2, '.', '')?></td>
                  <td class="total"><?='R$ '.number_format($arrayDespesas[5][13], 2, '.', '')?></td>
                </tr>
                <tr>
                  <td class="dre" bgcolor="#27ae60">Despesas Financeiras</td>
                  <td><?='R$ '.number_format($arrayDespesas[6][1], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[6][2], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[6][3], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[6][4], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[6][5], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[6][6], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[6][7], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[6][8], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[6][9], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[6][10], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[6][11], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[6][12], 2, '.', '')?></td>
                  <td class="total"><?='R$ '.number_format($arrayDespesas[6][13], 2, '.', '')?></td>
                </tr>
                <tr>
                  <td class="dre" bgcolor="#27ae60">Inadiplência</td>
                  <td><?='R$ '.number_format($arrayDespesas[7][1], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[7][2], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[7][3], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[7][4], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[7][5], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[7][6], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[7][7], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[7][8], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[7][9], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[7][10], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[7][11], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[7][12], 2, '.', '')?></td>
                  <td class="total"><?='R$ '.number_format($arrayDespesas[7][13], 2, '.', '')?></td>
                </tr>
                <tr>
                  <td class="dre" bgcolor="#27ae60">Despesas com Vendas</td>
                  <td><?='R$ '.number_format($arrayDespesas[8][1], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[8][2], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[8][3], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[8][4], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[8][5], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[8][6], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[8][7], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[8][8], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[8][9], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[8][10], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[8][11], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[8][12], 2, '.', '')?></td>
                  <td class="total"><?='R$ '.number_format($arrayDespesas[8][13], 2, '.', '')?></td>
                </tr>
                <tr>
                  <td class="dre" bgcolor="#27ae60">Despesas com Marketing</td>
                  <td><?='R$ '.number_format($arrayDespesas[9][1], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[9][2], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[9][3], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[9][4], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[9][5], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[9][6], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[9][7], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[9][8], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[9][9], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[9][10], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[9][11], 2, '.', '')?></td>
                  <td><?='R$ '.number_format($arrayDespesas[9][12], 2, '.', '')?></td>
                  <td class="total"><?='R$ '.number_format($arrayDespesas[9][13], 2, '.', '')?></td>
                </tr>
                <tr>
                  <td class="dre" bgcolor="#27ae60" >Subtotal</td>
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
              </tbody>
            </table>
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

  