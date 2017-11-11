<?php	
	require_once "cabecalho.php"; 
	require_once "../dao/UsuarioDao.php"; 
?>	

<?php	require_once "css.php"; ?>	

<h3>Consultores</h3>

<?php require "body.php";	?>
			
<table id="tabela" class="table table-bordered">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Estado</th>
			<th>Cidade</th>
			<th>Sexo</th>
			<th>Telefone</th>
			<th class="col-md-1">Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$usuarioDao = new UsuarioDao($conexao);
		$usuarios = $usuarioDao->listaUsuarios();
		foreach ($usuarios as $u):
			$cidade = $usuarioDao->buscaCidade($u->getCidade() );
			if($u->getProfissao()->getId() == 1){
		?>
			<tr>
				<td><?=$u->getNome() .' '.$u->getSobrenome()  ?></td>
				<td><?=$u->getEmail() ?></td>
				<td><?=$u->getEstado() ?></td>			    		        
				<td><?=$cidade?></td>
				<td><?=$u->getSexo() ?></td>
				<td><?=$u->getTelefone() ?></td>
				<td align="center">
					<a href="../views/market-profile.php?id=<?=$u->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Ver Market" class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
					<a href="../views/mensagem-formulario.php?id=<?=$u->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Altera Prospect" class="btn btn-primary btn-xs"><i class="fa fa-envelope-o"></i></button></a>
				</td>					       
			</tr>
		<?php
		}
		endforeach
		?>
	</tbody>      
</table>
<div class="ln_solid"></div>
<a class="btn btn-default" style="" href="../views/usuario-formulario.php?"><i class="fa fa-plus"></i></a>
</div>
			    	


<?php	require "script.php"; ?>
<?php	require "rodape.php"; ?>