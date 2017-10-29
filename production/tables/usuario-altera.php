<?php	
require_once "../includes/cabecalho.php"; 
require_once '../dao/ProfissaoDao.php';
require_once '../dao/UsuarioDao.php';
$id = $_GET['id'];
$usuarioDao = new UsuarioDao($conexao);
$usuario = $usuarioDao->buscaUsuario($id);
?>

<h3>Alterar Usuário</h3>
<?php require "../includes/body.php"; ?>       
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
      <select name="profissao_id" class="form-control col-md-7 col-xs-12">
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
    <div class="col-sm-6 col-xs-12 col-md-5">
      <select id="estado" name="estado" class="optional form-control col-md-8 col-xs-12"></select>
    </div>
  </div>
  <div class="form-group">
    <label for="cidade" class="control-label col-md-3 col-sm-3 col-xs-12">Cidade <span class="required">*</span>
    </label>
    <div class="col-sm-6 col-xs-12 col-md-5">
      <select id="cidade" name="cidade" class="form-control col-md-7 col-xs-12" required>
      </select>
    </div>
  </div>                 
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="telefone">Telefone<span class="required">*</span></label>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <input class="form-control col-md-8" type="text" value="<?=$usuario->getTelefone()?>" id="telefone" data-inputmask="'mask' : '(99) 99999-9999'" name="telefone" required="required"> 
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sexo">Sexo<span class="required">*</span>
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

<?php require_once "../includes/script.php"; ?>


<script language="JavaScript" type="text/javascript" charset="utf-8">
  new dgCidadesEstados({
    cidade: document.getElementById('cidade'),
    estado: document.getElementById('estado'),
    estadoVal: '<?=$usuario->getEstado()?>',
    cidadeVal: '<?=$usuario->getCidade()?>'
  })
</script>


<script>
  document.getElementById('sexo').value = '<?=$usuario->getSexo()?>';
</script>

<script>
  document.getElementById('profissao').value = '<?=$usuario->getProfissao()?>';  
</script>



<?php	require_once "../includes/rodape.php"; ?>