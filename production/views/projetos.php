<?php 
  require_once "cabecalho.php"; 
  require_once "../dao/ContratoDao.php";
  require_once "../dao/ConsultorProjetoDao.php";
  require_once "../dao/DepartamentoContratoDao.php";
  require_once "../dao/TarefaContratoDao.php";
?>

<!-- Datatables -->
<link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


<?php require_once "css.php"; ?> 
 
<h3>Projetos</h3>

<?php 
  require_once "body.php"; 
?>

<table id="tabela" class="table table-bordered projects">
 <thead>
   <tr>
     <th>Nomes do Projeto</th>
     <th>Membros do Projeto</th>
     <th>Progresso do Projeto</th>
     <th class="col-md-2">Ações</th>
   </tr>
   <tbody>
     <?php
      $consultorProjetoDao = new ConsultorProjetoDao($conexao);
      if($usuario_id == 1){
        $projetos = $consultorProjetoDao->listaTodos(); 
      }else{
        $projetos = $consultorProjetoDao->busca($usuario_id); 
      }
      
      $finalizados = 0;
      $total = 0;    
      foreach ($projetos as $projeto){
        $contrato = $projeto->getContrato();
        $departamentoContratoDao = new DepartamentoContratoDao($conexao);
        $departamentosContratos = $departamentoContratoDao->listaDepartamentosContratos($contrato);
        foreach ($departamentosContratos as $departamentoContrato) {
          $tarefaContratoDao = new TarefaContratoDao($conexao);
          $tarefasContrato = $tarefaContratoDao->listaTarefasContratos($departamentoContrato);
          foreach ($tarefasContrato as $t) {
            if($t->getStatusAtividade()->getId() == 5){
              $finalizados++;
            }
            $total++;
          }
        }
        if($finalizados != 0){
          $num = $total/$finalizados;
          $progresso = round($num);
        }else{
           $progresso = 0;
        }


       
        $market = $contrato->getMarket();
        $consultoresProjeto = $consultorProjetoDao->lista($contrato->getNumero());
     ?>
     <tr>
       <td>
         <a><?=$market->getNome()?></a>
         <br />
         <small>Criado em <?=$contrato->getInicio()?></small>
       </td>
       <td>
         <ul class="list-inline">
          <?php
           foreach ($consultoresProjeto as $c) {
          ?>
            <li>
              <img src="../images/user.png"  class="avatar" alt="Avatar">
              <?=$c->getConsultor()->getNome()?>
            </li>

          <?php
           }
          ?>
         </ul>
       </td>
       <td class="project_progress">
         <div class="progress progress_sm">
           <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?=$progresso?>"></div>
         </div>
         <small> <?=$progresso?>% Completado</small>
       </td>
       <td align="center">                                
         <a href="detalhes-projeto.php?id=<?=$contrato->getNumero()?>" data-toggle="tooltip" data-placement="top" title="Ver Projeto" class="btn btn-success btn-xs"><i class="fa fa-search"></i></a>
         <a href="consultores-projeto-formulario.php?id=<?=$contrato->getNumero()?>" data-toggle="tooltip" data-placement="top" title="Adicionar Consultores a Projeto" class="btn btn-warning btn-xs"><i class="fa fa-users"></i></a>
         <a href="../remove/remove-projeto.php?id=<?=$contrato->getNumero()?>" data-toggle="tooltip" data-placement="top" title="Remover Projeto" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
       </td>
     </tr>
     <?php
      }  
     ?>                            
   </tbody>
 </thead>
</table>  

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