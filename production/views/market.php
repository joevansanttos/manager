<?php	
	require_once "cabecalho.php"; 
	require_once "../dao/MarketDao.php"; 
  require_once "../dao/LeadDao.php";
?>	

<!-- Datatables -->
<link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">



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
      $leadDao = new LeadDao($conexao);
    	$markets = $marketDao->listaMarkets($usuario_id);
      foreach ($markets as $market): 
        $leads = $leadDao->listaLeadsMarket($market->getId());
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
      <?php
        if(count($leads) > 0){
      ?>
        <a><button data-toggle="tooltip" data-placement="top" title="Lead já Adicionado" class="btn btn-warning btn-xs"><i class="fa fa-thumbs-up"></i></button></a>
      <?php
        }else{
      ?>

        <a href="../views/lead-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Lead" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button></a>

      <?php
        }
      ?>
          
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
  <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Novo Market" href="../views/market-formulario.php?"><i class="fa fa-plus"></i></a>
</div>

			
<?php	require_once "script.php"; ?>


<!-- Datatables -->
<script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../js/datatable.js"></script> 

<script type="text/javascript">
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#tabela tfoot th').each( function () {
        var title = $(this).text();
        if(title != ''){
          $(this).html( '<input class="" type="text" placeholder="'+title+'" />' );
        }
        
    } );
 
    // DataTable
    var table = $('#tabela').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>



<?php	require_once "rodape.php"; ?>