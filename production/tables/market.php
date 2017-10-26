<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "../includes/cabecalho.php"; 
	require_once "../dao/ClienteDao.php"; 
?>	

<h3>Market</h3>
<?php require "../includes/body.php";	?>
<table id="tabela" class="table table-striped">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Telefone</th>
      <th>Cidade</th>
      <th>Estado</th>
      <th>Bairro</th>
      <th>Segmento</th>	
      <th class="col-md-2">Ações</th>			     
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
        <td>
          <a href="../tables/lead-formulario.php?id=<?=$cliente->getId()?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
          
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