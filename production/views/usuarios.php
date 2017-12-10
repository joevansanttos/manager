<?php	
	require_once "cabecalho.php"; 
	require_once "../dao/UsuarioDao.php"; 
?>	

<!-- Datatables -->
<link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


<?php	require_once "css.php"; ?>
	
<h3>Usuários</h3>

<?php require "body.php";	?>

<div class="x_title">
  <h2>Lista de Usuários Cadastrados</h2>
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
			
<table id="tabela" class="table table-bordered">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Estado</th>
			<th>Cidade</th>
			<th>Telefone</th>
			<th style="width: 10%">Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$usuarioDao = new UsuarioDao($conexao);
		$usuarios = $usuarioDao->listaUsuarios();
		foreach ($usuarios as $u):
			$cidade = $usuarioDao->buscaCidade($u->getCidade() );                               
			?>
			<tr>
				<td><?=$u->getNome() .' '.$u->getSobrenome()  ?></td>
				<td><?=$u->getEmail() ?></td>
				<td><?=$u->getEstado() ?></td>			    		        
				<td><?=$cidade?></td>
				<td><?=$u->getTelefone() ?></td>
				<td align="center">
					<a href="usuario-perfil.php?id=<?=$u->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Ver Usuário" class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
					<a href="mensagem-formulario.php?id=<?=$u->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Enviar Mensagem" class="btn btn-primary btn-xs"><i class="fa fa-envelope-o"></i></button></a>
				</td>			       
			</tr>
			<?php
		endforeach
		?>
	</tbody>      
</table>
<div class="ln_solid"></div>

<a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Novo Usuário"  href="usuario-formulario.php?"><i class="fa fa-plus"></i></a>
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