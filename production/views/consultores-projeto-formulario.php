<?php	
  require_once "cabecalho.php"; 
  require_once "../dao/ContratoDao.php";
  require_once "../dao/UsuarioDao.php";
  require_once "../dao/ConsultorProjetoDao.php"; 

  $id = $_GET['id']; 
  $contratoDao = new ContratoDao($conexao);
  $contrato = $contratoDao->buscaContrato($id);
  $consultorProjetoDao = new ConsultorProjetoDao($conexao);
  $consultoresProjeto = $consultorProjetoDao->lista($contrato->getNumero());
  $usuarioDao = new UsuarioDao($conexao);
  $consultores = $usuarioDao->listaConsultores();
?>

<link href="../../vendors/lou-multi-select/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">


<?php require_once "css.php"; ?> 

<h3>Adicionar Consultores a Projeto</h3>

<?php require_once "body.php"; ?>       

<form action="../adiciona/adiciona-consultores-projeto.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Cliente<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="nome" name="nome" readonly="readonly" value="<?=$contrato->getMarket()->getNome()?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="item form-group ">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="razao">Consultores<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <select multiple="multiple" id="consultores" name="consultores[]" class="form-control col-md-7 col-xs-12"> 
      <?php
        foreach ($consultores as  $consultor) {
          $cont = 0;
          foreach ($consultoresProjeto as $consultorProjeto) {
            if($consultorProjeto->getConsultor()->getId() == $consultor->getId()){
              $cont++;
            }
          }

          if($cont == 0){
      ?>
            <option value='<?=$consultor->getId()?>'>
              <?=$consultor->getNome() . ' ' . $consultor->getSobrenome()?>                                
            </option>
      <?php
          }else{
      ?>

          <option value='<?=$consultor->getId()?>' selected>
            <?=$consultor->getNome() . ' ' . $consultor->getSobrenome()?>                                
          </option>

      <?php
          }
      ?>
          
      <?php
        }
      ?>
      </select>
    </div>
  </div>       
  <div class="ln_solid"></div>
  <div class=" form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
      <button id="send" type="submit" name="enviar" class="btn btn-success">Adicionar</button>
      <input type="hidden" name="contrato_id" id="contrato_id" value="<?=$id?>" />
    </div>
  </div>
</form>

<?php require_once "script.php"; ?>

<script src="../../vendors/lou-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>

<script type="text/javascript">
    $('#consultores').multiSelect();
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