<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "../includes/cabecalho.php"; 
	require_once "../dao/ClienteDao.php"; 
?>	

<h3>Market</h3>
<?php require "../includes/body.php";	?>
<table id="tabela" class="table table-bordered table-striped ">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Telefone</th>
      <th>Cidade</th>
      <th>Estado</th>
      <th>Bairro</th>
      <th>Segmento</th>	
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    	$clienteDao = new ClienteDao($conexao);
    	$clientes = $clienteDao->listaClientes();
      foreach ($clientes as $cliente): 
        $cidade = $clienteDao->buscaCidade($cliente->getCidade() );                              
    ?>
      <tr>
        <td><?=$cliente->getNome() ?></td>
        <td><?=$cliente->getTel() ?></td>
        <td><?=$cidade ?></td>
        <td><?=$cliente->getEstado() ?></td>
        <td><?=$cliente->getBairro() ?></td>
        <td><?=$cliente->getSegmento() ?></td>
        <td align="center">
          <a href="../tables/lead-formulario.php?id=<?=$cliente->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Lead" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button></a>
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
  <a class="btn btn-default" style="" href="../tables/market-formulario.php?"><i class="fa fa-plus"></i></a>
</div>

			
<?php	require_once "../includes/script.php"; ?>
<?php	require_once "../includes/rodape.php"; ?>