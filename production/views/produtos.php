<?php	
	require_once "cabecalho.php"; 
	require_once "../dao/ProdutoDao.php"; 
?>

<!-- Datatables -->
<link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<?php	require_once "css.php"; ?>	

<h3>Produtos</h3>

<?php require_once "body.php";	?>			

<table id="tabela" class="table table-bordered">
	<thead>
		<tr>
			<th>Produto</th>
			<th>Micro</th>
			<th>Pequena</th>
			<th>Média/Grande</th>
			<th>Micro/Partner</th>                              
			<th>Pequena/Partner</th>                              
			<th>Média/Grande/Partner</th>
	<?php
	  if($usuario->getId() == 1){
	?>  
			<th>Ações</th>
	<?php
	  }
	?> 
		</tr>
	</thead>
	<tbody>
		<?php
		$produtoDao = new ProdutoDao($conexao);
		$produtos = $produtoDao->listaProdutos();
		foreach ($produtos as $produto):                               
			?>
			<tr>
				<td><?=$produto->getNome() ?></td>
				<td><?='R$ '.number_format($produto->getPreco(), 2, '.', '')?></td>
				<td><?='R$ '.number_format($produto->getPreco() * 1.5, 2, '.', '')?></td>
				<td><?='R$ '.number_format($produto->getPreco() * 2, 2, '.', '')?></td>
				<td><?='R$ '.number_format($produto->getPreco() * 1.5, 2,'.','')?></td>
				<td><?='R$ '.number_format($produto->getPreco() * 2, 2, '.', '')?></td>
				<td><?='R$ '.number_format($produto->getPreco() * 2.5, 2, '.', '')?></td>
		<?php
		  if($usuario->getId() == 1){
		?>  
				<td align="center">					
					<a href="produto-altera.php?id=<?=$produto->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Altera Produto" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
					<a href="../remove/remove-produto.php?id=<?=$produto->getId()?>" data-toggle="tooltip" data-placement="top" title="Remover Atividade"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>           
				</td> 
		<?php
		  }
		?>
			</tr>
			<?php
		endforeach
		?>
	</tbody>      
</table>
<div class="ln_solid"></div>

<a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Novo Produto" href="produto-formulario.php?"><i class="fa fa-plus"></i></a>
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