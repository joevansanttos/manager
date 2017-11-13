<?php	
	require_once "cabecalho.php"; 
  require_once '../dao/RecebimentoDao.php';
  $id = $_GET['id'];
  $recebimentoDao = new RecebimentoDao($conexao);
  $recebimento = $recebimentoDao->buscaRecebimento($id);
?>

<?php require_once "css.php"; ?> 

<h3>Detalhes do Recebimento</h3>

<?php require_once "body.php";	?>

<div class="wrapper row">
  <div class="preview col-md-8">
    <div class="preview-pic tab-content">
      <div class="tab-pane active" id="pic-1">
        <img class="col-md-12" src="<?='../' . $recebimento->getImage()?>"/>
      </div>
    </div>
  </div>
  <div class="details col-md-4">
    <div class="panel panel-default text-center">
      <h3>
        <div class="panel-title">
          <span class="glyphicon glyphicon-list-alt"></span>
            Fornecedor
          </div>
      </h3>
      <hr>
      <h4><?=$recebimento->getMarket()->getNome()?></h4>
    </div>
    <div class="panel panel-default text-center">
      <div class="rating">
        <h3>
          <div class="panel-title">
            <span class="glyphicon glyphicon-info-sign"></span>  Categoria</div>
        </h3>
        <hr>
        <h4><?=$recebimento->getCategoria()->getDescricao()?></h4>
      </div>
    </div>
    <div class="panel panel-default text-center">
      <h3><div class="panel-title"><span class="glyphicon glyphicon-credit-card"></span>  Valor</div></h3>
      <hr>
      <h2><font color="green"> R$ <?=$recebimento->getValor()?></h2>   </font>                 
    </div>
     <br>
   </div>
 </h3>
</div>
</div>


<?php	
	require_once "script.php";
	require_once "rodape.php"; 
?>