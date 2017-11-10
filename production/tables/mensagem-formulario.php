<?php	
require_once "../includes/cabecalho.php"; 
require_once '../dao/UsuarioDao.php';
$id = $_GET['id'];
$usuarioDao = new UsuarioDao($conexao);
$receptor = $usuarioDao->buscaUsuario($id);
$today = date("d.m.y");
?>

<h3>Nova Mensagem</h3>
<?php require "../includes/body.php"; ?>       

<form action="../adiciona/adiciona-mensagem.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Remetente<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="nome" name="usuario" value="<?=$receptor->getNome() . ' ' . $receptor->getSobrenome()?>" readonly="readonly" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Mensagem <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <textarea rows="8" id="comentario" required="required" name="mensagem" class="form-control col-md-7 col-xs-12"></textarea>
    </div>
  </div>
  <br>
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" class="btn btn-success">Enviar</button>
      <input type="hidden" name="data" id="data" value="<?=$today?>" >
      <input type="hidden" name="emissor_id" id="data" value="<?=$usuario_id?>" >
      <input type="hidden" name="receptor_id" id="data" value="<?=$receptor->getId()?>" >
      <input type="hidden" name="status_mensagem_id" id="data" value="1" >
    </div>
  </div>                     
</form>

<?php require_once "../includes/script.php"; ?>
<?php	require_once "../includes/rodape.php"; ?>