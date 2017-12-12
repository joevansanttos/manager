<?php
require_once "conexao.php";
require_once "../dao/RecebimentoDao.php";
require_once "../dao/DespesaDao.php"; 
require_once "../dao/CustoDao.php"; 

if(isset($_POST["start"], $_POST["end"])) {

  $output .= ' 
  <ul id="myTab" class="nav-tabs-wrapper nav nav-tabs nav-tabs-horizontal" role="tablist">
  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recebimentos</a>
  </li>
  <li role="presentation"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Despesas</a>
  </li>   
  <li role="presentation"><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Colaboradores</a>
  </li>                                    
  </ul>
  <br>
  <div id="myTabContent" class="tab-content">';

  $output .= '  
  <div role="tabpanel"  class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
  <table id="recebimento" class="table  datatable">
  <thead>
  <tr>
  <th>DATA</th>
  <th>DESCRIÇÃO</th>
  <th>RECEBIDO DE</th>
  <th>FILIAL</th>
  <th>VALOR</th>
  <th>CATEGORIA</th>
  <th>PAGAMENTO</th>
  <th>PAGO?</th>
  <th style="width:11%;">AÇÕES</th>
  </tr>                                  
  </thead>
  <tbody>
  ';
  $recebimentoDao = new RecebimentoDao($conexao);
  $recebimentos = $recebimentoDao->listaNovosRecebimentos($_POST['start'], $_POST['end']);
  foreach ($recebimentos as $recebimento){
    $novaData = date("d-m-Y", strtotime($recebimento->getData()));
    if( $recebimento->getPago()->getId() == 2){
      $pago = 'times';
    }else{
      $pago = 'check';
    }
    $output .= '
    <tr>
    <td>' . $novaData . '</td>
    <td> '. $recebimento->getDescricao() .'</td>
    <td> '. $recebimento->getMarket()->getNome() .'</td>
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
  <a style="justify-content: center;" data-toggle="tooltip" data-placement="top"  class=" btn btn-primary    btn-block "  href="recebimento-formulario.php?"><strong>NOVO RECEBIMENTO</strong></a>
  </div>
  </div>'
  ;

  $output .= ' 
  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
  <table id="despesa" class="table datatable">
  <thead>
  <tr>
  <th>DATA</th>
  <th>DESCRIÇÃO</th>
  <th>RECEBIDO DE</th>
  <th>FILIAL</th>
  <th>VALOR</th>
  <th>CATEGORIA</th>
  <th>PAGAMENTO</th>
  <th>PAGO?</th>
  <th style="width:11%;">AÇÕES</th>
  </tr>                                  
  </thead>
  <tbody>
  ';  
  
  $despesaDao = new DespesaDao($conexao);
  $despesas = $despesaDao->listaNovasDespesas($_POST['start'], $_POST['end']);
  foreach ($despesas as $despesa){
    $novaData = date("d-m-Y", strtotime($despesa->getData()));
    if( $despesa->getPago()->getId() == 2){
      $pago = 'times';
    }else{
      $pago = 'check';
    }
    $output .= '
    <tr>
    <td>' . $novaData . '</td>
    <td>' .$despesa->getDescricao(). '</td>
    <td>' .$despesa->getFornecedor()->getNome(). '</td>
    <td> '. $despesa->getFilial()->getNome() .'</td>
    <td> R$' . $despesa->getValor(). '</td>
    <td>' .$despesa->getCategoria()->getDescricao(). '</td>
    <td>' .$despesa->getPagamento()->getDescricao(). '</td>
    <td> <i class="fa fa-' . $pago . '" aria-hidden="true"></i> </td>
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
  <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
  <table id="despesa" class="table datatable">
  <thead>
  <tr>
  <th>DATA</th>
  <th>DESCRIÇÃO</th>
  <th>DESPESA DE</th>
  <th>FILIAL</th>
  <th>VALOR</th>
  <th>CATEGORIA</th>
  <th>PAGAMENTO</th>
  <th>PAGO?</th>
  <th style="width:11%;">AÇÕES</th>
  </tr>                                  
  </thead>
  <tbody>
  ';  

  $custoDao = new CustoDao($conexao);
  $custos = $custoDao->listaNovosCustos($_POST['start'], $_POST['end']);
  foreach ($custos as $custo){
    $novaData = date("d-m-Y", strtotime($custo->getData()));
    if( $custo->getPago()->getId() == 2){
      $pago = 'times';
    }else{
      $pago = 'check';
    }
    $output .= '
    <tr>
    <td>' . $novaData . '</td>
    <td>' .$custo->getDescricao(). '</td>
    <td>' .$custo->getUsuario()->getNome(). '</td>
    <td>' .$custo->getFilial()->getNome(). '</td>
    <td> R$' . $custo->getValor(). '</td>
    <td>' .$custo->getCategoria()->getDescricao(). '</td>
    <td>' .$custo->getPagamento()->getDescricao(). '</td>
    <td> <i class="fa fa-' . $pago . '" aria-hidden="true"></i> </td>
    <td>
    <a href="custo-detalhes.php?id=' .$custo->getId(). '"><button data-toggle="tooltip" data-placement="top" title="Ver Despesa" class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
    <a href="financeiro_custo_altera.php?id=' .$custo->getId(). '"><button data-toggle="tooltip" data-placement="top" title="Alterar Despesa" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
    <a  href="../remove/remove-custo.php?id=' .$custo->getId(). '" class="delete" data-toggle="tooltip" data-placement="top" title="Remover Despesa"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
    </td>
    </tr>
    ';
  }

  $output .= '
  </tbody>
  </table>
  <div class="text-center">
  <a style="justify-content: center;" data-toggle="tooltip" data-placement="top"  class=" btn btn-warning btn-block "  href="financeiro_custo_form.php?"><strong>NOVA DESPESA DE COLABORADOR</strong></a>
  </div>
  </div>';



  $output .= '
  </div>
  </div>
  ';


  echo $output;  
} 

?>
