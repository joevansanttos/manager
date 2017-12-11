<?php	
	require_once "cabecalho.php"; 
  require_once "../dao/CurriculoDao.php";  
  require_once "../dao/UsuarioDao.php"; 


  $id = $_GET['id'];
  $curriculoDao = new CurriculoDao($conexao);
  $c = $curriculoDao->busca($id);
  $usuarioDao = new UsuarioDao($conexao);
  $cidade = $usuarioDao->buscaCidade($c->getCidade() ); 

?>	

<?php require_once "css.php"; ?>


<h3>Recursos Humanos</h3>

<?php require "body.php"; ?>

<div class="x_title">
  <h2>Currículo Cadastrado</h2>
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
  <div class="row">
    <div class="col-sm-3">
      <a href="#" class="nav-tabs-dropdown btn btn-block btn-primary">Categorias</a>
      <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked well">
        <li class="active"><a href="#vtab1" data-toggle="tab">Perfil</a></li>
        <li><a href="#vtab2" data-toggle="tab">Contato</a></li>
        <li><a href="#vtab3" data-toggle="tab">Objetivo</a></li>
        <li><a href="#vtab4" data-toggle="tab">Educação</a></li>
        <li><a href="#vtab5" data-toggle="tab">Experiência</a></li>
      </ul>
    </div>
    <div class="col-sm-9">
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="vtab1">
          <h3>Perfil do Candidato</h3>
           <img class="img-responsive img-circle" src="../images/user.png" alt="Avatar" title="Change the avatar"> 
           <br>
           <p><?=$c->getNome() . ' ' . $c->getSobrenome() ?></p>
           <p><?=$c->getSexo()?></p>
           <p><?=$c->getEstado()?></p>
           <p><?=$cidade?></p>
           <p><?=$c->getEndereco()?></p>
         </div>
         <div role="tabpanel" class="tab-pane fade" id="vtab2">
          <h3>Contato do Candidato</h3>
          <p><?=$c->getTelefone()?></p>
          <p><?=$c->getEmail()?></p>
        </div>
        <div role="tabpanel" class="tab-pane fade in" id="vtab3">
          <h3>Objetivo do Candidato</h3>
          <p><?=$c->getObjetivo()?></p>
        </div>
        <div role="tabpanel" class="tab-pane fade in" id="vtab4">
          <h3>Educação do Candidato</h3>
          <p><?=$c->getCurso()?></p>
          <p><?=$c->getUniversidade()?></p>
          <p><?=$c->getConclusao() . ' em ' . $c->getAno()?></p>
          <p><?=$c->getQualificacoes()?></p>
        </div>
        <div role="tabpanel" class="tab-pane fade in" id="vtab5">
          <h3>Experiência do Candidato</h3>
          <p><?=$c->getEmpresa1()?></p>
          <p><?=$c->getEntrada1() .' - '. $c->getSaida1()?></p>
          <p><?=$c->getCargo1()?></p>
        </div>
      </div>
    </div>
  </div>


<?php	require "script.php"; ?>



<?php	require "rodape.php"; ?>