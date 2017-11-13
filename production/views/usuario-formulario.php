<?php	
  require_once "cabecalho.php"; 
  require_once '../dao/ProfissaoDao.php';
?>

<?php require_once "css.php"; ?>

<h3>Novo Usuário</h3>

<?php require_once "body.php"; ?> 
      
<form id="form" action="../adiciona/adiciona-usuario.php" method="post"  enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="nome" name="nome" data-parsley-maxlength="10" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sobrenome">Sobrenome <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="sobrenome" name="sobrenome" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="senha">Senha<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="password" id="senha" name="senha" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="profissao_id">Profissão<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <select name="profissao_id" class="form-control col-md-7 col-xs-12">
        <?php
        $profissaoDao = new ProfissaoDao($conexao);
        $profissoes = $profissaoDao->listaProfissoes();
        foreach ($profissoes as $profissao):
          ?>       
          <option value="<?=$profissao->getId()?>"><?=$profissao->getDescricao()?></option>
        <?php  endforeach ?>  
      </select>
    </div>
  </div>   
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estado">Estado <span class="required">*</span>
    </label>
    <div class="col-sm-6 col-xs-12 col-md-6">
      <select id="estado" name="estado" class="optional form-control col-md-7 col-xs-12"></select>
    </div>
  </div>
  <div class="form-group">
    <label for="cidade" class="control-label col-md-3 col-sm-3 col-xs-12">Cidade <span class="required">*</span>
    </label>
    <div class="col-sm-6 col-xs-12 col-md-6">
      <select id="cidade" name="cidade" class="form-control col-md-7 col-xs-12" required>
      </select>
    </div>
  </div>                 
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="telefone">Telefone<span class="required">*</span></label>
    <div class="col-md-2 col-sm-2 col-xs-4">
      <input class="form-control col-md-3 col-sm-3 col-xs-12" type="text" id="telefone" data-inputmask="'mask' : '(99) 99999-9999'" name="telefone" required="required"> 
    </div>
    <label class="control-label col-md-1 col-sm-1 col-xs-3" for="sexo">Sexo<span class="required">*</span>
    </label>
    <div class="col-md-3 col-sm-3 col-xs-4">
      <select class="form-control"  id="sexo" name="sexo" required="required" >
        <option value="feminino">Feminino</option>
        <option value="masculino">Masculino</option>
      </select>  
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="image">Imagem</label>
    <div class="col-sm-6 col-xs-12 col-md-6">
      <input type="file" name="image">
    </div>
  </div>                                           
  <div class="ln_solid"></div>
  <div class=" form-group">
    <div class="col-md-6  col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" name="enviar" class="btn btn-success">Cadastrar</button>
    </div>
  </div>
</form>

<?php require_once "script.php"; ?>

<script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>


<!-- Parsley -->
<script src="../../vendors/parsleyjs/dist/parsley.min.js"></script>
<script src="../../vendors/parsleyjs/dist/i18n/pt-br.js"></script>

<!-- Cidades e Estados -->
<script src="../js/cidades-estados-utf8.js"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8">
  new dgCidadesEstados({
    cidade: document.getElementById('cidade'),
    estado: document.getElementById('estado')
  })
</script>
<script>
  $('#form').parsley();
</script>
<script type="text/javascript">
  window.ParsleyValidator.setLocale('pt-br');
</script>

<script src="../../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<script src="../../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

<?php	require_once "rodape.php"; ?>