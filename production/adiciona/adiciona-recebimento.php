<?php
	require_once "../views/conexao.php";
	require_once "../factory/RecebimentoFactory.php";
	require_once "../dao/RecebimentoDao.php";

	if($_FILES["image"]["tmp_name"] != null){
		$image_tmp = getimagesize($_FILES["image"]["tmp_name"]);
		if($image_tmp !== false){
			$image_name = $_FILES['image']['name'];
			$image_path = 'upload/' . $_FILES['image']['name'];		
			move_uploaded_file($_FILES['image']['tmp_name'], '../' . $image_path);
			chmod('../' . $image_path, 0777);
			$_POST['image'] = $image_path;
		}
	}

	$factory = new RecebimentoFactory();
	$recebimento = $factory->criaRecebimento($_POST);
	$recebimentoDao = new RecebimentoDao($conexao);
	$recebimento = $recebimentoDao->insereRecebimento($recebimento);

	header("Location: ../views/transacoes.php");
?>