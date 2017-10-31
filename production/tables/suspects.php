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
    	$suspects = $suspectDao->listaSuspects($usuario_id);
      foreach ($suspects as $suspect): 
      	$market = $suspect->getMarket();
        $novaData = date("d-m-Y", strtotime($suspect->getData()));
    ?>
      <tr>
      	<td><?=$market->getNome()?></td>
        <td><?=$suspect->getNome()?></td>
        <td><?=$novaData?></td>
        <td><?=$suspect->getHora()?></td>
        <td><?=$suspect->getStatus()?></td>
        <td align="center">
          <a href="../tables/prospect-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Prospect" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button></a>
          <a href="../tables/market-profile.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Ver Market" class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
          <a href="../tables/suspect-altera.php?id=<?=$suspect->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Alterar Lead" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
          <a href="../tables/historico-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Adicionar Histórico" class="btn btn-info btn-xs"><i class="fa fa-history"></i></button></a>
          <a  href="../remove/remove-suspect.php?id=<?=$suspect->getId()?>" data-toggle="tooltip" data-placement="top" title="Remover Suspect"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
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