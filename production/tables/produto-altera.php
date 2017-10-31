<?php	
  require_once "../includes/cabecalho.php";
  require_once '../dao/ProdutoDao.php';
  $id = $_GET['id'];
  $produtoDao = new ProdutoDao($conexao);
  $produto = $produtoDao->buscaProduto($id);
?>

<h3>Alterar Produto</h3>

<?php require "../includes/body.php"; ?>

<form action="../altera/altera-produto.php?id=<?=$id?>" method="post"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
   <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome do Produto<span class="required">*</span>
     </label>
     <div class="col-md-6 col-sm-6 col-xs-12">
       <input type="text" id="nome" name="nome" value="<?=$produto->getNome()?>" required="required" class="form-control col-md-7 col-xs-12">
     </div>
   </div>
   <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descricao">Descrição do Produto<span class="required">*</span></label>
     <div class="col-md-6 col-sm-6 col-xs-12" >
       <textarea id="descricao" rows='6' name="descricao" required="required" class="form-control col-md-7 col-xs-12"><?=$produto->getDescricao()?></textarea>
     </div>
   </div>
   <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="beneficios">Benefícios do Produto<span class="required">*</span></label>
     <div class="col-md-6 col-sm-6 col-xs-12" >
       <textarea id="beneficios" rows='6' name="beneficios" required="required" class="form-control col-md-7 col-xs-12"><?=$produto->getBeneficios()?></textarea>
     </div>
   </div>
   <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descricao">Entregas do Produto<span class="required">*</span></label>
     <div class="col-md-6 col-sm-6 col-xs-12" >
       <textarea id="entregas" rows='6' name="entregas" required="required" class="form-control col-md-7 col-xs-12"><?=$produto->getEntregas()?></textarea>
     </div>
   </div>
   <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="preco">Preço do Produto<span class="required">*</span></label>
     <div class="col-md-5 col-sm-6 col-xs-12">
       <input type="text" id="preco" name="preco" data-inputmask="'mask' : '9{1,5}'" value="<?=$produto->getPreco()?>" required="required" class="form-control col-md-7 col-xs-12">
     </div>
   </div>
   <div class="ln_solid"></div>
   <div class=" form-group">
     <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
       <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
       <button id="send" type="submit" name="enviar" class="btn btn-success">Alterar</button>
     </div>
   </div>
</form>
	


<?php require_once "../includes/script.php"; ?>

<?php	require_once "../includes/rodape.php"; ?>