<?php	
	require_once "../includes/cabecalho.php"; 
	require_once "../dao/UsuarioDao.php"; 
?>	
	
<h3>Usuários</h3>

<?php require "../includes/body.php";	?>
			
<table id="tabela" class="table table-bordered">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Estado</th>
			<th>Cidade</th>
			<th>Sexo</th>
			<th>Telefone</th>
			<th>Ações</th>
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
				<td><?=$u->getSexo() ?></td>
				<td><?=$u->getTelefone() ?></td>
				<td align="center">
					<a href="../tables/market-profile.php?id=<?=$u->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Ver Market" class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
					<a href="../tables/mensagem-formulario.php?id=<?=$u->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Altera Prospect" class="btn btn-primary btn-xs"><i class="fa fa-envelope-o"></i></button></a>
				</td>			       
			</tr>
			<?php
		endforeach
		?>
	</tbody>      
</table>
<div class="ln_solid"></div>

<a class="btn btn-default" style="" href="../tables/usuario-formulario.php?"><i class="fa fa-plus"></i></a>
</div>		    	


<?php	require_once "../includes/script.php"; ?>
<?php	require_once "../includes/rodape.php"; ?>