<?php	
require_once "cabecalho.php"; 
require_once '../dao/AtividadeDao.php';
require_once '../dao/StatusAtividadeDao.php';

$id = $_GET['id'];
$atividadeDao = new AtividadeDao($conexao);
$atividade = $atividadeDao->buscaAtividade($id);
?>

<?php require_once "css.php"; ?>

<h3>Tarefas</h3>

<?php require "body.php"; ?>

<div class="x_title">
  <h2>Alterar Tarefa</h2>
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

<form id="form" action="../altera/altera-atividade.php?id=<?=$id?>" method="post"  enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Título da Tarefa <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="nome" name="descricao" readonly="readonly" value="<?=$atividade->getDescricao()?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="recebimento">Inicio<span class="required">*</span></label>
    <div class="col-sm-2 col-xs-12 col-md-2">
      <input type="date" id="inicio" name="inicio" readonly="readonly" required="required" value="<?=$atividade->getInicio()?>" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
    </div>
    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="fechamento">Prazo</label>
    <div class="col-sm-2 col-xs-12 col-md-2">
      <input type="date" id="prazo" name="prazo" readonly="readonly" required="required" value="<?=$atividade->getPrazo()?>" data-validate-length-range="6,20" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Setor <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="nome" name="setor" readonly="readonly" value="<?=$atividade->getSetor()?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="filial_id">Filial <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="filial_id" name="filial_id" readonly="readonly" value="<?=$atividade->getFilial()->getNome()?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Importância <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="nome" name="importancia" readonly="readonly" value="<?=$atividade->getImportancia()?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Objetivo Estratégico</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="nome" name="objetivo" readonly="readonly"  value="<?=$atividade->getObjetivo()?>" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Resultados Esperados<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <textarea readonly="readonly" name="resultados" class="form-control col-md-12 col-xs-12"  rows="6"><?=$atividade->getResultados()?></textarea> 
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="profissao_id">Status da Tarefa<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <select id="status" name="status_atividade_id" class="form-control col-md-7 col-xs-12">
        <?php
        $statusAtividadeDao = new StatusAtividadeDao($conexao);
        $status = $statusAtividadeDao->listaStatusAtividade();
        foreach ($status as $s):
          ?>       
          <option value="<?=$s->getId()?>"><?=$s->getDescricao()?></option>
        <?php  endforeach ?>  
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Observação<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <textarea  name="observacao" class="form-control col-md-12 col-xs-12"  rows="3"><?=$atividade->getObservacao()?></textarea> 
    </div>
  </div>                                     
  <div class="ln_solid"></div>
  <div class=" form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" name="enviar" class="btn btn-success">Alterar</button>
      <input type="hidden" name="delegado_id" id="id" value="<?=$atividade->getDelegado()->getId()?>" />
      <input type="hidden" name="delegante_id" id="id" value="<?=$atividade->getDelegante()->getId()?>" />
      <input type="hidden" name="status_prazo_id" id="id" value="<?=$atividade->getStatusPrazo()->getId()?>" />
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
  document.getElementById('status').value = '<?=$atividade->getStatusAtividade()->getId()?>';
</script>



<?php	require_once "rodape.php"; ?>