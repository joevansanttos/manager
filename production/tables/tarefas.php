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
    	<th>Nome</th>
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
      	$atividadeDao = new AtividadeDao($conexao);                              
    ?>
      <tr>
      	<td><?=$cliente->getNome()?></td>
        <td><?=$suspect->getNome()?></td>
        <td><?=$suspect->getData()?></td>
        <td><?=$suspect->getHora()?></td>
        <td align="center">
          <a href="../tables/prospect-formulario.php?id=<?=$cliente->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Contato" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></button></a>
          <a href="../forms/form-lead.php"><button data-toggle="tooltip" data-placement="top" title="Novo Lead" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
          <a href="../forms/form-lead.php"><button data-toggle="tooltip" data-placement="top" title="Novo Lead" class="btn btn-success btn-xs"><i class="fa fa-search"></i></button></a>
          
          <a href="../tables/lead-formulario.php?id=<?=$cliente->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Novo Lead" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
        </td>
      </tr>
    <?php				
      endforeach
     ?>
  </tbody>      
</table>
<div class="ln_solid"></div>
</div>

<?php	
	require_once "../includes/script.php";
	require_once "../includes/rodape.php"; 
?>