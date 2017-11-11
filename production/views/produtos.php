<?php	
	require_once "cabecalho.php"; 
	require_once "../dao/ProdutoDao.php"; 
?>

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
			<th>Ações</th>
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
				<td align="center">
					<a href="../views/produto-altera.php?id=<?=$produto->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Altera Produto" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
					<a href="../remove/remove-produto.php?id=<?=$produto->getId()?>" data-toggle="tooltip" data-placement="top" title="Remover Atividade"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>           
				</td>       
			</tr>
			<?php
		endforeach
		?>
	</tbody>      
</table>
<div class="ln_solid"></div>

<a class="btn btn-default" style="" href="../views/produto-formulario.php?"><i class="fa fa-plus"></i></a>
</div>

			

<?php	require_once "script.php"; ?>

<?php	require_once "rodape.php"; ?>