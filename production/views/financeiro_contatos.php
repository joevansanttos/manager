<?php	
	require_once "cabecalho.php";
	require_once "../dao/FornecedorDao.php"; 
  require_once "../dao/UsuarioDao.php"; 
  require_once "../dao/ContatoClienteDao.php"; 
  require_once "../dao/ContatoFornecedorDao.php"; 


  $contatoClienteDao = new ContatoClienteDao($conexao);
  $contatosClientes = $contatoClienteDao->lista();

  $contatoFornecedorDao = new ContatoFornecedorDao($conexao);
  $contatosFornecedores = $contatoFornecedorDao->lista();

  $usuarioDao = new UsuarioDao($conexao);
  $usuarios = $usuarioDao->listaUsuarios();
 
?>

<!-- Datatables -->
<link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


	
<?php require_once "css.php"; ?> 

<h3>Financeiro</h3>

<?php require "../views/body.php";  ?>

<div class="x_title">
  <h2>Lista de Contatos Cadastrados</h2>
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
  <div class="col-sm-12">
    <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-tabs-horizontal">
      <li class="active"><a href="#htab1" data-toggle="tab">Clientes</a></li>
      <li><a href="#htab2" data-toggle="tab">Fornecedores</a>
      </li>
      <li><a href="#htab3" data-toggle="tab">Funcionários</a></li>
    </ul>
    <div class="tab-content">
      <!-- TAB CLIENTE-->
      <div role="tabpanel" class="tab-pane fade in active" id="htab1">
        <br>
      <?php
      if($contatosClientes != null){
      ?>
        <table  class="table table-bordered">
         <thead>
           <tr>
             <th>Nome</th>
             <th>Cliente</th>
             <th>Email</th>
             <th>Estado</th>
             <th>Cidade</th>
             <th>Telefone</th>
             <th>Ações</th>
           </tr>
         </thead>
         <tbody>
           <?php
           foreach ($contatosClientes as $c):
             $cidade = $usuarioDao->buscaCidade($c->getCidade() );                               
             ?>
             <tr>
               <td><?=$c->getNome()?></td>
               <td><?=$c->getMarket()->getNome()?></td>
               <td><?=$c->getEmail() ?></td>
               <td><?=$c->getEstado() ?></td>                      
               <td><?=$cidade?></td>
               <td><?=$c->getTel() ?></td>
               <td align="center">
                 <a href="financeiro_contato_cliente_altera.php?id=<?=$c->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Altera Fornecedor" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                 <a  href="../remove/remove_contato_cliente.php?id=<?=$c->getId()?>" class="delete" data-toggle="tooltip" data-placement="top" title="Remover Fornecedor"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
               </td>          
             </tr>
             <?php
           endforeach
           ?>
         </tbody>      
        </table>
      <?php
      }
      ?>
        <br>
        <div class="text-center">
          <a style="justify-content: center;" data-toggle="tooltip" data-placement="top"  class=" btn btn-primary btn-block "  href="financeiro_contato_cliente_form.php"><strong>NOVO CONTATO DE UM CLIENTE</strong></a>
        </div>
      </div>
      <!-- END TAB CLIENTE-->

      <!-- TAB FORNECEDOR-->
      <div role="tabpanel" class="tab-pane fade" id="htab2">
        <br>
        <?php
        if($contatosFornecedores != null){
        ?>
          <table  class="table table-bordered">
           <thead>
             <tr>
               <th>Nome</th>
               <th>Fornecedor</th>
               <th>Email</th>
               <th>Estado</th>
               <th>Cidade</th>
               <th>Telefone</th>
               <th>Ações</th>
             </tr>
           </thead>
           <tbody>
             <?php
             foreach ($contatosFornecedores as $f):
               $cidade = $usuarioDao->buscaCidade($f->getCidade() );                               
               ?>
               <tr>
                 <td><?=$f->getNome()?></td>
                 <td><?=$f->getFornecedor()->getNome()?></td>
                 <td><?=$f->getEmail() ?></td>
                 <td><?=$f->getEstado() ?></td>                      
                 <td><?=$cidade?></td>
                 <td><?=$f->getTel() ?></td>
                 <td align="center">
                   <a href="financeiro_contato_fornecedor_altera.php?id=<?=$f->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Alterar Contato de Fornecedor" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                   <a  href="../remove/remove_contato_fornecedor.php?id=<?=$f->getId()?>" class="delete" data-toggle="tooltip" data-placement="top" title="Remover Contato de Fornecedor"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                 </td>           
               </tr>
               <?php
             endforeach
             ?>
           </tbody>      
          </table>
        <?php
        }
        ?>
        
        <div class="text-center">
          <a style="justify-content: center;" data-toggle="tooltip" data-placement="top"  class=" btn btn-primary btn-block "  href="financeiro_contato_fornecedor_form.php"><strong>NOVO CONTATO DE UM FORNECEDOR</strong></a>
        </div>
      </div>
      <!-- END TAB FORNECEDOR-->

      <!-- TAB FUNCIONARIO-->
      <div role="tabpanel" class="tab-pane fade in" id="htab3">
        <br>
       <table  class="table table-bordered">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Estado</th>
            <th>Cidade</th>
            <th>Telefone</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($usuarios as $u):
            $cidade = $usuarioDao->buscaCidade($u->getCidade() );                               
            ?>
            <tr>
              <td><?=$u->getNome() .' '.$u->getSobrenome()  ?></td>
              <td><?=$u->getEmail() ?></td>
              <td><?=$u->getEstado() ?></td>                      
              <td><?=$cidade?></td>
              <td><?=$u->getTelefone() ?></td>          
            </tr>
            <?php
          endforeach
          ?>
        </tbody>      
       </table>
      </div>
      <!-- END TAB FUNCIONARIO-->
    </div>
  </div>
</div>

			

<?php	require_once "script.php"; ?>

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

<?php	require_once "rodape.php"; ?>