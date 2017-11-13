<?php 
  require_once "cabecalho.php"; 
  require_once "../dao/ContratoDao.php";
  require_once "../dao/MarketDao.php"; 

?>


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
  

<?php 
  require_once "rodape.php"; 
?>