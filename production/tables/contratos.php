<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "../includes/cabecalho.php"; 
	require_once "../dao/ContratoDao.php";
	require_once "../dao/ClienteDao.php";
?>

<h3>Contratos</h3>

<?php	
	require_once "../includes/body.php"; 
?>

<table id="tabela" class="table datatable table-bordered table-striped">
  <thead>
    <tr>
    	<th>Empresa</th>
    	<th>Número do Contrato</th>				    		     
      <th class="col-md-2">Ações</th>				     
    </tr>
  </thead>
  <tbody>

    <?php
    	$contratoDao = new ContratoDao($conexao);
    	$contratos = $contratoDao->listaContratos();
      foreach ($contratos as $contrato): 
      	$clienteDao = new ClienteDao($conexao);
      	$cliente = $contrato->getMarket();
    ?>
      <tr>
      	<td><?=$cliente->getNome()?></td>
        <td><?=$contrato->getNumero()?></td>			    		        
        <td align="center">
          <a href="../adiciona/adiciona-tarefa.php?id=<?=$contrato->getNumero()?>"><button data-toggle="tooltip" data-placement="top" title="Finaliza Contrato"  class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button></a>                       
          <a href="imprime-contrato.php?n_contrato=?>"><button data-toggle="tooltip" data-placement="top" title="Imprime Contrato"  class="btn btn-success btn-xs"><i class="fa fa-print"></i></button></a>                                                          
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
	require_once "../includes/script.php"; 
?>
	

<?php	
	require_once "../includes/rodape.php"; 
?>