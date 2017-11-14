<?php	
require_once "cabecalho.php"; 
require_once '../dao/UsuarioDao.php';
?>

<?php require_once "css.php"; ?>

<h3>Nova Tarefa</h3>

<?php require_once "body.php"; ?>   

<form id="form" action="../adiciona/adiciona-atividade.php" method="post"  enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="profissao_id">Colaborador<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <select name="delegado_id" class="form-control col-md-7 col-xs-12">
        <?php
        $usuarioDao = new UsuarioDao($conexao);
        $usuarios = $usuarioDao->listaUsuarios();
        foreach ($usuarios as $usuario):
          ?>       
          <option value="<?=$usuario->getId()?>"><?=$usuario->getNome()?> <?=$usuario->getSobrenome()?></option>
        <?php  endforeach ?>  
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Descrição da Tarefa <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="nome" name="descricao"  required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="recebimento">Inicio<span class="required">*</span></label>
    <div class="col-sm-2 col-xs-12 col-md-2">
      <input type="date" id=recebimento" name="inicio" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
    </div>
    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="fechamento">Prazo</label>
    <div class="col-sm-2 col-xs-12 col-md-2">
      <input type="date" id=fechamento" name="prazo" required="required" data-validate-length-range="6,20" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Setor <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="nome" name="setor"  required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Filial <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="nome" name="filial"  required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Importância <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="nome" name="importancia"  required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Objetivo Estratégico<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="nome" name="objetivo"  required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Resultados Esperados<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <textarea  name="resultados" class="form-control col-md-12 col-xs-12" rows="6"></textarea> 
    </div>
  </div>                                     
  <div class="ln_solid"></div>
  <div class=" form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" name="enviar" class="btn btn-success">Cadastrar</button>
      <input type="hidden" name="status_atividade_id" id="id" value="1" />
      <input type="hidden" name="delegante_id" id="id" value="<?=$usuario_id?>" />
      <input type="hidden" name="observacao" id="id" value="" />
      <input type="hidden" name="fim" id="id" value="" />
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