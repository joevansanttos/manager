<?php	
	require_once "cabecalho.php";
	require_once "../dao/PlanejamentoDao.php"; 

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
            <a href="#receitas" data-toggle="tab">
           Receitas</a>
          </li>
          <li>
            <a href="#despesas" data-toggle="tab">
           Despesas</a>
          </li>
      </ul>
      <div class="tab-content">
          <div class="tab-pane active horizontal" id="receitas">
            <br>
            <table id="tabela" class="table table-bordered">
              <thead>
                <tr>
                  <th>Cliente</th>
                  <th>Data</th>
                  <th>Descrição</th>
                  <th>Valor</th>
                  <th>Categoria</th>
                  <th>Filial</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($planejamento->getReceitas() as  $r) {
                ?>
                    <tr>
                      <td><?=$r->getMarket()->getNome()?></td>
                      <td><?=$r->getNovaData()?></td>
                      <td><?=$r->getDescricao()?></td>
                      <td><?=$r->getValorConvertido()?></td>
                      <td><?=$r->getCategoria()->getDescricao()?></td>
                      <td><?=$r->getFilial()->getNome()?></td>
                      <td align="center">
                        <a href="financeiro_plan_receita_altera.php?id=<?=$r->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Alterar RDespesa" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                        <a  href="../remove/remove_plan_receita.php?id=<?=$r->getId()?>" class="delete" data-toggle="tooltip" data-placement="top" title="Remover Receita"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                      </td>
                      
                    </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
          <div class="tab-pane" id="despesas" >
            <br>
            <table id="tabela2" class="table table-bordered">
              <thead>
                <tr>
                  <th>Cliente</th>
                  <th>Data</th>
                  <th>Descrição</th>
                  <th>Valor</th>
                  <th>Categoria</th>
                  <th>Filial</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($planejamento->getDespesas() as  $d) {
                ?>
                    <tr>
                      <td><?=$d->getFornecedor()->getNome()?></td>
                      <td><?=$d->getNovaData()?></td>
                      <td><?=$d->getDescricao()?></td>
                      <td><?=$d->getValorConvertido()?></td>
                      <td><?=$d->getCategoria()->getDescricao()?></td>
                      <td><?=$d->getFilial()->getNome()?></td>
                      <td align="center">
                        <a href="financeiro_plan_despesa_altera.php?id=<?=$d->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Alterar Despesa" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                        <a  href="../remove/remove_plan_despesa.php?id=<?=$d->getId()?>" class="delete" data-toggle="tooltip" data-placement="top" title="Remover Despesa"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                      </td>
                      
                      
                    </tr>
                <?php
                  }
                ?>
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
<script src="../js/datatable2.js"></script>

<?php	require_once "rodape.php"; ?>

  