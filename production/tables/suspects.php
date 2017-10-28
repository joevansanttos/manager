<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "../includes/cabecalho.php"; 
	require_once "../dao/SuspectDao.php";
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
      <th>Status</th>
      <th class="col-md-2">Ações</th>				     
    </tr>
  </thead>
  <tbody>

    <?php
    	$suspectDao = new SuspectDao($conexao);
    	$suspects = $suspectDao->listaSuspects();
      foreach ($suspects as $suspect): 
      	$market = $suspect->getMarket();
    ?>
      <tr>
      	<td><?=$market->getNome()?></td>
        <td><?=$suspect->getNome()?></td>
        <td><?=$suspect->getData()?></td>
        <td><?=$suspect->getHora()?></td>
        <td><?=$suspect->getStatus()?></td>
        <td align="center">
          <a href="../tables/prospect-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Prospect" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button></a>
          <a href="../tables/suspect-altera.php?id=<?=$suspect->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Alterar Lead" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
        </td>
      </tr>
    <?php				
      endforeach
     ?>
  </tbody>      
</table>

<?php	
	require_once "../includes/script.php";
	require_once "../includes/rodape.php"; 
?>