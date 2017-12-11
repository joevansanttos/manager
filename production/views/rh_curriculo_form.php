<?php	
require_once "cabecalho.php"; 
require_once '../dao/ProfissaoDao.php';
?>

<?php require_once "css.php"; ?>

<h3>Recursos Humanos</h3>

<?php require "body.php"; ?>

<div class="x_title">
  <h2>Adicionar Novo Currículo</h2>
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

  <!-- Smart Wizard -->
<form class="form-horizontal form-label-left"  action="../adiciona/adiciona_curriculo.php" method="post" id="demo-form2">
  <div id="wizard" class="form_wizard wizard_horizontal">
    <ul class="wizard_steps">
      <li>
        <a href="#step-1">
          <span class="step_no">1</span>
          <span class="step_descr">
            Passo 1<br />
            <small>Dados do Candidato</small>
          </span>
        </a>
      </li>
      <li>
        <a href="#step-2">
          <span class="step_no">2</span>
          <span class="step_descr">
            Passo 2<br />
            <small>Objetivo</small>
          </span>
        </a>
      </li>
      <li>
        <a href="#step-3">
          <span class="step_no">3</span>
          <span class="step_descr">
            Passo 3<br />
            <small>Formação Acadêmica</small>
          </span>
        </a>
      </li>
      <li>
        <a href="#step-4">
          <span class="step_no">4</span>
          <span class="step_descr">
            Passo 4<br />
            <small>Experiência</small>
          </span>
        </a>
      </li>
      <li>
        <a href="#step-5">
          <span class="step_no">5</span>
          <span class="step_descr">
            Passo 5<br />
            <small>Qualificações</small>
          </span>
        </a>
      </li>
    </ul>
    <div id="step-1">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="nome" name="nome"  required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sobrenome">Sobrenome <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="sobrenome" name="sobrenome" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idade">Idade</label>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <input type="text" id="idade" name="idade" data-inputmask="'mask' : '99'"  class="form-control col-md-7 col-xs-12">
          </div>
          <label class="control-label col-md-2 col-sm-3 col-xs-12" for="filhos">Filhos <span class="required">*</span>
          </label>
          <div class="col-sm-6 col-xs-12 col-md-2">
            <input type="filhos" id="filhos" name="filhos" data-inputmask="'mask' : '9'" required="required" class="form-control col-md-7 col-xs-12">
          </div> 
        </div>      
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
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
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="endereco">Endereço <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="endereco" name="endereco" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
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
    </div>
    <div id="step-2">
      <h2 class="StepTitle">Passo 2 - Objetivo</h2>
      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="objetivo">Objetivo <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="objetivo" name="objetivo" required="required" class="form-control col-md-7 col-xs-12">
        </div>
      </div>    
    </div>
    <div id="step-3">
      <h2 class="StepTitle">Passo 3 - Formação Acadêmica</h2>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="curso">Curso <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="curso" name="curso"  required="required" class="form-control col-md-7 col-xs-12">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="universidade">Universidade <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="universidade" name="universidade"  required="required" class="form-control col-md-7 col-xs-12">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="conclusao">Estado<span class="required">*</span></label>
        <div class="col-md-3 col-sm-3 col-xs-4">
          <select class="form-control"  id="conclusao" name="conclusao" required="required" >
            <option value="concluido">Concluído em</option>
            <option value="previsao">Previsão de Conclusão em</option>
          </select>  
        </div>
        <label class="control-label col-md-1 col-sm-1 col-xs-3" for="ano">Ano<span class="required">*</span>
        </label>
        <div class="col-md-2 col-sm-2 col-xs-4">
          <input class="form-control col-md-3 col-sm-3 col-xs-12" type="text" id="ano" data-inputmask="'mask' : '9999'" name="ano" required="required"> 
        </div>        
      </div>     
    </div>
    <div id="step-4">
      <h2 class="StepTitle">Passo 4 - Experiência Profissional</h2>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa1">Empresa 1
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="empresa1" name="empresa1"  class="form-control col-md-7 col-xs-12">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="entrada1">Ano de Entrada</label>
        <div class="col-md-2 col-sm-2 col-xs-4">
          <input class="form-control col-md-3 col-sm-3 col-xs-12" type="text" id="entrada1" data-inputmask="'mask' : '9999'" name="entrada1"> 
        </div>
        <label class="control-label col-md-2 col-sm-1 col-xs-3" for="saida1">Ano de Saída
        </label>
        <div class="col-md-2 col-sm-2 col-xs-4">
          <input class="form-control col-md-3 col-sm-3 col-xs-12" type="text" id="saida1" data-inputmask="'mask' : '9999'" name="saida1"> 
        </div>        
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cargo1">Cargo
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="cargo1" name="cargo1"  class="form-control col-md-7 col-xs-12">
        </div>
      </div>
      <br>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="empresa2">Empresa 2
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="empresa2" name="empresa2"  class="form-control col-md-7 col-xs-12">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="entrada2">Ano de Entrada</label>
        <div class="col-md-2 col-sm-2 col-xs-4">
          <input class="form-control col-md-3 col-sm-3 col-xs-12" type="text" id="entrada2" data-inputmask="'mask' : '9999'" name="entrada2"> 
        </div>
        <label class="control-label col-md-2 col-sm-1 col-xs-3" for="saida2">Ano de Saída
        </label>
        <div class="col-md-2 col-sm-2 col-xs-4">
          <input class="form-control col-md-3 col-sm-3 col-xs-12" type="text" id="saida2" data-inputmask="'mask' : '9999'" name="saida2"> 
        </div>        
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cargo2">Cargo
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="cargo2" name="cargo2"  class="form-control col-md-7 col-xs-12">
        </div>
      </div>
    </div>
    <div id="step-5">
      <h2 class="StepTitle">Passo 5 - Qualificações</h2>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qualificacoes">Qualificações <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <textarea rows="8" id="qualificacoes" required="required" name="qualificacoes" class="form-control col-md-7 col-xs-12"></textarea>
        </div>
      </div>
    </div>
  </div>
</form>
  <!-- End SmartWizard Content -->

  <?php require_once "script.php"; ?>

    <script src="../../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>


  <script src="../../vendors/fastclick/lib/fastclick.js"></script>
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


  <script src="../../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>


  <?php	require_once "rodape.php"; ?>