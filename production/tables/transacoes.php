<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "../includes/cabecalho.php"; 
	require_once "../dao/RecebimentoDao.php";
  require_once "../dao/DespesaDao.php";
?>

<h3>Transações</h3>

<?php require "../includes/body.php";	?>

<div class="" role="tabpanel" data-example-id="togglable-tabs">
  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recebimentos</a>
    </li>
    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Despesas</a>
    </li>                           
  </ul>
  <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
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
          </tr>                                  
        </thead>
        <tbody>
          <?php 
            $recebimentoDao = new RecebimentoDao($conexao);
            $recebimentos = $recebimentoDao->listaRecebimentos();
            foreach ($recebimentos as $recebimento): 
              
          ?>
          <tr>
            <td><?=$recebimento->getData()?></td>
            <td><?=$recebimento->getDescricao()?></td>
            <td><?=$recebimento->getMarket()->getNome()?></td>
            <td><?=$recebimento->getValor()?></td>
            <td><?=$recebimento->getCategoria()->getDescricao()?></td>
            <td><?=$recebimento->getPagamento()->getDescricao()?></td>
            <td>
             <input id="pago" type="checkbox" class="" /> Pago
            </td>
          </tr>
        <?php endforeach ?>
        </tbody>
      </table>
      <div class="text-center">
        <a style="justify-content: center;" data-toggle="tooltip" data-placement="top"  class=" btn btn-primary  btn-round  btn-block "  href="../tables/recebimento-formulario.php?">+ Adicionar recebimento</a>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
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
          </tr>                                  
        </thead>
        <tbody>
          <?php 
            $despesaDao = new DespesaDao($conexao);
            $despesas = $despesaDao->listaDespesas();
            foreach ($despesas as $despesa):
          ?>
          <tr>
            <td><?=$despesa->getData()?></td>
            <td><?=$despesa->getDescricao()?></td>
            <td><?=$despesa->getFornecedor()?></td>
            <td><?=$despesa->getValor()?></td>
            <td><?=$despesa->getCategoria()->getDescricao()?></td>
            <td><?=$despesa->getPagamento()->getDescricao()?></td>
            <td>
             <input id="pago" type="checkbox" class="" /> Pago
            </td>
          </tr>
          <?php
            endforeach
          ?>
        </tbody>
      </table>
      <div class="text-center">
        <a style="justify-content: center;" data-toggle="tooltip" data-placement="top"  class=" btn btn-danger  btn-round  btn-block "  href="../tables/despesa-formulario.php?">+ Adicionar despesa</a>
      </div>
    </div>                           
  </div>
</div>        
	

<?php	
	require_once "../includes/script.php"; 
	require_once "../includes/rodape.php"; 
?>