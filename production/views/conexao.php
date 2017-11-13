<?php
  require_once "../aut/logica.php";
  require_once "../class/Conexao.php";
  require_once "../dao/UsuarioDao.php"; 
  require_once "../dao/MensagemDao.php"; 
  error_reporting(E_ALL ^ E_NOTICE);
  ob_start();
  session_start();
  verificaUsuario();
  $conexao = new Conexao();
  $usuario_id = $_SESSION["usuario_logado"];
  $usuarioDao = new UsuarioDao($conexao);
  $usuario = $usuarioDao->buscaUsuario($usuario_id);
  $mensagemDao = new MensagemDao($conexao);
  $mensagens = $mensagemDao->buscaMensagens($usuario_id);
?>