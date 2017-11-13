<?php	
  require_once "cabecalho.php";
  require_once "../dao/ContratoDao.php";
  require_once "../dao/CategoriaDao.php";
  require_once "../dao/PagamentoDao.php";
  require_once "../dao/FornecedorDao.php";
  require_once "../dao/DespesaDao.php";

  $id = $_GET['id'];
  $despesaDao = new DespesaDao($conexao);
  $despesa = $despesaDao->buscaDespesa($id);
?>

<?php require_once "css.php"; ?> 

<h3>Alterar Despesa</h3>

<?php require_once "body.php"; ?>

<form action="../altera/altera-despesa.php" method="post" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Fornecedor<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="" name="" readonly="readonly" value="<?=$despesa->getFornecedor()->getNome()?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>                      
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Descrição<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="descricao" name="descricao" value="<?=$despesa->getDescricao()?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="item form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_cliente">Categoria<span class="required">*</span>
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
     <select name="categoria_id" class="form-control col-md-7 col-xs-12">
      <?php
        $categoriaDao = new CategoriaDao($conexao);
        $categorias = $categoriaDao->listaCategorias();
        var_dump($categorias) ;                          
       foreach ($categorias as $categoria): 
      ?>       
       <option value="<?=$categoria->getId()?>"><?=$categoria->getDescricao()?></option>
      <?php
       endforeach
      ?>  
     </select>
   </div>
  </div> 
  <div class="item form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_cliente">Pagamentos<span class="required">*</span>
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
     <select name="pagamento_id" class="form-control col-md-7 col-xs-12">
      <?php
        $pagamentoDao = new PagamentoDao($conexao);
        $pagamentos = $pagamentoDao->listaPagamentos();                            
       foreach ($pagamentos as $pagamento): 
      ?>       
       <option value="<?=$pagamento->getId()?>"><?=$pagamento->getDescricao()?></option>
      <?php
       endforeach
      ?>  
     </select>
   </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Data <span class="required">*</span>
    </label>
    <div class="col-md-2 col-sm-3 col-xs-4">
      <input type="date" id="data" name="data" required="required" value="<?=$despesa->getData()?>" data-validate-length-range="8,20" class=" date-picker form-control col-md-8 col-xs-12">
    </div> 
    <label class="control-label col-md-1 col-sm-1" for="valor">Valor<span class="required">*</span>
    </label>
    <div class="col-sm-2 col-xs-12 col-md-3">
      <input type="text" id="valor" name="valor"  value="<?=$despesa->getValor()?>" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
    </div>      
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="image">Arquivo</label>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <input type="file" name="image">
    </div>
  </div>    
  <div class="ln_solid"></div>
  <div class=" form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" name="enviar" class="btn btn-success">Alterar</button>
      <input type="hidden" name="pago_id" id="id" value="1" />
    </div>
  </div>
</form>
   	

<?php require_once "script.php"; ?>

<script>
  function converte(){
    var valor = document.getElementById('valor').value;
    novoValor = valor.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
    document.getElementById('valor').value = novoValor ;
  }
</script>

<?php	require_once "rodape.php"; ?>