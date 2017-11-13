<?php	
	require_once "cabecalho.php"; 
	require_once "../dao/ProspectDao.php";
  require_once "../dao/ContratoDao.php";
?>

<!-- Datatables -->
<link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<?php require_once "css.php"; ?> 

<h3>Prospects</h3>

<?php require_once "body.php";	?>

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
  <tfoot>
      <th>Empresa</th>
      <th>Probabilidade</th>
      <th>Recebimento</th>
      <th>Fechamento</th>
      <th>Valor Oportunidade</th>
      <th>Valor Estimado</th>                    
      <th></th>       
  </tfoot>
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

          <?php
              $num = 0;
              $contratoDao = new ContratoDao($conexao);
              $contratos = $contratoDao->listaTodosContratos();
              foreach ($contratos as $contrato){
                $contratoMarket = $contrato->getMarket();
                if($contratoMarket == $market){
                  $num = 1;
                }
              }
              if($num == 1){
          ?>

          <?php
                }else{
          ?>

              <a href="../views/contrato-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Contrato" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button>
              </a>

          <?php
                }
          ?>


          
          <a href="../views/market-profile.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Ver Market" class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
          <a href="../views/prospect-altera.php?id=<?=$prospect->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Altera Prospect" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
          <a href="../views/historico-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Adicionar Histórico" class="btn btn-info btn-xs"><i class="fa fa-history"></i></button></a>
          <a  href="../remove/remove-prospect.php?id=<?=$prospect->getId()?>" class="delete" data-toggle="tooltip" data-placement="top" title="Remover Prospect"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
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