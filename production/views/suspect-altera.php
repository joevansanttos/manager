<?php	
  require_once "cabecalho.php";
  require_once "../dao/SuspectDao.php";
  $id = $_GET['id'];
  $suspectDao = new SuspectDao($conexao);
  $suspect = $suspectDao->buscaSuspect($id);
  $market = $suspect->getMarket();  
?>

<?php require_once "css.php"; ?>

<h3>Negócios</h3>

<?php require "body.php"; ?>

<div class="x_title">
  <h2>Alterar Suspect</h2>
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

<form action="../altera/altera-suspect.php?id=<?=$id?>" method="post"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">              
  <div class="item form-group">
    <label for="contato" class="control-label col-md-3 col-sm-3 col-xs-12">Contato <span class="required">*</span></label>
    <div class="col-sm-6 col-xs-12 col-md-3">
      <input id="contato" type="text" name="nome" value="<?=$suspect->getNome()?>" data-validate-linked="nome" class="form-control col-md-2 col-xs-12" required="required">
     </div>
    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="date">Data <span class="required">*</span>
    </label>
    <div class="col-sm-8 col-xs-12 col-md-2">
     <input type="date" id="data" name="data" required="required" value="<?=$suspect->getData()?>" class="form-control col-md-8 col-xs-12">
    </div>
  </div>
  <div class="item form-group">
    <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
    <div class="col-sm-6 col-xs-12 col-md-3">
      <input id="email" type="email" name="email" data-validate-linked="email" value="<?=$suspect->getEmail()?>" class="form-control col-md-2 col-xs-12" required="required">
     </div>
    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="tel">Tel <span class="required">*</span>
    </label>
    <div class="col-sm-8 col-xs-12 col-md-2">
     <input type="text" id="tel" name="tel" required="required" value="<?=$suspect->getTel()?>" data-inputmask="'mask' : '(99) 9999[9]-9999'" class="form-control col-md-8 col-xs-12">
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
      <input type="time" id="hora" name="hora" value="<?=$suspect->getHora()?>" class="form-control col-md-7 col-xs-12" required></select>                
    </div>
  </div>
  <div class="ln_solid"></div>                       
  <div class="col-md-6 col-md-offset-3">
    <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
    <button id="send" type="submit" class="btn btn-success">Alterar</button>
    <input type="hidden" name="market_id" id="id" value="<?=$market->getId()?>" />
  </div>
</form> 

<?php require_once "script.php"; ?>

<!-- Parsley -->
<script src="../../vendors/parsleyjs/dist/parsley.min.js"></script>
<script src="../../vendors/parsleyjs/dist/i18n/pt-br.js"></script>
<!-- InputMask -->
<script src="../../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript">
  document.getElementById('status').value = '<?=$suspect->getStatus()?>';
</script>

<?php	require_once "rodape.php"; ?>