<?php	
require_once "../includes/cabecalho.php"; 
require_once '../dao/MarketDao.php';
$id = $_GET['id'];
$marketDao = new MarketDao($conexao);
$market = $marketDao->buscaMarket($id);
$today = date("d.m.y");
?>

<h3>Novo Histórico</h3>
<?php require "../includes/body.php"; ?>       

<form action="../adiciona/adiciona-historico.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Histórico <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <textarea rows="8" id="comentario" required name="descricao" class="form-control col-md-7 col-xs-12"></textarea>
    </div>
  </div>
  <br>
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" class="btn btn-success">Cadastrar</button>
      <input type="hidden" name="market_id" id="id_market" value="<?=$id?>" >
      <input type="hidden" name="data" id="id_market" value="<?=$today?>" >
    </div>
  </div>                     
</form>

<?php require_once "../includes/script.php"; ?>
<?php	require_once "../includes/rodape.php"; ?>