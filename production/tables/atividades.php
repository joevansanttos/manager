<?php	
	error_reporting(E_ALL ^ E_NOTICE);
	require_once "../includes/cabecalho.php"; 
	require_once "../dao/AtividadeDao.php";
?>

<h3>Tarefas</h3>

<?php require "../includes/body.php";	?>

<table id="tabela" class="table datatable table-bordered table-striped">
  <thead>
    <tr>
      <th>Descrição</th>
    	<th>Usuario</th>
      <th>Inicio</th>
      <th>Prazo</th>
      <th>Status</th>
      <th>Setor</th>
      <th>Filial</th>
      <th>Importância</th>			     
    </tr>
  </thead>
  <tbody>

    <?php
    	$atividadeDao = new AtividadeDao($conexao);
    	$atividades = $atividadeDao->listaAtividades();
      foreach ($atividades as $atividade):
        $novoInicio = date("d-m-Y", strtotime($atividade->getInicio()));
        $novoPrazo = date("d-m-Y", strtotime($atividade->getPrazo())); 
    ?>
      <tr>
      	<td><?=$atividade->getDescricao() ?></td>
        <td><?=$atividade->getUsuario()->getNome() .' '. $atividade->getUsuario()->getSobrenome() ?></td>
        <td><?=$novoInicio ?></td>
        <td><?=$novoPrazo ?></td>
        <td><?=$atividade->getStatusAtividade()->getDescricao()?></td>
        <td><?=$atividade->getSetor() ?></td>
        <td><?=$atividade->getFilial() ?></td>
        <td><?=$atividade->getImportancia() ?></td>
      </tr>
    <?php				
      endforeach
     ?>
  </tbody>      
</table>
<div class="ln_solid"></div>
<a class="btn btn-default" style="" href="../tables/atividade-formulario.php?"><i class="fa fa-plus"></i></a>
</div>

<?php	
	require_once "../includes/script.php";
	require_once "../includes/rodape.php"; 
?>