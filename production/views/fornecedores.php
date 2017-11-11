<?php	
	require_once "cabecalho.php";
	require_once "../dao/FornecedorDao.php";  
?>
	
<?php require_once "css.php"; ?> 

<h3>Fornecedores</h3>

<?php require "body.php";	?>			

<table id="tabela" class="table table-bordered ">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Telefone</th>
      <th>Cidade</th>
      <th>Estado</th>
      <th>Segmento</th>	
      <th class="col-md-1">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    	$fornecedorDao = new FornecedorDao($conexao);
    	$fornecedores = $fornecedorDao->listaFornecedores();
      foreach ($fornecedores as $fornecedor): 
        $cidade = $fornecedorDao->buscaCidade($fornecedor->getCidade() );                              
    ?>
      <tr>
        <td><?=$fornecedor->getNome() ?></td>
        <td><?=$fornecedor->getTel() ?></td>
        <td><?=$cidade ?></td>
        <td><?=$fornecedor->getEstado() ?></td>
        <td><?=$fornecedor->getSegmento() ?></td>
        <td align="center">          
          <a href="../tables/market-altera.php?id=<?=$fornecedor->getId()?>"><button data-toggle="tooltip" data-placement="top" title="Altera Market" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
          <a  href="../remove/remove-fornecedor.php?id=<?=$fornecedor->getId()?>" class="delete" data-toggle="tooltip" data-placement="top" title="Remover Fornecedor"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
        </td>
      </tr>
    <?php
      endforeach
    ?>
  </tbody>      
</table>

<div class="ln_solid"></div>

<a class="btn btn-default" style="" href="../tables/fornecedor-formulario.php?"><i class="fa fa-plus"></i></a>
</div>

			

<?php	require_once "script.php"; ?>
<?php	require_once "rodape.php"; ?>