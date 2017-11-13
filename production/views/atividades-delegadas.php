<?php	
	require_once "cabecalho.php"; 
	require_once "../dao/AtividadeDao.php";
  require_once "../dao/StatusAtividadeDao.php";
?>



<?php require_once "css.php"; ?>

<h3>Tarefas Delegadas</h3>

<?php require_once "body.php";	?>

<table id="tabela" class="table table-striped projects">
  <thead>
    <tr>
      <th class="col-md-3">Atividade</th>
      <th>Delegante</th>
      <th>Colaborador</th>
      <th>Progresso da Atividade</th>
      <th>Status</th>
      <th class="col-md-2">Ações</th>
    </tr>
    <tbody>
      <?php
          $atividadeDao = new AtividadeDao($conexao);
          $atividades = $atividadeDao->listaAtividadesDelegadadas($usuario_id);
          foreach ($atividades as $atividade):
            $novoInicio = date("d-m-Y", strtotime($atividade->getInicio()));
            $novoPrazo = date("d-m-Y", strtotime($atividade->getPrazo()));
            $status_atividade_id = $atividade->getStatusAtividade()->getId();
            $statusAtividadeDao = new StatusAtividadeDao($conexao);
            $statusAtividade = $statusAtividadeDao->buscaStatusAtividade($status_atividade_id);                           
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
              <img src="../images/user.png"  class="avatar" alt="Avatar">
              <?= $atividade->getDelegante()->getNome() .' '. $atividade->getDelegante()->getSobrenome()?>
            </li>
          </ul>
        </td>
        <td>
          <ul class="list-inline">
            <li>
              <img src="../images/user.png"  class="avatar" alt="Avatar">
              <?= $atividade->getDelegado()->getNome() .' '. $atividade->getDelegado()->getSobrenome()?>
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
            <button type="button" class="btn btn-danger btn-xs"><?=$atividade->getStatusAtividade()->getDescricao()?></button>
          <?php    
            }elseif($statusAtividade->getPorcentagem() == 25){
          ?>
            <button type="button" class="btn btn-warning btn-xs"><?=$atividade->getStatusAtividade()->getDescricao()?></button>
          <?php
            }elseif($statusAtividade->getPorcentagem() == 50){
          ?>
            <button type="button" class="btn btn-primary btn-xs"><?=$atividade->getStatusAtividade()->getDescricao()?></button>
          <?php    
            }elseif($statusAtividade->getPorcentagem() == 75){
          ?>
            <button type="button" class="btn btn-info btn-xs"><?=$atividade->getStatusAtividade()->getDescricao()?></button>
          <?php
            }else{
          ?>
            <button type="button" class="btn btn-success btn-xs"><?=$atividade->getStatusAtividade()->getDescricao()?></button>
          <?php
            }
          ?>
          
        </td>
        <td align="center">
          <a href="../views/atividade-detalhes.php?id=<?=$atividade->getId()?>" data-toggle="tooltip" data-placement="top" title="Ver Atividade"><button class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
          <a href="../views/atividade-altera.php?id=<?=$atividade->getId()?>" data-toggle="tooltip" data-placement="top" title="Editar Atividade"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
          <a href="../remove/remove-atividade.php?id=<?=$atividade->getId()?>" data-toggle="tooltip" data-placement="top" title="Remover Atividade"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>           
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
<a class="btn btn-default" style="" href="../views/atividade-formulario.php?"><i class="fa fa-plus"></i></a>
</div>

<?php	
	require_once "script.php";
?>

<script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>


<?php
	require_once "rodape.php"; 
?>