<?php	
  require_once "cabecalho.php";
  require_once "../dao/LeadDao.php";
  $id = $_GET['id'];
  $leadDao = new LeadDao($conexao);
  $lead = $leadDao->buscaLead($id);
  $market = $lead->getMarket();
?>

<?php require_once "css.php"; ?>


<h3>Negócios</h3>

<?php require "body.php"; ?>

<div class="x_title">
  <h2>Alterar Lead</h2>
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

<form action="../altera/altera-lead.php?id=<?=$id?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">         
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nome do Contato <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="nome" name="nome" value="<?=$lead->getNome()?>" required="required" class="form-control col-md-7 col-xs-12" value="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="senha">Email<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="email" id="email" name="email" value="<?=$lead->getEmail()?>" required="required" class="form-control col-md-8 col-xs-12">
    </div>
  </div>
  <div class="item form-group">
    <label for="tel" class="control-label col-md-3 col-sm-3 col-xs-12">Telefone <span class="required">*</span></label>
    <div class="col-sm-6 col-xs-12 col-md-2">
      <input id="tel" data-inputmask="'mask' : '(99) 9999[9]-9999'" value="<?=$lead->getTel()?>" type="text" name="tel" data-validate-linked="tel" class="form-control col-md-2 col-xs-12" required="required">
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
  <br>
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

<!-- Parsley -->
<script src="../../vendors/parsleyjs/dist/parsley.min.js"></script>
<script src="../../vendors/parsleyjs/dist/i18n/pt-br.js"></script>
<!-- InputMask -->
<script src="../../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript">
  document.getElementById('cargo').value = '<?=$lead->getCargo()?>';
</script>

<?php	require_once "rodape.php"; ?>