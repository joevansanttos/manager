<?php	
  require_once "cabecalho-form.php";

  $id = $_GET['id'];
  
?>	
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Novo Lead</h3>
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
            <form action="adiciona-lead.php" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">         
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nome do Contato <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="nome" name="nome" required="required" class="form-control col-md-7 col-xs-12" value="">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="senha">Email<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="email" id="email" name="email" required="required" class="form-control col-md-8 col-xs-12">
                </div>
              </div>
              <div class="item form-group">
                <label for="tel" class="control-label col-md-3 col-sm-3 col-xs-12">Telefone <span class="required">*</span></label>
                <div class="col-sm-6 col-xs-12 col-md-2">
                  <input id="tel" data-inputmask="'mask' : '(99) 9999[9]-9999'" type="text" name="tel" data-validate-linked="tel" class="form-control col-md-2 col-xs-12" required="required">
                </div>
                <label class="control-label col-md-1 col-sm-3 col-xs-12" for="mail">Cargo <span class="required">*</span>
                </label>
                <div class="col-sm-8 col-xs-12 col-md-3">
                  <select id="cargo" name="cargo" required class="form-control col-md-8 col-xs-12">
                    <option value="">Selecione...</option>                     
                    <option value="Coordenador">Coordenador</option>
                    <option value="Diretor">Diretor</option>
                    <option value="Gerente">Gerente</option>
                    <option value="Gestor">Gestor</option>
                    <option value="Socio">Sócio Proprietário</option>                      
                  </select>
                </div>
              </div>              
              <br>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button type="reset" name="reset" class="btn btn-primary">Resetar</button>
                  <button id="send" type="submit" class="btn btn-success">Cadastrar</button>
                  <input type="hidden" name="id" id="id" value="<?=$id?>" />
                </div>
              </div>                     
            </form>        
          </div>
        </div>        
      </div>
    </div>
  </div>
</div>

<?php	require_once "rodape-form.php"; ?>