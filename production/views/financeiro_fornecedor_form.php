<?php	
  require_once "cabecalho.php"; 
?>

<?php require_once "css.php"; ?> 

<h3>Financeiro</h3>

<?php require "../views/body.php";  ?>

<div class="x_title">
  <h2>Adiciona Novo Fornecedor</h2>
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

<form action="../adiciona/adiciona-fornecedor.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="nome" name="nome" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>  
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="razao">Razão Social <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input id="razao" name="razao" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="razao" required="required" type="text">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="preco">CNPJ</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="cnpj" name="cnpj" data-inputmask="'mask' : '**.***.***/****-**'"  class="form-control col-md-7 col-xs-12">
    </div>
  </div>    
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estado1">Estado <span class="required">*</span>
    </label>
    <div class="col-sm-6 col-xs-12 col-md-6">
      <select id="estado" name="estado" class="optional form-control col-md-7 col-xs-12"></select>
    </div>
  </div>
  <div class="form-group">
    <label for="cidade" class="control-label col-md-3 col-sm-3 col-xs-12">Cidade <span class="required">*</span>
    </label>
    <div class="col-sm-6 col-xs-12 col-md-6">
      <select id="cidade" name="cidade" class="form-control col-md-6 col-xs-12" required></select>
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="endereco">Endereço <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="endereco" name="endereco" required="required"  class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="segmento">Segmento<span class="required">*</span>
    </label>
    <div class="col-sm-8 col-xs-12 col-md-3">
      <select id="sexo" name="segmento" required class="form-control col-md-8 col-xs-12">
        <option value="Abatedouro">Abatedouro</option>
        <option value="Advocacia">Advocacia</option>
        <option value="Alimentação">Alimentação</option>
        <option value="Agricultura">Agricultura</option>
        <option value="Atacado">Atacado</option>
        <option value="Automotivo">Automotivo</option>
        <option value="Bebidas">Bebidas</option>
        <option value="Calçado">Calçado</option>
        <option value="Combustíveis">Combustíveis</option>
        <option value="Confecção">Confecção</option>
        <option value="Couros">Couros</option>
        <option value="Distribuidor">Distribuidor</option>
        <option value="Educação">Educação</option>
        <option value="Engenharia">Engenharia</option>
        <option value="Equipamentos">Equipamentos</option>
        <option value="Extração">Extração</option>
        <option value="Ferragens">Ferragens</option>
        <option value="Frigorífico">Frigorífico</option>
        <option value="Gráfica">Gráfica</option> 
        <option value="Hospital">Hospital</option>
        <option value="Informática">Informática</option> 
        <option value="Lazer">Lazer</option>
        <option value="Marketing">Marketing</option>
        <option value="Mobiliário">Mobiliário</option>
        <option value="Pecuária">Pecuária</option>
        <option value="Pesca">Pesca</option>
        <option value="Restaurante">Restaurante</option>
        <option value="Saúde">Saúde</option>
        <option value="Serviços">Serviços</option>
        <option value="Supermercado">Supermercado</option>
        <option value="Tecidos">Tecidos</option>
        <option value="Tecnologia">Tecnologia</option>
        <option value="Telefonia">Telefonia</option>
        <option value="Transporte">Transporte</option>
        <option value="Turismo">Turismo</option>
        <option value="Varejo">Varejo</option>
        <option value="Vestuário">Vestuário</option>                                        
      </select>
    </div>
    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="tel">Telefone <span class="required">*</span>
    </label>
    <div class="col-sm-6 col-xs-12 col-md-2">
      <input type="tel" id="tel" name="tel" data-inputmask="'mask' : '(99) 9999[9]-9999'" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
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

<!-- Cidades e Estados -->
<script src="../js/cidades-estados-utf8.js"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8">
  new dgCidadesEstados({
    cidade: document.getElementById('cidade'),
    estado: document.getElementById('estado')
  })
</script>

<?php	require_once "rodape.php"; ?>