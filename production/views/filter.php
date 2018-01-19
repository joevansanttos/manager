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

        <div role="tabpanel"  class="tab-pane fade active in horizontal" id="tab_content1" aria-labelledby="home-tab">
          <table  id="recebimento" class="table table-bordered">
            <thead>
              <tr>
                <th>DATA</th>
                <th>DESCRIÇÃO</th>
                <th>CENTRO DE RESULTADOS</th>
                <th>RECEBIDO DE</th>
                <th>FILIAL</th>
                <th>VALOR</th>
                <th>CATEGORIA</th>
                <th>PAGAMENTO</th>
                <th >PAGO?</th>
                <th>AÇÕES</th>
              </tr>                                  
            </thead>
          <tbody>
                    ';
  $recebimentoDao = new RecebimentoDao($conexao);
  $recebimentos = $recebimentoDao->listaNovosRecebimentos($_POST['start'], $_POST['end']);
  foreach ($recebimentos as $recebimento){
          $output .= '
            <tr>
            <td>' . $recebimento->getNovaData() . '</td>
            <td> '. $recebimento->getDescricao() .'</td>
            <td> '. $recebimento->getContrato()->getNumeroConvertido() . '.' . $recebimento->getAno() .'</td>
            <td>'. $recebimento->getContrato()->getMarket()->getNome() .'</td>
            <td> '. $recebimento->getFilial()->getNome() .'</td>
            <td> ' . $recebimento->getValorConvertido(). '</td>
            <td> '. $recebimento->getCategoria()->getDescricao().' </td>
            <td> '. $recebimento->getPagamento()->getDescricao().' </td>
            <td> <i class="fa fa-' . $recebimento->getPagoSimbolo() . '" aria-hidden="true"></i> </td>
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
        
      </div>'
              ;

$output .= ' 
  <div role="tabpanel" class="tab-pane fade horizontal" id="tab_content2" aria-labelledby="profile-tab">
    <table id="tabela" class="table datatable table-bordered">
      <thead>
        <tr>
          <th>DATA</th>
          <th>DESCRIÇÃO</th>
          <th>CENTRO</th>
          <th>PAGO A</th>
          <th>FILIAL</th>
          <th>VALOR</th>
          <th>CATEGORIA</th>
          <th>PAGAMENTO</th>
          <th>PAGO?</th>
          <th>AÇÕES</th>
        </tr>                                  
      </thead>
      <tbody>
            ';  
  
        $despesaDao = new DespesaDao($conexao);
        $despesas = $despesaDao->listaNovasDespesas($_POST['start'], $_POST['end']);
        foreach ($despesas as $despesa){
          $output .= '
            <tr>
            <td>' . $despesa->getNovaData() . '</td>
            <td>' . $despesa->getDescricao(). '</td>
            <td>' . $despesa->getContrato()->getNumeroConvertido() . "." . $despesa->getAno() . '</td>
            <td>' .$despesa->getFornecedor()->getNome(). '</td>
            <td> '. $despesa->getFilial()->getNome() .'</td>
            <td> ' . $despesa->getValorConvertido(). '</td>
            <td>' .$despesa->getCategoria()->getDescricao(). '</td>
            <td>' .$despesa->getPagamento()->getDescricao(). '</td>
            <td class="align-center"> <i class="fa fa-' . $despesa->getPagoSimbolo() . '" aria-hidden="true"></i> </td>
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
  </div>
          ';


  $output .= '

  </div>
  </div>
  </div>
  </div>
  ';


  echo $output;  
} 

?>
