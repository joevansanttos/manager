<?php 
  require_once "cabecalho.php"; 
  require_once "../dao/AtividadeDao.php";
  require_once "../dao/StatusAtividadeDao.php";
?>

<!-- Datatables -->
<link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


<?php require_once "css.php"; ?>

<h3>Tarefas</h3>

<?php require "../views/body.php";  ?>

<div class="x_title">
  <h2>Lista de Tarefas requiridas a um Colaborador</h2>
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

<table id="tabela" class="table table-bordered projects">
  <thead>
    <tr>
      <th>Atividade</th>
      <th class="col-md-3">Delegante</th>
      <th class="col-md-2">Progresso</th>
      <th class="col-md-1">Status</th>
      <th class="col-md-1">Prazo</th>
      <th class="col-md-1">Ações</th>
    </tr>
    <tbody>
      <?php
          $atividadeDao = new AtividadeDao($conexao);
          $atividades = $atividadeDao->listaAtividadesRequiridas($usuario_id);
          foreach ($atividades as $atividade):
            $novoInicio = date("d-m-Y", strtotime($atividade->getInicio()));
            $novoPrazo = date("d-m-Y", strtotime($atividade->getPrazo()));
            $status_atividade_id = $atividade->getStatusAtividade()->getId();
            $statusAtividadeDao = new StatusAtividadeDao($conexao);
            $statusAtividade = $statusAtividadeDao->buscaStatusAtividade($status_atividade_id);
            date_default_timezone_set('America/Bahia');
            $today= date("Y-m-d");
            $status_prazo_id = $atividade->getStatusPrazo()->getId();
            if($status_prazo_id == 1){
              if((strtotime($atividade->getPrazo())) < (strtotime($today))){
                $atividadeDao->atualizaStatusPrazo($atividade, 2);
              }
            }
            
                                   
      ?>
      <tr>
        <td>
          <a><?=$atividade->getDescricao() ?></a>
          <br />
          <small>Inicio em <?=$novoInicio?></small>
           <small>Prazo em <?=$novoPrazo?></small>
        </td>
        <td>
          <ul class="list-inline">
            <li>
               <?= $atividade->getDelegante()->getNome() .' '. $atividade->getDelegante()->getSobrenome()?>
               <br />
               <small>Filial: <?=$atividade->getFilial()?></small>
               <small>Setor: <?=$atividade->getSetor()?></small>
            </li>
          </ul>
        </td>

        <td class="project_progress">
          <div class="progress progress_sm">
            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?=$statusAtividade->getPorcentagem()?>"></div>
          </div>
          <small></small>
        </td>
        <td>
          <?php
            if($statusAtividade->getPorcentagem() == 0){
          ?>
            <button type="button" class="btn btn-danger btn-xs col-md-12"><?=$atividade->getStatusAtividade()->getDescricao()?></button>
          <?php    
            }elseif($statusAtividade->getPorcentagem() == 25){
          ?>
            <button type="button" class="btn btn-warning btn-xs col-md-12"><?=$atividade->getStatusAtividade()->getDescricao()?></button>
          <?php
            }elseif($statusAtividade->getPorcentagem() == 50){
          ?>
            <button type="button" class="btn btn-primary btn-xs col-md-12"><?=$atividade->getStatusAtividade()->getDescricao()?></button>
          <?php    
            }elseif($statusAtividade->getPorcentagem() == 75){
          ?>
            <button type="button" class="btn btn-info btn-xs col-md-12"><?=$atividade->getStatusAtividade()->getDescricao()?></button>
          <?php
            }else{
          ?>
            <button  type="button" class="btn btn-success btn-xs col-md-12"><?=$atividade->getStatusAtividade()->getDescricao()?></button>
          <?php
            }
          ?>
          
        </td>
        <td align="center">
          <?php
            if($atividade->getStatusPrazo()->getId() == 1){
              $button = 'primary';
              $icon = '  fa-history ';
            }else if($atividade->getStatusPrazo()->getId() == 2){
              $button = 'danger';
              $icon = ' fa-thumbs-down';
            }else{
              $button = 'success';
              $icon = ' fa-thumbs-up';
            }

            $texto = $atividade->getStatusPrazo()->getDescricao();  
          ?>
              <button type="button" class="btn btn-<?=$button?> btn-xs" data-toggle="tooltip" data-placement="top" title="<?=$texto?>"><i class="fa <?=$icon?> "></i></button>        
          
        </td>
        <td align="center">
          <a href="../views/atividade-detalhes.php?id=<?=$atividade->getId()?>" data-toggle="tooltip" data-placement="top" title="Ver Atividade"><button class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
          <a href="../views/atividade-altera.php?id=<?=$atividade->getId()?>" data-toggle="tooltip" data-placement="top" title="Editar Atividade"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
        </td>
      </tr>
      <?php
       endforeach
      ?>                            
    </tbody>
  </thead>


   
  </tbody>      
</table>
<div class="ln_solid"></div>
<a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Nova Tarefa" style="" href="../views/atividade-formulario.php?"><i class="fa fa-plus"></i></a>
</div>

<?php 
  require_once "script.php";
?>


<script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- Datatables -->
<script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../js/datatable.js"></script> 


<?php
  require_once "rodape.php"; 
?>