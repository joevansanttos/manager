<?php 
  require_once "cabecalho.php"; 
  require_once "../dao/ContratoDao.php";
  require_once "../dao/DepartamentoContratoDao.php";
  require_once "../dao/TarefaContratoDao.php";
  require_once "../dao/RelatorioDao.php";
  require_once "../dao/StatusAtividadeDao.php";
  require_once "../dao/ConsultorProjetoDao.php";

?>



<?php require_once "css.php"; ?> 


<h3>Cronograma</h3>

<?php 
  require_once "body.php";
?>

<?php
  $id = $_GET['id']; 
  $contratoDao = new ContratoDao($conexao);
  $relatorioDao = new RelatorioDao($conexao);  
  $contrato = $contratoDao->buscaContrato($id);
  $consultorProjetoDao = new ConsultorProjetoDao($conexao);
  $consultoresProjeto = $consultorProjetoDao->lista($contrato->getNumero());
  $consultores = [];

  foreach ($consultoresProjeto as $c) {
    $c_id = $c->getConsultor()->getId();
    $string = (string)$c_id;
    $consultores[$string] = $c->getConsultor()->getNome();
  }

  $departamentoContratoDao = new DepartamentoContratoDao($conexao);
  $departamentosContratos = $departamentoContratoDao->listaDepartamentosContratos($contrato);
  $i = 1;
  foreach ($departamentosContratos as $departamentoContrato) {
    $tarefaContratoDao = new TarefaContratoDao($conexao);
    $tarefasContrato = $tarefaContratoDao->listaTarefasContratos($departamentoContrato);
    $string_i = (string)$i;
    $id = 'editable_table' . $string_i;
    $i++;
?>


  <div class="x_title">
    <h2><?=$string_i . '.' . $departamentoContrato->getDepartamento()->getDescricao()?></h2>
    <br>
    <div class="ln_solid"></div>
  </div>
  

  <table id="<?=$id?>" class="table table-bordered table-striped datatable">
   <thead>
    <th class="hide"></th>
    <th  class="col-md-4">Tarefa</th>
    <th class="col-md-1" >Horas</th>
    <th class="col-md-1">Data</th>
    <th class="col-md-2">Status</th>
    <th  class="col-md-2">Consultor</th>
    <th class="col-md-1">Ações</th>
   </thead>
   <tbody>
  <?php
    foreach ($tarefasContrato as $tarefaContrato){      
      $statusAtividade = $tarefaContrato->getStatusAtividade();
      $relatorio = $relatorioDao->buscaRelatorioTarefa($tarefaContrato->getId());
  ?>                  
      <tr>
       <td class="hide"> <?=$tarefaContrato->getId()?></td>
       <td><?=$tarefaContrato->getTarefa()->getDescricao()?></td> 
       <td><?=$tarefaContrato->getHoras()?></td>
       <td><?=$tarefaContrato->getFim()?></td>
       <td><?=$statusAtividade->getDescricao()?></td>
      <?php
        if($tarefaContrato->getUsuario() != null){
      ?>
        <td><?=$tarefaContrato->getUsuario()->getNome() . ' ' . $tarefaContrato->getUsuario()->getSobrenome()?></td>
      <?php
         }else{
      ?>
        <td></td>
      <?php
         }
       ?>
       <td align="center">
        <?php
          if($relatorio != null){
        ?>

          <a href="relatorio-altera.php?id=<?=$relatorio->getId()?>" data-toggle="tooltip" data-placement="top" title="Editar Relatório" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
          <a href="detalhes-relatorio.php?id=<?=$relatorio->getId()?>" data-toggle="tooltip" data-placement="top" title="Ver Relatório" class="btn btn-success btn-xs"><i class="fa fa-search"></i></a>
          

        <?php
          }else{

        ?>
          <a href="relatorio-formulario.php?id=<?=$tarefaContrato->getId()?>" data-toggle="tooltip" data-placement="top" title="Adicionar Relatório" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i></a>
          <button  data-toggle="tooltip" data-placement="top" title="Adicione um Relatório" class="btn btn-danger btn-xs"><i class="fa fa-thumbs-down"></i></button>
        <?php
          }
        ?>
        
      </td>

      </tr> 
  <?php  
    }
  ?>
   </tbody>
  </table>
<?php
  }
?>






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