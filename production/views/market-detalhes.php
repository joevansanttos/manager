<?php 
  error_reporting(E_ALL ^ E_NOTICE);
  require_once "../includes/cabecalho.php"; 
  require_once "../dao/ContratoDao.php";
  require_once "../dao/ClienteDao.php";
  require_once "../dao/DepartamentoContratoDao.php";
  require_once "../dao/TarefaContratoDao.php";
?>

<h3>Cronograma</h3>

<?php 
  require_once "../includes/body.php";
  $id = $_GET['id']; 
  $contratoDao = new ContratoDao($conexao);
  $contrato = $contratoDao->buscaContrato($id);
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
  
  <table id="<?=$id?>" class="table table-bordered table-striped datatable">
   <thead>
    <th class="hide"></th>
    <th  class="col-md-4">Tarefa</th>
    <th class="col-md-1" >Horas</th>
    <th class="col-md-2">Data</th>
    <th  class="col-md-4">Consultor</th>
   </thead>
   <tbody>
  <?php
    foreach ($tarefasContrato as $t_contrato)
    {
      echo '                            
      <tr>
       <td class="hide">'. $t_contrato->getId() .'</td>
       <td>'. $t_contrato->getTarefa()->getDescricao(). '</td> 
       <td>'. $t_contrato->getHoras() .'</td>
       <td>'. $t_contrato->getFim() .'</td>   
       <td>'.'</td>                                      
      </tr>
      ';      
    }
  ?>
   </tbody>
  </table>
<?php
  }
?>






<?php 
  require_once "../includes/script.php"; 
?>
  
<script src="../js/jquery.tabledit.min.js">
</script>
<script>
$(".datatable").each( function() {
  var id = this.id;
  $('#'+ id).Tabledit({
    url:'action.php',
    
    hideIdentifier: true,
    columns:{
      identifier:[0, "id"],
      editable:[[2, 'horas'], [3, 'data']]
    }
  });
});
</script>


<?php 
  require_once "../includes/rodape.php"; 
?>