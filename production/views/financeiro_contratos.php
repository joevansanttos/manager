<?php	
	require_once "cabecalho.php"; 
	require_once "../dao/ContratoDao.php";
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
  <h2>Lista de Contratos<small>Contratos pendentes de aprovação</small></h2>
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

<?php	
	require_once "body.php"; 
?>

<table id="tabela" class="table datatable table-bordered table-striped">
  <thead>
    <tr>
    	<th>Empresa</th>
      <th>Produto</th>
    	<th style="width: 12%;">Nº Contrato</th>
      <th style="width: 12%;">Inicio</th>
      <th style="width: 12%;">Fim</th>
      <th style="width: 15%;">Ações</th>				     
    </tr>
  </thead>
  <tbody>

    <?php
    	$contratoDao = new ContratoDao($conexao);
    	$contratos = $contratoDao->listaContratosPendentes();
      foreach ($contratos as $contrato): 
      	$market = $contrato->getMarket();
    ?>
      <tr>
      	<td><?=$market->getNome()?></td>
        <td><?=$contrato->getProduto()->getNome()?></td>
        <td><?=str_pad($contrato->getNumero(), 3, '0', STR_PAD_LEFT) . '.' . $contrato->getAnoContrato()?></td>
        <td><?=$contrato->getNovoInicio()?></td>
        <td><?=$contrato->getNovoFim()?></td>
        <td align="center">
          <?php
            if($contrato->getStatusContrato()->getId() == 1){
          ?>
          <a href="../adiciona/adiciona_projeto.php?id=<?=$contrato->getNumero()?>"><button data-toggle="tooltip" data-placement="top" title="Aprovar Contrato"  class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button></a> 

          <?php
            }else{
          ?>
          <a href=""><button data-toggle="tooltip" data-placement="top" title="Contrato Aprovado"  class="btn btn-info btn-xs"><i class="fa fa-file"></i></button></a> 

          <?php
            }
          ?>                      
          <a href="../imprime/imprimir-contrato.php?id=<?=$contrato->getNumero()?>"><button data-toggle="tooltip" data-placement="top" title="Imprimir Contrato"  class="btn btn-success btn-xs"><i class="fa fa-print"></i></button></a>                                                          
          <a data-toggle="tooltip" data-placement="top" title="Remover Contrato"  href="../remove/remove-contrato.php?n_contrato="><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
        </td>
      </tr>
    <?php				
      endforeach
     ?>
  </tbody>      
</table>
<div class="ln_solid"></div>
</div>

<?php	
	require_once "script.php"; 
?>

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

<?php	
	require_once "rodape.php"; 
?>