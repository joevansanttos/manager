<?php	
	require_once "cabecalho.php"; 
	require_once "../dao/LeadDao.php";
	require_once "../dao/MarketDao.php";
?>

<?php require_once "css.php"; ?>

<h3>Leads</h3>

<?php require_once "body.php";	?>

<table id="tabela" class="table datatable table-bordered table-striped">
  <thead>
    <tr>
      <th>Empresa</th>  
      <th>Contato</th>
      <th>Email</th>
      <th>Telefone</th>
      <th>Cargo</th>
      <th class="col-md-3">Ações</th>				     
    </tr>
  </thead>
  <tfoot>
    <th>Empresa</th>  
    <th>Contato</th>
    <th>Email</th>
    <th>Telefone</th>
    <th>Cargo</th>
    <th ></th> 
  </tfoot>
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
        <td align="center" >
          <a href="../views/suspect-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Suspect" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button></a>
          <a href="../views/lead-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Lead" class="btn btn-info btn-xs"><i class="fa fa-plus"></i></button></a>
          <a href="../views/market-profile.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Ver Market" class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
          <a href="../views/lead-altera.php?id=<?=$lead->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Altera Lead" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
          <a href="../views/historico-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Adicionar Histórico" class="btn btn-info btn-xs"><i class="fa fa-history"></i></button></a>
          <a  href="../remove/remove-lead.php?id=<?=$lead->getId()?>" class="delete" data-toggle="tooltip" data-placement="top" title="Remover Lead"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
          
        </td>
      </tr>
    <?php				
      endforeach
     ?>
  </tbody>      
</table>

	

<?php	
  require_once "script.php";
?>

<script type="text/javascript" src="../js/datatable-filters.js"></script>



<?php
	require_once "rodape.php"; 
?>