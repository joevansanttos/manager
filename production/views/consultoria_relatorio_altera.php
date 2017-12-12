<?php	
  require_once "cabecalho.php";
  require_once "../dao/RelatorioDao.php";

  $id = $_GET['id'];
  $relatorioDao = new RelatorioDao($conexao);
  $relatorio = $relatorioDao->buscaRelatorio($id);
  $data= date("d.m.y");
?>

<?php require_once "css.php"; ?>

<h3>Alterar Relatório</h3>

<?php require_once "body.php"; ?>

<form action="../altera/altera-relatorio.php?id=<?=$id?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Relatório <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <textarea rows="8" id="descricao" required="required" name="descricao" class="form-control col-md-7 col-xs-12"><?=$relatorio->getDescricao()?></textarea>
    </div>
  </div>
  <br>
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" class="btn btn-success">Alterar</button>
      <input type="hidden" name="tarefa_contrato_id" id="id" value="<?=$relatorio->getTarefaContrato()->getId()?>" />
      <input type="hidden" name="usuario_id" id="id" value="<?=$usuario_id?>" />
      <input type="hidden" name="data" id="id" value="<?=$data?>" />
    </div>
  </div>                     
</form>
   	

<?php require_once "script.php"; ?>


<?php	require_once "rodape.php"; ?>