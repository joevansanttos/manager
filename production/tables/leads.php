<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "../includes/cabecalho.php"; 
	require_once "../dao/LeadDao.php";
	require_once "../dao/ClienteDao.php";
?>

<h3>Leads</h3>
<?php require "../includes/body.php";	?>
<table id="tabela" class="table datatable table-bordered table-striped">
  <thead>
    <tr>
      <th>Empresa</th>  
      <th>Nome</th>
      <th>Email</th>
      <th>Telefone</th>
      <th>Cargo</th>
      <th class="col-md-2">Ações</th>				     
    </tr>
  </thead>
  <tbody>

    <?php
    	$leadDao = new LeadDao($conexao);
    	$leads = $leadDao->listaLeads();
      foreach ($leads as $lead): 
      	$clienteDao = new ClienteDao($conexao);
      	$idCliente = $lead->getIdCliente();
      	$cliente = $clienteDao->buscaMarket($idCliente);				                                
    ?>
      <tr>
        <td><?=$cliente->getNome()?></td>
        <td><?=$lead->getNome()?></td>
        <td><?=$lead->getEmail()?></td>
        <td><?=$lead->getTel()?></td>
        <td><?=$lead->getCargo()?></td>
        <td align="center">
          <a href="../tables/suspect-formulario.php?id=<?=$cliente->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Contato" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button></a>
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