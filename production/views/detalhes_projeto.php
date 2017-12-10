<?php 
  require_once "cabecalho.php"; 
  require_once "../dao/ContratoDao.php";
  require_once "../dao/DepartamentoContratoDao.php";
  require_once "../dao/RelatorioDao.php";
  require_once "../dao/TarefaDao.php";
  require_once "../dao/StatusAtividadeDao.php";
  require_once "../dao/ConsultorProjetoDao.php";

  $id = $_GET['id']; 
  $contratoDao = new ContratoDao($conexao);
  $contrato = $contratoDao->buscaContrato($id);
  $consultorProjetoDao = new ConsultorProjetoDao($conexao);
  $consultoresProjeto = $consultorProjetoDao->lista($contrato->getNumero());
  $consultores = [];

  foreach ($consultoresProjeto as $c) {
    $c_id = $c->getConsultor()->getId();
    $string = (string)$c_id;
    $consultores[$string] = $c->getConsultor()->getNome() . ' ' . $c->getConsultor()->getSobrenome();
  }
  $departamentoContratoDao = new DepartamentoContratoDao($conexao);
	$departamentosContratos = $departamentoContratoDao->listaDepartamentosContratos($contrato);
?>

<link rel="stylesheet" type="text/css" href="../css/cronograma.css">


<?php require_once "css.php"; ?> 


<h3>Consultoria</h3>

<?php require "../views/body.php";  ?>

<div class="x_title">
  <h2>Cronograma do Projeto</h2>
  <ul class="nav navbar-right panel_toolbox">
    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
    </li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">Settings 1</a>
        </li>
        <li><a href="#">Settings 2</a>
        </li>
      </ul>
    </li>
    <li><a class="close-link"><i class="fa fa-close"></i></a>
    </li>
  </ul>
  <div class="clearfix"></div>
</div>
<div class="x_content"> 

<div class="tabbable-panel">
	<div class="tabbable-line">
		<ul class="nav nav-tabs ">
			<?php
				$i = 0;
				foreach ($departamentosContratos as $departamentoContrato) {
					
			?>

			<?php
				if($i == 0){
			?>
				<li class="active">
					<?php
						$iString = (string)$i;
						$tabDefault = '#tab' . $iString;
					?>
					<a href=<?=$tabDefault?> data-toggle="tab">
					<?=$departamentoContrato->getDepartamento()->getDescricao()?> </a>
				</li>

			<?php
				}else{
			?>

				<li>
					<?php
						$iString = (string)$i;
						$tabDefault = '#tab' . $iString;
					?>
					<a href=<?=$tabDefault?> data-toggle="tab">
					<?=$departamentoContrato->getDepartamento()->getDescricao()?></a>
				</li>

			<?php
				}
			?>
			
			<?php
					$i++;
				}
			?>
		</ul>

		<div class="tab-content">
			<?php
				$j = 0;
				foreach ($departamentosContratos as $departamentoContrato) {
					$tarefaDao = new TarefaDao($conexao);
					$tarefas =$tarefaDao->listaTarefas($departamentoContrato->getId());
			?>

			<?php
				if($j == 0){
			?>

				<?php
					$jString = (string)$j;
					$tabDefault = 'tab' . $jString;
					$id = 'editable_table' . $jString;
				?>

				<div class="tab-pane active" id=<?=$tabDefault?>>

					<table id="<?=$id?>" class="table table-bordered table-striped datatable">
					 <thead>
					 	<th class="hide"></th>
					  <th  class="col-md-3">Tarefa</th>
					  <th class="col-md-1" >Horas</th>
					  <th class="col-md-1">Data</th>
					  <th class="col-md-2">Status</th>
					  <th  class="col-md-2">Consultor</th>
					  <th style="width: 12%;">Ações</th>
					 </thead>
					 <tbody>
						<?php
					  foreach ($tarefas as $tarefa){      
					    $statusAtividade = $tarefa->getStatusAtividade();
						?>                  
					    <tr>
					    	<td class="hide"> <?=$tarefa->getId()?></td>
					     	<td><?=$tarefa->getDescricao()?></td> 
					     	<td><?=$tarefa->getHoras()?></td>
					     	<td><?=$tarefa->getFim()?></td>
					     	<td><?=$statusAtividade->getDescricao()?></td>
					     	<td><?=$tarefa->getUsuario()->getNome() . ' ' . $tarefa->getUsuario()->getSobrenome()?></td>
					     	<td align="center">
					     		<a href="relatorio-altera.php" data-toggle="tooltip" data-placement="top" title="Editar Relatório" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
					     		<a href="detalhes-relatorio.php" data-toggle="tooltip" data-placement="top" title="Ver Relatório" class="btn btn-success btn-xs"><i class="fa fa-search"></i></a>
					     		<a href="detalhes-relatorio.php" data-toggle="tooltip" data-placement="top" title="Ver Relatório" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
					    	</td>
					    </tr> 
						<?php  
					  	}
						?>
					 </tbody>
					</table>

					<div class="text-center">
					  <a style="justify-content: center;" data-toggle="tooltip" data-placement="top"  class=" btn btn-danger    btn-block "  href="tarefa_form.php?id=<?=$departamentoContrato->getId()?>"><strong>NOVA TAREFA</strong></a>
					</div>
				</div>

			<?php
				}else{
			?>
				<?php
					$jString = (string)$j;
					$tabDefault = 'tab' . $jString;
					$id = 'editable_table' . $jString;
				?>
				<div class="tab-pane" id=<?=$tabDefault?> >

					<table id="<?=$id?>" class="table table-bordered table-striped datatable">
					 <thead>
					 	<th class="hide"></th>
					  <th  class="col-md-3">Tarefa</th>
					  <th class="col-md-1" >Horas</th>
					  <th class="col-md-1">Data</th>
					  <th class="col-md-2">Status</th>
					  <th  class="col-md-2">Consultor</th>
					  <th style="width: 12%;">Ações</th>
					 </thead>
					 <tbody>
						<?php
					  foreach ($tarefas as $tarefa){      
					    $statusAtividade = $tarefa->getStatusAtividade();
						?>                  
					    <tr>
					    	<td class="hide"> <?=$tarefa->getId()?></td>
					     	<td><?=$tarefa->getDescricao()?></td> 
					     	<td><?=$tarefa->getHoras()?></td>
					     	<td><?=$tarefa->getFim()?></td>
					     	<td><?=$statusAtividade->getDescricao()?></td>
					     	<td><?=$tarefa->getUsuario()->getNome() . ' ' . $tarefa->getUsuario()->getSobrenome()?></td>
					     	<td align="center">
					     		<a href="relatorio-altera.php" data-toggle="tooltip" data-placement="top" title="Editar Relatório" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
					     		<a href="detalhes-relatorio.php" data-toggle="tooltip" data-placement="top" title="Ver Relatório" class="btn btn-success btn-xs"><i class="fa fa-search"></i></a>
					     		<a href="detalhes-relatorio.php" data-toggle="tooltip" data-placement="top" title="Ver Relatório" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
					    	</td>
					    </tr> 
						<?php  
					  	}
						?>
					 </tbody>
					</table>

					<div class="text-center">
					  <a style="justify-content: center;" data-toggle="tooltip" data-placement="top"  class=" btn btn-danger    btn-block "  href="tarefa_form.php?id=<?=$departamentoContrato->getId()?>"><strong>NOVA TAREFA</strong></a>
					</div>
				</div>

			<?php
				}
			?>
			
			<?php
					$j++;
				}
			?>
		</div>

	</div>
</div>



<?php 
  require_once "script.php"; 
?>


<script src="../js/jquery.tabledit.min.js">
</script>
<script>
$(".datatable").each( function() {
  var id = this.id;
  var consultores = <?=json_encode($consultores)?>;
  var jsonConsultores = JSON.stringify(consultores);
  $('#'+ id).Tabledit({
    url:'action.php',
    deleteButton: false,
    editButton: false,
    hideIdentifier: true,
    columns:{
      identifier:[0, "id"],
      editable:[[2, 'horas'], [3, 'data_fim'], [4, 'status', '{"1": "Não Iniciada", "2": "Iniciada", "3": "Em Andamento", "4": "Em Conclusão", "5": "Concluída" }'], [5, 'consultor', jsonConsultores ]]
    }
  });
});
</script>


<?php 
  require_once "rodape.php"; 
?>