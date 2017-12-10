<?php	
require_once "cabecalho.php"; 
require_once '../dao/HistoricoDao.php';
$id = $_GET['id'];
$historicoDao = new HistoricoDao($conexao);
$historico = $historicoDao->buscaHistorico($id);
$market = $historico->getMarket();
$data = $historico->getData();
?>

<?php require_once "css.php"; ?> 

<h3>Histórico</h3>

<?php require "body.php"; ?>

<div class="x_title">
  <h2>Alterar Histórico</h2>
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

<form action="../altera/altera-historico.php?id=<?=$id?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Histórico <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <textarea rows="8" id="comentario" required="required" name="descricao" class="form-control col-md-7 col-xs-12"><?=$historico->getDescricao()?></textarea>
    </div>
  </div>
  <br>
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" class="btn btn-success">Alterar</button>
      <input type="hidden" name="market_id" id="id_market" value="<?=$market->getId()?>" >
      <input type="hidden" name="data" id="id_market" value="<?=$data?>" >
    </div>
  </div>                     
</form>

<?php require_once "script.php"; ?>

<?php	require_once "rodape.php"; ?>