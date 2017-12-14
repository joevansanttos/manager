<?php
  require_once "conexao.php";
  header('Content-Type: application/json');

  $input = filter_input_array(INPUT_POST);


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

  if(($data= mysqli_real_escape_string($conexao->conecta(), $input["data"])) != NULL){
     if($input["action"] === 'edit'){
       $query = "  UPDATE tarefas  SET  data = '".$data."' WHERE id = '".$input["id"]."' ";
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

  if(($descricao = mysqli_real_escape_string($conexao->conecta(), $input["descricao"])) != NULL){
     if($input["action"] === 'edit'){
     $query = "  UPDATE tarefas SET descricao = '".$descricao ."' WHERE id = '".$input["id"]."' ";      
      mysqli_query($conexao->conecta(), $query);
      mysqli_close($conexao);
     }
  }


  echo json_encode($input);
?>