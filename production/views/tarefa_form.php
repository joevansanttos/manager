<?php 
  require_once "cabecalho.php"; 
  require_once "../dao/ContratoDao.php";
  require_once "../dao/DepartamentoContratoDao.php";
  require_once "../dao/RelatorioDao.php";
  require_once "../dao/StatusAtividadeDao.php";
  require_once "../dao/ConsultorProjetoDao.php";

  $id = $_GET['id']; 
?>

<?php require_once "css.php"; ?> 


<h3>Adicionar Nova Tarefa</h3>

<?php 
  require_once "body.php";
?>

<form id="form" action="../adiciona/adiciona-tarefa.php" method="post"  enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descricao">Descrição da Tarefa <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="descricao" name="descricao"  required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>                  
  <div class="ln_solid"></div>
  <div class=" form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" name="enviar" class="btn btn-success">Cadastrar</button>
      <input type="hidden" name="departamento_contrato_id" id="id" value="<?=$id?>" />
      <input type="hidden" name="fim" id="fim" value="" />
      <input type="hidden" name="horas" id="horas" value="" />
      <input type="hidden" name="status_atividade_id" id="status_atividade_id" value="1" />
      <input type="hidden" name="usuario_id" id="usuario_id" value="<?=$usuario_id?>" />
    </div>
  </div>
</form>

<?php 
  require_once "script.php"; 
?>

<!-- Parsley -->
<script src="../../vendors/parsleyjs/dist/parsley.min.js"></script>
<script src="../../vendors/parsleyjs/dist/i18n/pt-br.js"></script>
<!-- InputMask -->
<script src="../../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

<?php 
  require_once "rodape.php"; 
?>