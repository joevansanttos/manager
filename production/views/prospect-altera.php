<?php	
  require_once "cabecalho.php";
  require_once "../dao/ProdutoDao.php";
  require_once '../dao/MarketDao.php';
  require_once '../dao/ProspectDao.php';
  $produtoDao = new ProdutoDao($conexao);
  $produtos = $produtoDao->listaProdutos();
  $id = $_GET['id'];
  $prospectDao = new ProspectDao($conexao);
  $prospect = $prospectDao->buscaProspect($id);
  $market = $prospect->getMarket();
?>	

<?php require_once "css.php"; ?> 

<h3>Negócios</h3>

<?php require "body.php"; ?>

<div class="x_title">
  <h2>Alterar Prospect</h2>
  <ul class="nav navbar-right panel_toolbox">
    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Settings 1</a>
        </li>
        <li><a href="#">Settings 2</a>
        </li>
      </ul>
    </li>
    <li><a class="close-link"><i class="fa fa-close"></i></a>
    </li>
  </ul>
  <div class="clearfix"></div>
</div>
<div class="x_content">

<form action="../altera/altera-prospect.php?id=<?=$id?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">               
  <div class="item form-group">
    <label for="prod" class="control-label col-md-3 col-sm-3 col-xs-12">Produto <span class="required">*</span></label>
    <div class="col-sm-6 col-xs-12 col-md-3">    
      <select id="prod" name="produto_id" data-validate-linked="prod" class="form-control col-md-4 col-xs-12" required="required">
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
      <select id="prob" onblur="calcula()" name="prob"  type="text"  required="required"  class="form-control col-md-7 col-xs-12">
        <option>%</option>
        <option value="0">0%</option>
        <option  value="25">25%</option>
        <option value="50">50%</option>
        <option value="75">75%</option>
        <option value="100">100%</option>
      </select>
    </div>
  </div>
  <div class="item form-group">
    <label for="prod" class="control-label col-md-3 col-sm-3 col-xs-12">Valor Oportunidade <span class="required">*</span></label>
    <div class="col-sm-6 col-xs-12 col-md-2">                 
      <input readonly="readonly" type="number"  id="valor_op" name="valor_op" data-validate-linked="prod" required="required" class="form-control col-md-4 col-xs-12">
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
      <input type="date" value="<?=$prospect->getRecebimento()?>" id="recebimento" name="recebimento" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
    </div>
    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="fechamento">Previsão de Fechamento</label>
    <div class="col-sm-2 col-xs-12 col-md-2">
      <input type="date" id="fechamento" name="fechamento" value="<?=$prospect->getFechamento()?>" required="required" data-validate-length-range="6,20" class="form-control col-md-7 col-xs-12">
    </div>
  </div>                        
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" class="btn btn-success">Alterar</button>
      <input type="hidden" name="market_id" id="id" value="<?=$market->getId()?>" />                    
    </div>
  </div>
</form>   

<?php require_once "script.php"; ?>

<script>
  function calcula(){
    var prob = document.getElementById('prob').value;
    var divide = prob/100;
    var id_profissao = 1;
    var porte = <?=$market->getPorte()->getId()?>;
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

<script type="text/javascript">
  document.getElementById('prod').value = '<?=$prospect->getProduto()->getId()?>';
</script>
<script type="text/javascript">
  document.getElementById('prob').value =  '<?=round($prospect->getProb())?>';
</script>
<script type="text/javascript">
  document.getElementById('valor_op').value =  '<?=number_format($prospect->getValorOp(), 2, '.', '')?>';
</script>
<script type="text/javascript">
  document.getElementById('valor_est').value =  '<?=number_format($prospect->getValorEs(), 2, '.', '')?>';
</script>


<?php	require_once "rodape.php"; ?>

