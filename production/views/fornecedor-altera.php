<?php	
  require_once "cabecalho.php";
  require_once '../dao/FornecedorDao.php';

  $id = $_GET['id'];
  $fornecedorDao = new FornecedorDao($conexao);
  $fornecedor = $fornecedorDao->buscaFornecedor($id); 
?>

<?php require_once "css.php"; ?> 

<h3>Alterar Fornecedor</h3>

<?php require_once "body.php"; ?>       

<form action="../altera/altera-fornecedor.php?id=<?=$id?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="nome" name="nome" value="<?=$fornecedor->getNome()?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>  
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="razao">Razão Social <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input id="razao" name="razao" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="razao" value="<?=$fornecedor->getRazao()?>" required="required" type="text">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="preco">CNPJ</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="cnpj" name="cnpj" value="<?=$fornecedor->getCnpj()?>" data-inputmask="'mask' : '**.***.***/****-**'"  class="form-control col-md-7 col-xs-12">
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
      <input type="text" id="endereco" name="endereco" value="<?=$fornecedor->getEndereco()?>" required="required"  class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="segmento">Segmento<span class="required">*</span>
    </label>
    <div class="col-sm-8 col-xs-12 col-md-3">
      <select id="segmento" name="segmento" required class="form-control col-md-8 col-xs-12">
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
      <input type="tel" id="tel" name="tel" data-inputmask="'mask' : '(99) 9999[9]-9999'" required="required" data-validate-length-range="8,20" value="<?=$fornecedor->getTel()?>" class="form-control col-md-7 col-xs-12">
    </div> 
  </div>                               
  <div class="ln_solid"></div>
  <div class=" form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" name="enviar" class="btn btn-success">Alterar</button>
    </div>
  </div>
</form>

<?php require_once "script.php"; ?>

<!-- Parsley -->
<script src="../../vendors/parsleyjs/dist/parsley.min.js"></script>
<script src="../../vendors/parsleyjs/dist/i18n/pt-br.js"></script>
<!-- InputMask -->
<script src="../../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

<script src="../js/cidades-estados-utf8.js"></script>
<script language="JavaScript" type="text/javascript" charset="utf-8">
  new dgCidadesEstados({
    cidade: document.getElementById('cidade'),
    estado: document.getElementById('estado'),
    estadoVal: '<?=$fornecedor->getEstado()?>',
    cidadeVal: '<?=$fornecedor->getCidade()?>'
  })
</script>

<script type="text/javascript">
  document.getElementById('segmento').value = '<?=$fornecedor->getSegmento()?>';
</script>

<?php	require_once "rodape.php"; ?>