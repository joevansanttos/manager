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

<h3>Negócios</h3>

<?php require "../views/body.php";  ?>

<div class="x_title">
  <h2>Lista de Contratos Cadastrados</h2>
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

<table id="tabela" class="table datatable table-bordered table-striped">
  <thead>
    <tr>
    	<th>Empresa</th>
      <th>Produto</th>
    	<th>Número do Contrato</th>
      <th>Inicio</th>
      <th>Fim</th>
      <th class="col-md-2">Status do Contrato</th>				    		     
      <th class="col-md-1">Ações</th>				     
    </tr>
  </thead>
  <tbody>

    <?php
    	$contratoDao = new ContratoDao($conexao);
      if($usuario_id == 1){
        $contratos = $contratoDao->listaTodosContratos();
      }else{
         $contratos = $contratoDao->listaContratos($usuario_id);
      }
    	
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
              $button = 'primary';
              $icon = '  fa-hourglass-o ';
            }else if($contrato->getStatusContrato()->getId() == 2){
              $button = 'danger';
              $icon = ' fa-thumbs-down';
            }else{
              $button = 'success';
              $icon = ' fa-thumbs-up';
            }  
            $texto = $contrato->getStatusContrato()->getDescricao();  
          ?>
              <button style="text-transform: uppercase;" type="button" class="btn btn-<?=$button?> col-md-12 btn-xs" data-toggle="tooltip" data-placement="top" title="<?=$texto?>"><?=$texto?></button>            
          
        </td>			    		        
        <td align="center">
                     
          <a href="../imprime/imprime-contrato.php?id=<?=$contrato->getNumero()?>"><button data-toggle="tooltip" data-placement="top" title="Imprimir Contrato"  class="btn btn-success btn-xs"><i class="fa fa-print"></i></button></a>                                                          
          <a  href="../remove/remove-contrato.php?id=<?=$contrato->getNumero()?>" data-toggle="tooltip" data-placement="top" title="Remover Contrato"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
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