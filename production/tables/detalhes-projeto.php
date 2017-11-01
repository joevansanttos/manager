<?php 
  error_reporting(E_ALL ^ E_NOTICE);
  require_once "../includes/cabecalho.php"; 
  require_once "../dao/ContratoDao.php";
  require_once "../dao/DepartamentoContratoDao.php";
  require_once "../dao/TarefaContratoDao.php";
  require_once "../dao/StatusAtividadeDao.php";
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
    <th class="col-md-1">Data</th>
    <th class="col-md-2">Status</th>
    <th  class="col-md-3">Consultor</th>
    <th class="col-md-1">Ações</th>
   </thead>
   <tbody>
  <?php
    foreach ($tarefasContrato as $tarefaContrato){      
      $statusAtividade = $tarefaContrato->getStatusAtividade();
      $usuarioDao = new UsuarioDao($conexao);
      if($tarefaContrato->getUsuario() != null){
        $usuario = $usuarioDao->buscaUsuario($tarefaContrato->getUsuario());
      }else{
        $usuario = null;
      }
      
  ?>                  
      <tr>
       <td class="hide"> <?=$tarefaContrato->getId()?></td>
       <td><?=$tarefaContrato->getTarefa()->getDescricao()?></td> 
       <td><?=$tarefaContrato->getHoras()?></td>
       <td><?=$tarefaContrato->getFim()?></td>
       <td><?=$statusAtividade->getDescricao()?></td>

       <td>
        <?php
          if($usuario != null){
            $usuario->getNome();
          }
        ?>
        
      </td>      
       <td align="center">
        <a href="detalhes-projeto.php?id=<?=$contrato->getNumero()?>" class="btn btn-primary btn-xs"><i class="fa fa-file"></i></a>
        <a href="detalhes-projeto.php?id=<?=$contrato->getNumero()?>" class="btn btn-success btn-xs"><i class="fa fa-search"></i></a>
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
  require_once "../includes/script.php"; 
?>
  
<script src="../js/jquery.tabledit.min.js">
</script>
<script>
$(".datatable").each( function() {
  var id = this.id;
  $('#'+ id).Tabledit({
    url:'action.php',
    deleteButton: false,
    editButton: false,
    hideIdentifier: true,
    columns:{
      identifier:[0, "id"],
      editable:[[2, 'horas'], [3, 'data'], [4, 'status', '{"1": "Não Iniciada", "2": "Em Andamento", "3": "Em Conclusão", "4": "Concluída" }']]
    }
  });
});
</script>


<?php 
  require_once "../includes/rodape.php"; 
?>