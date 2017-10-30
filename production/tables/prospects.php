<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "../includes/cabecalho.php"; 
	require_once "../dao/ProspectDao.php";
?>

<h3>Prospects</h3>

<?php require "../includes/body.php";	?>

<table id="tabela" class="table datatable table-bordered table-striped">
  <thead>
    <tr>
    	<th>Empresa</th>
    	<th>Probabilidade</th>
      <th>Recebimento</th>
      <th>Fechamento</th>
      <th>Valor Oportunidade</th>
      <th>Valor Estimado</th>				    		     
      <th class="col-md-2">Ações</th>				     
    </tr>
  </thead>
  <tbody>

    <?php
    	$prospectDao = new ProspectDao($conexao);
    	$prospects = $prospectDao->listaProspects($usuario_id);
      foreach ($prospects as $prospect): 
      	$market = $prospect->getMarket();
        $novoRecebimento = date("d-m-Y", strtotime($prospect->getRecebimento()));
        $novoFechamento = date("d-m-Y", strtotime($prospect->getFechamento()));                           
    ?>
      <tr>
      	<td><?=$market->getNome()?></td>
        <td><?=$prospect->getProb()?></td>
        <td><?=$novoRecebimento?></td>
        <td><?=$novoFechamento?></td>
        <td><?=$prospect->getValorOp()?></td>
        <td><?=$prospect->getValorEs()?></td>			    		        
        <td align="center">
          <a href="../tables/contrato-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Contrato" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button>
          </a>
          <a href="../tables/prospect-altera.php?id=<?=$prospect->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Altera Prospect" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
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