<?php
  require_once "../class/Conexao.php";
  header('Content-Type: application/json');

  $conexao = new Conexao(); 
  $id_usuario = 1;
  $input = filter_input_array(INPUT_POST);

  if(($horas= mysqli_real_escape_string($conexao->conecta(), $input["horas"])) != NULL){
     if($input["action"] === 'edit'){
       $query = "  UPDATE tarefas_contrato  SET horas = '".$horas."' WHERE id = '".$input["id"]."' ";
      mysqli_query($conexao->conecta(), $query);
      mysqli_close($conexao);
     }
  }

  if(($data_fim= mysqli_real_escape_string($conexao, $input["data_fim"])) != NULL){
     if($input["action"] === 'edit'){
       $query = "  UPDATE tarefas_contrato  SET  data_fim = '".$data_fim."', id_consultor = '".$id_usuario."' WHERE id = '".$input["id"]."' ";
       mysqli_query($conexao, $query);
      mysqli_close($conexao);
     }
  }    

  echo json_encode($input);
?>