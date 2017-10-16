<?php	
	require_once "cabecalho.php"; 
	require_once "class/UsuarioDao.php"; 
?>
	
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Usuários</h3>
			</div>

			<div class="title_right">
				<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
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
				      <th>Email</th>
				      <th>Estado</th>
				      <th>Telefone</th>
				      <th class="col-md-2">Ações</th>
				    </tr>
				  </thead>
				  <tbody>
				    <?php
				    	$usuarioDao = new UsuarioDao($conexao);
				    	$usuarios = $usuarioDao->listaUsuarios();
				      foreach ($usuarios as $usuario):                               
				    ?>
				      <tr>
				        <td><?=$usuario->getNome() .' '.$usuario->getSobrenome()  ?></td>
				        <td><?=$usuario->getEmail() ?></td>
				        <td><?=$usuario->getEstado() ?></td>
				        <td><?=$usuario->getTelefone() ?></td>
				        <td></td>				       
				      </tr>
				    <?php
				      endforeach
				    ?>
				  </tbody>      
				</table>
				<div class="ln_solid"></div>
				  <a class="btn btn-default" style="" href="usuario-formulario.php?"><i class="fa fa-plus"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>   



<?php	require_once "rodape.php"; ?>