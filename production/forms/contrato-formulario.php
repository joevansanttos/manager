<?php	
  require_once "cabecalho-form.php";
  require_once "../dao/ProdutoDao.php";
  require_once "../dao/ClienteDao.php";  
  $produtoDao = new ProdutoDao($conexao);
  $produtos = $produtoDao->listaProdutos();
  $id = $_GET['id'];
  $clienteDao = new ClienteDao($conexao);
  $cliente = $clienteDao->buscaMarket($id); 
?>	

  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Novo Prospect</h3>
        </div>
        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Pesquise...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <form action="../adiciona/adiciona-contrato.php" method="get" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">                  
                <div class="item form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nº Contrato <span class="required">*</span>
                 </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                   <input type="text" readonly="readonly" value="<?=$i?>" id="n_contrato" name="n_contrato" required="required" class="form-control" >
                 </div>
                </div>
                <div class="item form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_cliente">Nome Fantasia<span class="required">*</span>
                 </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                   <input readonly="readonly" type="text" value="<?=$market['nome']?>" id="nome" name="nome" required="required" class="form-control col-md-7 col-xs-12">
                 </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="razao">Razão Social <span class="required">*</span>
                 </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                   <input  readonly="readonly" id="razao" name="razao" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" value="<?=$market['razao']?>" name="razao" required="required" type="text">
                 </div>
                </div>
                <div class="item form-group">
                  <label for="cnpj" class="control-label col-md-3 col-sm-3 col-xs-12">CNPJ <span class="required">*</span></label>
                 <div class="col-sm-6 col-xs-12 col-md-6">
                  <input readonly="readonly" id="cnpj" value="<?=$market['cnpj']?>" type="text" name="cnpj" data-validate-linked="cnpj" class="form-control col-md-2 col-xs-12" required="required">
                 </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="endereco">Sede <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input readonly="readonly" type="text" id="sede" name="sede" value="<?=$market['endereco']?>" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                 </div>
                </div>
                <div class="item form-group ">
                  <div class="form-group">
                    <label for="socio" class="control-label col-md-3 col-sm-3 col-xs-12">Sócio <span class="required">*</span></label>                      
                    <div class=" col-sm-6 col-xs-12 col-md-6">
                      <div class="form-group">
                        <input type="text" placeholder="Nome" required="required" name="multiple[]" class="form-control">
                      </div>
                      <div class="form-group">
                        <input id="cpf" placeholder="CPF" type="text" name="cpf[]" data-validate-linked="cpf" data-inputmask="'mask' : '***-***-***-**'" required="required"  class="form-control col-md-6 col-xs-12" required="required">
                      </div>
                      <div class="form-group">
                        <input type="text" placeholder="Endereço" id="residencia" name="residencia[]" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="form-group">
                        <input type="text" placeholder="Nacionalidade" id="nacionalidade" name="nacionalidade[]" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="form-group">
                        <input type="text" placeholder="Profissão" id="profissao" name="profissao[]" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="form-group">
                        <input type="text" placeholder="Estado Civil" id="civil" name="civil[]" required="required" class="form-control col-md-7 col-xs-12">
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
                    <select name="id_produto" required="required" class="form-control col-md-7 col-xs-12">
                     <?php
                     foreach ($produtos as $produto){                            
                       ?>
                       <option value="<?=$produto['id_produto']?>"><?=$produto['nome']?></option>
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
                  
                    <select multiple="multiple" id="my-select" name="my-select[]">
                  <?php
                    foreach ($departamentos as  $departamento) {
                  ?>
                          <option value='<?=$departamento['id_departamento']?>'>
                            <?=$departamento['descricao']?>                                
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
                    <input type="date" id="data_inicio" name="data_inicio" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                  </div>
                  <label class="control-label col-md-2 col-sm-3 col-xs-12" for="data_fim">Fim<span class="required">*</span></label>
                  <div class="col-sm-2 col-xs-12 col-md-2">
                    <input type="date" id="data_fim" name="data_fim" required="required" data-validate-length-range="6,20" class="form-control col-md-7 col-xs-12">
                   </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                    <input type="hidden" name="id_prospect" id="id_prospect" value="<?=$prospect['id_prospect']?>" />
                    <input type="hidden" name="id_consultor" id="id_consultor" value="<?=$usuario['id_usuario']?>" />
                    
                  </div>
                </div>  
              </form>
            </div>
          </div>        
        </div>
      </div>
    </div>
  </div>

<?php require_once "script-form.php"; ?>

  

<?php	require_once "rodape-form.php"; ?>

</body>
</html>