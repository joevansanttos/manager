<?php
  require_once "../views/conexao.php";
  require_once "../dao/PlanejamentoDespesaDao.php";

  $id = $_GET['id'];
  $planejamentoDespesaDao = new PlanejamentoDespesaDao($conexao);
  $planejamentoDespesa= $planejamentoDespesaDao->busca($id);
  $planejamentoDespesaDao->remove($planejamentoDespesa);
  $id = $planejamentoDespesa->getPlanejamento()->getId();
  header("Location: ../views/financeiro_planejamento_detalhado.php?id=$id");
?>