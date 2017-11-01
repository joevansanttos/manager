<?php	
  require_once "../includes/cabecalho.php";
  require_once "../dao/ContratoDao.php";
  require_once "../dao/CategoriaDao.php";
  require_once "../dao/PagamentoDao.php";
?>

<h3>Novo Recebimento</h3>
<?php require "../includes/body.php"; ?>

<form action="../adiciona/adiciona-recebimento.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">                      
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Descrição<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="descricao" name="descricao" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="item form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_cliente">Recebido de<span class="required">*</span>
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
     <select name="market_id" class="form-control col-md-7 col-xs-12">
      <?php
       $contratoDao = new ContratoDao($conexao);
       $contratos = $contratoDao->listaTodosContratos();                           
       foreach ($contratos as $contrato): 
      ?>       
       <option value="<?=$contrato->getMarket()->getId()?>"><?=$contrato->getMarket()->getNome()?></option>
       <?php
       endforeach
       ?>  
     </select>
   </div>
  </div> 
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="valor">Valor<span class="required">*</span>
    </label>
    <div class="col-sm-2 col-xs-12 col-md-6">
      <input type="text" id="valor" name="valor" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
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
    <div class="col-md-4 col-sm-6 col-xs-12">
    <input type="date" id="data" name="data" required="required" class="form-control col-md-8 col-xs-12">
    </div>    
  </div> 
  <div class="ln_solid"></div>
  <div class=" form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" name="enviar" class="btn btn-success">Cadastrar</button>
      <input type="hidden" name="pago_id" id="id" value="1" />
    </div>
  </div>
</form>
   	

<?php require_once "../includes/script.php"; ?>
<?php	require_once "../includes/rodape.php"; ?>