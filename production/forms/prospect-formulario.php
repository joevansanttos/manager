<?php	
  require_once "../includes/cabecalho-form.php";
  require_once "../dao/ProdutoDao.php";
  require_once "../dao/ClienteDao.php";  
  $produtoDao = new ProdutoDao($conexao);
  $produtos = $produtoDao->listaProdutos();
  $id = $_GET['id'];
  $clienteDao = new ClienteDao($conexao);
  $cliente = $clienteDao->buscaMarket($id); 
?>	

  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Novo Prospect</h3>
        </div>
        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Pesquise...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <form action="../adiciona/adiciona-prospect.php" method="post" class="form-horizontal form-label-left" novalidate>                    
                <div class="item form-group">
                  <label for="prod" class="control-label col-md-3 col-sm-3 col-xs-12">Produto <span class="required">*</span></label>
                  <div class="col-sm-6 col-xs-12 col-md-3">
                  
                    <select id="prod" name="id_produto" data-validate-linked="prod" class="form-control col-md-4 col-xs-12" required="required">
                    <?php
                    foreach ($produtos as $produto) {                    
                    ?>
                      <option value="<?=$produto->getId()?>"><?=$produto->getNome()?></option>
                    <?php
                    }
                    ?>  
                    </select>
                  </div>
                  <label class="control-label col-md-2 col-sm-3 col-xs-12" for="prob">Probabilidade <span class="required">*</span>
                  </label>
                  <div class="col-sm-2 col-xs-12 col-md-1">
                    <select id="prob" name="prob" onblur="calcula()" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                        <option>%</option>
                          <option value="0">0%</option>
                          <option value="25">25%</option>
                          <option value="50">50%</option>
                          <option value="75">75%</option>
                          <option value="100">100%</option>
                    </select>
                  </div>
                </div>
                <div class="item form-group">
                  
                  <label for="prod" class="control-label col-md-3 col-sm-3 col-xs-12">Valor Oportunidade <span class="required">*</span></label>
                  <div class="col-sm-6 col-xs-12 col-md-2">                 
                    <input readonly="readonly" type="number"  step="" id="valor_op" name="valor_op" data-validate-linked="prod" required="required" class="form-control col-md-4 col-xs-12" required>
                  </div>
                  <label class="control-label col-md-2 col-sm-3 col-xs-12" for="valor_est">Valor Estimado <span class="required">*</span>
                  </label>
                  <div class="col-sm-2 col-xs-12 col-md-2">
                    <input readonly="readonly" type="text" id="valor_est" name="valor_est" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="recebimento">Previsão de Recebimento<span class="required">*</span></label>
                  <div class="col-sm-2 col-xs-12 col-md-2">
                    <input type="date" id=recebimento" name="recebimento" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                  </div>
                  <label class="control-label col-md-2 col-sm-3 col-xs-12" for="fechamento">Previsão de Fechamento</label>
                  <div class="col-sm-2 col-xs-12 col-md-2">
                    <input type="date" id=fechamento" name="fechamento" required="required" data-validate-length-range="6,20" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>                        
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
                    <button id="send" type="submit" class="btn btn-success">Cadastrar</button>
                    <input type="hidden" name="id_market" id="id" value="<?=$id?>" />                    
                  </div>
                </div>
              </form> 
            </div>
          </div>        
        </div>
      </div>
    </div>
  </div>

<?php require_once "../includes/script-form.php"; ?>

  <script type="text/javascript">
    function calcula(){
      var prob = document.getElementById('prob').value;
      var divide = prob/100;
      var id_profissao = 1;
      var porte = <?=$cliente->getPorte()->getId()?>;
      if(id_profissao == 4){          
        if(porte == 1){
          var valor_op = 1405;
        }else if(porte == 2){
          var valor_op = 1874;

        }else{
          var valor_op = 2342;
        }        
      }else{
        if(porte == 1){
          var valor_op = 937;
        }else if(porte == 2){
          var valor_op = 1405;
        }else{
          var valor_op = 1874;
        }
      }
      document.getElementById('valor_op').value = parseFloat(Math.round(valor_op)).toFixed(2);
      var result=  parseFloat(divide)*parseFloat(valor_op);

      document.getElementById('valor_est').value = parseFloat(Math.round(result * 100) / 100).toFixed(2);
    }
  </script>

<?php	require_once "../includes/rodape-form.php"; ?>

</body>
</html>