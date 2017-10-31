<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "../includes/cabecalho.php"; 
	require_once "../dao/AtividadeDao.php";
  require_once "../dao/StatusAtividadeDao.php";
?>

<h3>Tarefas</h3>

<?php require "../includes/body.php";	?>

<table class="table table-striped projects">
  <thead>
    <tr>
      <th style="width: 40%">Atividade</th>
      <th>Funcionário</th>
      <th>Progresso do Projeto</th>
      <th>Status</th>
      <th style="width: 10%">#Editar</th>
    </tr>
    <tbody>
      <?php
          $atividadeDao = new AtividadeDao($conexao);
          $atividades = $atividadeDao->listaAtividades();
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
              <?= $atividade->getUsuario()->getNome() .' '. $atividade->getUsuario()->getSobrenome()?>
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
          <button type="button" class="btn btn-success btn-xs"><?=$atividade->getStatusAtividade()->getDescricao()?></button>
        </td>
        <td>                                
          <a href="../tables/atividade-altera.php?id=<?=$atividade->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Altera Prospect" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
          <a  href="../remove/remove-atividade.php?id=<?=$atividade->getId()?>" data-toggle="tooltip" data-placement="top" title="Remover Prospect"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
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
<a class="btn btn-default" style="" href="../tables/atividade-formulario.php?"><i class="fa fa-plus"></i></a>
</div>

<?php	
	require_once "../includes/script.php";
	require_once "../includes/rodape.php"; 
?>