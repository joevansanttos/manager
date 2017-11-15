<?php
	require_once "../views/conexao.php";
	require_once "../factory/MarketFactory.php";
	require_once "../dao/MarketDao.php";

	$id = $_GET['id'];
	$marketDao = new MarketDao($conexao);
	$market = $marketDao->buscaMarket($id);

	if($_FILES["image"]["tmp_name"] != null){
		$image_tmp = getimagesize($_FILES["image"]["tmp_name"]);
		if($image_tmp !== false){
			$image_name = $_FILES['image']['name'];
			$image_path = 'upload/' . $_FILES['image']['name'];		
			move_uploaded_file($_FILES['image']['tmp_name'], '../' . $image_path);
			chmod('../' . $image_path, 0777);
			$market->setImage($image_path);
			$_POST['image'] = $image_path;
		}
	}else{
		$_POST['image'] = $market->getImage();
	}

	$factory = new MarketFactory();
	$market = $factory->criaMarket($_POST);
	$market->setId($id);
	$marketDao->atualizaMarket($market);
	
	header("Location: ../views/market.php");  	


?>