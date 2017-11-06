<?php	
	require_once "../includes/cabecalho.php"; 
	require_once "../includes/logica.php"; 
	require_once "../dao/UsuarioDao.php"; 
?>	

<h3>Perfil do Usuário</h3>
	
<?php require "../includes/body.php";	?>
<a data-toggle="tooltip" data-placement="top" title="Editar Perfil"  class="btn btn-warning" href="usuario-altera.php?id=<?=$usuario->getId()?>"><i class="fa fa-pencil"></i></a>			
<div class="profile_img">
	<div id="crop-avatar">
		<div class="profile-userpic ">
			<img class="img-responsive img-circle profile_img" src="../images/user.png">
		</div>

		<!-- Current avatar -->                          
		<img >
	</div>
</div>
<h3><?=$usuario->getNome()?><?=' '?><?=$usuario->getSobrenome()?></h3>


			    	


<?php	require "../includes/script.php"; ?>
<?php	require "../includes/rodape.php"; ?>