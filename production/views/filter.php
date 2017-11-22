<?php
  require_once "conexao.php";
  require_once "../dao/RecebimentoDao.php";
  require_once "../dao/DespesaDao.php"; 

  if(isset($_POST["start"], $_POST["end"])) {

    

    $output .= ' 
      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recebimentos</a>
        </li>
        <li role="presentation"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Despesas</a>
        </li>                                      
      </ul>
      <div id="myTabContent" class="tab-content"> 
      <div role="tabpanel1"  class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
      <table id="recebimento" class="table table-striped datatable">
        <thead>
          <tr>
            <th>DATA</th>
            <th>DESCRIÇÃO</th>
            <th>RECEBIDO DE</th>
            <th>VALOR</th>
            <th>CATEGORIA</th>
            <th>PAGAMENTO</th>
            <th>PAGO?</th>
            <th>AÇÕES</th>
          </tr>                                  
        </thead>
        <tbody>
    ';
    $recebimentoDao = new RecebimentoDao($conexao);
    $recebimentos = $recebimentoDao->listaRecebimentos();
    foreach ($recebimentos as $recebimento){
      $novaData = date("d-m-Y", strtotime($recebimento->getData()));
      $output .= '
            <tr>
              <td>' . $recebimento->getData(). '</td>
              <td> '. $recebimento->getDescricao() .'</td>
              <td> '. $recebimento->getMarket()->getNome() .'</td>
              <td> '. $recebimento->getValor() .'</td>
              <td> '. $recebimento->getCategoria()->getDescricao().' </td>
              <td> '. $recebimento->getPagamento()->getDescricao().' </td>
              <td> '. $recebimento->getPago()->getDescricao() .'</td>
              <td>
                <a href="recebimento-detalhes.php?id=' .$recebimento->getId().'"><button data-toggle="tooltip" data-placement="top" title="Ver Despesa" class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
                <a href="recebimento-altera.php?id=' .$recebimento->getId(). '"><button data-toggle="tooltip" data-placement="top" title="Alterar Despesa" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                <a  href="../remove/remove-recebimento.php?id=' .$recebimento->getId(). '" class="delete" data-toggle="tooltip" data-placement="top" title="Remover Despesa"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
              </td>
            </tr>
      ';
    }
    $output .= '
          </tbody>
        </table>
        <div class="text-center">
          <a style="justify-content: center;" data-toggle="tooltip" data-placement="top"  class=" btn btn-primary  btn-round  btn-block "  href="recebimento-formulario.php?"><strong>NOVO RECEBIMENTO</strong></a>
        </div>
      </div>


     <div role="tabpanel2" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
       <table id="despesa" class="table table-striped datatable">
         <thead>
           <tr>
             <th>DATA</th>
             <th>DESCRIÇÃO</th>
             <th>RECEBIDO DE</th>
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
                  <td>' .$despesa->getData(). '</td>
                  <td>' .$despesa->getDescricao(). '</td>
                  <td>' .$despesa->getFornecedor()->getNome(). '</td>
                  <td> R$' . $despesa->getValor(). '</td>
                  <td>' .$despesa->getCategoria()->getDescricao(). '</td>
                  <td>' .$despesa->getPagamento()->getDescricao(). '</td>
                  <td>' .$despesa->getPago()->getDescricao().' </td>
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
              <a style="justify-content: center;" data-toggle="tooltip" data-placement="top"  class=" btn btn-danger  btn-round  btn-block "  href="despesa-formulario.php?"><strong>NOVA DESPESA</strong></a>
            </div>
          </div>                           
        </div>
      </div>
     ';
          
      
    echo $output;  
  } 

 ?>
