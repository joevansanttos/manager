<?php	
  require_once "cabecalho.php";
  require_once "../dao/ContratoDao.php";
  require_once "../dao/CategoriaDao.php";
  require_once "../dao/PagamentoDao.php";
  require_once "../dao/UsuarioDao.php";
  require_once "../dao/FilialDao.php";
  require_once "../dao/CustoDao.php";


  $usuarioDao = new UsuarioDao($conexao);
  $colaboradores = $usuarioDao->listaColaboradores();

  $id = $_GET['id'];
  $custoDao = new CustoDao($conexao);
  $custo = $custoDao->busca($id);
?>

<?php require_once "css.php"; ?> 

<h3>Financeiro</h3>

<?php require_once "body.php"; ?>

<div class="x_title">
  <h2>Alterar Despesa de Colaborador</h2>
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



<form action="../altera/altera-custo.php?id=<?=$id?>" method="post" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">                      
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Descrição<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" id="descricao" name="descricao" value="<?=$custo->getDescricao()?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="item form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="usuario_id">Despesa de<span class="required">*</span>
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
    <select name="usuario_id" class="form-control col-md-7 col-xs-12">
     <?php                          
      foreach ($colaboradores as $colaborador): 
     ?>       
      <option value="<?=$colaborador->getId()?>"><?=$colaborador->getNome() . ' ' . $colaborador->getSobrenome()?></option>
      <?php
      endforeach
      ?>  
    </select>
   </div>
  </div> 
  <div class="item form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_cliente">Categoria<span class="required">*</span>
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
     <select name="categoria_id" class="form-control col-md-7 col-xs-12">
      <?php
        $categoriaDao = new CategoriaDao($conexao);
        $categorias = $categoriaDao->listaCategoriasCusto();
       foreach ($categorias as $categoria): 
      ?>       
       <option value="<?=$categoria->getId()?>"><?=$categoria->getDescricao()?></option>
      <?php
       endforeach
      ?>  
     </select>
   </div>
  </div> 
  <div class="item form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="filial_id">Filial<span class="required">*</span>
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
     <select name="filial_id" class="form-control col-md-7 col-xs-12">
      <?php
        $filialDao = new FilialDao($conexao);
        $filiais = $filialDao->lista();
       foreach ($filiais as $filial): 
      ?>       
       <option value="<?=$filial->getId()?>"><?=$filial->getNome()?></option>
      <?php
       endforeach
      ?>  
     </select>
   </div>
  </div>
  <div class="item form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_cliente">Pagamentos<span class="required">*</span>
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
     <select name="pagamento_id" class="form-control col-md-7 col-xs-12">
      <?php
        $pagamentoDao = new PagamentoDao($conexao);
        $pagamentos = $pagamentoDao->listaPagamentos();                            
       foreach ($pagamentos as $pagamento): 
      ?>       
       <option value="<?=$pagamento->getId()?>"><?=$pagamento->getDescricao()?></option>
      <?php
       endforeach
      ?>  
     </select>
   </div>
  </div>
  <div class="item form-group">
   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_cliente">Pago?<span class="required">*</span>
   </label>
   <div class="col-md-6 col-sm-6 col-xs-12">
     <select id="pago_id" name="pago_id" class="form-control col-md-7 col-xs-12">
      <?php
        $pagoDao = new PagoDao($conexao);
        $pagos = $pagoDao->listaPago();                            
       foreach ($pagos as $pago): 
      ?>       
       <option value="<?=$pago->getId()?>"><?=$pago->getDescricao()?></option>
      <?php
       endforeach
      ?>  
     </select>
   </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Data <span class="required">*</span>
    </label>
    <div class="col-md-2 col-sm-3 col-xs-4">
      <input type="date" id="data" name="data" required="required" value="<?=$custo->getData()?>"  data-validate-length-range="8,20" class=" date-picker form-control col-md-8 col-xs-12">
    </div> 
    <label class="control-label col-md-1 col-sm-1" for="valor">Valor<span class="required">*</span>
    </label>
    <div class="col-sm-2 col-xs-12 col-md-3">
      <input type="text" id="valor" name="valor" onblur="convert()" value="<?=$custo->getValor()?>" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
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

<script>
  function convert(){
    var num = document.getElementById('valor').value;
    novoValor =parseFloat(num).toFixed(2);
    document.getElementById('valor').value = novoValor ;
  }
</script>

<script type="text/javascript">
  document.getElementById('usuario_id').value = '<?=$custo->getUsuario()->getId()?>';
</script>

<script type="text/javascript">
  document.getElementById('categoria_id').value = '<?=$custo->getCategoria()->getId()?>';
</script>

<script type="text/javascript">
  document.getElementById('filial_id').value = '<?=$custo->getFilial()->getId()?>';
</script>

<script type="text/javascript">
  document.getElementById('pagamento_id').value = '<?=$custo->getPagamento()->getId()?>';
</script>

<script type="text/javascript">
  document.getElementById('pago_id').value = '<?=$custo->getPago()->getId()?>';
</script>

<?php	require_once "rodape.php"; ?>