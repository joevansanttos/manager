<?php 

  class Conexao {
    
    function __construct(){
     $this->conecta();
   }
   
    function conecta() {
      $conexao = mysqli_connect("127.0.0.1", "root", "", "manager");
      if(!$conexao)
      {
           die("could not connect");
      }else{
        mysqli_set_charset($conexao, "utf8");
        return $conexao;
      }
     
    }
  }
?>