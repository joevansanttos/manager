<?php	require_once "cabecalho-form.php"; ?>
	
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Novo Usuário</h3>
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
      <div class="x_content">
        <br />
        <form id="form" action="adiciona-usuario.php" method="post"  enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="nome" name="nome" data-parsley-maxlength="10" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sobrenome">Sobrenome <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="sobrenome" name="sobrenome" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="email" id="email" name="email" required="required" class="form-control col-md-8 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="senha">Senha<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="password" id="senha" name="senha" required="required" class="form-control col-md-8 col-xs-12">
            </div>
          </div>           
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="telefone">Telefone<span class="required">*</span></label>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <input class="form-control col-md-8" type="text" id="telefone" data-inputmask="'mask' : '(99) 99999-9999'" name="telefone" required="required"> 
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sexo">Sexo<span class="required">*</span>
            </label>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <select class="form-control col-md-3"  id="sexo" name="sexo" required="required" >
                <option value="feminino">Feminino</option>
                <option value="masculino">Masculino</option>
                <option value="nada">Não Opinar</option>
              </select>  
            </div>
          </div>                 
          <div class=" form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estado1">Estado <span class="required">*</span>
            </label>
            <div class="col-sm-6 col-xs-12 col-md-2">
              <select id="estado1" name="estado1" class="optional form-control col-md-7 col-xs-12"></select>
            </div>
            <label for="cidade1" class="control-label col-md-1 col-sm-3 col-xs-12">Cidade <span class="required">*</span>
            </label>
            <div class="col-sm-6 col-xs-12 col-md-3">
              <select id="cidade1" name="cidade1" class="form-control col-md-7 col-xs-12" required>
              </select>
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
     </div>
    </div>
</div>



<?php	require_once "rodape-form.php"; ?>