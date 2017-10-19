<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "../includes/cabecalho.php"; 
	require_once "../dao/SuspectDao.php";
	require_once "../dao/ClienteDao.php";
?>
	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>Suspects</h3>
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
			    	<div class="x_content">			    		
			    		<table id="tabela" class="table datatable table-hover">
			    		  <thead>
			    		    <tr>
			    		    	<th>Empresa</th>
			    		      <th>Contato</th>
			    		      <th>Data</th>
			    		      <th>Hora</th>
			    		      <th class="col-md-2">Ações</th>				     
			    		    </tr>
			    		  </thead>
			    		  <tbody>

			    		    <?php
			    		    	$suspectDao = new SuspectDao($conexao);
			    		    	$suspects = $suspectDao->listaSuspects();
			    		      foreach ($suspects as $suspect): 
			    		      	$clienteDao = new ClienteDao($conexao);
			    		      	$idCliente = $suspect->getIdCliente();
			    		      	$cliente = $clienteDao->buscaMarket($idCliente);				                                
			    		    ?>
			    		      <tr>
			    		      	<td><?=$cliente->getNome()?></td>
			    		        <td><?=$suspect->getNome()?></td>
			    		        <td><?=$suspect->getData()?></td>
			    		        <td><?=$suspect->getHora()?></td>
			    		        <td><a href="../forms/prospect-formulario.php?id=<?=$cliente->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Contato" class="btn btn-default btn-xs"><i class="fa fa-plus"></i></button></a></td>
			    		      </tr>
			    		    <?php				
			    		      endforeach
			    		     ?>
			    		  </tbody>      
			    		</table>
			    		<div class="ln_solid"></div>
			    		</div>
			    	</div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
	<!-- page content -->

<?php	
	require_once "../includes/rodape.php"; 
?>