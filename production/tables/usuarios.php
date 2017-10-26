<?php	
	require "../includes/cabecalho.php"; 
	require "../dao/UsuarioDao.php"; 
?>	
	
<h3>Usuários</h3>
<?php require "../includes/body.php";	?>
			
<table id="tabela" class="table table-striped">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Estado</th>
			<th>Cidade</th>
			<th>Profissao</th>
			<th>Telefone</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$usuarioDao = new UsuarioDao($conexao);
		$usuarios = $usuarioDao->listaUsuarios();
		foreach ($usuarios as $usuario):
			$cidade = $usuarioDao->buscaCidade($usuario->getCidade() );                               
			?>
			<tr>
				<td><?=$usuario->getNome() .' '.$usuario->getSobrenome()  ?></td>
				<td><?=$usuario->getEmail() ?></td>
				<td><?=$usuario->getEstado() ?></td>			    		        
				<td><?=$cidade?></td>
				<td><?=$usuario->getProfissao()->getDescricao() ?></td>	
				<td><?=$usuario->getTelefone() ?></td>			       
			</tr>
			<?php
		endforeach
		?>
	</tbody>      
</table>
<div class="ln_solid"></div>
<a class="btn btn-default" style="" href="../tables/usuario-formulario.php?"><i class="fa fa-plus"></i></a>
</div>
			    	


<?php	require "../includes/script.php"; ?>
<?php	require "../includes/rodape.php"; ?>