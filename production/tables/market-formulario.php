<?php	
  require_once "../includes/cabecalho.php";
  require '../dao/PorteDao.php';
?>

<h3>Novo Market</h3>

<?php require "../includes/body.php"; ?>

<form action="adiciona-market.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
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
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="preco">CNPJ<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="cnpj" name="cnpj" data-inputmask="'mask' : '**.***.***/****-**'" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>    
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="preco">Site<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="site" name="site" required="required" class="form-control col-md-7 col-xs-12">
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
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bairro">Bairro  <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="bairro" name="bairro" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="endereco">Endereço <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="endereco" name="endereco" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="segmento">Segmento<span class="required">*</span>
    </label>
    <div class="col-sm-8 col-xs-12 col-md-3">
      <select id="sexo" name="segmento" required class="form-control col-md-8 col-xs-12">
        <option value="Abatedouro">Abatedouro</option>
        <option value="Alimentação">Alimentação</option>
        <option value="Agricultura">Agricultura</option>
        <option value="Atacado">Atacado</option>
        <option value="Automotivo">Automotivo</option>
        <option value="Bebidas">Bebidas</option>
        <option value="Calçado">Calçado</option>
        <option value="Combustíveis">Combustíveis</option>
        <option value="Confecção">Confecção</option>
        <option value="Couros">Couros</option>
        <option value="Educação">Educação</option>
        <option value="Extração">Extração</option>
        <option value="Ferragens">Ferragens</option>
        <option value="Frigorífico">Frigorífico</option>
        <option value="Gráfica">Gráfica</option> 
        <option value="Hospital">Hospital</option> 
        <option value="Lazer">Lazer</option>
        <option value="Mobiliário">Mobiliário</option>
        <option value="Pecuária">Pecuária</option>
        <option value="Pesca">Pesca</option>
        <option value="Restaurante">Restaurante</option>
        <option value="Saúde">Saúde</option>
        <option value="Serviços">Serviços</option>
        <option value="Supermercado">Supermercado</option>
        <option value="Tecidos">Tecidos</option>
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
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_porte">Porte da Empresa<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <select name="id_porte" class="form-control col-md-7 col-xs-12">
        <?php
          $porteDao = new PorteDao($conexao);
          $portes = $porteDao->listaPortes();
          foreach ($portes as $porte):
        ?>       
        <option value="<?=$porte->getId()?>"><?=$porte->getDescricao()?></option>
        <?php  endforeach ?>  
      </select>
    </div>
  </div>    
  <div class="ln_solid"></div>
  <div class=" form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" name="enviar" class="btn btn-success">Cadastrar</button>
      <input type="hidden" name="id_consultor" id="id_consultor" value="<?=$usuario['id_usuario']?>" />
    </div>
  </div>
</form>
	


<?php require_once "../includes/script.php"; ?>

<?php	require_once "../includes/rodape.php"; ?>