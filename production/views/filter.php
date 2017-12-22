<?php
require_once "conexao.php";
require_once "../dao/RecebimentoDao.php";
require_once "../dao/DespesaDao.php"; 
require_once "../dao/CustoDao.php"; 

if(isset($_POST["start"], $_POST["end"])) {

  $output .= ' 
<div class="tabbable-panel">
  <div class="tabbable-line">
  <ul id="myTab" class="nav-tabs-wrapper nav nav-tabs nav-tabs-horizontal" role="tablist">
  <li role="presentation" id="receitas" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Receitas</a>
  </li>
  <li role="presentation"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Despesas</a>
  </li>                                     
  </ul>
  <div id="myTabContent" class="tab-content">';

  $output .= '  
  <div role="tabpanel"  class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
  <table style="font-size:9.5pt;"  id="recebimento" class="table  datatable">
  <thead>
  <tr>
  <th style="width:8%;">DATA</th>
  <th>DESCRIÇÃO</th>
  <th>CENTRO DE RESULTADOS</th>
  <th>RECEBIDO DE</th>
  <th>FILIAL</th>
  <th>VALOR</th>
  <th>CATEGORIA</th>
  <th>PAGAMENTO</th>
  <th style="width:1%">PAGO?</th>
  <th style="width:11%;">AÇÕES</th>
  </tr>                                  
  </thead>
  <tbody>
  ';
  $recebimentoDao = new RecebimentoDao($conexao);
  $recebimentos = $recebimentoDao->listaNovosRecebimentos($_POST['start'], $_POST['end']);
  foreach ($recebimentos as $recebimento){
    $novaData = date("d/m/Y", strtotime($recebimento->getData()));
    if( $recebimento->getPago()->getId() == 2){
      $pago = 'times';
    }else{
      $pago = 'check';
    }
    $output .= '
    <tr>
    <td>' . $novaData . '</td>
    <td> '. $recebimento->getDescricao() .'</td>
    <td> '. str_pad($recebimento->getContrato()->getNumero(), 3, '0', STR_PAD_LEFT).'.2017' .'</td>
    <td>'. $recebimento->getContrato()->getMarket()->getNome() .'</td>
    <td> '. $recebimento->getFilial()->getNome() .'</td>
    <td> R$' . $recebimento->getValor(). '</td>
    <td> '. $recebimento->getCategoria()->getDescricao().' </td>
    <td> '. $recebimento->getPagamento()->getDescricao().' </td>
    <td> <i class="fa fa-' . $pago . '" aria-hidden="true"></i> </td>
    <td>
    <a data-toggle="tooltip" data-placement="top" title="Ver Documento do Recebimento" href="recebimento-detalhes.php?id=' .$recebimento->getId().'"><button class="btn btn-success btn-xs" ><i class="fa fa-search"></i></button></a>
    <a href="recebimento-altera.php?id=' .$recebimento->getId(). '"><button data-toggle="tooltip" data-placement="top" title="Alterar Recebimento" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
    <a  href="../remove/remove-recebimento.php?id=' .$recebimento->getId(). '" class="delete" data-toggle="tooltip" data-placement="top" title="Remover Recebimento"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
    </td>
    </tr>
    ';
  }
  $output .= '
  </tbody>
  </table>
  <div class="text-center">
  <a style="justify-content: center;" data-toggle="tooltip" data-placement="top"  class=" btn btn-primary    btn-block "  href="recebimento-formulario.php?"><strong>NOVA RECEITA</strong></a>
  </div>
  </div>'
  ;

  $output .= ' 
  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
  <table  id="despesa" class="table datatable">
  <thead>
  <tr>
  <th style="width:8%;">DATA</th>
  <th>DESCRIÇÃO</th>
  <th>CENTRO DE RESULTADOS</th>
  <th>PAGO A</th>
  <th>FILIAL</th>
  <th>VALOR</th>
  <th>CATEGORIA</th>
  <th>PAGAMENTO</th>
  <th style="width:1%">PAGO?</th>
  <th style="width:11%;">AÇÕES</th>
  </tr>                                  
  </thead>
  <tbody>
  ';  
  
  $despesaDao = new DespesaDao($conexao);
  $despesas = $despesaDao->listaNovasDespesas($_POST['start'], $_POST['end']);
  foreach ($despesas as $despesa){
    $novaData = date("d/m/Y", strtotime($despesa->getData()));
    if( $despesa->getPago()->getId() == 2){
      $pago = 'times';
    }else{
      $pago = 'check';
    }
    $output .= '
    <tr>
    <td>' . $novaData . '</td>
    <td>' .$despesa->getDescricao(). '</td>
    <td>' . str_pad($despesa->getContrato()->getNumero(), 3, '0', STR_PAD_LEFT).'.2017' . '</td>
    <td>' .$despesa->getFornecedor()->getNome(). '</td>
    <td> '. $despesa->getFilial()->getNome() .'</td>
    <td> R$' . $despesa->getValor(). '</td>
    <td>' .$despesa->getCategoria()->getDescricao(). '</td>
    <td>' .$despesa->getPagamento()->getDescricao(). '</td>
    <td class="align-center"> <i class="fa fa-' . $pago . '" aria-hidden="true"></i> </td>
    <td>
    <a href="despesa-detalhes.php?id=' .$despesa->getId(). '"><button data-toggle="tooltip" data-placement="top" title="Ver Despesa" class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
    <a href="despesa-altera.php?id=' .$despesa->getId(). '"><button data-toggle="tooltip" data-placement="top" title="Alterar Despesa" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
    <a  href="../remove/remove-despesa.php?id=' .$despesa->getId(). '" class="delete" data-toggle="tooltip" data-placement="top" title="Remover Despesa"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
    </td>
    </tr>
    ';
  }

  $output .= '
  </tbody>
  </table>
  <div class="text-center">
  <a style="justify-content: center;" data-toggle="tooltip" data-placement="top"  class=" btn btn-danger  btn-block "  href="despesa-formulario.php?"><strong>NOVA DESPESA</strong></a>
  </div>
  </div>';


  $output .= '

  </div>
  </div>
  </div>
  </div>
  ';


  echo $output;  
} 

?>
