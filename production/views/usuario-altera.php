<?php	
require_once "cabecalho.php"; 
require_once '../dao/ProfissaoDao.php';
require_once '../dao/UsuarioDao.php';
$id = $_GET['id'];
$usuarioDao = new UsuarioDao($conexao);
$usuario = $usuarioDao->buscaUsuario($id);
?>

<?php require_once "css.php"; ?>

<h3>Usuários</h3>

<?php require "body.php"; ?>

<div class="x_title">
  <h2>Alterar Usuário Cadastrado</h2>
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

<form id="form" action="../altera/altera-usuario.php" method="post"  enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="nome" name="nome" value="<?=$usuario->getNome()?>" data-parsley-maxlength="10" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sobrenome">Sobrenome <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="sobrenome" name="sobrenome"  value="<?=$usuario->getSobrenome()?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="email" id="email" name="email" value="<?=$usuario->getEmail()?>" required="required" class="form-control col-md-8 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="senha">Senha<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="password" id="senha" name="senha" required="required" value="<?=$usuario->getSenha()?>" class="form-control col-md-8 col-xs-12">
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="profissao">Profissão<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <select name="profissao_id" id="profissao_id" class="form-control col-md-7 col-xs-12">
      <?php
        $profissaoDao = new ProfissaoDao($conexao);
        $profissoes = $profissaoDao->listaProfissoes();
        foreach ($profissoes as $profissao):
      ?>       
          <option value="<?=$profissao->getId()?>"><?=$profissao->getDescricao()?></option>
      <?php  
        endforeach 
      ?>  
      </select>
    </div>
  </div>   
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estado">Estado <span class="required">*</span>
    </label>
    <div class="col-sm-6 col-xs-12 col-md-6">
      <select id="estado" name="estado" class="optional form-control col-md-8 col-xs-12"></select>
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
    <div class="col-md-2 col-sm-6 col-xs-12">
      <input class="form-control col-md-8" type="text" value="<?=$usuario->getTelefone()?>" id="telefone" data-inputmask="'mask' : '(99) 99999-9999'" name="telefone" required="required"> 
    </div>
    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="sexo">Sexo<span class="required">*</span>
    </label>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <select class="form-control col-md-3"  id="sexo" name="sexo" required="required" >
        <option value="feminino">Feminino</option>
        <option value="masculino">Masculino</option>
      </select>  
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="image">Imagem</label>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <input type="file" name="image">
    </div>
  </div>                                            
  <div class="ln_solid"></div>
  <div class=" form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" name="enviar" class="btn btn-success">Alterar</button>
      <input type="hidden" name="id" id="id" value="<?=$id?>" />
    </div>
  </div>
</form>

<?php require_once "script.php"; ?>

<!-- Parsley -->
<script src="../../vendors/parsleyjs/dist/parsley.min.js"></script>
<script src="../../vendors/parsleyjs/dist/i18n/pt-br.js"></script>
<!-- Cidades e Estados -->
<script src="../js/cidades-estados-utf8.js"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8">
  new dgCidadesEstados({
    cidade: document.getElementById('cidade'),
    estado: document.getElementById('estado'),
    estadoVal: '<?=$usuario->getEstado()?>',
    cidadeVal: '<?=$usuario->getCidade()?>'
  })
</script>
<script src="../../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<script>
  document.getElementById('profissao_id').value = '<?=$usuario->getProfissao()->getId()?>';  
</script>

<script>
  document.getElementById('sexo').value = '<?=$usuario->getSexo()?>';
</script>

<?php	require_once "rodape.php"; ?>