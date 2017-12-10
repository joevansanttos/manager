<?php
  require_once "conexao.php";
  header('Content-Type: application/json');

  $input = filter_input_array(INPUT_POST);
  var_dump($input);

  if(($status= mysqli_real_escape_string($conexao->conecta(), $input["status"])) != NULL){
     if($input["action"] === 'edit'){
     $query = "  UPDATE tarefas  SET status_atividade_id = '".$status."' WHERE id = '".$input["id"]."' ";      
      mysqli_query($conexao->conecta(), $query);
      mysqli_close($conexao);
     }
  }

  if(($horas= mysqli_real_escape_string($conexao->conecta(), $input["horas"])) != NULL){
     if($input["action"] === 'edit'){
      $query = "  UPDATE tarefas  SET horas = '".$horas."'  WHERE id = '".$input["id"]."' ";
      mysqli_query($conexao->conecta(), $query);
      mysqli_close($conexao);
     }
  }

  if(($data_fim= mysqli_real_escape_string($conexao->conecta(), $input["data_fim"])) != NULL){
     if($input["action"] === 'edit'){
       $query = "  UPDATE tarefas  SET  data_fim = '".$data_fim."' WHERE id = '".$input["id"]."' ";
       mysqli_query($conexao->conecta(), $query);
      mysqli_close($conexao);
     }
  } 

  if(($consultor= mysqli_real_escape_string($conexao->conecta(), $input["consultor"])) != NULL){
     if($input["action"] === 'edit'){
      $query = "  UPDATE tarefas SET usuario_id = '".$consultor."' WHERE id = '".$input["id"]."' ";
      mysqli_query($conexao->conecta(), $query);
      mysqli_close($conexao);
     }
  }


  echo json_encode($input);
?>