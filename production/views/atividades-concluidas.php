<?php 
  require_once "cabecalho.php"; 
  require_once "../dao/AtividadeDao.php";
  require_once "../dao/StatusAtividadeDao.php";
?>


<?php require_once "css.php"; ?> 


<h3>Tarefas Concluídas</h3>

<?php require_once "body.php";  ?>

<table id="tabela" class="table table-striped projects">
  <thead>
    <tr>
      <th class="col-md-3">Atividade</th>
      <th>Delegante</th>
      <th>Colaborador</th>
      <th>Concluída em</th>
      <th class="col-md-2">Ações</th>
    </tr>
    <tbody>
      <?php
          $atividadeDao = new AtividadeDao($conexao);
          $atividades = $atividadeDao->listaAtividades($usuario_id);
          foreach ($atividades as $atividade){
            if($atividade->getStatusAtividade()->getId() == 5){
              $novoInicio = date("d-m-Y", strtotime($atividade->getInicio()));
              $novoPrazo = date("d-m-Y", strtotime($atividade->getPrazo()));
              $status_atividade_id = $atividade->getStatusAtividade()->getId();
              $statusAtividadeDao = new StatusAtividadeDao($conexao);
              $statusAtividade = $statusAtividadeDao->buscaStatusAtividade($status_atividade_id);
              $novoFim = date("d-m-Y H:i:s", strtotime($atividade->getFim())); 
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

              <td>
                <?=$novoFim ?>
              </td>
              <td align="center">
                <a href="../views/atividade-detalhes.php?id=<?=$atividade->getId()?>" data-toggle="tooltip" data-placement="top" title="Ver Atividade"><button class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
                <a href="../views/atividade-altera.php?id=<?=$atividade->getId()?>" data-toggle="tooltip" data-placement="top" title="Editar Atividade"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                <a href="../remove/remove-atividade.php?id=<?=$atividade->getId()?>" data-toggle="tooltip" data-placement="top" title="Remover Atividade"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>           
              </td>
            </tr>

      <?php
          }                           
      ?>
      <?php
      }
      ?>                            
    </tbody>
  </thead>


   
  </tbody>      
</table>
<div class="ln_solid"></div>
<a class="btn btn-default" style="" href="atividade-formulario.php?"><i class="fa fa-plus"></i></a>
</div>

<?php 
  require_once "script.php";
?>


<?php
  require_once "rodape.php"; 
?>