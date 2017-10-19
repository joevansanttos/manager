<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "../includes/cabecalho.php"; 
	require_once "../dao/ClienteDao.php"; 
?>
	
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Market</h3>
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
		  <div class="col-md-12 col-sm-12 col-xs-12">
		    <div class="x_panel">
		      <div class="x_title">
		        <ul class="nav navbar-right panel_toolbox">
		          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		          </li>
		          <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
		            <ul class="dropdown-menu" role="menu">
		              <li><a href="#">Settings 1</a></li>
		              <li><a href="#">Settings 2</a></li>
		            </ul>
		          </li>
		          <li><a class="close-link"><i class="fa fa-close"></i></a></li>
		        </ul>
		      </div>
		      <div class="clearfix"></div>                
		      <div class="x_content">
		        <div class="row">
		         	<div class="col-md-12 col-sm-12 col-xs-12">
		         		<table id="tabela" class="table">
		         		  <thead>
		         		    <tr>
		         		      <th>Nome</th>	
		         		      <th class="col-md-2">Ações</th>			     
		         		    </tr>
		         		  </thead>
		         		  <tbody>
		         		    <?php
		         		    	$clienteDao = new ClienteDao($conexao);
		         		    	$clientes = $clienteDao->listaClientes();
		         		      foreach ($clientes as $cliente):                               
		         		    ?>
		         		      <tr>
		         		        <td><?=$cliente->getNome() ?></td>
		         		        <td><a href="../forms/lead-formulario.php?id=<?=$cliente->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Contato" class="btn btn-default btn-xs"><i class="fa fa-plus"></i></button></a></td>
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
		</div>
	</div>
</div>

<?php	require_once "../includes/rodape.php"; ?>