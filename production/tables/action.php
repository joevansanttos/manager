<?php
  require_once "../includes/cabecalho.php";
  header('Content-Type: application/json');

  $id_usuario = 1;
  $input = filter_input_array(INPUT_POST);

  if(($status= mysqli_real_escape_string($conexao->conecta(), $input["status"])) != NULL){
     if($input["action"] === 'edit'){
     $query = "  UPDATE tarefas_contrato  SET status_atividade_id = '".$status."' , usuario_id = '".$usuario_id."' WHERE id = '".$input["id"]."' ";      
      mysqli_query($conexao->conecta(), $query);
      mysqli_close($conexao);
     }
  }

  if(($horas= mysqli_real_escape_string($conexao->conecta(), $input["horas"])) != NULL){
     if($input["action"] === 'edit'){
      $query = "  UPDATE tarefas_contrato  SET horas = '".$horas."' , usuario_id = '".$usuario_id."' WHERE id = '".$input["id"]."' ";
      mysqli_query($conexao->conecta(), $query);
      mysqli_close($conexao);
     }
  }

  if(($data_fim= mysqli_real_escape_string($conexao, $input["data_fim"])) != NULL){
     if($input["action"] === 'edit'){
       $query = "  UPDATE tarefas_contrato  SET  data_fim = '".$data_fim."', usuario_id = '".$usuario_id."' WHERE id = '".$input["id"]."' ";
       mysqli_query($conexao, $query);
      mysqli_close($conexao);
     }
  }    

  echo json_encode($input);
?>