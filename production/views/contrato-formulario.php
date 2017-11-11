<?php	
  require_once "cabecalho.php";
  require_once "../dao/ProdutoDao.php";
  require_once "../dao/ContratoDao.php";
  require_once "../dao/MarketDao.php";
  require_once "../dao/DepartamentoDao.php";   
  $produtoDao = new ProdutoDao($conexao);
  $contratoDao = new ContratoDao($conexao);
  $departamentoDao = new DepartamentoDao($conexao);
  $marketDao = new MarketDao($conexao);
  $produtos = $produtoDao->listaProdutos();
  $departamentos = $departamentoDao->listaDepartamentos();
  $contratos = $contratoDao->listaTodosContratos();
  if(!empty($contratos)){
     $i = 1;
     $j = 1;
     while($i == $j){
       foreach ($contratos as $contrato) {
        $j = $contrato->getNumero();
        $i++;
      } 
    }
    $i = (string)$i; 
  }else{
    $i = 1;
  }
  $id = $_GET['id'];
  $market = $marketDao->buscaMarket($id); 
?>

<?php require_once "css.php"; ?> 

<h3>Novo Contrato</h3>

<?php require_once "body.php"; ?>


<form action="../adiciona/adiciona-contrato.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">                  
  <div class="item form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nº Contrato <span class="required">*</span>
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
     <input type="text" readonly="readonly" value="<?=$i?>" id="n_contrato" name="id" required="required" class="form-control" >
   </div>
  </div>
  <div class="item form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_cliente">Nome Fantasia<span class="required">*</span>
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
     <input readonly="readonly" type="text" value="<?=$market->getNome()?>" id="nome" name="nome" required="required" class="form-control col-md-7 col-xs-12">
   </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="razao">Razão Social <span class="required">*</span>
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
     <input  readonly="readonly" id="razao" name="razao" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" value="<?=$market->getRazao()?>" name="razao" required="required" type="text">
   </div>
  </div>
  <div class="item form-group">
    <label for="cnpj" class="control-label col-md-3 col-sm-3 col-xs-12">CNPJ <span class="required">*</span></label>
   <div class="col-sm-6 col-xs-12 col-md-6">
    <input readonly="readonly" id="cnpj" value="<?=$market->getCnpj()?>" type="text" name="cnpj" data-validate-linked="cnpj" class="form-control col-md-2 col-xs-12" required="required">
   </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="endereco">Sede <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input readonly="readonly" type="text" id="sede" name="sede" value="<?=$market->getEndereco()?>" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
   </div>
  </div>
  <div class="item form-group ">
    <div class="form-group">
      <label for="socio" class="control-label col-md-3 col-sm-3 col-xs-12">Sócio <span class="required">*</span></label>      
      <div class=" col-sm-6 col-xs-12 col-md-6">
        <div class="form-group">
          <input type="text" placeholder="Nome"  name="multiple[]" class="form-control">
        </div>
        <div class="form-group">
          <input id="cpf" placeholder="CPF" type="text" name="cpf[]" data-validate-linked="cpf" data-inputmask="'mask' : '***-***-***-**'"   class="form-control col-md-6 col-xs-12">
        </div>
        <div class="form-group">
          <input type="text" placeholder="Endereço" id="residencia" name="residencia[]"  class="form-control col-md-7 col-xs-12">
        </div>
        <div class="form-group">
          <input type="text" placeholder="Nacionalidade" id="nacionalidade" name="nacionalidade[]"  class="form-control col-md-7 col-xs-12">
        </div>
        <div class="form-group">
          <input type="text" placeholder="Profissão" id="profissao" name="profissao[]"  class="form-control col-md-7 col-xs-12">
        </div>
        <div class="form-group">
          <input type="text" placeholder="Estado Civil" id="civil" name="civil[]"  class="form-control col-md-7 col-xs-12">
        </div>    
        <span class="input-group-btn "><button type="button" class=" btn btn-default btn-add">+
        </button></span>                       
      </div>
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_produto">Produto<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <select name="produto_id" required="required" class="form-control col-md-7 col-xs-12">
      <?php
       foreach ($produtos as $produto){                            
      ?>
         <option value="<?=$produto->getId()?>"><?=$produto->getNome()?></option>
      <?php
       }
      ?>  
      </select>
    </div>
  </div>
  <div class="item form-group ">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="razao">Departamentos<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <select multiple="multiple" id="my-select" name="my-select[]" class="form-control col-md-7 col-xs-12"> 
    <?php
      foreach ($departamentos as  $departamento) {
    ?>
            <option value='<?=$departamento->getId()?>'>
              <?=$departamento->getDescricao()?>                                
            </option>
    <?php
      }
    ?>
      </select>
    </div>
  </div>
 
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="data_inicio">Inicio<span class="required">*</span></label>
    <div class="col-sm-2 col-xs-12 col-md-2">
      <input type="date" id="data_inicio" name="inicio" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
    </div>
    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="data_fim">Fim<span class="required">*</span></label>
    <div class="col-sm-2 col-xs-12 col-md-2">
      <input type="date" id="data_fim" name="fim" required="required" data-validate-length-range="6,20" class="form-control col-md-7 col-xs-12">
     </div>
  </div>
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button type="submit" class="btn btn-success">Cadastrar</button>
      <input type="hidden" name="market_id" id="market" value="<?=$id?>" /> 
      <input type="hidden" name="status_contrato_id" id="market" value="1" /> 
    </div>
  </div>  
</form>	

<?php require_once "script.php"; ?>

<script src="../../vendors/lou-multi-select/js/jquery.multi-select.js" type="text/javascript">

</script>
<script type="text/javascript">
    $('#my-select').multiSelect();
</script>
<script type="text/javascript">
  $(function () {
    var addFormGroup = function (event) {
      event.preventDefault();

      var $formGroup = $(this).closest('.form-group');
      var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
      var $formGroupClone = $formGroup.clone();

      $(this)
      .toggleClass('btn-default btn-add btn-danger btn-remove')
      .html('–');

      $formGroupClone.find('input').val('');
      $formGroupClone.insertAfter($formGroup);

      var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
      if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
        $lastFormGroupLast.find('.btn-add').attr('disabled', true);
      }
    };

    var removeFormGroup = function (event) {
      event.preventDefault();

      var $formGroup = $(this).closest('.form-group');
      var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

      var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
      if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
        $lastFormGroupLast.find('.btn-add').attr('disabled', false);
      }

      $formGroup.remove();
    };

    var countFormGroup = function ($form) {
      return $form.find('.form-group').length;
    };

    $(document).on('click', '.btn-add', addFormGroup);
    $(document).on('click', '.btn-remove', removeFormGroup);

  });
</script>
  

<?php	require_once "rodape.php"; ?>

