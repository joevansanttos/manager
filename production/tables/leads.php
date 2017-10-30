<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "../includes/cabecalho.php"; 
	require_once "../dao/LeadDao.php";
	require_once "../dao/MarketDao.php";
?>

<h3>Leads</h3>
<?php require "../includes/body.php";	?>
<table id="tabela" class="table datatable table-bordered table-striped">
  <thead>
    <tr>
      <th>Empresa</th>  
      <th>Contato</th>
      <th>Email</th>
      <th>Telefone</th>
      <th>Cargo</th>
      <th class="col-md-2">Ações</th>				     
    </tr>
  </thead>
  <tbody>

    <?php
    	$leadDao = new LeadDao($conexao);
    	$leads = $leadDao->listaLeads($usuario_id);
      foreach ($leads as $lead): 
      	$market = $lead->getMarket();
    ?>
      <tr>
        <td><?=$market->getNome()?></td>
        <td><?=$lead->getNome()?></td>
        <td><?=$lead->getEmail()?></td>
        <td><?=$lead->getTel()?></td>
        <td><?=$lead->getCargo()?></td>
        <td align="center">
          <a href="../tables/suspect-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Suspect" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button></a>
          <a href="../tables/lead-altera.php?id=<?=$lead->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Altera Lead" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
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