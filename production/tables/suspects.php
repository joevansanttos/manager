<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "../includes/cabecalho.php"; 
	require_once "../dao/SuspectDao.php";
	require_once "../dao/ClienteDao.php";
?>

<h3>Suspects</h3>

<?php require "../includes/body.php";	?>

<table id="tabela" class="table datatable table-bordered table-striped">
  <thead>
    <tr>
    	<th>Empresa</th>
      <th>Contato</th>
      <th>Data</th>
      <th>Hora</th>
      <th class="col-md-2">Ações</th>				     
    </tr>
  </thead>
  <tbody>

    <?php
    	$suspectDao = new SuspectDao($conexao);
    	$suspects = $suspectDao->listaSuspects();
      foreach ($suspects as $suspect): 
      	$clienteDao = new ClienteDao($conexao);
      	$idCliente = $suspect->getIdCliente();
      	$cliente = $clienteDao->buscaMarket($idCliente);				                                
    ?>
      <tr>
      	<td><?=$cliente->getNome()?></td>
        <td><?=$suspect->getNome()?></td>
        <td><?=$suspect->getData()?></td>
        <td><?=$suspect->getHora()?></td>
        <td align="center">
          <a href="../tables/prospect-formulario.php?id=<?=$cliente->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Contato" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button></a>
          <a href="../forms/form-lead.php"><button data-toggle="tooltip" data-placement="top" title="Novo Lead" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
          <a href="../forms/form-lead.php"><button data-toggle="tooltip" data-placement="top" title="Novo Lead" class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
          
          <a href="../tables/lead-formulario.php?id=<?=$cliente->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Lead" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
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
	require_once "../includes/rodape.php"; 
?>