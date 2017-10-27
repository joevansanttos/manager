<?php 
  error_reporting(E_ALL ^ E_NOTICE);
  require_once "../includes/cabecalho.php"; 
  require_once "../dao/ContratoDao.php";
  require_once "../dao/ClienteDao.php";
?>

<h3>Projetos</h3>

<?php 
  require_once "../includes/body.php"; 
?>

<table class="table table-striped projects">
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
      $contratos = $contratoDao->listaContratos();
       foreach ($contratos as $contrato){
        $clienteDao = new ClienteDao($conexao);
        $cliente = $contrato->getMarket();
     ?>
     <tr>
       <td>#</td>
       <td>
         <a><?=$cliente->getNome()?></a>
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
         <a href="" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
         <a href="../forms/form-consultores-projeto.php?id_projeto=" class="btn btn-warning btn-xs"><i class="fa fa-users"></i></a>
         <a href="../remove/remove-projeto.php?id_projeto=" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
       </td>
     </tr>
     <?php
      }  
     ?>                            
   </tbody>
 </thead>
</table>  

<?php 
  require_once "../includes/script.php"; 
?>
  

<?php 
  require_once "../includes/rodape.php"; 
?>