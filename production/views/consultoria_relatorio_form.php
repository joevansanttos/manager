<?php	
  require_once "cabecalho.php";
  $id = $_GET['id'];
  $data= date("d.m.y");
?>

<?php require_once "css.php"; ?>

<h3>Consultoria</h3>

<?php require "body.php"; ?>

<div class="x_title">
  <h2>Adicionar Novo Relatório</h2>
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


<form action="../adiciona/adiciona-relatorio.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Relatório <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <textarea rows="8" id="descricao" required="required" name="descricao" class="form-control col-md-7 col-xs-12"></textarea>
    </div>
  </div>
  <br>
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" class="btn btn-success">Cadastrar</button>
      <input type="hidden" name="tarefa_id" id="id" value="<?=$id?>" />
      <input type="hidden" name="usuario_id" id="id" value="<?=$usuario_id?>" />
      <input type="hidden" name="data" id="id" value="<?=$data?>" />
    </div>
  </div>                     
</form>
   	

<?php require_once "script.php"; ?>


<?php	require_once "rodape.php"; ?>