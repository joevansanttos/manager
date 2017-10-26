<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "../includes/cabecalho.php"; 
	require_once "../dao/ProdutoDao.php"; 
?>
	

<h3>Produtos</h3>

<?php require "../includes/body.php";	?>			

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
			</tr>
			<?php
		endforeach
		?>
	</tbody>      
</table>
<div class="ln_solid"></div>
<a class="btn btn-default" style="" href="../tables/market-formulario.php?"><i class="fa fa-plus"></i></a>
</div>

			

<?php	require_once "../includes/script.php"; ?>
<?php	require_once "../includes/rodape.php"; ?>