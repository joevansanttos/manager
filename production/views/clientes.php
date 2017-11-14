<?php 
  require_once "cabecalho.php"; 
  require_once "../dao/ContratoDao.php";
  require_once "../dao/MarketDao.php"; 

?>

<!-- Datatables -->
<link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<?php 
  require_once "css.php"; 
?>


<h3>Clientes</h3>

<?php 
  require_once "body.php"; 
?>

<table id="tabela" class="table datatable table-bordered table-striped">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Cidade</th>
      <th>Estado</th>
      <th>Bairro</th>
      <th>Segmento</th> 
      <th>Porte</th> 
    </tr>
  </thead>
  <tbody>

    <?php
      $contratoDao = new ContratoDao($conexao);
      $marketDao = new MarketDao($conexao);
      $contratos = $contratoDao->listaContratosAprovados();
      foreach ($contratos as $contrato): 
        $market = $contrato->getMarket();
        $cidade = $marketDao->buscaCidade($market->getCidade() );   
        $novoInicio = date("d-m-Y", strtotime($contrato->getInicio()));
        $novoFim = date("d-m-Y", strtotime($contrato->getFim()));
    ?>
      <tr>
        <td><?=$market->getNome() ?></td>
        <td><?=$cidade ?></td>
        <td><?=$market->getEstado() ?></td>
        <td><?=$market->getBairro() ?></td>
        <td><?=$market->getSegmento() ?></td>
        <td><?=$market->getPorte()->getDescricao()?></td>
      </tr>
    <?php       
      endforeach
     ?>
  </tbody>      
</table>
<div class="ln_solid"></div>
</div>

<?php 
  require_once "script.php"; 
?>
 
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

<?php 
  require_once "rodape.php"; 
?>