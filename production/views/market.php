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

<h3>Negócios</h3>

<?php require "../views/body.php";  ?>

<div class="x_title">
  <h2>Lista de Market Cadastrados</h2>
  <ul class="nav navbar-right panel_toolbox">
    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Settings 1</a>
        </li>
        <li><a href="#">Settings 2</a>
        </li>
      </ul>
    </li>
    <li><a class="close-link"><i class="fa fa-close"></i></a>
    </li>
  </ul>
  <div class="clearfix"></div>
</div>
<div class="x_content">     


<table id="tabela" class="table table-striped table-bordered ">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Cidade</th>
      <th>Estado</th>
      <th>Bairro</th>
      <th>Segmento</th>	
      <th>Porte</th> 
      <th style="width: 16%;">Ações</th>
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
      foreach ($markets as $market){ 
        $leads = $leadDao->listaLeadsMarket($market->getId());
        $cidade = $marketDao->buscaCidade($market->getCidade() );
        if(count($leads) == 0){
    ?>

        <tr>
          <td><?=$market->getNome() ?></td>
          <td><?=$cidade ?></td>
          <td><?=$market->getEstado() ?></td>
          <td><?=$market->getBairro() ?></td>
          <td><?=$market->getSegmento() ?></td>
          <td><?=$market->getPorte()->getDescricao()?></td>
          <td align="center">
            <a href="lead-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Lead" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button></a>          
            <a href="market-profile.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Ver Market" class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
            <a href="market-altera.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Altera Market" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
            <a href="historico-formulario.php?id=<?=$market->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Adicionar Histórico" class="btn btn-info btn-xs"><i class="fa fa-history"></i></button></a>
          </td>
        </tr>

    <?php
        }                              
      }
    ?>
  </tbody>      
</table>
<div class="ln_solid"></div>
  <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Novo Market" href="market-formulario.php?"><i class="fa fa-plus"></i></a>
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