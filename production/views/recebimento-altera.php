<?php	
  require_once "cabecalho.php";
  require_once "../dao/ContratoDao.php";
  require_once "../dao/CategoriaDao.php";
  require_once "../dao/PagamentoDao.php";
  require_once "../dao/PagoDao.php";
  require_once "../dao/RecebimentoDao.php";

  $id = $_GET['id'];
  $recebimentoDao = new RecebimentoDao($conexao);
  $recebimento = $recebimentoDao->buscaRecebimento($id);
?>

<?php require_once "css.php"; ?> 

<h3>Alterar Recebimento</h3>

<?php require_once "body.php"; ?>

<form action="../altera/altera-recebimento.php?id=<?=$id?>" method="post" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Cliente<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="" name="" readonly="readonly" value="<?=$recebimento->getMarket()->getNome()?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>                      
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Descrição<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="descricao" name="descricao" value="<?=$recebimento->getDescricao()?>" required="required" class="form-control col-md-7 col-xs-12">
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
  <div class="item form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_cliente">Pago?<span class="required">*</span>
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
     <select name="pago_id" class="form-control col-md-7 col-xs-12">
      <?php
        $pagoDao = new PagoDao($conexao);
        $pagos = $pagoDao->listaPago();                            
       foreach ($pagos as $pago): 
      ?>       
       <option value="<?=$pago->getId()?>"><?=$pago->getDescricao()?></option>
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
      <input type="date" id="data" name="data" required="required" value="<?=$recebimento->getData()?>" data-validate-length-range="8,20" class=" date-picker form-control col-md-8 col-xs-12">
    </div> 
    <label class="control-label col-md-1 col-sm-1" for="valor">Valor<span class="required">*</span>
    </label>
    <div class="col-sm-2 col-xs-12 col-md-3">
      <input type="text" id="valor" name="valor"  value="<?=$recebimento->getValor()?>" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
    </div>      
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="image">Arquivo</label>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <input type="file" name="doc">
    </div>
  </div>    
  <div class="ln_solid"></div>
  <div class=" form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" name="enviar" class="btn btn-success">Alterar</button>
      <input type="hidden" name="market_id" id="id" value="<?=$recebimento->getMarket()->getId()?>" />
    </div>
  </div>
</form>
   	

<?php require_once "script.php"; ?>

<!-- Parsley -->
<script src="../../vendors/parsleyjs/dist/parsley.min.js"></script>
<script src="../../vendors/parsleyjs/dist/i18n/pt-br.js"></script>
<!-- InputMask -->
<script src="../../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>


<script>
  function converte(){
    var valor = document.getElementById('valor').value;
    novoValor = valor.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
    document.getElementById('valor').value = novoValor ;
  }
</script>



<?php	require_once "rodape.php"; ?>