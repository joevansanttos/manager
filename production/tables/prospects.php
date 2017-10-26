<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "../includes/cabecalho.php"; 
	require_once "../dao/ProspectDao.php";
	require_once "../dao/ClienteDao.php";
?>

<h3>Prospects</h3>

<?php require "../includes/body.php";	?>

<table id="tabela" class="table datatable table-striped">
  <thead>
    <tr>
    	<th>Empresa</th>
    	<th>Probabilidade</th>
      <th>Valor</th>
      <th>Valor Estimado</th>				    		     
      <th class="col-md-2">Ações</th>				     
    </tr>
  </thead>
  <tbody>

    <?php
    	$prospectDao = new ProspectDao($conexao);
    	$prospects = $prospectDao->listaProspects();
      foreach ($prospects as $prospect): 
      	$clienteDao = new ClienteDao($conexao);
      	$idCliente = $prospect->getIdCliente();
      	$cliente = $clienteDao->buscaMarket($idCliente);				                                
    ?>
      <tr>
      	<td><?=$cliente->getNome()?></td>
        <td><?=$prospect->getProb()?></td>
        <td><?=$prospect->getValorOp()?></td>
        <td><?=$prospect->getValorEs()?></td>			    		        
        <td><a href="../tables/contrato-formulario.php?id=<?=$cliente->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Contato" class="btn btn-default btn-xs"><i class="fa fa-plus"></i></button></a></td>
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
	require_once "../includes/rodape.php"; 
?>