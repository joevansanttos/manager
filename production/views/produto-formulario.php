<?php	
  require_once "cabecalho.php";
?>

<?php require_once "css.php"; ?>  

<h3>Novo Produto</h3>

<?php require_once "body.php"; ?>

<form action="../adiciona/adiciona-produto.php" method="post"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
   <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome do Produto<span class="required">*</span>
     </label>
     <div class="col-md-6 col-sm-6 col-xs-12">
       <input type="text" id="nome" name="nome" required="required" class="form-control col-md-7 col-xs-12">
     </div>
   </div>
   <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descricao">Descrição do Produto<span class="required">*</span></label>
     <div class="col-md-6 col-sm-6 col-xs-12" >
       <textarea id="descricao" rows='6' name="descricao" required="required" class="form-control col-md-7 col-xs-12"></textarea>
     </div>
   </div>
   <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="beneficios">Benefícios do Produto<span class="required">*</span></label>
     <div class="col-md-6 col-sm-6 col-xs-12" >
       <textarea id="beneficios" rows='6' name="beneficios" required="required" class="form-control col-md-7 col-xs-12"></textarea>
     </div>
   </div>
   <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descricao">Entregas do Produto<span class="required">*</span></label>
     <div class="col-md-6 col-sm-6 col-xs-12" >
       <textarea id="entregas" rows='6' name="entregas" required="required" class="form-control col-md-7 col-xs-12"></textarea>
     </div>
   </div>
   <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="preco">Preço do Produto<span class="required">*</span></label>
     <div class="col-md-6 col-sm-6 col-xs-12">
       <input type="text" id="preco" name="preco" data-inputmask="'mask' : '9{1,5}'" required="required" class="form-control col-md-7 col-xs-12">
     </div>
   </div>
   <div class="ln_solid"></div>
   <div class=" form-group">
     <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
       <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
       <button id="send" type="submit" name="enviar" class="btn btn-success">Cadastrar</button>
     </div>
   </div>
</form>
	


<?php require_once "script.php"; ?>

<script type="text/javascript">
  document.getElementById('preco').value = parseFloat(Math.round(preco)).toFixed(2);
</script>

<?php	require_once "rodape.php"; ?>