<?php	
  require_once "../includes/cabecalho.php";
  $id = $_GET['id'];
  $data= date("d.m.y");
?>

<h3>Novo Relatório</h3>
<?php require "../includes/body.php"; ?>

<form action="../adiciona/adiciona-relatorio.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Relatorio <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <textarea rows="8" id="descricao" required="required" name="descricao" class="form-control col-md-7 col-xs-12"></textarea>
    </div>
  </div>
  <br>
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" class="btn btn-success">Cadastrar</button>
      <input type="hidden" name="tarefa_contrato_id" id="id" value="<?=$id?>" />
      <input type="hidden" name="usuario_id" id="id" value="<?=$usuario_id?>" />
      <input type="hidden" name="data" id="id" value="<?=$data?>" />
    </div>
  </div>                     
</form>
   	

<?php require_once "../includes/script.php"; ?>
<?php	require_once "../includes/rodape.php"; ?>