<?php	
  require_once "cabecalho.php";
  $id = $_GET['id'];  
?>

<?php require_once "css.php"; ?>

<h3>Novo Lead</h3>

<?php require "body.php"; ?>

<form action="../adiciona/adiciona-lead.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">         
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nome do Contato <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="nome" name="nome" required="required" class="form-control col-md-7 col-xs-12" value="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="senha">Email<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="email" id="email" name="email" required="required" class="form-control col-md-8 col-xs-12">
    </div>
  </div>
  <div class="item form-group">
    <label for="tel" class="control-label col-md-3 col-sm-3 col-xs-12">Telefone <span class="required">*</span></label>
    <div class="col-sm-6 col-xs-12 col-md-2">
      <input id="tel" data-inputmask="'mask' : '(99) 9999[9]-9999'" type="text" name="tel" data-validate-linked="tel" class="form-control col-md-2 col-xs-12" required="required">
    </div>
    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="mail">Cargo <span class="required">*</span>
    </label>
    <div class="col-sm-8 col-xs-12 col-md-3">
      <select id="cargo" name="cargo" required class="form-control col-md-8 col-xs-12">
        <option value="">Selecione...</option>                     
        <option value="Coordenador">Coordenador</option>
        <option value="Diretor">Diretor</option>
        <option value="Gerente">Gerente</option>
        <option value="Gestor">Gestor</option>
        <option value="Socio">Sócio Proprietário</option>                      
      </select>
    </div>
  </div> 
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Histórico
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <textarea rows="6" id="comentario"  name="descricao" class="form-control col-md-7 col-xs-12"></textarea>
    </div>
  </div>             
  <br>
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" class="btn btn-success">Cadastrar</button>
      <input type="hidden" name="market_id" id="id" value="<?=$id?>" />
    </div>
  </div>                     
</form>     	

<?php require_once "script.php"; ?>
<?php	require_once "rodape.php"; ?>