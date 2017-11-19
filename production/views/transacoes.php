<?php	
	require_once "cabecalho.php"; 
	require_once "../dao/RecebimentoDao.php";
  require_once "../dao/DespesaDao.php";
?>

<link src="../../vendors/bootstrap-daterangepicker/daterangepicker.css"></link>



<?php require_once "css.php"; ?> 

<h3>Transações</h3>

<?php require_once "body.php";	?>

<div class="col-md-4">
  <div id="reportrange_right" class="pull-left" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
    <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
  </div>
</div>
<div class="clearfix"></div>
<div class="" role="tabpanel" data-example-id="togglable-tabs">
  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recebimentos</a>
    </li>
    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Despesas</a>
    </li>                                      
  </ul>
  <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
      <table id="tabela" class="table table-striped datatable">
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
          <?php 
            $recebimentoDao = new RecebimentoDao($conexao);
            $recebimentos = $recebimentoDao->listaRecebimentos();
            foreach ($recebimentos as $recebimento): 
              $novaData = date("d-m-Y", strtotime($recebimento->getData()));
          ?>
          <tr>
            <td><?=$novaData?></td>
            <td><?=$recebimento->getDescricao()?></td>
            <td><?=$recebimento->getMarket()->getNome()?></td>
            <td><?=$recebimento->getValor()?></td>
            <td><?=$recebimento->getCategoria()->getDescricao()?></td>
            <td><?=$recebimento->getPagamento()->getDescricao()?></td>
            <td>
             <?=$recebimento->getPago()->getDescricao()?>
            </td>
            <td>
              <a href="../views/recebimento-detalhes.php?id=<?=$recebimento->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Ver Recebimento" class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
              <a href="../views/recebimento-altera.php?id=<?=$recebimento->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Alterar Recebimento" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
              <a  href="../remove/remove-recebimento.php?id=<?=$recebimento->getId()?>" class="delete" data-toggle="tooltip" data-placement="top" title="Remover Recebimento"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
            </td>
          </tr>
        <?php endforeach ?>
        </tbody>
      </table>
      <div class="text-center">
        <a style="justify-content: center;" data-toggle="tooltip" data-placement="top"  class=" btn btn-primary  btn-round  btn-block "  href="../views/recebimento-formulario.php?"><strong>NOVO RECEBIMENTO</strong></a>
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
            <th>AÇÕES</th>
          </tr>                                  
        </thead>
        <tbody>
          <?php 
            $despesaDao = new DespesaDao($conexao);
            $despesas = $despesaDao->listaDespesas();
            foreach ($despesas as $despesa):
              $novaData = date("d-m-Y", strtotime($despesa->getData()));
          ?>
          <tr>
            <td><?=$novaData?></td>
            <td><?=$despesa->getDescricao()?></td>
            <td><?=$despesa->getFornecedor()->getNome()?></td>
            <td><?='R$' . $despesa->getValor()?></td>
            <td><?=$despesa->getCategoria()->getDescricao()?></td>
            <td><?=$despesa->getPagamento()->getDescricao()?></td>
            <td>
             <?=$despesa->getPago()->getDescricao()?>
            </td>
            <td>
              <a href="../views/despesa-detalhes.php?id=<?=$despesa->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Ver Despesa" class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
              <a href="../views/despesa-altera.php?id=<?=$despesa->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Alterar Despesa" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
              <a  href="../remove/remove-despesa.php?id=<?=$despesa->getId()?>" class="delete" data-toggle="tooltip" data-placement="top" title="Remover Despesa"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
            </td>
          </tr>
          <?php
            endforeach
          ?>
        </tbody>
      </table>
      <div class="text-center">
        <a style="justify-content: center;" data-toggle="tooltip" data-placement="top"  class=" btn btn-danger  btn-round  btn-block "  href="../views/despesa-formulario.php?"><strong>NOVA DESPESA</strong></a>
      </div>
    </div>                           
  </div>
</div>        
	

<?php	
	require_once "script.php"; 
?>

<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript">
$('#myDatepicker').datetimepicker();
</script>



<?php
	require_once "rodape.php"; 
?>