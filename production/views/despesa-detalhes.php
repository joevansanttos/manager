<?php	
	require_once "cabecalho.php"; 
  require_once '../dao/DespesaDao.php';
  $id = $_GET['id'];
  $despesaDao = new DespesaDao($conexao);
  $despesa = $despesaDao->buscaDespesa($id);
?>

<?php require_once "css.php"; ?> 

<h3>Detalhes da Despesa</h3>

<?php require_once "body.php";	?>

<div class="wrapper row">
  <div class="preview col-md-8">
    <div class="preview-pic tab-content">
      <div class="tab-pane active" id="pic-1">
        <img class="col-md-12" src="<?=$despesa->getImage()?>"/>
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
      <h4><?=$despesa->getFornecedor()->getNome()?></h4>
    </div>
    <div class="panel panel-default text-center">
      <div class="rating">
        <h3>
          <div class="panel-title">
            <span class="glyphicon glyphicon-info-sign"></span>  Categoria</div>
        </h3>
        <hr>
        <h4><?=$despesa->getCategoria()->getDescricao()?></h4>
      </div>
    </div>
    <div class="panel panel-default text-center">
      <h3><div class="panel-title"><span class="glyphicon glyphicon-credit-card"></span>  Valor</div></h3>
      <hr>
      <h2><font color="green"> R$ <?=$despesa->getValor()?></h2>   </font>                 
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