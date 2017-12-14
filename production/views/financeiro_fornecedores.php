
<?php	
require_once "cabecalho.php";
require_once "../dao/FornecedorDao.php";  
?>

<!-- Datatables -->
<link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<?php require_once "css.php";?> 

<h3>Financeiro</h3>

<?php require "../views/body.php";?>

<div class="x_title">
  <h2>Lista de Fornecedores Cadastrados</h2>
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

  <table id="tabela" class="table table-bordered ">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Segmento</th>	
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $fornecedorDao = new FornecedorDao($conexao);
      $fornecedores = $fornecedorDao->listaFornecedores();
      foreach ($fornecedores as $fornecedor): 
        $cidade = $fornecedorDao->buscaCidade($fornecedor->getCidade());                              
        ?>
        <tr>
          <td><?=$fornecedor->getNome()?></td>
          <td><?=$fornecedor->getTel()?></td>
          <td><?=$cidade?></td>
          <td><?=$fornecedor->getEstado()?></td>
          <td><?=$fornecedor->getSegmento()?></td>
          <td align="center">
            <a href="financeiro_fornecedor_altera.php?id=<?=$fornecedor->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Altera Fornecedor" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
            <a  href="../remove/remove_fornecedor.php?id=<?=$fornecedor->getId()?>" class="delete" data-toggle="tooltip" data-placement="top" title="Remover Fornecedor"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
          </td>
        </tr>
        <?php
      endforeach
      ?>
    </tbody>      
  </table>

  <div class="ln_solid"></div>

  <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Novo Fornecedor" href="financeiro_fornecedor_form.php?"><i class="fa fa-plus"></i></a>
</div>



<?php	require_once "script.php";?>

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

<?php	require_once "rodape.php";?>

