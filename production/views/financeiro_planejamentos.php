<?php	
	require_once "cabecalho.php";
	require_once "../dao/PlanejamentoDao.php";

  $planejamentoDao = new PlanejamentoDao($conexao);
  $planejamentos = $planejamentoDao->lista();  
?>

<!-- Datatables -->
<link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../css/planejamento.css">
	
<?php require_once "css.php"; ?> 

<h3>Financeiro</h3>

<?php require "../views/body.php";  ?>

<div class="x_title">
  <h2>Planejamento</h2>
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
        <th class="col-md-8">Empresa</th>
        <th class="col-md-2">Ano</th>       
        <th class="col-md-2">Ações</th> 
      </tr>
    </thead>
    <tbody>
      <?php        
        foreach ($planejamentos as $planejamento): 
      ?>
        <tr>
          <td>PROJEK</td>
          <td><?=$planejamento->getAno()?></td>         
          <td align="center">
            <a href="financeiro_plan_receita_form.php?id=<?=$planejamento->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Nova Receita do Planejamento" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button></a>
            <a href="financeiro_plan_despesa_form.php?id=<?=$planejamento->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Nova Despesa do Planejamento" class="btn btn-danger btn-xs"><i class="fa fa-plus"></i></button></a>
            <a href="financeiro_planejamento.php?id=<?=$planejamento->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Ver Planejamento" class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
            <a href="financeiro_plan_altera.php?id=<?=$planejamento->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Alterar Ano do Planejamento" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
          </td>
        </tr>
      <?php
        endforeach
      ?>
    </tbody>      
  </table>
  
<div class="ln_solid"></div>

<a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Novo Planejamento" href="financeiro_plan_form.php?"><i class="fa fa-plus"></i></a>
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

  