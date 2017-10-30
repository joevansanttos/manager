<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "../includes/cabecalho.php"; 
	require_once "../dao/MarketDao.php"; 
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
      <th>Porte</th> 
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    	$marketDao = new MarketDao($conexao);
    	$markets = $marketDao->listaMarkets($usuario_id);
      foreach ($markets as $market): 
        $cidade = $marketDao->buscaCidade($market->getCidade() );                              
    ?>
      <tr>
        <td><?=$market->getNome() ?></td>
        <td><?=$market->getTel() ?></td>
        <td><?=$cidade ?></td>
        <td><?=$market->getEstado() ?></td>
        <td><?=$market->getBairro() ?></td>
        <td><?=$market->getSegmento() ?></td>
        <td><?=$market->getPorte()->getDescricao()?></td>
        <td align="center">
          <a href="../tables/lead-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Lead" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button></a>
          <a href="../tables/market-profile.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Ver Market" class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
          <a href="../tables/market-altera.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Altera Market" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
          <a href="../tables/historico-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Adicionar Histórico" class="btn btn-info btn-xs"><i class="fa fa-history"></i></button></a>
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