<?php	
	require_once "cabecalho.php"; 
	require_once "../dao/MarketDao.php"; 
?>	


<?php require_once "css.php"; ?>

<h3>Market</h3>

<?php require_once "body.php";	?>


<table id="tabela" class="table table-striped table-bordered ">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Cidade</th>
      <th>Estado</th>
      <th>Bairro</th>
      <th>Segmento</th>	
      <th>Porte</th> 
      <th>Ações</th>
    </tr>
  </thead>
  <tfoot>
    <th>Nome</th>
    <th>Cidade</th>
    <th>Estado</th>
    <th>Bairro</th>
    <th>Segmento</th> 
    <th>Porte</th> 
    <th></th>
  </tfoot>
  <tbody>
    <?php
    	$marketDao = new MarketDao($conexao);
    	$markets = $marketDao->listaMarkets($usuario_id);
      foreach ($markets as $market): 
        $cidade = $marketDao->buscaCidade($market->getCidade() );                              
    ?>
      <tr>
        <td><?=$market->getNome() ?></td>
        <td><?=$cidade ?></td>
        <td><?=$market->getEstado() ?></td>
        <td><?=$market->getBairro() ?></td>
        <td><?=$market->getSegmento() ?></td>
        <td><?=$market->getPorte()->getDescricao()?></td>
        <td align="center">
          <a href="../views/lead-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Lead" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button></a>
          <a href="../views/market-profile.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Ver Market" class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
          <a href="../views/market-altera.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Altera Market" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
          <a href="../views/historico-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Adicionar Histórico" class="btn btn-info btn-xs"><i class="fa fa-history"></i></button></a>
        </td>
      </tr>
    <?php
      endforeach
    ?>
  </tbody>      
</table>
<div class="ln_solid"></div>
  <a class="btn btn-default" style="" href="../views/market-formulario.php?"><i class="fa fa-plus"></i></a>
</div>

			
<?php	require_once "script.php"; ?>

<script type="text/javascript" src="../js/datatable-filters.js"></script>

<?php	require_once "rodape.php"; ?>