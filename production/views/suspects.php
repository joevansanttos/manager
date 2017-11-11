<?php	
	require_once "cabecalho.php"; 
	require_once "../dao/SuspectDao.php";
?>

<?php require_once "css.php"; ?>  


<h3>Suspects</h3>

<?php require_once "body.php";	?>

<table id="tabela" class="table datatable table-bordered table-striped">
  <thead>
    <tr>
    	<th>Empresa</th>
      <th>Contato</th>
      <th>Data</th>
      <th>Hora</th>
      <th>Status</th>
      <th class="col-md-3">Ações</th>				     
    </tr>
  </thead>
  <tfoot>
      <th>Empresa</th>
      <th>Contato</th>
      <th>Data</th>
      <th>Hora</th>
      <th>Status</th>
      <th ></th> 
  </tfoot>
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
          <a href="../views/prospect-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Prospect" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button></a>
          <a href="../views/suspect-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Suspect" class="btn btn-info btn-xs"><i class="fa fa-plus"></i></button></a>
          <a href="../views/market-profile.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Ver Market" class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
          <a href="../views/suspect-altera.php?id=<?=$suspect->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Alterar Suspect" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
          <a href="../views/historico-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Adicionar Histórico" class="btn btn-info btn-xs"><i class="fa fa-history"></i></button></a>
          <a  href="../remove/remove-suspect.php?id=<?=$suspect->getId()?>" class="delete" data-toggle="tooltip" data-placement="top" title="Remover Suspect"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
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