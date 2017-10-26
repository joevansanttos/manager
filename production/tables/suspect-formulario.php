<?php	
  require_once "../includes/cabecalho.php";

  $id = $_GET['id'];
  
?>

<h3>Novo Suspect</h3>
<?php require "../includes/body.php"; ?>
<form action="adiciona-suspect.php" method="post"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">              
  <div class="item form-group">
    <label for="contato" class="control-label col-md-3 col-sm-3 col-xs-12">Contato <span class="required">*</span></label>
    <div class="col-sm-6 col-xs-12 col-md-3">
      <input id="contato" type="text" name="nome" data-validate-linked="nome" class="form-control col-md-2 col-xs-12" required="required">
     </div>
    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="date">Data <span class="required">*</span>
    </label>
    <div class="col-sm-8 col-xs-12 col-md-2">
     <input type="date" id="data" name="data" required="required" class="form-control col-md-8 col-xs-12">
    </div>
  </div>
  <div class="item form-group">
    <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
    <div class="col-sm-6 col-xs-12 col-md-3">
      <input id="email" type="email" name="email" data-validate-linked="email" class="form-control col-md-2 col-xs-12" required="required">
     </div>
    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="tel">Tel <span class="required">*</span>
    </label>
    <div class="col-sm-8 col-xs-12 col-md-2">
     <input type="text" id="tel" name="tel" required="required" data-inputmask="'mask' : '(99) 9999[9]-9999'" class="form-control col-md-8 col-xs-12">
    </div>
  </div>             
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
    </label>
    <div class="col-sm-6 col-xs-12 col-md-3">
      <select id="status" name="status" class="optional form-control col-md-7 col-xs-12">
        <option>Agendado</option>
        <option>Realizado</option>
        <option>Não Realizado</option>
      </select>
    </div>
    <label for="hora" class="control-label col-md-1 col-sm-3 col-xs-12">Hora <span class="required">*</span>
    </label>
    <div class="col-sm-6 col-xs-12 col-md-2">
      <input type="time" id="hora" name="hora" class="form-control col-md-7 col-xs-12" required></select>                
    </div>
  </div>              
  <div class="col-md-6 col-md-offset-3">
    <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
    <button id="send" type="submit" class="btn btn-success">Cadastrar</button>
    <input type="hidden" name="id_market" id="id" value="<?=$id?>" />
  </div>
</form> 


<?php require_once "../includes/script.php"; ?>
<?php	require_once "../includes/rodape.php"; ?>