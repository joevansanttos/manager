<?php	
	require_once "../includes/cabecalho.php"; 
	require_once "../includes/logica.php"; 
	require_once "../dao/UsuarioDao.php"; 
	error_reporting(E_ALL ^ E_NOTICE);
	ob_start();
	session_start();
	verificaUsuario();
	$email = $_SESSION["usuario_logado"];
	$usuarioDao = new UsuarioDao($conexao);
	$usuario = $usuarioDao->buscaUsuarioEmail($email);
	$usuario_id = $usuario->getId();
?>	

<h3>Perfil do Usuário</h3>
	
<?php require "../includes/body.php";	?>
<a data-toggle="tooltip" data-placement="top" title="Editar Perfil"  class="btn btn-warning" href="usuario-altera.php?id=<?=$usuario->getId()?>"><i class="fa fa-pencil"></i></a>			
<div class="profile_img">
	<div id="crop-avatar">
		<div class="profile-userpic ">
		<?php                 
			$imagem = $usuarioDao->buscaImagem($usuario_id);
			if($imagem != null)
				echo '<img class="img-responsive  profile_img col-md-5" src="data:image/jpeg;base64,'.base64_encode( $imagem['image'] ).'"/>';
			else
		?>
			<img class="img-responsive img-circle profile_img" src="../images/user.png">
		</div>

		<!-- Current avatar -->                          
		<img >
	</div>
</div>
<h3><?=$usuario->getNome()?><?=' '?><?=$usuario->getSobrenome()?></h3>


			    	


<?php	require "../includes/script.php"; ?>
<?php	require "../includes/rodape.php"; ?>