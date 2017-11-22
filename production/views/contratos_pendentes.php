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


<h3>Contratos Pendentes</h3>

<?php	
	require_once "body.php"; 
?>

<table id="tabela" class="table datatable table-bordered table-striped">
  <thead>
    <tr>
    	<th>Empresa</th>
      <th>Produto</th>
    	<th>Número do Contrato</th>
      <th>Inicio</th>
      <th>Fim</th>
      <th class="col-md-2">Ações</th>				     
    </tr>
  </thead>
  <tbody>

    <?php
    	$contratoDao = new ContratoDao($conexao);
    	$contratos = $contratoDao->listaContratosPendentes();
      foreach ($contratos as $contrato): 
      	$market = $contrato->getMarket();
        $novoInicio = date("d-m-Y", strtotime($contrato->getInicio()));
        $novoFim = date("d-m-Y", strtotime($contrato->getFim()));
    ?>
      <tr>
      	<td><?=$market->getNome()?></td>
        <td><?=$contrato->getProduto()->getNome()?></td>
        <td><?=str_pad($contrato->getNumero(), 3, '0', STR_PAD_LEFT).'.2017'?></td>
        <td><?=$novoInicio?></td>
        <td><?=$novoFim?></td>
        <td align="center">
          <?php
            if($contrato->getStatusContrato()->getId() == 1){
          ?>
          <a href="../adiciona/adiciona-tarefa.php?id=<?=$contrato->getNumero()?>"><button data-toggle="tooltip" data-placement="top" title="Aprovar Contrato"  class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button></a> 

          <?php
            }else{
          ?>
          <a href=""><button data-toggle="tooltip" data-placement="top" title="Contrato Aprovado"  class="btn btn-info btn-xs"><i class="fa fa-file"></i></button></a> 

          <?php
            }
          ?>                      
          <a href="../imprime/imprime-contrato.php?id=<?=$contrato->getNumero()?>"><button data-toggle="tooltip" data-placement="top" title="Imprime Contrato"  class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>                                                          
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