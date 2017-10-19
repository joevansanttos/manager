<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "cabecalho.php"; 
	require_once "../dao/ProdutoDao.php"; 
?>
	
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Produtos</h3>
			</div>
			<div class="title_right">
				<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Pesquise por...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">Go!</button>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12">
				<table id="tabela" class="table">
				  <thead>
				    <tr>
				      <th>Nome</th>	
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
				      </tr>
				    <?php
				      endforeach
				    ?>
				  </tbody>      
				</table>
				<div class="ln_solid"></div>
				  <a class="btn btn-default" style="" href="../forms/market-formulario.php?"><i class="fa fa-plus"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php	require_once "rodape.php"; ?>