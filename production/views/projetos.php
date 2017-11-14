<?php 
  require_once "cabecalho.php"; 
  require_once "../dao/ContratoDao.php";
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

<table id="tabela" class="table table-striped projects">
 <thead>
   <tr>
     <th style="width: 1%">#</th>
     <th style="width: 20%">Nomes do Projeto</th>
     <th>Membros dos Projeto</th>
     <th>Progresso do Projeto</th>
     <th>Status</th>
     <th style="width: 20%">#Editar</th>
   </tr>
   <tbody>
     <?php
      $contratoDao = new ContratoDao($conexao);
      $contratos = $contratoDao->listaContratosAprovados();
       foreach ($contratos as $contrato){
        $market = $contrato->getMarket();
     ?>
     <tr>
       <td>#</td>
       <td>
         <a><?=$market->getNome()?></a>
         <br />
         <small>Criado em</small>
       </td>
       <td>
         <ul class="list-inline">
           <?php
             {
           ?>
           <li>
             <img src="../images/user.png"  class="avatar" alt="Avatar">
             
           </li>
           <?php
             }
           ?>
         </ul>
       </td>
       <td class="project_progress">
         <div class="progress progress_sm">
           <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="57"></div>
         </div>
         <small>57% Completado</small>
       </td>
       <td>
         <button type="button" class="btn btn-success btn-xs">Successo</button>
       </td>
       <td>                                
         <a href="detalhes-projeto.php?id=<?=$contrato->getNumero()?>" class="btn btn-success btn-xs"><i class="fa fa-search"></i></a>
         <a href="../forms/form-consultores-projeto.php?id_projeto=" class="btn btn-warning btn-xs"><i class="fa fa-users"></i></a>
         <a href="../remove/remove-projeto.php?id=<?=$contrato->getNumero()?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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