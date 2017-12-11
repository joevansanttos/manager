<?php	
  require_once "cabecalho.php";
  require_once "../dao/ContratoDao.php";
  require_once "../dao/CategoriaDao.php";
  require_once "../dao/PagamentoDao.php";
  require_once "../dao/FilialDao.php";

?>

<?php require_once "css.php"; ?> 

<h3>Financeiro</h3>

<?php require "body.php"; ?>

<div class="x_title">
  <h2>Adicionar Novo Planejamento</h2>
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

<form action="../adiciona/adiciona_planejamento.php" method="post" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">                      
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ano">Ano do Planejamento<span class="required">*</span>
    </label>
    <div class="col-md-2 col-sm-6 col-xs-12">
      <input class="form-control col-md-3 col-sm-3 col-xs-12" type="text" id="ano" data-inputmask="'mask' : '9999'" name="ano" required="required"> 
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

<!-- Parsley -->
<script src="../../vendors/parsleyjs/dist/parsley.min.js"></script>
<script src="../../vendors/parsleyjs/dist/i18n/pt-br.js"></script>
<!-- InputMask -->
<script src="../../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>


<?php	require_once "rodape.php"; ?>